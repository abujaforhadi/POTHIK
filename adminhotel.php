<?php
session_start();
include ("database/connection.php");
include ("_admin.php");
$conn = new mysqli('localhost', 'root', '', 'travel');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $availability_status = $_POST['availability_status'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $image_path = $_POST['image_path'];
    $price = $_POST['price'];

    $sql_insert = "INSERT INTO home (name, location, availability_status, description, rating, image_path, price)
                   VALUES ('$name', '$location', '$availability_status', '$description', '$rating', '$image_path', '$price')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Handle form submission for updating availability status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $home_id = $_POST['home_id'];
    $availability_status = $_POST['availability_status'];

    $sql_update = "UPDATE home SET availability_status='$availability_status' WHERE home_id=$home_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT home_id, name, location, availability_status, description, rating, image_path, price FROM home";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .forms {
            width: 30%;
            padding: 20px;
            background-color: #f7f7f7;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            width: 70%;
            padding: 20px;
        }

        h2, h3 {
            margin-top: 0;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            color: white;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }
    </style>
    <script>
        function deleteRow(row) {
            var table = document.getElementById("homeTable");
            table.deleteRow(row.parentNode.parentNode.rowIndex);
        }
    </script>
</head>

<body>

    <div class="container">
        <div class="forms">
            <h3>Insert New Home</h3>
            <form method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
                
                <label for="availability_status">Availability Status:</label>
                <select id="availability_status" name="availability_status" required>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                
                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" required>
                
                <label for="image_path">Image Path:</label>
                <input type="text" id="image_path" name="image_path" required>
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
                
                <input type="submit" name="insert" value="Insert">
            </form>

            <h3>Update Home Availability Status</h3>
            <form method="POST" action="">
                <label for="home_id">Home ID:</label>
                <input type="number" id="home_id" name="home_id" required>
                
                <label for="availability_status">Availability Status:</label>
                <select id="availability_status" name="availability_status" required>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
                
                <input type="submit" name="update" value="Update">
            </form>
        </div>

        <div class="table-container">
            <h2>Home Listings</h2>
            <table id="homeTable">
                <tr>
                    <th>Home ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Availability Status</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $description = $row["description"];
                        $description_words = explode(' ', $description);
                        if (count($description_words) > 10) {
                            $description = implode(' ', array_slice($description_words, 0, 10)) . '...';
                        }

                        echo "<tr>";
                        echo "<td>" . $row["home_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["location"] . "</td>";
                        echo "<td>" . $row["availability_status"] . "</td>";
                        echo "<td>" . $description . "</td>";
                        echo "<td>" . $row["rating"] . "</td>";
                        echo "<td><img src='" . $row["image_path"] . "' alt='Image' width='50'></td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td><button onclick='deleteRow(this)'>Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </table>
        </div>
    </div>

</body>

</html>
