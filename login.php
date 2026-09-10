<?php

session_start();

$pageTitle = "Login | Logan Public Library";

$email = "";
$emailErr = "";
$passwordErr = "";
$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Email validation
    if (empty($email)) {

        $emailErr = "Email is required.";

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $emailErr = "Please enter a valid email address.";

    }


    // Password validation
    if (empty($password)) {

        $passwordErr = "Password is required.";

    }
    elseif (strlen($password) < 8) {

        $passwordErr =
            "Password must be at least 8 characters.";

    }


    // Temporary message until database is connected
   if (
    empty($emailErr) &&
    empty($passwordErr)
    ) {

    // Temporary session for testing
    // This will be replaced with database authentication later

    $_SESSION["user_id"] = 1;
    $_SESSION["name"] = "Test Member";
    $_SESSION["email"] = $email;
    $_SESSION["role"] = "member";

    header("Location: member-dashboard.php");
    exit;

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
          content="Log in to your Logan Public Library account.">

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
                    <a href="login.php"
                       class="active"
                       aria-current="page">
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

    <section class="form-page">

        <div class="form-container">

            <div class="form-header">

                <p class="section-label">
                    MEMBER ACCOUNT
                </p>

                <h1>
                    Welcome back
                </h1>

                <p>
                    Log in to access your library account.
                </p>

            </div>

            <?php

            if (!empty($loginMessage)) {

                echo "<p style='color:green; font-weight:bold;'>"
                    . $loginMessage .
                    "</p>";

            }

            ?>


            <form action="login.php"
                  method="POST"
                  class="library-form">

                <div class="form-group">

                    <label for="email">
                        Email address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email address"
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

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                        minlength="8"
                        autocomplete="current-password">

                    <?php
                    if (!empty($passwordErr)) {
                        echo "<p style='color:red;'>$passwordErr</p>";
                    }
                    ?>

                </div>


                <div class="form-checkbox">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember">

                    <label for="remember">
                        Remember me
                    </label>

                </div>


                <button type="submit"
                        class="btn btn-primary form-submit">

                    Login

                </button>

            </form>


            <div class="form-footer">

                <p>
                    Don't have an account?
                    <a href="register.php">
                        Create an account
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

            <p>
                <a href="privacy.php">
                    Privacy Notice
                </a>
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