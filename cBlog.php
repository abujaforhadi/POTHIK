<?php
include('header.php');


$conn = new mysqli('localhost', 'root', '', 'travel');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT `user_name` FROM `users` WHERE `user_id` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $user_id); 
        $stmt->execute();
        $stmt->bind_result($user_name);
        $stmt->fetch();

        $name = $user_name;

        $stmt->close();
    } else {
       
        $error = $conn->error;
    }

} else {
    
    die("User is not logged in.");
}

// Check if form data has been posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data 
    $blogtitle = htmlspecialchars($_POST['blogtitle']);
    $blogdate = htmlspecialchars($_POST['blogdate']);
    $duration = htmlspecialchars($_POST['duration']);
    $person = htmlspecialchars($_POST['person']);
    $cost = htmlspecialchars($_POST['cost']);
    $blogpara = htmlspecialchars($_POST['blogpara']);

    // Handle file upload
    $upload_dir = 'assets/blog/';
    $upload_file = $upload_dir . basename($_FILES['uploadimage']['name']);

    if (move_uploaded_file($_FILES['uploadimage']['tmp_name'], $upload_file)) {
        $image_filename = basename($_FILES['uploadimage']['name']);
    } else {
        $image_filename = null;
    }

    // Prepare and bind insert statement for blog post
    $insert_stmt = $conn->prepare("INSERT INTO blog_table (topic_title, topic_date, name, duration, person, cost, image_filename, topic_para) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($insert_stmt) {
        $insert_stmt->bind_param("ssssssss", $blogtitle, $blogdate, $name, $duration, $person, $cost, $image_filename, $blogpara);

        // Execute the statement
        if ($insert_stmt->execute()) {
            $success = true;
        } else {
            $error = $insert_stmt->error;
        }

        // Close insert statement
        $insert_stmt->close();
    } else {
        // Handle insert statement preparation error
        $error = $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Traveler's Diary</title>
    <style type="text/css">
        body {
            margin: 0;
            background-color: #f0f0f0;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .top-bar {
            background: #6c8ba3;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 2px -2px gray;
        }

        #topBarTitle {
            font-family: 'Segoe UI', sans-serif;
            font-size: 2.5rem;
            margin: 0;
            color: white;
        }

        .writing-section {
            background: #f9f9f9;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-field {
            width: 100%;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
            background: #fff;
            color: #333;
        }

        .input-field#blogPara {
            resize: none;
            height: 200px;
        }

        #saveBtn {
            background: #FFD700;
            color: #333;
            border: none;
            padding: 10px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s, transform 0.3s;
        }

        #saveBtn:hover {
            background: #ffcc00;
            transform: scale(1.05);
        }

        .write-post a {
            color: #fff;
            background: #007bff;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .write-post a:hover {
            background: #0056b3;
        }

        .toast {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        .toast.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <span id="topBarTitle">Create Traveler's Diary</span>
    </div>

    <div class="writing-section">
        <form action="" method="POST" enctype="multipart/form-data">
            <input id="blogTitle" class="input-field" name="blogtitle" type="text" placeholder="Blog Title..." autocomplete="off" required>
            <input id="blogDate" class="input-field" name="blogdate" type="date" required>
            <input class="input-field" name="duration" type="text" placeholder="Duration" autocomplete="off" required>
            <input class="input-field" name="person" type="text" placeholder="Total Tourist" autocomplete="off" required>
            <input class="input-field" name="cost" type="text" placeholder="Total cost" autocomplete="off" required>
            <input type="file" name="uploadimage" required>
            <textarea id="blogPara" class="input-field" name="blogpara" placeholder="Blog Paragraph..." autocomplete="off" required></textarea>
            <button id="saveBtn" type="submit">Save Post</button>
        </form>
    </div>

    <?php if (isset($success) && $success): ?>
    <div class="toast">New record created successfully!</div>
    <script>
        // Show toast
        document.querySelector('.toast').style.visibility = 'visible';
        // Redirect after 2 seconds (optional)
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 2000);
    </script>
    <?php elseif (isset($error)): ?>
    <div class="toast">Error: <?= $error ?></div>
    <script>
        // Show toast
        document.querySelector('.toast').style.visibility = 'visible';
    </script>
    <?php endif; ?>

    <!-- Your JavaScript files and scripts -->
    <script src="scripts/script.js"></script>

</body>
</html>

