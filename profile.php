<?php
include('header.php');
// Assuming you have a connection to your MySQL database
$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("User is not logged in.");
}

$stmt = $conn->prepare("SELECT `user_id`, `user_name`, `email`, `number`, `Fplace`, `address` FROM `users` WHERE `user_id`=?");


$blog_stmt = $conn->prepare("SELECT COUNT(`topic_title`) as blog_count FROM `blog_table` WHERE `name`=?");
$blog_stmt->bind_param("s", $user_data['user_name']);
$blog_stmt->execute();
$blog_result = $blog_stmt->get_result();
$blog_data = $blog_result->fetch_assoc();
$blog_post_count = $blog_data['blog_count'];

// Count the hotel bookings for the user
$reservation_stmt = $conn->prepare("SELECT COUNT(`reservation_id`) as booking_count FROM `reservations` WHERE `user_id`=?");
$reservation_stmt->bind_param("i", $user_id);
$reservation_stmt->execute();
$reservation_result = $reservation_stmt->get_result();
$reservation_data = $reservation_result->fetch_assoc();
$hotel_booking_count = $reservation_data['booking_count'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f7fa;
        }
        .profile-header {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #004F73, #00A5C4);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-right: 20px;
            border: 4px solid #fff;
        }
        .profile-details {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        
        .btn-primary:hover {
            background-color: #3a00c0;
            border-color: #3a00c0;
        }
        .total-activity {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #343a40;
        }
        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 1.5rem;
        }
        .about-section {
            margin-top: 20px;
        }
        .about-section h3 {
            font-weight: bold;
            color: #4a00e0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="profile-header">
            <img src="https://imgv3.fotor.com/images/blog-richtext-image/10-profile-picture-ideas-to-make-you-stand-out.jpg" alt="Profile Picture" class="profile-pic">
            <div class="profile-details">
                <div>
                    <h2 class="text-capitalize"><?php echo $user_data['user_name']; ?></h2>
                    <p><?php echo $user_data['email']; ?></p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="text-left">
                    <p>Total Activity:</p>
                    <p>Blog Posts: <?php echo $blog_post_count; ?></p>
                    <p>Hotel Bookings: <?php echo $hotel_booking_count; ?></p>
                </div>
            </div>
        </div>
        <div class="form-container">
            <h3>Edit Profile</h3>
            <form action="update_profile.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php echo $user_data['user_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control form-control-sm" id="phone" name="phone" value="<?php echo $user_data['number']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Fplace">Favorite Place:</label>
                            <select id="Fplace" class="form-control form-control-sm" name="Fplace" required>
                                <option value="" disabled>Select favorite place</option>
                                <option value="Forest" <?php if($user_data['Fplace'] == 'Forest') echo 'selected'; ?>>Forest</option>
                                <option value="PicnicSpot" <?php if($user_data['Fplace'] == 'PicnicSpot') echo 'selected'; ?>>Picnic Spot</option>
                                <option value="Mountain" <?php if($user_data['Fplace'] == 'Mountain') echo 'selected'; ?>>Mountain</option>
                                <option value="SeaBeach" <?php if($user_data['Fplace'] == 'SeaBeach') echo 'selected'; ?>>Sea Beach</option>
                                <option value="Lake" <?php if($user_data['Fplace'] == 'Lake') echo 'selected'; ?>>Lake</option>
                                <option value="Hill" <?php if($user_data['Fplace'] == 'Hill') echo 'selected'; ?>>Hill</option>
                                <option value="Historical" <?php if($user_data['Fplace'] == 'Historical') echo 'selected'; ?>>Historical Place</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control form-control-sm" id="address" name="address" rows="3" required><?php echo $user_data['address']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include('footer.php');  
?>
