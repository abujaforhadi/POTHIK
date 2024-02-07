<?php
session_start();

include("database/connection.php");
include("Template/_admin.php");

?>

<link rel="stylesheet" href="style.css">
<style>
 .t{
    text-align: center;
    color: cadetblue;
 }
</style>

<div class="t">
  <table border="1" cellspacing="0" cellpadding="15">
    <tr>
      <th>item_id</th>
      <th>item_brand</th>
      <th>item_name</th>
      <th>item_price</th>
      <th>item_image</th>
      <th>item_register</th>

    </tr>
<?php
    $conn = mysqli_connect("localhost", "root", "", "travel");


$sql = "SELECT item_id, item_brand, item_name, item_price, item_image, item_register FROM product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["item_id"]. "</td><td>" . $row["item_brand"] . "</td><td>"
. $row["item_name"]."</td><td>". $row["item_price"]. "</td><td>". $row["item_image"]."</td><td>"
. $row["item_register"].  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
  </table>
</div>