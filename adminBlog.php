<?php

session_start();
include ("database/connection.php");
include ("_admin.php");

$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT topic_title, topic_date, name, duration, person, cost, image_filename, topic_para FROM blog_table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        button {
            padding: 5px 10px;
            color: white;
            background-color: red;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }
    </style>
    <script>
        function deleteRow(row) {
            var table = document.getElementById("blogTable");
            table.deleteRow(row.parentNode.parentNode.rowIndex);
        }
    </script>
</head>

<body>

    <h2>Blog Table</h2>

    <table id="blogTable">
        <tr>
            <th>Topic Title</th>
            <th>Topic Date</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Person</th>
            <th>Cost</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["topic_title"] . "</td>";
                echo "<td>" . $row["topic_date"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["duration"] . "</td>";
                echo "<td>" . $row["person"] . "</td>";
                echo "<td>" . $row["cost"] . "</td>";
                echo "<td><img src='./assets/blog/images/" . $row["image_filename"] . "' alt='Image' width='50'></td>";
                echo "<td>" . $row["topic_para"] . "</td>";
                echo "<td><button onclick='deleteRow(this)'>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>

</html>