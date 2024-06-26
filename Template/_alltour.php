<?php
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

$tour_id = $_GET['tour_id'] ?? 1;
foreach ($product->getData() as $item) :
    if ($item['tour_id'] == $tour_id) :
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['tour_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <?php
                        if (in_array($item['tour_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                        }else{
                            echo '<button type="button" id="bookNow" class="btn btn-warning font-size-16 form-control">Book Now</button>';
                        }
                        ?> 
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['tour_name'] ?? "Unknown"; ?></h5>
                <small>At <?php echo $item['tour_Division'] ?? "Brand"; ?> Division</small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <?php echo generateStarRating($item['rating'] ?? 0); ?>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20k ratings | 10+k answered questions</a>
                </div>
                <hr class="m-0">

                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Price:</td>
                        <td class="font-size-20 text-danger"><span id="deal_price"><?php echo $item['tour_price'] ?? 0; ?></span><small>TK/per Person</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Total Price:</td>
                        <td class="font-size-20 text-danger"><span id="total_price"><?php echo $item['tour_price'] ?? 0; ?>TK</span></td>
                    </tr>
                </table>
                <hr>

                <div class="row">
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Person</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" id="qty_input" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->

<script>
    const dealPrice = <?php echo $item['tour_price'] ?? 0; ?>;
    const qtyInput = document.getElementById('qty_input');
    const totalPriceElement = document.getElementById('total_price');

    function updateTotalPrice() {
        const qty = parseInt(qtyInput.value);
        const totalPrice = dealPrice * qty;
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }

    document.querySelector('.qty-up').addEventListener('click', function() {
        qtyInput.value = parseInt(qtyInput.value) + 1;
        updateTotalPrice();
    });

    document.querySelector('.qty-down').addEventListener('click', function() {
        if (parseInt(qtyInput.value) > 1) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
            updateTotalPrice();
        }
    });

    document.addEventListener('DOMContentLoaded', updateTotalPrice);

    document.getElementById('bookNow').addEventListener('click', function() {
        const persons = qtyInput.value;
        const tourId = <?php echo $tour_id; ?>;
        const totalPrice = dealPrice * persons;
        const url = `payment.php?tour_id=${tourId}&persons=${persons}&total_price=${totalPrice}`;
        window.location.href = url;
    });
</script>
<?php
    endif;
endforeach;
?>
