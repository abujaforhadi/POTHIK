<?php
ob_start();
include('header.php');
require('database/connection.php');
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
      height: 500px;
      transition: transform 0.3s, height 0.3s;
      overflow: hidden;
    }
    .post-container:hover {
      transform: translateY(-10px);
    }
    .post-container img {
      width: 100%;
      height: 200px; 
      object-fit: cover; 
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
      if ($con->connect_error)
        die("Connection Error" . $con->connect_error);

      $sql = "SELECT topic_title, topic_date, name, duration, person, cost, image_filename, topic_para FROM blog_table;";
      $stmt = $con->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $para_snippet = htmlspecialchars(implode(' ', array_slice(explode(' ', $row["topic_para"]), 0, 20)) . '...', ENT_QUOTES, 'UTF-8');

          echo "<div class='col'>";
          echo "<div class='post-container' id='post-container-" . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "'>";
          echo "<span id='displayTitle'>Place : " . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "</span>";
          echo "<div class='post-details'>";
          echo "<span id='displayDate'>Travel Date: " . htmlspecialchars($row["topic_date"], ENT_QUOTES, 'UTF-8') . "</span><br>";
          echo "<span id='name'>Posted by: " . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</span><br>";
          echo "<span id='duration'>Duration: " . htmlspecialchars($row["duration"], ENT_QUOTES, 'UTF-8') . " days</span><br>";
          echo "<span id='person'>Total Tourist: " . htmlspecialchars($row["person"], ENT_QUOTES, 'UTF-8') . " Person</span><br>";
          echo "<span id='cost'>Total Cost: " . htmlspecialchars($row["cost"], ENT_QUOTES, 'UTF-8') . " Tk</span>";
          echo "</div>";
          echo "<img src='./assets/blog/images/" . htmlspecialchars($row["image_filename"], ENT_QUOTES, 'UTF-8') . "' alt='Blog Image'>";
          echo "<div class='post-content' id='post-content-" . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "' onclick='seeMore(\"" . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "\")'>";
          echo "<p id='displayPara-" . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "'>" . $para_snippet . "<span class='see-more'> See More</span></p>";
          echo "<p id='fullPara-" . htmlspecialchars($row["topic_title"], ENT_QUOTES, 'UTF-8') . "' class='full-content'>" . htmlspecialchars($row["topic_para"], ENT_QUOTES, 'UTF-8') . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<center><span>No Blog Posts Found</span></center>";
      }

      $stmt->close();
      $con->close();
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
include('footer.php');
?>
