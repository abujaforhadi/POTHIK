<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'travel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("User is not logged in.");
}

// Retrieve user data (e.g., username)
$user_query = $conn->prepare("SELECT user_name FROM users WHERE user_id = ?");
$user_query->bind_param('i', $user_id);
$user_query->execute();
$user_result = $user_query->get_result();

if ($user_result->num_rows > 0) {
    $user_data = $user_result->fetch_assoc();
} else {
    die("User data not found.");
}
$user_query->close();

// Prepare the SQL statement for fetching products
$sql = "SELECT `tour_id`, `tour_Division`, `tour_name`, `tour_price`, `tour_image`
        FROM product 
        JOIN users ON product.Place_type = users.Fplace 
        WHERE users.user_id = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Failed to prepare the SQL statement: " . $conn->error);
}

$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$product_shuffle = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_shuffle[] = $row;
    }
} else {
    echo "No suggestions found.";
    exit;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .containerrr {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            
            
        }

        h4 {
            font-family: 'Rubik', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        hr {
            margin-bottom: 30px;
            border: 1px solid #ddd;
        }

        .product img {
            width: 100%;
            height: 375px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 200;
            justify-content: space-between;
        }

        .grid-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            width: calc(33% - 20px);
            box-sizing: border-box;
            background-color: #fff;
        }

        .grid-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .product {
            padding: 15px;
            text-align: center;
        }

        .product h6 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .rating {
            margin: 10px 0;
        }

        .price {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        .btn {
            background-color: #f8c146;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #e6a917;
        }

        @media (max-width: 768px) {
            .grid-item {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .grid-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<section id="suggested-places">
    <div class="containerrr">
        <h4 class="font-rubik font-size-20">Just For You, <strong class="text-capitalize"><?php echo htmlspecialchars($user_data['user_name']); ?></strong></h4>
        <hr>
        <div class="grid">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="grid-item border <?php echo htmlspecialchars($item['tour_Division']); ?>">
                    <div class="item">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?tour_id=%s', 'Place.php', htmlspecialchars($item['tour_id'])); ?>">
                                <img src="<?php echo htmlspecialchars($item['tour_image']) ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid">
                            </a>
                            <div class="text-center">
                                <h6><?php echo htmlspecialchars($item['tour_name']) ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo htmlspecialchars($item['tour_price']) ?? 0; ?> TK</span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="tour_id" value="<?php echo htmlspecialchars($item['tour_id']); ?>">
                                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
</body>
</html>
