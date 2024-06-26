<?php

session_start();
include ("database/connection.php");
include ("_admin.php");

$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `user_name`, `email`, `number`, `Fplace`, `address` FROM `users`;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <style>
        h2{
            text-align: center;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
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
        function deleteUser(button, userName) {
            var row = button.parentNode.parentNode;
            var userName = row.cells[0].innerText;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "success") {
                        var table = document.getElementById("userTable");
                        table.deleteRow(row.rowIndex);
                    } else {
                        alert("Failed to delete the row.");
                    }
                }
            };
            xhr.send("user_name=" + encodeURIComponent(userName));
        }
    </script>
</head>

<body>

<h2>Users Table</h2>

<table id="userTable">
    <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Fplace</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["number"] . "</td>";
            echo "<td>" . $row["Fplace"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td><button onclick='deleteUser(this, \"" . $row["user_name"] . "\")'>Block</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>

</html>
