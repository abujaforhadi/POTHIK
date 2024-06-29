<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #foot {
            background-color: #282c34;
            color: #ccc;
            padding: 60px 0;
        }
        #foot a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        #foot a:hover {
            color: #61dafb;
        }
        #foot .navbar-brand img {
            height: 50px;
            display: block;
            margin-bottom: 10px; /* Add space between logo and text */
        }
        #foot h4{
            font-size: 20px;
            margin-bottom: 20px;
            color: #61dafb;
        }
        #foot .form-control {
            border: none;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 10px;
        }
        #foot .btn-primary {
            background-color: #61dafb;
            border: none;
        }
        #foot .btn-primary:hover {
            background-color: #21a1f1;
        }
        #foot .social-icons a {
            display: inline-block;
            margin-right: 15px;
            font-size: 20px;
            color: #61dafb;
            transition: transform 0.3s;
        }
        #foot .social-icons a:hover {
            transform: scale(1.2);
        }
        .copyright {
            background-color: #1c1f26;
            color: #777;
            padding: 20px 0;
        }
        .scroll-up-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            width: 50px;
            height: 50px;
            background-color: skyblue;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, opacity 0.3s, transform 0.3s;
        }
        .scroll-up-btn:hover {
            background-color: #e91e63;
            transform: translateY(-10px);
        }
        .foot-links a {
            position: relative;
            display: inline-block;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 10px;
            transition: color 0.3s;
        }
        .foot-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #61dafb;
            transition: width 0.3s;
        }
        .foot-links a:hover::after {
            width: 100%;
        }
        .total-users {
            color: white;
            margin-top: 10px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <!-- Your existing content -->

    <footer id="foot">
        <div class="con">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <a class="navbar-brand" href="./index.php">
                        <img src="assets/icons/pothik 2.png" alt="Logo">
                    </a>
                    <?php
                    include 'database/connection.php';
                    $result = $con->query("SELECT COUNT(*) AS total FROM users");
                    $row = $result->fetch_assoc();
                    $total_users = $row['total'];
                    ?>
                    <h4 class="total-users">Registered Users: <?php echo $total_users; ?></h4>
                </div>
                <div class="col-lg-4 col-12">
                    <h4>Upcoming Event</h4>
                    <form class="form-row">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email *" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-12">
                    <h4>Information</h4>
                    <div class="foot-links">
                        <a href="#">About Us</a><br>
                        <a href="#">Privacy Policy</a><br>
                        <a href="#">Terms & Conditions</a>
                    </div>
                </div>
                <div class="col-lg-2 col-12">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://github.com/abujaforhadi/"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/abujaforhadi/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright text-center">
        <p>&copy; 2024. Design By 
            <a href="https://github.com/abujaforhadi">Jafor, Ismail, Muntajima</a>
        </p>
    </div>

    <!-- Scroll Up Button -->
    <button id="scrollUp" class="scroll-up-btn">&#8679;</button>

    <!-- FontAwesome for social icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <script>
        // Show or hide the scroll-up button based on scroll position
        window.onscroll = function() {
            var scrollUpBtn = document.getElementById('scrollUp');
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollUpBtn.style.display = "block";
            } else {
                scrollUpBtn.style.display = "none";
            }
        };

        // Smooth scroll to top when the button is clicked
        document.getElementById('scrollUp').onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    </script>

    <!-- External JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>
