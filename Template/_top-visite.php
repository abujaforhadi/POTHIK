<!-- Top Sale -->
<?php

shuffle($product_shuffle);

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['tour_id']);
    }
}
?>
<style>
    .product img {
        width: 500px;
        height: 200px;
        object-fit: cover;
    }
</style>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top visited place</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item py-2 p-3">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?tour_id=%s', 'Place.php', $item['tour_id']); ?>">
                            <img src="<?php echo $item['tour_image'] ?? "./assets/products/1.png"; ?>" alt="product1"
                                class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6><?php echo $item['tour_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <?php echo generateStarRating($item['rating'] ?? 0); ?>
                            </div>

                            <form method="post">
                                <input type="hidden" name="tour_id" value="<?php echo $item['tour_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>

<!-- !Top Sale -->