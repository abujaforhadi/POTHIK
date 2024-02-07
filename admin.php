
<?php 

session_start();

	include("database/connection.php");

	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "SELECT * FROM admin where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: adminhome.php");
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
<?php
include("_admin.php");

?>


<!DOCTYPE html>
<html>
<head>

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
	

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: gray;">Admin Login</div>

			<input id="text" type="text" name="user_name"placeholder="User name" required><br><br>
			<input id="text" type="password" name="password" placeholder="Password" requiredy><br><br>

			<div class="btn">
			  <a href="adminhome.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input  type="submit" value="Login">
              </a>
            </div><br><br>

		</form>
	</div>
</body>
</html>