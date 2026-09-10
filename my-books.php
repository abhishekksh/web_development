<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

$pageTitle = "My Books | Logan Public Library";

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
          content="View your borrowed and reserved library books.">

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
                View your borrowed and reserved books.
            </p>

        </div>

    </section>


    <section class="dashboard-section">

        <div class="container">

            <div class="dashboard-notice">

                <h2>
                    Your Books
                </h2>

                <p>
                    You currently have no book information
                    available.
                </p>

                <p>
                    Your borrowed or reserved books will
                    appear here once the database
                    functionality is connected.
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

        </div>

    </section>

</main>


</body>
</html>