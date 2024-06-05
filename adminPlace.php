<?php
session_start();
include ("database/connection.php");
include ("_admin.php");

$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tour_id = $conn->real_escape_string($_POST["tour_id"]);
  $tour_Division = $conn->real_escape_string($_POST["tour_Division"]);
  $tour_name = $conn->real_escape_string($_POST["tour_name"]);
  $Place_type = $conn->real_escape_string($_POST["Place_type"]);
  $tour_price = $conn->real_escape_string($_POST["tour_price"]);
  $tour_image = $conn->real_escape_string($_POST["tour_image"]);
  $tour_register = $conn->real_escape_string($_POST["tour_register"]);

  if (isset($_POST["submit1"])) {
    $stmt = $conn->prepare("INSERT INTO product (tour_id, tour_Division, tour_name, Place_type, tour_price, tour_image, tour_register) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $tour_id, $tour_Division, $tour_name, $Place_type, $tour_price, $tour_image, $tour_register);
    $stmt->execute();
    $stmt->close();
    echo "Successfully inserted";
  }

  if (isset($_POST["submit2"])) {
    $stmt = $conn->prepare("DELETE FROM product WHERE tour_id = ?");
    $stmt->bind_param("s", $tour_id);
    $stmt->execute();
    $stmt->close();
    echo "Successfully deleted";
  }

  if (isset($_POST["submit3"])) {
    $stmt = $conn->prepare("UPDATE product SET tour_Division = ?, tour_name = ?, Place_type = ?, tour_price = ?, tour_image = ?, tour_register = ? WHERE tour_id = ?");
    $stmt->bind_param("sssisds", $tour_Division, $tour_name, $Place_type, $tour_price, $tour_image, $tour_register, $tour_id);
    $stmt->execute();
    $stmt->close();
    echo "Successfully updated";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 20px;
    }

    #box1 {
      background-color: #333;
      color: #fff;
      padding: 20px;
      width: 300px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form div {
      margin-bottom: 15px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 8px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #5cb85c;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #4cae4c;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #333;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <div id="box1">
      <form method="post">
        <div style="font-size: 20px; margin: 10px; color: white;">Place Info</div>
        <div>
          <label for="tour_id">Place ID</label>
          <input id="text" type="text" name="tour_id" required>
        </div>
        <div>
          <label for="tour_Division">Divisions</label>
          <input id="text" type="text" name="tour_Division">
        </div>
        <div>
          <label for="tour_name">Place Name</label>
          <input id="text" type="text" name="tour_name">
        </div>
        <div>
          <label for="Place_type">Place Type</label>
          <input id="text" type="text" name="Place_type">
        </div>
        <div>
          <label for="tour_price">Price</label>
          <input id="text" type="number" name="tour_price">
        </div>
        <div>
          <label for="tour_image">Image</label>
          <input id="text" type="text" name="tour_image">
        </div>
        <div>
          <label for="tour_register">Event Date</label>
          <input id="text" type="date" name="tour_register">
        </div>
        <div class="btn">
          <input type="submit" value="Insert" name="submit1">
        </div>
        <div class="btn">
          <input type="submit" value="Delete" name="submit2">
        </div>
        <div class="btn">
          <input type="submit" value="Update" name="submit3">
        </div>
      </form>
    </div>

    <div>
      <table>
        <tr>
          <th>Place_id</th>
          <th>Divisions</th>
          <th>Place_name</th>
          <th>Place_type</th>
          <th>Price</th>
          <th>Image</th>
          <th>Event Date</th>
        </tr>
        <?php
        $sql = "SELECT `tour_id`, `tour_Division`, `tour_name`, `Place_type`, `tour_price`, `tour_image`, `tour_register` FROM `product`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                              <td>{$row['tour_id']}</td>
                              <td>{$row['tour_Division']}</td>
                              <td>{$row['tour_name']}</td>
                              <td>{$row['Place_type']}</td>
                              <td>{$row['tour_price']}</td>
                              <td><img src='" . $row["tour_image"] . "' alt='Image' width='50'></td>
                              
                              <td>{$row['tour_register']}</td>
                            </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No results found</td></tr>";
        }

        $conn->close();
        ?>
      </table>
    </div>
  </div>
</body>

</html>
