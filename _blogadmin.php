<?php
session_start();

include("database/connection.php");
include("_admin.php");

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
$filename = "NONE";

if(isset($_FILES['uploadimage']))
{
  $GLOBALS['filename'] = $_FILES['uploadimage']['name'];
  
  $tempname = $_FILES['uploadimage']['tmp_name'];
  
  move_uploaded_file($tempname, "./assets/blog/images/" . $GLOBALS['filename']);
}
if(isset($_POST["submit1"])){
    $sql = "INSERT INTO `blog_table`(`topic_title`, `topic_date`, `name`, `image_filename`, `topic_para`) VALUES('$_POST[blogtitle]','$_POST[blogdate]','$_POST[name]','$_POST[blogpara]', '" . $filename . "','$_POST[blogpara]')";
if($conn->query($sql)===true){
    echo"Successfully insart";
}
}

if(isset($_POST["submit2"])){
    $sql = "DELETE FROM blog_table WHERE topic_title='$_POST[blogtitle]'";
if($conn->query($sql)===true){
    echo"Successfully delete";
}
}

if(isset($_POST["submit3"])){
    $sql = "UPDATE blog_table SET  topic_title='$_POST[blogtitle]', topic_date='$_POST[blogdate]', name='$_POST[name]', image_filename='" . $filename . "', topic_para='$_POST[blogpara]' WHERE topic_title='$_POST[blogtitle]'";
if($conn->query($sql)===true){
    echo"Successfully update";
}
}
?>

<div id="box1">

  <form method="post">
    <div style="font-size: 20px;margin: 10px;color: white;">blog_table</div>
    Blog Title: <br>
    <input id="text" type="text" name="blogtitle" required><br>
    Date:  <br>
    <input id="text" type="date" name="blogdate" ><br>
    User Name<br>
    <input id="text" type="text" name="name" ><br>
    file<br>
    <input id="text" type="file" name="uploadimage" ><br>
    Blog Details<br>
    <input id="text" type="text" name="blogpara" ><br>

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
      <th>Place Name</th>
      <th>Visite date</th>
      <th>User Name</th>
      <th>file</th>
      <th>Blog Details</th>

    </tr>
<?php
    $conn = mysqli_connect("localhost", "root", "", "travel");


$sql = "SELECT * FROM blog_table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["topic_title"]. "</td><td>" . $row["topic_date"] . "</td><td>"
. $row["name"]."</td><td>". $row["image_filename"]. "</td><td>"
. $row["topic_para"].  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
  </table>
</div>