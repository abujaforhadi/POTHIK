
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
  color: burlywood;
}
</style>
</head>
<body>

<p id="demo"></p><br>

<script>
var countDownDate = new Date("Jan 15, 2023 15:37:25").getTime();

var x = setInterval(function() {

 
  var now = new Date().getTime();
 
  var distance = countDownDate - now;
  
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
 
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html><section id="banner_adds">
    <div class="container py-5 text-center">

        <img src="./assets/banner1-cr-500x150.jpg" alt="banner1" class="img-fluid">
        <img src="./assets/banner2-cr-500x150.jpg" alt="banner1" class="img-fluid">
    </div>
</section>

