<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<head>
    <meta charset="utf-8">
    <title>Brissbella LMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Brissbella LMS</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?= $currentPage == 'about.php' ? 'active' : '' ?>">About</a>
            <a href="courses.php" class="nav-item nav-link <?= $currentPage == 'courses.php' ? 'active' : '' ?>">Courses</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= in_array($currentPage, ['team.php', 'testimonial.php']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team.php" class="dropdown-item <?= $currentPage == 'team.php' ? 'active' : '' ?>">Our Team</a>
                    <a href="testimonial.php" class="dropdown-item <?= $currentPage == 'testimonial.php' ? 'active' : '' ?>">Testimonial</a>
                </div>
            </div>

            <a href="faq.php" class="nav-item nav-link <?= $currentPage == 'faq.php' ? 'active' : '' ?>">FAQ</a>
            <a href="contact.php" class="nav-item nav-link <?= $currentPage == 'contact.php' ? 'active' : '' ?>">Contact</a>
        </div>

        <a href="signup.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block <?= $currentPage == 'signup.php' ? 'active' : '' ?>">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->

    