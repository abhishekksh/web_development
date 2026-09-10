<?php

$pageTitle = "Register | Logan Public Library";

$firstName = "";
$lastName = "";
$email = "";
$phone = "";

$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$phoneErr = "";
$passwordErr = "";
$confirmPasswordErr = "";
$termsErr = "";

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST["first_name"]);
    $lastName = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];


    // First name validation
    if (empty($firstName)) {

        $firstNameErr = "First name is required.";

    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $firstName)) {

        $firstNameErr =
            "First name can only contain letters and spaces.";

    }


    // Last name validation
    if (empty($lastName)) {

        $lastNameErr = "Last name is required.";

    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $lastName)) {

        $lastNameErr =
            "Last name can only contain letters and spaces.";

    }


    // Email validation
    if (empty($email)) {

        $emailErr = "Email is required.";

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $emailErr = "Please enter a valid email address.";

    }


    // Phone validation
    if (empty($phone)) {

        $phoneErr = "Phone number is required.";

    }
    elseif (!preg_match("/^[0-9 +()-]{8,20}$/", $phone)) {

        $phoneErr = "Please enter a valid phone number.";

    }


    // Password validation
    if (empty($password)) {

        $passwordErr = "Password is required.";

    }
    elseif (strlen($password) < 8) {

        $passwordErr =
            "Password must be at least 8 characters.";

    }


    // Confirm password
    if (empty($confirmPassword)) {

        $confirmPasswordErr =
            "Please confirm your password.";

    }
    elseif ($password !== $confirmPassword) {

        $confirmPasswordErr =
            "Passwords do not match.";

    }


    // Privacy checkbox
    if (!isset($_POST["terms"])) {

        $termsErr =
            "You must agree to the privacy notice.";

    }


    // Check whether all validation passed
    if (
        empty($firstNameErr) &&
        empty($lastNameErr) &&
        empty($emailErr) &&
        empty($phoneErr) &&
        empty($passwordErr) &&
        empty($confirmPasswordErr) &&
        empty($termsErr)
    ) {

        $successMessage =
            "Registration details are valid. Database connection will be added next.";

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
            
            <?php
            if (!empty($successMessage)) {

                echo "<p style='color:green; font-weight:bold;'>"
                    . $successMessage .
                    "</p>";
            }
            ?>


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
                            value="<?php echo htmlspecialchars($firstName); ?>"
                            required
                            minlength="2"
                            maxlength="50"
                            autocomplete="given-name">

                        <?php
                        if (!empty($firstNameErr)) {
                            echo "<p style='color:red;'>$firstNameErr</p>";
                        }
                        ?>

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
                            value="<?php echo htmlspecialchars($lastName); ?>"
                            required
                            minlength="2"
                            maxlength="50"
                            autocomplete="family-name">

                        <?php
                        if (!empty($lastNameErr)) {
                            echo "<p style='color:red;'>$lastNameErr</p>";
                        }
                        ?>

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
                        value="<?php echo htmlspecialchars($email); ?>"
                        required
                        autocomplete="email">

                    <?php
                    if (!empty($emailErr)) {
                        echo "<p style='color:red;'>$emailErr</p>";
                    }
                    ?>

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
                        value="<?php echo htmlspecialchars($phone); ?>"
                        required
                        autocomplete="tel">

                    <?php
                    if (!empty($phoneErr)) {
                        echo "<p style='color:red;'>$phoneErr</p>";
                    }
                    ?>

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
                        <?php
                        if (!empty($passwordErr)) {
                            echo "<p style='color:red;'>$passwordErr</p>";
                        }
                        ?>

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
                        <?php
                        if (!empty($confirmPasswordErr)) {
                            echo "<p style='color:red;'>$confirmPasswordErr</p>";
                        }
                        ?>

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

                    <?php
                    if (!empty($termsErr)) {
                        echo "<p style='color:red;'>$termsErr</p>";
                    }
                    ?>

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