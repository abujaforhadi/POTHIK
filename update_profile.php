<?php
include('header.php');
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("User is not logged in.");
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$Fplace = $_POST['Fplace'];
$address = $_POST['address'];

$stmt = $con->prepare("UPDATE `users` SET `user_name`=?, `email`=?, `number`=?, `Fplace`=?, `address`=? WHERE `user_id`=?");
$stmt->bind_param("sssssi", $name, $email, $phone, $Fplace, $address, $user_id);

if ($stmt->execute()) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=index.php">
    <title>Profile Update</title>
</head>
<body>
    <script>
        setTimeout(function() {
            window.location.href = 'profile.php';
        }, 1000); // Redirect after 2 seconds
    </script>
</body>
</html>
