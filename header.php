<?php
session_start();

include ("database/connection.php");
include ("database/functions.php");


$user_data = check_login($con);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="assets/logo.jpg" type="image/x-icon">
    <title>POTHIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>


    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* General styles */
        body {
            font-family: 'Rubik', sans-serif;
            padding-top: 90px;
            /* Add padding to avoid content hiding under fixed header */
        }

        /* Fixed header styles */
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }

        /* Hover effect for links */
        .hover-effect {
            position: relative;
            color: white;
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .hover-effect::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            background-color: #fff;
            left: 50%;
            bottom: -5px;
            transition: width 0.3s ease-in-out, left 0.3s ease-in-out;
        }

        .hover-effect:hover::after {
            width: 100%;
            left: 0;
        }

        .hover-effect:hover {
            color: #f0f0f0;
            transform: translateY(-2px);
        }

        /* Style for navbar */
        .navbar {
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
        }

        .navbar:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Animated logo */
        .animated-logo {
            animation: logo-pulse 3s infinite;
        }

        @keyframes logo-pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        /* Toggler button animation */
        .navbar-toggler-icon {
            transition: transform 0.3s ease;
        }

        .navbar-toggler:hover .navbar-toggler-icon {
            transform: rotate(90deg);
        }

        /* Collapse animation */
        .collapse {
            animation: slide-in 0.5s ease;
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Welcome text animation */
        .welcome-text {
            animation: text-fade-in 2s ease;
        }

        @keyframes text-fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>

<body>
    <header id="header" class="fixed-top">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light shadow-sm">
            <p class="font-rale font-size-12 text-black-50 m-0 welcome-text">
                Welcome <?php echo $user_data['user_name']; ?> to POTHIK
            </p>
        </div>

        <!-- Primary Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <a class="navbar-brand" href="./index.php">
                <img src="assets/icons/pothik 2.png" alt="POTHIK Logo" height="40px" class="animated-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                        <a class="nav-link hover-effect" href="./sugPlace.php"><i class="fa-solid fa-location-dot"></i>
                            Suggested places</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link hover-effect" href="./bus.php"><i class="fa-solid fa-van-shuttle"></i>
                            Transportation</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link hover-effect" href="./blog.php"><i class="fa-solid fa-blog"></i> Blog &
                            Reviews</a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link hover-effect" href="./home.php"><i class="fa-solid fa-hotel"></i>
                            Residence</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-capitalize hover-effect" href="./logout.php">
                            <i class="fa-solid fa-user-plus"></i> <?php echo $user_data['user_name']; ?> (Logout)
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- !Primary Navigation -->
    </header>


</body>