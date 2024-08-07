<?php
session_start();
include ("database/connection.php");
include ("_admin.php");

// database/connection.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to execute a query and return the count
function getCount($conn, $sql)
{
  $result = $conn->query($sql);
  if ($result) {
    $row = $result->fetch_assoc();
    return $row['total'];
  } else {
    return 0;
  }
}

// SQL queries to count rows for each category
$sqlPlaces = "SELECT COUNT(*) AS total FROM place";
$sqlTransportation = "SELECT COUNT(*) AS total FROM bus_details";
$sqlBlogs = "SELECT COUNT(*) AS total FROM blog_table";
$sqlResidence = "SELECT COUNT(*) AS total FROM hotel";
$sqlUsers = "SELECT COUNT(*) AS total FROM users";

// Execute the queries and store the counts
$totalPlaces = getCount($conn, $sqlPlaces);
$totalTransportation = getCount($conn, $sqlTransportation);
$totalBlogs = getCount($conn, $sqlBlogs);
$totalResidence = getCount($conn, $sqlResidence);
$totalUsers = getCount($conn, $sqlUsers);

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    .navs {
      background-color: #333;
      color: #fff;
      padding: 1rem 2rem;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
    }

    .navs h1 {
      margin: 0;
      font-size: 2rem;
      letter-spacing: 1.5px;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      padding: 4rem 1rem 3rem;
      gap: 2rem;
    }

    .card {
      background-color: #fff;
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      width: 260px;
      text-align: center;
      padding: 2rem 1rem;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .card h2 {
      margin: 0;
      font-size: 1.7rem;
      color: #333;
      transition: color 0.3s;
    }

    .card a {
      text-decoration: none;
      display: block;
      margin-top: 1.5rem;
      font-weight: bold;
      font-size: 1.1rem;
      transition: color 0.3s;
    }

    .card a:hover {
      color: #9eb3be;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -50%;
      width: 100%;
      height: 100%;
      background: #a0beda;
      z-index: 0;
      transform: skewX(-30deg);
      transition: transform 0.5s;
    }

    .card:hover::before {
      transform: skewX(-30deg) translateX(200%);
    }

    .card-content {
      position: relative;
      z-index: 1;
    }

    #chartContainer {
      width: 20%;
      margin: 0 auto;
      padding: 2rem 0;
    }

    canvas {
      display: block;
      width: 100%;
      height: 300px;
    }
  </style>
</head>

<body>
  <div class="text-center">
    <h1>Admin Dashboard</h1>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-content">
        <h2>Tour Places</h2>
        <p>Total Places: <?php echo $totalPlaces; ?></p>
        <a href="adminPlace.php">Manage Places</a>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <h2>Transportation</h2>
        <p>Total Buses: <?php echo $totalTransportation; ?></p>
        <a href="adminBus.php">Manage Transportation</a>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <h2>Blog & Reviews</h2>
        <p>Total Blogs: <?php echo $totalBlogs; ?></p>
        <a href="adminBlog.php">Manage Blogs</a>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <h2>Residence</h2>
        <p>Total Residences: <?php echo $totalResidence; ?></p>
        <a href="adminHotel.php">Manage Residence</a>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <h2>User</h2>
        <p>Total Users: <?php echo $totalUsers; ?></p>
        <a href="userAdmin.php">Manage Users</a>
      </div>
    </div>
  </div>

  <div id="chartContainer">
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Tour Places', 'Transportation', 'Blog & Reviews', 'Residence', 'User'],
        datasets: [{
          label: 'Total Count',
          data: [<?php echo $totalPlaces; ?>, <?php echo $totalTransportation; ?>, <?php echo $totalBlogs; ?>, <?php echo $totalResidence; ?>, <?php echo $totalUsers; ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw;
              }
            }
          }
        }
      }
    });
  </script>
</body>

</html>
