<?php

$pageTitle = "Book Catalogue | Logan Public Library";

$pageDescription =
    "Search the Logan Public Library catalogue and discover books across fiction, education, children's literature and more.";


/*
|--------------------------------------------------------------------------
| Catalogue Data
|--------------------------------------------------------------------------
| Member 2: loaded from the books table instead of the earlier demo array.
|--------------------------------------------------------------------------
*/

require 'includes/db.php';

$stmt = $conn->query("SELECT * FROM books ORDER BY book_id");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);


/*
|--------------------------------------------------------------------------
| Search
|--------------------------------------------------------------------------
*/

$search = "";

if (isset($_GET["search"])) {

    $search = trim($_GET["search"]);

}


/*
|--------------------------------------------------------------------------
| Category Filter
|--------------------------------------------------------------------------
*/

$category = "";

if (isset($_GET["category"])) {

    $category = trim($_GET["category"]);

}


/*
|--------------------------------------------------------------------------
| Filter Books
|--------------------------------------------------------------------------
*/

$filteredBooks = [];

foreach ($books as $book) {

    $matchesSearch = true;
    $matchesCategory = true;


    if ($search !== "") {

        $searchText =
            strtolower(
                $book["title"] . " " .
                $book["author"] . " " .
                $book["category"]
            );

        $matchesSearch =
            strpos(
                $searchText,
                strtolower($search)
            ) !== false;
    }


    if ($category !== "") {

        $matchesCategory =
            strtolower($book["category"]) ===
            strtolower($category);

    }


    if ($matchesSearch && $matchesCategory) {

        $filteredBooks[] = $book;

    }

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
          content="<?php echo htmlspecialchars($pageDescription); ?>">

    <meta name="keywords"
          content="library catalogue, public library books, books, Logan library, search books">

    <meta name="author"
          content="Logan Public Library">

    <meta property="og:title"
          content="Logan Public Library Catalogue">

    <meta property="og:description"
          content="Search and explore books available through Logan Public Library.">

    <meta property="og:type"
          content="website">

    <link rel="canonical"
          href="catalogue.php">

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
                    <a href="catalogue.php"
                       class="active"
                       aria-current="page">

                        Catalogue

                    </a>
                </li>

                <li>
                    <a href="login.php">
                        Login
                    </a>
                </li>

                <li>
                    <a href="register.php"
                       class="nav-register">

                        Register

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
                PUBLIC LIBRARY CATALOGUE
            </p>

            <h1>
                Find your next book
            </h1>

            <p>
                Search our collection by title, author or category.
            </p>

        </div>

    </section>


    <!-- Search Form -->

    <section class="catalogue-search"
             aria-labelledby="search-heading">

        <div class="container">

            <h2 id="search-heading">
                Search the catalogue
            </h2>


            <form method="GET"
                  action="catalogue.php"
                  class="search-form">

                <div class="form-group">

                    <label for="search">
                        Search by title or author
                    </label>

                    <input
                        type="search"
                        id="search"
                        name="search"
                        value="<?php echo htmlspecialchars($search); ?>"
                        placeholder="e.g. adventure, science, James Wilson">

                </div>


                <div class="form-group">

                    <label for="category">
                        Category
                    </label>

                    <select id="category"
                            name="category">

                        <option value="">
                            All categories
                        </option>

                        <option value="Fiction"
                            <?php
                            if ($category === "Fiction") {
                                echo "selected";
                            }
                            ?>>
                            Fiction
                        </option>

                        <option value="Education"
                            <?php
                            if ($category === "Education") {
                                echo "selected";
                            }
                            ?>>
                            Education
                        </option>

                        <option value="Children"
                            <?php
                            if ($category === "Children") {
                                echo "selected";
                            }
                            ?>>
                            Children
                        </option>

                        <option value="Technology"
                            <?php
                            if ($category === "Technology") {
                                echo "selected";
                            }
                            ?>>
                            Technology
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Search

                </button>


                <a href="catalogue.php"
                   class="clear-search">

                    Clear

                </a>

            </form>

        </div>

    </section>


    <!-- Book Catalogue -->

    <section class="books-section"
             aria-labelledby="books-heading">

        <div class="container">

            <div class="catalogue-top">

                <div>

                    <p class="section-label">
                        BOOK COLLECTION
                    </p>

                    <h2 id="books-heading">
                        Available books
                    </h2>

                </div>


                <p class="book-count"
                   aria-live="polite">

                    <?php echo count($filteredBooks); ?>
                    book(s) found

                </p>

            </div>


            <?php if (count($filteredBooks) > 0): ?>

                <div class="books-grid">

                    <?php foreach ($filteredBooks as $index => $book): ?>

                        <article class="book-card">

                            <div class="book-cover">

    <img
        src="<?php echo htmlspecialchars($book["image"]); ?>"
        alt="Cover of <?php echo htmlspecialchars($book["title"]); ?>"
        loading="lazy"
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


                                <span class="availability
                                    <?php
                                    echo $book["status"] === "Available"
                                        ? "available"
                                        : "borrowed";
                                    ?>">

                                    <?php
                                    echo htmlspecialchars(
                                        $book["status"]
                                    );
                                    ?>

                                </span>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="no-results">

                    <div aria-hidden="true">
                        🔎
                    </div>

                    <h3>
                        No books found
                    </h3>

                    <p>
                        Try another search term or category.
                    </p>

                    <a href="catalogue.php"
                       class="btn btn-primary">

                        View all books

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </section>


    <section class="catalogue-cta">

        <div class="container catalogue-cta-container">

            <div>

                <p class="section-label">
                    NEED AN ACCOUNT?
                </p>

                <h2>
                    Join our library community
                </h2>

                <p>
                    Register to access your library account and
                    available online services.
                </p>

            </div>


            <a href="register.php"
               class="btn btn-dark">

                Register Now

            </a>

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
                    <strong>LOGAN</strong><br>
                    PUBLIC LIBRARY
                </span>

            </a>

            <p>
                Knowledge, learning and community for everyone.
            </p>

        </div>


        <div class="footer-links">

            <h2>Library</h2>

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

            <h2>Account</h2>

            <ul>

                <li>
                    <a href="login.php">
                        Login
                    </a>
                </li>

                <li>
                    <a href="register.php">
                        Register
                    </a>
                </li>

            </ul>

        </div>

    </div>


    <div class="footer-bottom">

        <div class="container">

            <p>
                &copy; <?php echo date("Y"); ?>
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

    menuButton.addEventListener("click", function () {

        const isOpen =
            navigation.classList.toggle("nav-open");

        menuButton.setAttribute(
            "aria-expanded",
            isOpen ? "true" : "false"
        );

    });

}

</script>

</body>

</html>