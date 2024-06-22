<?php
session_start();

include ("database/connection.php");
include ("database/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $Fplace = $_POST['Fplace'];
    $address = $_POST['address'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Save to database
            $user_id = random_num(5);
            $v_code = bin2hex(random_bytes(4));

            $query = "INSERT INTO `users`(`user_id`, `user_name`, `email`, `password`, `number`, `Fplace`, `address`, `verification_code`, `is_verify`) values ('$user_id','$user_name','$email','$password','$number','$Fplace','$address','$v_code','0')";

            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        } else {
            echo "Please enter valid Email!";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"
        href="https://p7.hiclipart.com/preview/583/301/232/flight-travel-agent-computer-icons-free-high-quality-travel-icon.jpg"
        type="image/x-icon">
    <title>POTHIK - Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <style type="text/css">
        body {
            min-height: 100vh;
            background: url("assets/img/4195504888_edb9cc9fb6_b.jpg");
            background-size: cover;
            background-position: center;
        }
    </style>
    <style>
        body {
            font-family: 'Rubik', sans-serif;
            padding-top: 90px;
        }

        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }

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

        .navbar {
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
        }

        .navbar:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

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

        .navbar-toggler-icon {
            transition: transform 0.3s ease;
        }

        .navbar-toggler:hover .navbar-toggler-icon {
            transform: rotate(90deg);
        }

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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light shadow-sm">
            <p class="font-rale font-size-12 text-black-50 m-0 welcome-text">Welcome to POTHIK</p>
        </div>
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
                        <a class="nav-link" href="#"><i class="fa-solid fa-location-dot"></i> Tour Places</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-van-shuttle"></i> Transportation</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-blog"></i> Blog & Reviews</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-hotel"></i> Residence</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php"><i class="fa-solid fa-user-plus"></i> Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <div id="box">
                    <form method="post">
                        <div style="font-size: 20px; margin: 10px; color: blue;">Signup</div>
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger" style="display: none;"><?php echo $error_message; ?></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const errorMessage = document.querySelector(".alert.alert-danger");
                                    errorMessage.style.transition = "opacity 0.5s ease";
                                    errorMessage.style.opacity = 0;
                                    setTimeout(() => {
                                        errorMessage.style.display = "block";
                                        errorMessage.style.opacity = 1;
                                    }, 100);
                                });
                            </script>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="user_name"><i class="fa-solid fa-user"></i> User Name</label>
                            <input id="user_name" class="form-control" type="text" name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                            <input id="email" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                            <input id="password" class="form-control" type="password" name="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="number"><i class="fa-solid fa-phone"></i> Phone Number</label>
                            <input id="number" class="form-control" type="text" name="number" pattern="[01][0-9]{10}"
                                title="Start with 01" required>
                        </div>
                        <div class="form-group">
                            <label for="Fplace"><i class="fa-solid fa-map-marker-alt"></i> Favorite Place</label>
                            <select id="Fplace" class="form-control" name="Fplace" required>
                                <option value="" disabled selected>Select your favorite place</option>
                                <option value="Forest">Forest</option>
                                <option value="Picnic Spot">Picnic Spot</option>
                                <option value="Mountain">Mountain</option>
                                <option value="Sea Beach">Sea Beach</option>
                                <option value="Hill">Hill</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"><i class="fa-solid fa-map"></i> Address</label>
                            <input id="address" class="form-control" type="text" name="address">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Signup</button>
                        <div class="text-center mt-3">
                            <span>Have an account?</span> <a href="login.php"
                                class="btn btn-secondary btn-block">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT9T80J7KJyD7/h/2QPCF5rPjn7p6BT5kUy6c6tKtSOzZi2Zgk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-0ouA3TLRnTaoXhrYtR+4gk9y60U5Ym1hD5aYIFmJjUM0X5KnOJ9f4zs2wCJLBOa9"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("#box");
            form.style.opacity = 0;
            form.style.transform = "translateY(-20px)";
            setTimeout(() => {
                form.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                form.style.opacity = 1;
                form.style.transform = "translateY(0)";
            }, 100);
        });

        document.querySelector("form").addEventListener("submit", function (event) {
            const submitButton = event.target.querySelector("button[type='submit']");
            submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Signing Up...';
            submitButton.disabled = true;
        });
    </script>
</body>

</html>
<?php

include ('./footer.php');
?>