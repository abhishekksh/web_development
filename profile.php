<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

$pageTitle = "My Profile | Logan Public Library";

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
          content="View your Logan Public Library member profile.">

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
                MEMBER PROFILE
            </p>

            <h1>
                My Profile
            </h1>

            <p>
                View your library account information.
            </p>

        </div>

    </section>


    <section class="dashboard-section">

        <div class="container">

            <div class="dashboard-notice">

                <h2>
                    Account Details
                </h2>

                <p>
                    <strong>Name:</strong>

                    <?php
                    echo htmlspecialchars(
                        $_SESSION["name"] ?? "Member"
                    );
                    ?>
                </p>

                <p>
                    <strong>Email:</strong>

                    <?php
                    echo htmlspecialchars(
                        $_SESSION["email"] ?? "Not Available"
                    );
                    ?>
                </p>

                <p>
                    <strong>Account Type:</strong>

                    <?php
                    echo htmlspecialchars(
                        ucfirst($_SESSION["role"])
                    );
                    ?>
                </p>

                <br>

                <p>
                    Additional account information will
                    be displayed once the database is connected.
                </p>

                <br>

                <a href="member-dashboard.php"
                   class="btn btn-primary">

                    Back to Dashboard

                </a>

            </div>

        </div>

    </section>

</main>


</body>
</html>