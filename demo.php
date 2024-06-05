<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Animated Carousel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .c-item {
            height: 580px;
            position: relative;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
            transition: transform 1s ease-in-out;
        }

        .carousel-item-next,
        .carousel-item-prev,
        .carousel-item.active {
            display: block;
            transform: scale(0.95);
            opacity: 0;
        }

        .carousel-item-next.carousel-item-start,
        .carousel-item-prev.carousel-item-end,
        .carousel-item.active.carousel-item-end,
        .carousel-item.active.carousel-item-start {
            transform: scale(1);
            opacity: 1;
        }

        .carousel-caption {
            top: 0;
            position: absolute;
            width: 100%;
            padding: 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.4);
            animation: slideInFromTop 1s ease-out;
        }

        @keyframes slideInFromTop {
            0% {
                top: -50px;
                opacity: 0;
            }
            100% {
                top: 0;
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<!-- Owl-carousel -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="https://tfe-bd.sgp1.digitaloceanspaces.com/uploads/1623685867.jpg" class="d-block w-100 c-img" alt="Slide 1">
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">A unique tourist spot</p>
                <h1 class="display-1 fw-bolder text-capitalize">Sajek Valley</h1>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Book a tour</button>
            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="https://images.hive.blog/p/3HaJVw3AYyXBD5Md5tUD9YKkzGo1eoR2RP1hYxRaFr2Jhpn5BB6r8b5qQL4R9QntRsPTZ6inEXhXLiUNrGdLGFauudupRoQvcJMAQG8?format=match&mode=fit" class="d-block w-100 c-img" alt="Slide 2">
            <div class="carousel-caption top-0 mt-4">
                <p class="text-uppercase fs-3 mt-5">Coral Island in the Bay of Bengal</p>
                <p class="display-1 fw-bolder text-capitalize">Saint Martin Island</p>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal" data-bs-target="#booking-modal">Book a tour</button>
            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="https://cdn.pixabay.com/photo/2018/09/12/19/21/deer-3673017_1280.jpg" class="d-block w-100 c-img" alt="Slide 3">
            <div class="carousel-caption top-0 mt-4">
                <p class="text-uppercase fs-3 mt-5">World’s largest mangrove forest</p>
                <p class="display-1 fw-bolder text-capitalize">Sundarban</p>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal" data-bs-target="#booking-modal">Book a tour</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- !Owl-carousel -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
