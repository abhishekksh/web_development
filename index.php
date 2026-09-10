<?php
$pageTitle = "Home | Logan Public Library";
$pageDescription = "Logan Public Library provides free access to books, learning resources, community programs and digital services.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta name="keywords" content="public library, Logan library, books, library catalogue, reading, community library, digital library">
    <meta name="author" content="Logan Public Library">

    <meta property="og:title" content="Logan Public Library">
    <meta property="og:description" content="Discover books, learning resources and community programs at Logan Public Library.">
    <meta property="og:type" content="website">

    <link rel="canonical" href="index.php">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Accessibility: Skip navigation -->
    <a class="skip-link" href="#main-content">
        Skip to main content
    </a>

    <!-- Header -->
    <header class="site-header">

        <div class="container header-container">

            <!-- Logo -->
            <a href="index.php" class="logo" aria-label="Logan Public Library Home">
                <img src="logo.svg" alt="" width="48" height="48">
                <div class="logo-text">
                    <span>LOGAN</span>
                    <strong>PUBLIC LIBRARY</strong>
                </div>
            </a>

            <!-- Navigation -->
            <nav class="main-navigation" aria-label="Main navigation">

                <button
                    class="menu-toggle"
                    type="button"
                    aria-label="Open navigation menu"
                    aria-expanded="false">
                    ☰
                </button>

                <ul class="nav-list">
                    <li>
                        <a href="index.php" class="active" aria-current="page">
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
                        <a href="register.php" class="nav-register">
                            Register
                        </a>
                    </li>
                </ul>

            </nav>

        </div>

    </header>


    <main id="main-content">

        <!-- Hero section -->
        <section class="hero-section" aria-labelledby="hero-title">

            <div class="hero-shape"></div>

            <div class="container hero-container">

                <div class="hero-content">

                    <p class="eyebrow">
                        YOUR COMMUNITY LIBRARY
                    </p>

                    <h1 id="hero-title">
                        Discover. Learn. Connect.
                    </h1>

                    <p class="hero-text">
                        Welcome to Logan Public Library. Explore books,
                        discover new ideas and connect with your community
                        through learning and reading.
                    </p>

                    <div class="hero-buttons">
                        <a href="catalogue.php" class="btn btn-primary">
                            Explore Catalogue
                        </a>

                        <a href="about.php" class="btn btn-secondary">
                            Learn More
                        </a>
                    </div>

                </div>

                <div class="hero-image">

                    <img
                        src="resources/images/library-reading.svg"
                        alt="A person reading a book in a library">

                </div>

            </div>

        </section>


        <!-- Experience / introduction -->
        <section class="intro-section" aria-labelledby="intro-title">

            <div class="container">

                <div class="section-heading">

                    <p class="section-label">
                        OUR LIBRARY
                    </p>

                    <h2 id="intro-title">
                        A place for everyone to learn
                    </h2>

                    <p>
                        We believe every reader is unique. Our library provides
                        access to books, knowledge, technology and community
                        programs designed to encourage curiosity and lifelong
                        learning.
                    </p>

                </div>


                <div class="feature-grid">

                    <!-- Feature 1 -->
                    <article class="feature-card">

                        <div class="feature-image">
                            <img
                                src="resources/images/library-books.svg"
                                alt="Collection of books available at the library">
                        </div>

                        <div class="feature-content">

                            <h3>
                                Explore our collection
                            </h3>

                            <p>
                                Find fiction, non-fiction, children's books,
                                educational resources and more through our
                                library catalogue.
                            </p>

                            <a href="catalogue.php" class="text-link">
                                Browse books →
                            </a>

                        </div>

                    </article>


                    <!-- Feature 2 -->
                    <article class="feature-card">

                        <div class="feature-image">
                            <img
                                src="resources/images/library-community.svg"
                                alt="People participating in a library community activity">
                        </div>

                        <div class="feature-content">

                            <h3>
                                Community and learning
                            </h3>

                            <p>
                                Join library programs and discover opportunities
                                for learning, creativity and community connection.
                            </p>

                            <a href="about.php" class="text-link">
                                Discover more →
                            </a>

                        </div>

                    </article>


                    <!-- Feature 3 -->
                    <article class="feature-card feature-card-simple">

                        <div class="feature-icon" aria-hidden="true">
                            📚
                        </div>

                        <div class="feature-content">

                            <h3>
                                Learn for life
                            </h3>

                            <p>
                                Access information and resources that support
                                students, families, readers and lifelong learners.
                            </p>

                            <a href="catalogue.php" class="text-link">
                                Start exploring →
                            </a>

                        </div>

                    </article>

                </div>

            </div>

        </section>


        <!-- Catalogue call-to-action -->
        <section class="catalogue-cta" aria-labelledby="catalogue-title">

            <div class="container catalogue-cta-container">

                <div>

                    <p class="section-label">
                        LIBRARY CATALOGUE
                    </p>

                    <h2 id="catalogue-title">
                        Find your next great read
                    </h2>

                    <p>
                        Search our collection and discover books for study,
                        entertainment and personal development.
                    </p>

                </div>

                <a href="catalogue.php" class="btn btn-dark">
                    View Catalogue
                </a>

            </div>

        </section>

    </main>


    <!-- Footer -->
    <footer class="site-footer">

        <div class="container footer-container">

            <div class="footer-brand">

                <a href="index.php" class="footer-logo">
                    <img src="logo.svg" alt="" width="42" height="42">
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
                    &copy; <?php echo date("Y"); ?> Logan Public Library.
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


    <!-- Small accessibility/navigation script -->
    <script>

        const menuButton = document.querySelector(".menu-toggle");
        const navigation = document.querySelector(".nav-list");

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