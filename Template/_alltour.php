<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        #product .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        #product img {
            border-radius: 10px;
            object-fit: cover;
            width: 100%;
        }

        #product h2 {
            font-size: 24px;
            font-weight: bold;
        }

        #product p {
            font-size: 16px;
            color: #555;
        }

        #product h3 {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }

        #product h4 {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        #product .btn-danger {
            background-color: #e3342f;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
        }

        #product .btn-danger:hover {
            background-color: #cc1f1a;
        }

        #product h5 {
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
        }

        #product small {
            font-size: 14px;
            color: #6c757d;
        }

        .rating {
            display: flex;
            align-items: center;
        }

        .rating span {
            margin-right: 5px;
        }

        .rating a {
            color: #007bff;
            text-decoration: none;
        }

        .rating a:hover {
            text-decoration: underline;
        }

        #product table {
            width: 100%;
            margin-top: 20px;
        }

        #product table td {
            padding: 10px 0;
        }

        #product .qty {
            margin-top: 20px;
        }

        #product .qty h6 {
            font-size: 16px;
            font-weight: bold;
            color: #495057;
        }

        #product .qty .qty_input {
            text-align: center;
        }

        #product .btn {
            font-size: 16px;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
        }

        #product .btn-success {
            background-color: #28a745;
            border: none;
        }

        #product .btn-warning {
            background-color: #ffc107;
            border: none;
        }
    </style>
</head>

<body>
    <?php

    $user_data = check_login($con);

    function generateStarRating($rating)
    {
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

    function renderProductSection($item, $tour_id, $Cart, $product)
    {
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $item['tour_image'] ?? "./assets/products/1.png"; ?>" alt="product"
                            class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <?php
                                if (in_array($item['tour_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                } else {
                                    echo '<button type="button" id="bookNow" class="btn btn-warning btn-sm font-size-16 form-control">Book Now</button>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['tour_name'] ?? "Unknown"; ?></h5>
                        <small>At <?php echo $item['tour_Division'] ?? "Brand"; ?> Division</small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <?php echo generateStarRating($item['rating'] ?? 0); ?>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20k ratings | 10+k answered questions</a>
                        </div>
                        <hr class="m-0">
                        Short Details about the tour:
                       <span class="text-primary"> <?php echo $item['details'] ?? "Brand"; ?></span>
                        <hr class="m-0">


                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Starting From</td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td class="font-size-20 text-danger"><span
                                        id="deal_price"><?php echo $item['tour_price'] ?? 0; ?></span><small>TK/per
                                        Person</small></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Total Price: <span class="font-size-20 text-danger" id="total_price"><?php echo $item['tour_price'] ?? 0; ?>TK</span></td>
                                
                            </tr>
                        </table>
                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <div class="qty d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-baloo mr-2">Adults</h6>
                                        <div class="px-4 d-flex font-rale">
                                            <button class="qty-up border bg-light" data-type="adults" data-id="pro1"><i
                                                    class="fas fa-angle-up"></i></button>
                                            <input type="text" id="qty_adults" data-id="pro1"
                                                class="qty_input border px-2 w-50 bg-light" disabled value="1"
                                                placeholder="1">
                                            <button data-type="adults" data-id="pro1" class="qty-down border bg-light"><i
                                                    class="fas fa-angle-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <h6 class="font-baloo mr-2">Children</h6>
                                        <div class="px-4 d-flex font-rale">
                                            <button class="qty-up border bg-light" data-type="children" data-id="pro1"><i
                                                    class="fas fa-angle-up"></i></button>
                                            <input type="text" id="qty_children" data-id="pro1"
                                                class="qty_input border px-2 w-50 bg-light" disabled value="0"
                                                placeholder="0">
                                            <button data-type="children" data-id="pro1" class="qty-down border bg-light"><i
                                                    class="fas fa-angle-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const dealPrice = <?php echo $item['tour_price'] ?? 0; ?>;
                const qtyAdults = document.getElementById('qty_adults');
                const qtyChildren = document.getElementById('qty_children');
                const totalPriceElement = document.getElementById('total_price');

                function updateTotalPrice() {
                    const adults = parseInt(qtyAdults.value);
                    const children = parseInt(qtyChildren.value);
                    const totalPrice = (dealPrice * adults) + (dealPrice * 0.5 * children);
                    totalPriceElement.textContent = totalPrice.toFixed(2) + " TK";
                }

                document.querySelectorAll('.qty-up').forEach(button => {
                    button.addEventListener('click', function () {
                        const type = this.getAttribute('data-type');
                        const qtyInput = document.getElementById('qty_' + type);
                        qtyInput.value = parseInt(qtyInput.value) + 1;
                        updateTotalPrice();
                    });
                });

                document.querySelectorAll('.qty-down').forEach(button => {
                    button.addEventListener('click', function () {
                        const type = this.getAttribute('data-type');
                        const qtyInput = document.getElementById('qty_' + type);
                        if (parseInt(qtyInput.value) > 0) {
                            qtyInput.value = parseInt(qtyInput.value) - 1;
                            updateTotalPrice();
                        }
                    });
                });

                document.getElementById('bookNow').addEventListener('click', function () {
                    const adults = qtyAdults.value;
                    const children = qtyChildren.value;
                    const tourId = <?php echo $tour_id; ?>;
                    const totalPrice = (dealPrice * adults) + (dealPrice * 0.5 * children);
                    const username = "<?php echo isset($user_data['username']) ? $user_data['username'] : 'Guest'; ?>";
                    const url = `payment.php?tour_id=${tourId}&adults=${adults}&children=${children}&total_price=${totalPrice}&username=${username}`;
                    window.location.href = url;
                });

                updateTotalPrice();
            });
        </script>
        <?php
    }

    foreach ($product->getData() as $item) {
        if ($item['tour_id'] == $tour_id) {
            renderProductSection($item, $tour_id, $Cart, $product);
        }
    }
    ?>

</body>

</html>