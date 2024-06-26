<?php
$brand = array_map(function ($pro) {
    return $pro['tour_Division'];
}, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
function generateStarRating($rating) {
    $fullStar = '<span><i class="fas fa-star"></i></span>';
    $halfStar = '<span><i class="fas fa-star-half-alt"></i></span>';
    $emptyStar = '<span><i class="far fa-star"></i></span>';

    $stars = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($rating >= 1) {
            $stars .= $fullStar;
            $rating--;
        } elseif ($rating >= 0.5) {
            $stars .= $halfStar;
            $rating -= 0.5;
        } else {
            $stars .= $emptyStar;
        }
    }

    return $stars;
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['tour_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));
?>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .product img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .grid-item {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        width: calc(33.333% - 20px);
        /* Three columns with spacing */
        box-sizing: border-box;
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
        font-size: 16px;
        margin: 10px 0;
    }

    .rating {
        margin: 10px 0;
    }

    .price {
        font-size: 18px;
        color: #555;
    }

    .btn {
        background-color: #f8c146;
        color: #fff;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn:hover {
        background-color: #e6a917;
    }

    .button-group {
        margin-bottom: 20px;
    }

    .button-group .btn {
        margin: 0 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .button-group .btn.is-checked {
        background-color: white;
        /* Change the background color for the active button */
        color: black;
        /* Change the text color for the active button */
    }

    @media (max-width: 1200px) {
        .grid-item {
            width: calc(33.333% - 15px);
            /* Three columns on large screens with less spacing */
        }
    }

    @media (max-width: 992px) {
        .grid-item {
            width: calc(50% - 20px);
            /* Two columns on medium screens */
        }
    }

    @media (max-width: 576px) {
        .grid-item {
            width: 100%;
            /* One column on small screens */
        }
    }
</style>

<section id="special-price">
    <div class="container">
        <hr>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">Top Places</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>
        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item border <?php echo $item['tour_Division'] ?? "Brand"; ?>">
                    <div class="item">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?tour_id=%s', 'Place.php', $item['tour_id']); ?>">
                                <img src="<?php echo $item['tour_image'] ?? "./assets/products/13.png"; ?>" alt="product1"
                                    class="img-fluid">
                            </a>
                            <div class="text-center">
                                <h6><?php echo $item['tour_name'] ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <?php echo generateStarRating($item['rating'] ?? 0); ?>
                                </div>
                                <!-- <div class="price py-2">
                                    <span><?php echo $item['tour_price'] ?? 0; ?> TK </span>
                                </div> -->
                                <form method="post">
                                    <input type="hidden" name="tour_id" value="<?php echo $item['tour_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle); ?>
        </div>
    </div>
</section>

<script>
    // JavaScript for filtering
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('#filters .btn');
        const items = document.querySelectorAll('.grid-item');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                buttons.forEach(btn => btn.classList.remove('is-checked'));
                button.classList.add('is-checked');

                const filter = button.getAttribute('data-filter');
                items.forEach(item => {
                    if (filter === '*' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>