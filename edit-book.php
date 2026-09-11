<?php

session_start();

/*
|--------------------------------------------------------------------------
| Admin Access Control
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;
}

if (($_SESSION["role"] ?? "") !== "admin") {

    header("Location: member-dashboard.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| Database Connection
|--------------------------------------------------------------------------
*/

require "includes/db.php";

$pageTitle = "Edit Book | Logan Public Library";


/*
|--------------------------------------------------------------------------
| Update Book
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $bookId = $_POST["book_id"];

    $stmt = $conn->prepare(
        "UPDATE books
         SET title = :title,
             author = :author,
             category = :category,
             year = :year,
             status = :status,
             image = :image
         WHERE book_id = :id"
    );

    $stmt->execute([

        ":title" =>
            $_POST["title"],

        ":author" =>
            $_POST["author"],

        ":category" =>
            $_POST["category"] !== ""
                ? $_POST["category"]
                : null,

        ":year" =>
            $_POST["year"] !== ""
                ? $_POST["year"]
                : null,

        ":status" =>
            $_POST["status"],

        ":image" =>
            $_POST["image"] !== ""
                ? $_POST["image"]
                : null,

        ":id" =>
            $bookId

    ]);


    /*
    |--------------------------------------------------------------------------
    | Remove Borrowing Record When Book Becomes Available
    |--------------------------------------------------------------------------
    |
    | If the admin changes a borrowed book back to Available,
    | remove it from the member's My Books page.
    |
    */

    if ($_POST["status"] === "Available") {

        $borrowStmt = $conn->prepare(
            "DELETE FROM borrowed_books
             WHERE book_id = :book_id"
        );

        $borrowStmt->execute([
            ":book_id" => $bookId
        ]);
    }


    header(
        "Location: add-book.php?msg=Book+updated"
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Get Selected Book
|--------------------------------------------------------------------------
*/

$id = $_GET["id"] ?? null;

$stmt = $conn->prepare(
    "SELECT *
     FROM books
     WHERE book_id = :id"
);

$stmt->execute([
    ":id" => $id
]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);


/*
|--------------------------------------------------------------------------
| Invalid Book
|--------------------------------------------------------------------------
*/

if (!$book) {

    header("Location: add-book.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($pageTitle); ?>
    </title>

    <meta name="description"
          content="Edit book information in the Logan Public Library administration system.">

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>


<a class="skip-link"
   href="#main-content">

    Skip to main content

</a>


<!-- Header -->

<header class="site-header">

    <div class="container header-container">


        <!-- Logo -->

        <a href="index.php"
           class="logo"
           aria-label="Logan Public Library Home">

            <img src="logo.svg"
                 alt=""
                 width="48"
                 height="48">

            <div class="logo-text">

                <span>
                    LOGAN
                </span>

                <strong>
                    PUBLIC LIBRARY
                </strong>

            </div>

        </a>


        <!-- Navigation -->

        <nav class="main-navigation"
             aria-label="Main navigation">

            <button
                class="menu-toggle"
                type="button"
                aria-label="Open navigation menu"
                aria-expanded="false">

                ☰

            </button>


            <ul class="nav-list">

                <li>

                    <a href="index.php">
                        Home
                    </a>

                </li>


                <li>

                    <a href="about.php">
                        About
                    </a>

                </li>


                <li>

                    <a href="catalogue.php">
                        Catalogue
                    </a>

                </li>


                <li>

                    <a href="add-book.php"
                       class="active">

                        Manage Books

                    </a>

                </li>


                <li>

                    <a href="logout.php"
                       class="nav-register">

                        Logout

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</header>



<!-- Main Content -->

<main id="main-content">


    <section class="form-page">

        <div class="form-container form-container-wide">


            <div class="form-header">

                <p class="section-label">
                    LIBRARY ADMIN
                </p>

                <h1>
                    Edit book
                </h1>

                <p>

                    Update the details for

                    "<?php
                    echo htmlspecialchars(
                        $book["title"]
                    );
                    ?>".

                </p>

            </div>



            <!-- Edit Form -->

            <form method="post"
                  action="edit-book.php"
                  class="library-form">


                <input
                    type="hidden"
                    name="book_id"
                    value="<?php echo $book["book_id"]; ?>">



                <!-- Title and Author -->

                <div class="form-row">


                    <div class="form-group">

                        <label for="title">
                            Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="<?php
                            echo htmlspecialchars(
                                $book["title"]
                            );
                            ?>"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="author">
                            Author
                        </label>

                        <input
                            type="text"
                            id="author"
                            name="author"
                            value="<?php
                            echo htmlspecialchars(
                                $book["author"]
                            );
                            ?>"
                            required>

                    </div>

                </div>



                <!-- Category and Year -->

                <div class="form-row">


                    <div class="form-group">

                        <label for="category">
                            Category
                        </label>

                        <input
                            type="text"
                            id="category"
                            name="category"
                            value="<?php
                            echo htmlspecialchars(
                                $book["category"] ?? ""
                            );
                            ?>">

                    </div>


                    <div class="form-group">

                        <label for="year">
                            Year
                        </label>

                        <input
                            type="number"
                            id="year"
                            name="year"
                            min="0"
                            value="<?php
                            echo htmlspecialchars(
                                $book["year"] ?? ""
                            );
                            ?>">

                    </div>

                </div>



                <!-- Status and Image -->

                <div class="form-row">


                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>


                        <select
                            id="status"
                            name="status"
                            required>


                            <option
                                value="Available"
                                <?php
                                echo
                                    $book["status"]
                                    === "Available"
                                        ? "selected"
                                        : "";
                                ?>>

                                Available

                            </option>


                            <option
                                value="Borrowed"
                                <?php
                                echo
                                    $book["status"]
                                    === "Borrowed"
                                        ? "selected"
                                        : "";
                                ?>>

                                Borrowed

                            </option>


                        </select>

                    </div>



                    <div class="form-group">

                        <label for="image">
                            Cover image path
                        </label>

                        <input
                            type="text"
                            id="image"
                            name="image"
                            value="<?php
                            echo htmlspecialchars(
                                $book["image"] ?? ""
                            );
                            ?>">

                    </div>

                </div>



                <!-- Update Button -->

                <button
                    type="submit"
                    class="btn btn-primary form-submit">

                    Update Book

                </button>

            </form>



            <p>

                <a href="add-book.php"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </p>


        </div>

    </section>


</main>



<!-- Footer -->

<footer class="site-footer">

    <div class="container footer-container">


        <div class="footer-brand">

            <a href="index.php"
               class="footer-logo">

                <img src="logo.svg"
                     alt=""
                     width="42"
                     height="42">

                <span>

                    <strong>
                        LOGAN
                    </strong>

                    <br>

                    PUBLIC LIBRARY

                </span>

            </a>


            <p>
                Knowledge, learning and community for everyone.
            </p>

        </div>



        <div class="footer-links">

            <h2>
                Library
            </h2>

            <ul>

                <li>
                    <a href="index.php">
                        Home
                    </a>
                </li>

                <li>
                    <a href="about.php">
                        About
                    </a>
                </li>

                <li>
                    <a href="catalogue.php">
                        Catalogue
                    </a>
                </li>

            </ul>

        </div>



        <div class="footer-links">

            <h2>
                Admin
            </h2>

            <ul>

                <li>

                    <a href="add-book.php">
                        Manage Books
                    </a>

                </li>

                <li>

                    <a href="logout.php">
                        Logout
                    </a>

                </li>

            </ul>

        </div>

    </div>



    <div class="footer-bottom">

        <div class="container">

            <p>

                &copy;
                <?php echo date("Y"); ?>

                Logan Public Library.
                All rights reserved.

            </p>

        </div>

    </div>

</footer>



<script>

const menuButton =
    document.querySelector(".menu-toggle");

const navigation =
    document.querySelector(".nav-list");


if (menuButton) {

    menuButton.addEventListener(
        "click",
        function () {

            const isOpen =
                navigation.classList.toggle(
                    "nav-open"
                );

            menuButton.setAttribute(
                "aria-expanded",
                isOpen ? "true" : "false"
            );

        }
    );

}

</script>


</body>

</html>