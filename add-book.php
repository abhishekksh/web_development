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

$pageTitle = "Manage Books | Logan Public Library";


/*
|--------------------------------------------------------------------------
| Add Book
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $conn->prepare(
        "INSERT INTO books
        (title, author, category, year, status, image)
        VALUES
        (:title, :author, :category, :year, :status, :image)"
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
                : null

    ]);

    header(
        "Location: add-book.php?msg=Book+added"
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Load Books
|--------------------------------------------------------------------------
*/

$stmt = $conn->query(
    "SELECT * FROM books ORDER BY book_id"
);

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
          content="Manage books in the Logan Public Library catalogue.">

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>


<a class="skip-link"
   href="#main-content">

    Skip to main content

</a>



<header class="site-header">

    <div class="container header-container">


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
                       class="active"
                       aria-current="page">

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



<main id="main-content">


    <section class="page-hero catalogue-header">

        <div class="container">

            <p class="section-label">
                LIBRARY ADMIN
            </p>

            <h1>
                Manage Books
            </h1>

            <p>
                Add, edit or remove books in the Logan Public Library catalogue.
            </p>

        </div>

    </section>



    <?php if (isset($_GET["msg"])): ?>

        <section class="container">

            <p class="success-message">

                <?php
                echo htmlspecialchars(
                    $_GET["msg"]
                );
                ?>

            </p>

        </section>

    <?php endif; ?>



    <section class="books-section">

        <div class="container">


            <div class="catalogue-top">

                <div>

                    <p class="section-label">
                        BOOK COLLECTION
                    </p>

                    <h2>
                        Current books
                    </h2>

                </div>

                <p class="book-count">

                    <?php echo count($books); ?>
                    book(s)

                </p>

            </div>



            <?php if (count($books) > 0): ?>

                <div class="books-grid">

                    <?php foreach ($books as $book): ?>


                        <article class="book-card">


                            <div class="book-cover">

                                <img
                                    src="<?php
                                    echo htmlspecialchars(
                                        $book["image"]
                                    );
                                    ?>"
                                    alt="Cover of <?php
                                    echo htmlspecialchars(
                                        $book["title"]
                                    );
                                    ?>"
                                    loading="lazy">

                            </div>



                            <div class="book-information">


                                <p class="book-category">

                                    <?php
                                    echo htmlspecialchars(
                                        $book["category"]
                                    );
                                    ?>

                                </p>


                                <h3>

                                    <?php
                                    echo htmlspecialchars(
                                        $book["title"]
                                    );
                                    ?>

                                </h3>


                                <p class="book-author">

                                    By

                                    <?php
                                    echo htmlspecialchars(
                                        $book["author"]
                                    );
                                    ?>

                                </p>


                                <p class="book-year">

                                    Published:

                                    <?php
                                    echo htmlspecialchars(
                                        $book["year"]
                                    );
                                    ?>

                                </p>



                                <span class="availability
                                    <?php
                                    echo
                                        $book["status"] === "Available"
                                            ? "available"
                                            : "borrowed";
                                    ?>">

                                    <?php
                                    echo htmlspecialchars(
                                        $book["status"]
                                    );
                                    ?>

                                </span>



                                <div class="book-actions">


                                    <a
                                        href="edit-book.php?id=<?php
                                        echo $book["book_id"];
                                        ?>"
                                        class="btn btn-secondary">

                                        Edit

                                    </a>



                                    <form
                                        method="post"
                                        action="delete-book.php"
                                        onsubmit="return confirm('Delete this book?');">

                                        <input
                                            type="hidden"
                                            name="book_id"
                                            value="<?php
                                            echo $book["book_id"];
                                            ?>">


                                        <button
                                            type="submit"
                                            class="btn btn-danger">

                                            Delete

                                        </button>

                                    </form>


                                </div>


                            </div>


                        </article>


                    <?php endforeach; ?>

                </div>


            <?php else: ?>


                <div class="no-results">

                    <h3>
                        No books found
                    </h3>

                    <p>
                        Add a book using the form below.
                    </p>

                </div>


            <?php endif; ?>


        </div>

    </section>



    <section class="form-page">

        <div class="form-container form-container-wide">


            <div class="form-header">

                <p class="section-label">
                    ADD A BOOK
                </p>

                <h1>
                    Add new book
                </h1>

                <p>
                    Enter the book details below.
                </p>

            </div>



            <form
                method="post"
                action="add-book.php"
                class="library-form">


                <div class="form-row">


                    <div class="form-group">

                        <label for="title">
                            Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
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
                            required>

                    </div>


                </div>



                <div class="form-row">


                    <div class="form-group">

                        <label for="category">
                            Category
                        </label>

                        <input
                            type="text"
                            id="category"
                            name="category">

                    </div>



                    <div class="form-group">

                        <label for="year">
                            Year
                        </label>

                        <input
                            type="number"
                            id="year"
                            name="year"
                            min="0">

                    </div>


                </div>



                <div class="form-row">


                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            required>

                            <option value="Available">
                                Available
                            </option>

                            <option value="Borrowed">
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
                            placeholder="resources/images/book1.jpeg">

                    </div>


                </div>



                <button
                    type="submit"
                    class="btn btn-primary form-submit">

                    Add Book

                </button>


            </form>


        </div>

    </section>


</main>



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