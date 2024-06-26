<?php
include ("database/connection.php");

$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic_title = $_POST['topic_title'];

    $sql = "DELETE FROM blog_table WHERE topic_title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $topic_title);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}

$conn->close();
?>
