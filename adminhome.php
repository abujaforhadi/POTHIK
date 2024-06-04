<?php
session_start();

include("database/connection.php");
include("Template/_admin.php");

?>

<link rel="stylesheet" href="style.css">
<style>
  #box1 {
    font-size: large;

    background-color: gray;
    color: white;
    margin: auto;
    width: 300px;
    padding: 20px;
    float: left;
  }
</style>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'travel');

if(isset($_POST["submit1"])){
    $sql = "INSERT INTO product(tour_id, tour_Division, tour_name,Place_type, tour_price, tour_image, tour_register)
VALUES('$_POST[tour_id]','$_POST[tour_Division]','$_POST[tour_name]','$_POST[Place_type]','$_POST[tour_price]','$_POST[tour_image]','$_POST[tour_register]')";
if($conn->query($sql)===true){
    echo"Successfully insart";
}
}

if(isset($_POST["submit2"])){
    $sql = "DELETE FROM product WHERE tour_id='$_POST[tour_id]'";
if($conn->query($sql)===true){
    echo"Successfully delete";
}
}

if(isset($_POST["submit3"])){
    $sql = "UPDATE product SET  tour_Division='$_POST[tour_Division]', tour_name='$_POST[tour_name]', tour_price='$_POST[tour_price]', tour_image='$_POST[tour_image]', tour_register='$_POST[tour_register]' WHERE id= '$_POST[tour_id]'";
if($conn->query($sql)===true){
    echo"Successfully update";
}
}
?>

<div id="box1">

  <form method="post">
    <div style="font-size: 20px;margin: 10px;color: white;">Product</div>
    Place ID <br>
    <input id="text" type="text" name="tour_id" required><br>
    Divisions <br>
    <input id="text" type="text" name="tour_Division" ><br>
    Place Name<br>
    <input id="text" type="text" name="tour_name" ><br>
    Place Type<br>
    <input id="text" type="text" name="Place_type" ><br>
    Price<br>
    
    <input id="text" type="number" name="tour_price" ><br>
    Image<br>
    <input id="text" type="text" name="tour_image" ><br>

    Event Date <br>
    <input id="text" type="date" name="tour_register" value="" ><br>
    <div class="btn">
      <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="insert" name="submit1">
      </a>
    </div>

    <div class="btn">
      <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Delete" name="submit2">
      </a>
    </div>
    <div class="btn">
      <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Update" name="submit3">
      </a>
    </div>
  </form>
</div>

<div>
  <table border="1" cellspacing="1" cellpadding="10">
    <tr>
      <th>Place_id</th>
      <th>Divisions</th>
      <th>Place_name</th>
      <th>Place_type</th>
      <th>Price</th>
      <th>image</th>
      <th>event Date</th>

    </tr>
<?php
    $conn = mysqli_connect("localhost", "root", "", "travel");


$sql = "SELECT `tour_id`, `tour_Division`, `tour_name`, `Place_type`, `tour_price`, `tour_image`, `tour_register` FROM `product` ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["tour_id"]. "</td><td>" . $row["tour_Division"] . "</td><td>"
. $row["tour_name"]."</td><td>". $row["Place_type"]. "</td><td>".  $row["tour_price"]. "</td><td>". $row["tour_image"]."</td><td>"
. $row["tour_register"].  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
  </table>
</div>