<?php
$pageTitle = "Register | Logan Public Library";
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
          content="Create a Logan Public Library member account.">

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
                       class="nav-register active"
                       aria-current="page">
                        Register
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</header>


<main id="main-content">

    <section class="form-page">

        <div class="form-container form-container-wide">

            <div class="form-header">

                <p class="section-label">
                    JOIN OUR LIBRARY
                </p>

                <h1>
                    Create your account
                </h1>

                <p>
                    Register for a Logan Public Library account.
                </p>

            </div>


            <form action="register.php"
                  method="POST"
                  class="library-form">


                <div class="form-row">

                    <div class="form-group">

                        <label for="first_name">
                            First name
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            placeholder="First name"
                            required
                            minlength="2"
                            maxlength="50"
                            autocomplete="given-name">

                    </div>


                    <div class="form-group">

                        <label for="last_name">
                            Last name
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Last name"
                            required
                            minlength="2"
                            maxlength="50"
                            autocomplete="family-name">

                    </div>

                </div>


                <div class="form-group">

                    <label for="email">
                        Email address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="example@email.com"
                        required
                        autocomplete="email">

                </div>


                <div class="form-group">

                    <label for="phone">
                        Phone number
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                        autocomplete="tel">

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimum 8 characters"
                            required
                            minlength="8"
                            autocomplete="new-password">

                    </div>


                    <div class="form-group">

                        <label for="confirm_password">
                            Confirm password
                        </label>

                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            placeholder="Confirm password"
                            required
                            minlength="8"
                            autocomplete="new-password">

                    </div>

                </div>


                <div class="form-checkbox">

                    <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        required>

                    <label for="terms">

                        I agree to the library's
                        <a href="privacy.php">
                            privacy notice
                        </a>.

                    </label>

                </div>


                <button type="submit"
                        class="btn btn-primary form-submit">

                    Create Account

                </button>

            </form>


            <div class="form-footer">

                <p>
                    Already have an account?
                    <a href="login.php">
                        Login here
                    </a>
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
                    <a href="login.php">Login</a>
                </li>

                <li>
                    <a href="register.php">Register</a>
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