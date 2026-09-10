<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

$pageTitle = "Member Dashboard | Logan Public Library";

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
          content="Logan Public Library member dashboard.">

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>

<a class="skip-link" href="#main-content">
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

            <button class="menu-toggle"
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
                    <a href="member-dashboard.php"
                       class="active"
                       aria-current="page">
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
                My Library Account
            </h1>

            <p>
                Welcome,
                <?php echo htmlspecialchars($_SESSION["name"]); ?>.
            </p>

        </div>

    </section>


    <section class="dashboard-section">

        <div class="container">


            <div class="dashboard-grid">


                <article class="dashboard-card">

                    <div class="dashboard-icon"
                         aria-hidden="true">
                        📚
                    </div>

                    <h2>
                        Browse Catalogue
                    </h2>

                    <p>
                        Search and explore books available
                        through the library catalogue.
                    </p>

                    <a href="catalogue.php"
                       class="btn btn-primary">

                        Browse Books

                    </a>

                </article>


                <article class="dashboard-card">

                    <div class="dashboard-icon"
                         aria-hidden="true">
                        👤
                    </div>

                    <h2>
                        My Profile
                    </h2>

                    <p>
                        View and manage your library account
                        information.
                    </p>

                    <a href="profile.php"
                    class="btn btn-secondary">

                        My Profile

                    </a>

                </article>


                <article class="dashboard-card">

                    <div class="dashboard-icon"
                         aria-hidden="true">
                        📖
                    </div>

                    <h2>
                        My Books
                    </h2>

                    <p>
                        View books that you have borrowed
                        from the library.
                    </p>

                    <a href="my-books.php"
                    class="btn btn-secondary">

                        My Books

                    </a>

                </article>


            </div>


            <div class="dashboard-notice">

                <h2>
                    Account information
                </h2>

                <p>
                    Your account information and borrowing
                    history will be displayed here once the
                    database functionality is connected.
                </p>

            </div>


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
                    <a href="index.php">Home</a>
                </li>

                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <a href="catalogue.php">Catalogue</a>
                </li>

            </ul>

        </div>


        <div class="footer-links">

            <h2>Account</h2>

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