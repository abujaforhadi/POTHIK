<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Improved Carousel</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .c-item {
      height: 580px;
    }

    .c-img {
      height: 100%;
      object-fit: cover;
      filter: brightness(0.6);
    }

    .carousel-caption {
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2));
      padding: 20px;
      border-radius: 10px;
      transition: background 0.5s ease-in-out;
    }

    .carousel-caption h1 {
      font-size: 3rem;
      font-weight: bold;
      text-transform: capitalize;
      font-family: 'Roboto', sans-serif;
    }

    .carousel-caption p {
      font-size: 1.5rem;
      text-transform: uppercase;
      font-family: 'Roboto', sans-serif;
    }

    .carousel-caption .btn {
      background-color: #007bff;
      border: none;
      font-size: 1rem;
      padding: 10px 20px;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .carousel-caption .btn:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: #000;
      border-radius: 50%;
      padding: 10px;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
    }

    @media (max-width: 768px) {
      .c-item {
        height: 400px;
      }

      .carousel-caption h1 {
        font-size: 2rem;
      }

      .carousel-caption p {
        font-size: 1rem;
      }

      .carousel-caption .btn {
        font-size: 0.8rem;
        padding: 8px 16px;
      }
    }
  </style>
</head>
<body>
  <!-- Improved Carousel -->
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="https://tfe-bd.sgp1.digitaloceanspaces.com/uploads/1623685867.jpg" class="d-block w-100 c-img" alt="Sajek Valley">
        <div class="carousel-caption">
          <p>A unique tourist spot</p>
          <h1>Sajek Valley</h1>
          <button class="btn btn-primary" type="button">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="https://images.hive.blog/p/3HaJVw3AYyXBD5Md5tUD9YKkzGo1eoR2RP1hYxRaFr2Jhpn5BB6r8b5qQL4R9QntRsPTZ6inEXhXLiUNrGdLGFauudupRoQvcJMAQG8?format=match&mode=fit" class="d-block w-100 c-img" alt="Saint Martin Island">
        <div class="carousel-caption">
          <p>Coral Island in the Bay of Bengal</p>
          <h1>Saint Martin Island</h1>
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="https://cdn.pixabay.com/photo/2018/09/12/19/21/deer-3673017_1280.jpg" class="d-block w-100 c-img" alt="Sundarban">
        <div class="carousel-caption">
          <p>World’s largest mangrove forest</p>
          <h1>Sundarban</h1>
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
    </div>

    <!-- Previous & Next buttons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- !Improved Carousel -->

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
