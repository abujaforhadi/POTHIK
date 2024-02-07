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
background-image: url(https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
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

#dateLabel,#name
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
  
      <span id="topBarTitle">Blog | New Post</span>

    </div>

    <div class="writing-section">

<form action="blog_post_process.php" method="POST" enctype="multipart/form-data">

  <input id="blogTitle" name="blogtitle" type="text" placeholder="Blog Title..." autocomplete="off"required>
  
  <br>
  
  Travel Date:<input id="blogDate" name="blogdate" type="date"required></input> <br>
 <br>
 <input id="blogTitle" name="duration" type="text" placeholder="Duration" autocomplete="off"required>
  
  <br>
  <input id="blogTitle" name="person" type="text" placeholder="Total Tourist" autocomplete="off"required>
  
  <br>
  <input id="blogTitle" name="cost" type="text" placeholder="Total cost" autocomplete="off"required>
  
  <br>
  
  <input type="file" name="uploadimage" required>
  
  <br><br>

  <textarea id="blogPara" name="blogpara" cols="75" rows="10" type="text" placeholder="Blog Paragraph..." autocomplete="off" required></textarea>

  <br><br>
  <button id="saveBtn" type="submit" required>Save Post</button>

</form>

<br>

<center><a style="text-decoration: none;" href="Blog.php" id="saveBtn">Go to Home Page</a></center>

</div>

    <script src="scripts/script.js"></script>

  </body>
  
</html>
<?php
// include footer.php file
include ('footer.php');
?>