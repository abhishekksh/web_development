<?php

session_start();

require "includes/db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if (($_SESSION["role"] ?? "") !== "member") {
    header("Location: catalogue.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: catalogue.php");
    exit;
}

$bookId = $_POST["book_id"] ?? "";

if (!is_numeric($bookId)) {
    header("Location: catalogue.php?borrow=invalid");
    exit;
}

$bookId = (int)$bookId;

/* Find the book */
$stmt = $conn->prepare(
    "SELECT * FROM books WHERE book_id = :book_id"
);

$stmt->execute([
    ":book_id" => $bookId
]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    header("Location: catalogue.php?borrow=notfound");
    exit;
}

/* Make sure it is available */
if ($book["status"] !== "Available") {
    header("Location: catalogue.php?borrow=unavailable");
    exit;
}

/* Add the book to this member */
$stmt = $conn->prepare(
    "INSERT INTO borrowed_books (user_id, book_id)
     VALUES (:user_id, :book_id)"
);

$stmt->execute([
    ":user_id" => $_SESSION["user_id"],
    ":book_id" => $bookId
]);

/* Change book status */
$stmt = $conn->prepare(
    "UPDATE books
     SET status = 'Borrowed'
     WHERE book_id = :book_id"
);

$stmt->execute([
    ":book_id" => $bookId
]);

header("Location: catalogue.php?borrow=success");
exit;

?>