<?php

session_start();

include ("database/connection.php");
include ("database/functions.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "wrong username or password!";
    } else {
        echo "wrong username or password!";
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
    <title>POTHIK - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <style type="text/css">
        body {
            
            background: url("./assets/img/2102379.webp");
            background-size: cover;
            background-position: center;
        }

        .form-container {
            animation: slide-in 0.5s ease;
            opacity: 0;
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
                <div id="box" class="form-container">
                    <form method="post">
                        <div style="font-size: 20px; padding-top: 100px; margin: 20px;">Login</div>
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="user_name"><i class="fa-solid fa-user"></i> User name</label>
                            <input id="user_name" class="form-control" type="text" name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span> <a href="signup.php"
                                class="btn btn-secondary btn-block">Signup</a>
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
            const form = document.querySelector(".form-container");
            form.style.opacity = 1;
        });
    </script>
</body>

</html>

<?php
include ('./footer.php');
?>
