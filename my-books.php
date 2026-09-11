<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

require "includes/db.php";

$pageTitle = "My Books | Logan Public Library";

$stmt = $conn->prepare(
    "SELECT
        books.book_id,
        books.title,
        books.author,
        books.category,
        books.year,
        books.status,
        books.image,
        borrowed_books.borrow_date
     FROM borrowed_books
     INNER JOIN books
        ON borrowed_books.book_id = books.book_id
     WHERE borrowed_books.user_id = :user_id
     ORDER BY borrowed_books.borrow_date DESC"
);

$stmt->execute([
    ":user_id" => $_SESSION["user_id"]
]);

$myBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
          content="View your borrowed library books.">

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

                <span>LOGAN</span>

                <strong>
                    PUBLIC LIBRARY
                </strong>

            </div>

        </a>


        <nav class="main-navigation"
             aria-label="Main navigation">

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
                    <a href="member-dashboard.php">
                        My Account
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

    <section class="page-hero">

        <div class="container">

            <p class="section-label">
                MEMBER AREA
            </p>

            <h1>
                My Books
            </h1>

            <p>
                View the books you have borrowed.
            </p>

        </div>

    </section>


    <section class="dashboard-section">

        <div class="container">

            <?php if (count($myBooks) > 0): ?>

                <div class="catalogue-top">

                    <div>

                        <p class="section-label">
                            BORROWED BOOKS
                        </p>

                        <h2>
                            Your Books
                        </h2>

                    </div>

                    <p class="book-count">
                        <?php echo count($myBooks); ?>
                        book(s)
                    </p>

                </div>


                <div class="books-grid">

                    <?php foreach ($myBooks as $book): ?>

                        <article class="book-card">

                            <div class="book-cover">

                                <img
                                    src="<?php echo htmlspecialchars($book["image"]); ?>"
                                    alt="Cover of <?php echo htmlspecialchars($book["title"]); ?>"
                                >

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


                                <p>

                                    Borrowed:

                                    <?php

                                    echo date(
                                        "d M Y",
                                        strtotime(
                                            $book["borrow_date"]
                                        )
                                    );

                                    ?>

                                </p>


                                <span class="availability borrowed">

                                    Borrowed

                                </span>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>


                <br>

                <a href="catalogue.php"
                   class="btn btn-primary">

                    Browse More Books

                </a>

                <a href="member-dashboard.php"
                   class="btn btn-secondary">

                    Back to Dashboard

                </a>


            <?php else: ?>

                <div class="dashboard-notice">

                    <h2>
                        Your Books
                    </h2>

                    <p>
                        You have not borrowed any books yet.
                    </p>

                    <br>

                    <a href="catalogue.php"
                       class="btn btn-primary">

                        Browse Catalogue

                    </a>

                    <a href="member-dashboard.php"
                       class="btn btn-secondary">

                        Back to Dashboard

                    </a>

                </div>

            <?php endif; ?>

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
                Account
            </h2>

            <ul>

                <li>
                    <a href="member-dashboard.php">
                        My Account
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

</body>
</html>