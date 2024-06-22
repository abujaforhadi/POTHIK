<?php
session_start();
include ("database/connection.php");
include ("_admin.php");

$conn = new mysqli('localhost', 'root', '', 'travel');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions for insert, update, delete
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bus_id = $_POST['bus_id'] ?? null;
    $bus_name = $_POST['bus_name'] ?? null;
    $source = $_POST['source'] ?? null;
    $destination = $_POST['destination'] ?? null;
    $fare = $_POST['fare'] ?? null;
    $seats_available = $_POST['seats_available'] ?? null;

    if (isset($_POST['insert'])) {
        $sql = "INSERT INTO bus_details (bus_name, source, destination, fare, seats_available, Bus_id) VALUES ('$bus_name', '$source', '$destination', '$fare', '$seats_available', '$bus_id')";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update']) && $bus_id) {
        $sql = "UPDATE bus_details SET bus_name='$bus_name', source='$source', destination='$destination', fare='$fare', seats_available='$seats_available' WHERE Bus_id='$bus_id'";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete']) && $bus_id) {
        $sql = "DELETE FROM bus_details WHERE Bus_id='$bus_id'";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch data from the bus_details table
$sql = "SELECT `bus_name`, `source`, `destination`, `fare`, `seats_available`, `Bus_id` FROM `bus_details`";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bus Admin</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h2 {
            color: #333;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .form-container {
            flex: 1;
            max-width: 300px;
            margin-right: 20px;
        }

        .table-container {
            flex: 2;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>
        <center>Bus Admin Page</center>
    </h1>

    <div class="container">
        <div class="form-container">
            <h2><?= isset($_POST['edit']) ? 'Edit Bus' : 'Insert New Bus' ?></h2>
            <form method="post" action="">
                <input type="hidden" name="<?= isset($_POST['edit']) ? 'update' : 'insert' ?>" value="1">
                <?php if (isset($_POST['edit'])): ?>
                    <input type="hidden" name="bus_id" value="<?= $_POST['bus_id'] ?>">
                <?php endif; ?>
                Bus ID: <input type="text" name="bus_id" value="<?= $_POST['bus_id'] ?? '' ?>" required><br>
                Bus Name: <input type="text" name="bus_name" value="<?= $_POST['bus_name'] ?? '' ?>" required><br>
                Source: <input type="text" name="source" value="<?= $_POST['source'] ?? '' ?>" required><br>
                Destination: <input type="text" name="destination" value="<?= $_POST['destination'] ?? '' ?>" required><br>
                Fare: <input type="number" name="fare" value="<?= $_POST['fare'] ?? '' ?>" required><br>
                Seats Available: <input type="number" name="seats_available" value="<?= $_POST['seats_available'] ?? '' ?>" required><br>
                <input type="submit" value="<?= isset($_POST['edit']) ? 'Update' : 'Insert' ?>">
            </form>
        </div>

        <div class="table-container">
            <h2>
                <center>Bus Details</center>
            </h2>
            <table>
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Name</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Fare</th>
                    <th>Seats Available</th>
                    <th>Actions</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["Bus_id"] ?></td>
                            <td><?= $row["bus_name"] ?></td>
                            <td><?= $row["source"] ?></td>
                            <td><?= $row["destination"] ?></td>
                            <td><?= $row["fare"] ?></td>
                            <td><?= $row["seats_available"] ?></td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="bus_id" value="<?= $row["Bus_id"] ?>">
                                    <input type="hidden" name="bus_name" value="<?= $row["bus_name"] ?>">
                                    <input type="hidden" name="source" value="<?= $row["source"] ?>">
                                    <input type="hidden" name="destination" value="<?= $row["destination"] ?>">
                                    <input type="hidden" name="fare" value="<?= $row["fare"] ?>">
                                    <input type="hidden" name="seats_available" value="<?= $row["seats_available"] ?>">
                                    <input type="submit" name="edit" value="Edit">
                                    <input type="submit" name="delete" value="Delete" class="bg-danger">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No results found</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>

</html>
