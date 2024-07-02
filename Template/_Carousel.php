<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animated Carousel</title>
  <style>
    .carousel-container {
      width: 80%;
      margin: 0 auto;
    }
    
    .c-item {
      height: 580px;
      transition: opacity .6s ease-in-out;
    }

    .c-img {
      height: 100%;
      object-fit: cover;
      filter: brightness(0.7);
      transition: transform .6s ease-in-out;
    }

    .carousel-caption {
      background: rgba(0, 0, 0, 0.5);
      padding: 30px;
      border-radius: 15px;
      transition: background 0.5s ease-in-out, transform 0.5s ease-in-out;
      text-align: center;
      opacity: 0;
      transform: translateY(50px);
    }

    .carousel-caption h1 {
      font-size: 3rem;
      font-weight: bold;
      text-transform: capitalize;
      font-family: 'Roboto', sans-serif;
      margin-bottom: 10px;
    }

    .carousel-caption p {
      font-size: 1.5rem;
      text-transform: uppercase;
      font-family: 'Roboto', sans-serif;
      margin-bottom: 20px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: #000;
      border-radius: 50%;
      padding: 15px;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
    }

    .carousel-item.active .c-img {
      transform: scale(1.1);
    }

    .carousel-item.active .carousel-caption {
      opacity: 1;
      transform: translateY(0);
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
    }
  </style>
</head>
<body>
  <div class="carousel-container">
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <!-- Slides -->
      <div class="carousel-inner">
        <div class="carousel-item active c-item">
          <img src="https://static.meghpolli.com/meghpolli/static/assets/img/gallary_3.jpg" class="d-block w-100 c-img" alt="Sajek Valley">
          <div class="carousel-caption">
            <h1>Sajek Valley</h1>
            <p>A unique tourist spot</p>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img src="https://images.hive.blog/p/3HaJVw3AYyXBD5Md5tUD9YKkzGo1eoR2RP1hYxRaFr2Jhpn5BB6r8b5qQL4R9QntRsPTZ6inEXhXLiUNrGdLGFauudupRoQvcJMAQG8?format=match&mode=fit" class="d-block w-100 c-img" alt="Saint Martin Island">
          <div class="carousel-caption">
            <h1>Saint Martin Island</h1>
            <p>Coral Island in the Bay of Bengal</p>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img src="https://cdn.pixabay.com/photo/2018/09/12/19/21/deer-3673017_1280.jpg" class="d-block w-100 c-img" alt="Sundarban">
          <div class="carousel-caption">
            <h1>Sundarban</h1>
            <p>World’s largest mangrove forest</p>
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
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
