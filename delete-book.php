<?php
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id = :id");
    $stmt->execute([":id" => $_POST["book_id"]]);
    header("Location: add-book.php?msg=Book+deleted");
    exit;
}
header("Location: add-book.php");
?>
