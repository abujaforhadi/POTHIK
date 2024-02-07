<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>

<!DOCTYPE html>

<html lang="en">
  
  <head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 

    <style type="text/css">
        body
{
  margin: 0;
  background-image: url(https://upload.wikimedia.org/wikipedia/commons/9/92/Cox%27s_Bazar_sea_beach_01.jpg);
  word-wrap: break-word;
}

.top-bar
{
  background: #252525;

  color: #f5f5f5;

  margin: 0;

  text-align: center;

  padding: 10px;
}

#topBarTitle
{
  font-family: "Segoe UI", sans-serif;

  text-align: center;

  margin: 0;

  font-size: 30px;
}

#dateLabel
{
  font-family: "Segoe UI", sans-serif;

  font-weight: bold;
}

.writing-section
{
  margin: 10px;
}

form
{
  -webkit-tap-highlight-color: transparent;

  text-align: center;
}

#blogTitle
{
  font-family: "Roboto", sans-serif;

  outline: none;

  border: 1.5px solid lightgrey;
  
  color: #333;

  font-size: 20px;

  width: 37.5%;

  margin-bottom: 5px;

  border-radius: 5px;

  padding: 5px 5px;
}
#name
{
  font-family: "Roboto", sans-serif;

  outline: none;

  border: 1.5px solid lightgrey;
  
  color: #333;

  font-size: 12px;

  width: 37.5%;

  margin-bottom: 5px;

  border-radius: 5px;

  padding: 5px 5px;
}

#blogPara
{
  font-family: "Roboto", sans-serif;

  outline: none;

  border: 1.5px solid lightgrey;

  color: #333;

  resize: none;

  font-size: 20px;

  margin-top: 5px;

  border-radius: 5px;

  padding: 5px 5px;
}

#blogDate
{
  border: none;

  outline: none;

  font-size: 1em;
}

#saveBtn
{
  border: none;

  background: dodgerblue;

  color: #fff;

  font-size: 17.5px;

  padding: 5px 25px;

  border-radius: 5px;

  cursor: pointer;
}

.all-posts-container
{
/* 
  margin-left: auto;

  margin-right: auto; */

  font-family: "Roboto", sans-serif;

  display: flex;

  flex-direction: row;

  flex-wrap: wrap;

  align-items: center;

  justify-content: center;
}

.post-container
{
  background: #d3d3d3;

  margin: 5px;

  width: 25%;

  height: 500px;

  border-radius: 15px;
}

#displayTitle
{
  font-weight: bold;
}

#displayImage
{
  width: 50%;

  height: auto;
  
  border-radius: 15px;
}
    </style>
  </head>

  <body>

    <div class="top-bar">

      <span id="topBarTitle">Blog | All Posts</span>

    </div>

    <br>

    <div class="all-posts-container">

      <?php

      $servername = "localhost";

      $username = "root";

      $password = "";

      $database = "travel";

      $conn = new mysqli($servername, $username, $password, $database);

      if($conn->connect_error) die("Connection Error" . $conn->connect_error);

      $sql = "select topic_title, topic_date,name,duration,person,cost, image_filename, topic_para from blog_table;";

      $result = $conn->query($sql);

      if($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          echo "<div style='padding: 25px 25px;' class='post-container'>";

          echo "<span id='displayTitle'>Place name:" . $row["topic_title"] . "</span><br>";

          echo "<span id='displayDate'>Travel Date:" . $row["topic_date"] . "</span><br>";
         
          echo "<span id='name'>Posted by: " . $row["name"] . "</span><br>";
          echo "<span id='name'>Duration:" . $row["duration"] . " days</span><br>";
          echo "<span id='name'>Total Tourist:" . $row["person"] . " Person</span><br>";
          echo "<span id='name'>Total Cost:" . $row["cost"] . " Tk</span><br>";

          echo "<img style='width: 100%; height: auto' id='displayImage' src='./assets/blog/images/" . $row["image_filename"] . "'><br>"; 

          echo "<p style='overflow: hidden; display: -webkit-box; -webkit-line-clamp: 10; line-clamp: 10; -webkit-box-orient: vertical;' id='displayPara'>" . $row["topic_para"] . "</p><br>";
          
          echo "</div>";
        }
      }
      
      else
      {
        echo "<center><span>No Blog Posts Found</span></center>";
      
        // echo "<center><a style='color: dodgerblue;' href='index.html'>Write a New Post</a></center>";
      }

      $conn->close();
      
      ?>

    </div>

    <?php echo "<br><center><a style='color: dodgerblue; text-decoration: none; background: dodgerblue; padding: 5px 25px; color: #fff; border-radius: 50px;' href='cBlog.php'>Write a New Post</a></center><br>"; ?>

  </body>
  
</html>
<?php
// include footer.php file
include ('footer.php');
?>