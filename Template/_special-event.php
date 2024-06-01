<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<style>
    .product img {
            width: 500px;
            height: 300px;
            object-fit: cover;
        }
</style>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Top Tourist Places</h4>
        <hr>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">Top Places</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>
        <div class="grid">
            <?php array_map(function ($item) use($in_cart){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'Place.php', $item['item_id']); ?>">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" width="400" height="400" alt="product1" class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span><?php echo $item['tour_price'] ?? 0; ?> TK </span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle); ?>
        </div>
    </div>
</section>

<!-- !Special Price -->
