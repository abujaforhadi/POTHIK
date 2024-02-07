<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>
<?php




$blogTitle = $_POST["blogtitle"];

$blogDate = $_POST["blogdate"];

$blogPara = $_POST["blogpara"];




$filename = "NONE";

if(isset($_FILES['uploadimage']))
{
  $GLOBALS['filename'] = $_FILES['uploadimage']['name'];
  
  $tempname = $_FILES['uploadimage']['tmp_name'];
  
  move_uploaded_file($tempname, "./assets/blog/images/" . $GLOBALS['filename']);
}

$sql = "INSERT INTO blog_table (topic_title, topic_date, image_filename,topic_para) values ('" . $blogTitle . "', '$blogDate', '" . $filename . "', '" . $blogPara . "');";



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

#blogDate,#name{
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

    <div class="container" style="width: 50%; margin: auto; text-align: justify; font-family: Roboto, sans-serif;">

      <h1 style="margin-bottom: 10px; text-align: center;">Post Saved</h1>

      <center><a style="color: dodgerblue;" href="blog.php">Go to Home Page</a></center>
      
      <br><br>

      <?php echo "<span style='font-weight: bold;' id='showTitle'>" . $blogTitle . "</span>" ?>
      <br>

      <span id="showDate"><?php echo $blogDate ?></span><br><br>

      <center><img src="./assets/blog/images/<?php echo $filename; ?>" id="showImage" style="width: 50%; height: auto;"></center>

      <br>

      <?php echo "<span id='showPara'>" . $blogPara . "</span>" ?>

      <br><br>
      
    </div>

  </body>
  
</html>

<?php
// include footer.php file
include ('footer.php');
?>