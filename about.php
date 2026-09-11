<?php

session_start();

$pageTitle = "About Us | Logan Public Library";
$pageDescription = "Learn about Logan Public Library, our services, values and commitment to learning and the community.";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <meta name="description"
          content="<?php echo htmlspecialchars($pageDescription); ?>">

    <meta name="keywords"
          content="about public library, Logan Public Library, library services, community library">

    <meta name="author"
          content="Logan Public Library">

    <meta property="og:title"
          content="About Logan Public Library">

    <meta property="og:description"
          content="Learn about our library, services and community values.">

    <meta property="og:type"
          content="website">

    <link rel="canonical" href="about.php">

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
                <strong>PUBLIC LIBRARY</strong>
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
                    <a href="about.php"
                       class="active"
                       aria-current="page">
                        About
                    </a>
                </li>

                <li>
                    <a href="catalogue.php">
                        Catalogue
                    </a>
                </li>

                <?php if (isset($_SESSION["user_id"])): ?>

                    <?php if (($_SESSION["role"] ?? "") === "admin"): ?>

                        <li>
                            <a href="add-book.php">
                                Manage Books
                            </a>
                        </li>

                    <?php else: ?>

                        <li>
                            <a href="member-dashboard.php">
                                My Account
                            </a>
                        </li>

                    <?php endif; ?>

                    <li>
                        <a href="logout.php"
                        class="nav-register">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

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

                <?php endif; ?>

            </ul>

        </nav>

    </div>

</header>


<main id="main-content">


    <section class="page-hero">

        <div class="container">

            <p class="section-label">
                ABOUT US
            </p>

            <h1>
                Connecting people with knowledge
            </h1>

            <p>
                Logan Public Library is a welcoming community space
                where people can discover books, develop new skills
                and connect with others.
            </p>

        </div>

    </section>


    <section class="about-section">

        <div class="container about-grid">

            <div class="about-image">

                <img
                    src="resources/images/library-reading.svg"
                    alt="Person reading and learning at a library">

            </div>


            <div class="about-content">

                <p class="section-label">
                    OUR STORY
                </p>

                <h2>
                    Supporting learning at every stage of life
                </h2>

                <p>
                    Our public library provides access to information,
                    books and learning resources for children, students,
                    families and adults.
                </p>

                <p>
                    We aim to create an inclusive environment where
                    everyone can read, learn, explore new ideas and
                    participate in their community.
                </p>

                <p>
                    Whether you are looking for your next novel,
                    researching a school project or developing a new
                    skill, our library provides resources to help you.
                </p>

            </div>

        </div>

    </section>


    <section class="values-section"
             aria-labelledby="values-title">

        <div class="container">

            <div class="section-heading">

                <p class="section-label">
                    OUR VALUES
                </p>

                <h2 id="values-title">
                    What we stand for
                </h2>

            </div>


            <div class="values-grid">

                <article class="value-card">

                    <div class="value-icon"
                         aria-hidden="true">
                        📖
                    </div>

                    <h3>
                        Knowledge
                    </h3>

                    <p>
                        We provide access to reliable information
                        and resources that encourage learning.
                    </p>

                </article>


                <article class="value-card">

                    <div class="value-icon"
                         aria-hidden="true">
                        ♿
                    </div>

                    <h3>
                        Inclusion
                    </h3>

                    <p>
                        We aim to provide an accessible and welcoming
                        experience for people from all backgrounds.
                    </p>

                </article>


                <article class="value-card">

                    <div class="value-icon"
                         aria-hidden="true">
                        🤝
                    </div>

                    <h3>
                        Community
                    </h3>

                    <p>
                        We support community connection through
                        learning, reading and shared experiences.
                    </p>

                </article>


                <article class="value-card">

                    <div class="value-icon"
                         aria-hidden="true">
                        🌱
                    </div>

                    <h3>
                        Lifelong Learning
                    </h3>

                    <p>
                        We encourage curiosity and learning throughout
                        every stage of life.
                    </p>

                </article>

            </div>

        </div>

    </section>


    <section class="catalogue-cta">

        <div class="container catalogue-cta-container">

            <div>

                <p class="section-label">
                    START READING
                </p>

                <h2>
                    Explore our catalogue
                </h2>

                <p>
                    Find books and resources that match your interests.
                </p>

            </div>

            <a href="catalogue.php"
               class="btn btn-dark">

                Browse Catalogue

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