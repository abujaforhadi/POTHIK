<?php
ob_start();

include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    body {
      margin: 0;
      background-color: #f0f0f0;
      color: #333;
      font-family: Arial, sans-serif;
    }

    .top-bar {
      background: #6c8ba3;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      box-shadow: 0 4px 2px -2px gray;
    }

    #topBarTitle {
      font-size: 2rem;
      margin: 0;
      font-weight: bold;
      font-family: 'Georgia', serif;
      font-style: italic;
      color: #fff;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px 0;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: -10px;
    }

    .col {
      flex: 1 1 calc(33.333% - 20px);
      margin: 10px;
      box-sizing: border-box;
    }

    .post-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      width: 100%;
      max-width: 350px;
      height: 500px; /* Fixed height for consistency */
      transition: transform 0.3s, height 0.3s;
      overflow: hidden;
    }

    .post-container:hover {
      transform: translateY(-10px);
    }

    .post-container img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    #displayTitle {
      font-weight: bold;
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #007bff;
      text-align: center;
    }

    .post-details {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 15px;
      text-align: center;
    }

    .post-content {
      position: relative;
      overflow: hidden;
    }

    .full-content {
      display: none;
    }

    .write-post {
      text-align: center;
      margin: 20px 0;
    }

    .write-post a {
      color: #fff;
      background: #007bff;
      padding: 10px 25px;
      text-decoration: none;
      border-radius: 50px;
      transition: background 0.3s;
    }

    .write-post a:hover {
      background: #0056b3;
    }

    @media (max-width: 768px) {
      .col {
        flex: 1 1 calc(50% - 20px);
      }
    }

    @media (max-width: 480px) {
      .col {
        flex: 1 1 100%;
      }
    }
  </style>
</head>

<body>
  <div class="top-bar">
    <span id="topBarTitle"> Traveler's Diary </span>
  </div>

  <div class="container">
    <div class="row">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "travel";

      $conn = new mysqli($servername, $username, $password, $database);

      if ($conn->connect_error)
        die("Connection Error" . $conn->connect_error);

      $sql = "SELECT topic_title, topic_date, name, duration, person, cost, image_filename, topic_para FROM blog_table;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $para_snippet = implode(' ', array_slice(explode(' ', $row["topic_para"]), 0, 20)) . '...';

          echo "<div class='col'>";
          echo "<div class='post-container' id='post-container-" . $row["topic_title"] . "'>";
          echo "<span id='displayTitle'>Place : " . $row["topic_title"] . "</span>";
          echo "<div class='post-details'>";
          echo "<span id='displayDate'>Travel Date: " . $row["topic_date"] . "</span><br>";
          echo "<span id='name'>Posted by: " . $row["name"] . "</span><br>";
          echo "<span id='duration'>Duration: " . $row["duration"] . " days</span><br>";
          echo "<span id='person'>Total Tourist: " . $row["person"] . " Person</span><br>";
          echo "<span id='cost'>Total Cost: " . $row["cost"] . " Tk</span>";
          echo "</div>";
          echo "<img src='./assets/blog/images/" . $row["image_filename"] . "'>";
          echo "<div class='post-content' id='post-content-" . $row["topic_title"] . "' onclick='seeMore(\"" . $row["topic_title"] . "\")'>";
          echo "<p id='displayPara-" . $row["topic_title"] . "'>" . $para_snippet . "<span class='see-more'> See More</span></p>";
          echo "<p id='fullPara-" . $row["topic_title"] . "' class='full-content'>" . $row["topic_para"] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<center><span>No Blog Posts Found</span></center>";
      }

      $conn->close();
      ?>
    </div>
  </div>

  <div class="write-post">
    <a href='cBlog.php'>Write a New Post</a>
  </div>

  <script>
    function seeMore(title) {
      var postContainer = document.getElementById('post-container-' + title);
      var snippet = document.getElementById('displayPara-' + title);
      var fullContent = document.getElementById('fullPara-' + title);
      var seeMoreText = snippet.querySelector('.see-more');
      if (fullContent.style.display === 'none' || fullContent.style.display === '') {
        snippet.style.display = 'none';
        fullContent.style.display = 'block';
        postContainer.style.height = 'auto';
      } else {
        snippet.style.display = 'block';
        fullContent.style.display = 'none';
        postContainer.style.height = '500px';
        seeMoreText.style.display = 'inline';
      }
    }
  </script>
</body>

</html>
<?php

include ('footer.php');
?>
