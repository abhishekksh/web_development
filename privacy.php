<?php
$pageTitle = "Privacy Notice | Logan Public Library";
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
          content="Read the Logan Public Library privacy notice explaining how member information is collected, used and protected.">

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


    <section class="page-hero">

        <div class="container">

            <p class="section-label">
                PRIVACY
            </p>

            <h1>
                Privacy Notice
            </h1>

            <p>
                We respect your privacy and are committed to
                protecting information provided through our website.
            </p>

        </div>

    </section>


    <section class="privacy-section">

        <div class="container privacy-content">


            <article>

                <h2>
                    1. Information we collect
                </h2>

                <p>
                    When you create a library account, the website
                    may collect information such as your name,
                    email address and contact details.
                </p>

            </article>


            <article>

                <h2>
                    2. How we use information
                </h2>

                <p>
                    Information is used to provide library account
                    services, manage access to resources and improve
                    the user experience.
                </p>

            </article>


            <article>

                <h2>
                    3. Password security
                </h2>

                <p>
                    User passwords should never be stored as plain
                    text. Passwords should be securely hashed before
                    being stored in the database.
                </p>

            </article>


            <article>

                <h2>
                    4. Data protection
                </h2>

                <p>
                    Reasonable technical and organisational measures
                    should be used to protect user information from
                    unauthorised access, alteration or disclosure.
                </p>

            </article>


            <article>

                <h2>
                    5. Third-party services
                </h2>

                <p>
                    The website should avoid collecting unnecessary
                    personal information through third-party services.
                    External services should only be used where
                    appropriate and necessary.
                </p>

            </article>


            <article>

                <h2>
                    6. Your choices
                </h2>

                <p>
                    Users should be able to request information about
                    their account data and raise concerns about the
                    handling of their personal information.
                </p>

            </article>


            <article>

                <h2>
                    7. Website security
                </h2>

                <p>
                    The application should use secure sessions,
                    input validation, password hashing and
                    role-based access controls.
                </p>

            </article>


            <article>

                <h2>
                    8. Contact
                </h2>

                <p>
                    For questions about this privacy notice,
                    please contact the library administration team.
                </p>

            </article>

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
                    <a href="login.php">Login</a>
                </li>

                <li>
                    <a href="register.php">Register</a>
                </li>

                <li>
                    <a href="privacy.php">Privacy</a>
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