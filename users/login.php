
<?php 

session_start();

	include("database/connection.php");
	include("database/functions.php");
    


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="https://p7.hiclipart.com/preview/583/301/232/flight-travel-agent-computer-icons-free-high-quality-travel-icon.jpg" type="image/x-icon">
    <title>Travel Guider</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Owl-carousel CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style1.css">

	<style type="text/css">
        body {
    min-height: 100vh;
    background: url('./assets/background.jpg') ;
    background-size: cover;
    background-position: center;
}
	
	</style>
	<header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">
                <marquee behavior="" direction="" style="color: Green;">Welcome to Travel Guider'</marquee>
            </p>
            <div class="font-rale font-size-14">
               
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <a class="navbar-brand" href="#">Travel Guider</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                        <a class="nav-link" href=""><i class="fa-solid fa-location-dot"></i> Tour Places</a></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-van-shuttle"></i>Transportation</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-blog"></i> Blog & Reviews</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house-medical-flag"></i> Medical</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-hotel"></i> Residence</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php"><i class="fa-solid fa-user-plus"></i> </a>
                    </li>
                    
                </ul>
                
            </div>
        </nav>
        <!-- !Primary Navigation -->

    </header>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: gray;">Login</div>

			<input id="text" type="text" name="user_name"placeholder="User name" required><br><br>
			<input id="text" type="password" name="password" placeholder="Password" requiredy><br><br>

			<div class="btn">
			  <a href="index.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input  type="submit" value="Login">
              </a>
            </div><br>
			<div style="font-size: 15px;text-align: center;color: gray;">Don't have an account? </div>

			<div class="btn">
			  <a href="signup.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input  type="button" value="Signup">
              </a>
            </div><br><br>
		</form>
	</div>
</body>
</html>