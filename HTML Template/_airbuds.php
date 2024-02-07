<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        
.grid {
    display: grid;
    width: 100%;

    grid-template-columns: auto auto auto auto;
    text-align: center;
    grid-gap: 10px;
    padding: 10px;

}

.grid .item {
    background-color: white;
    font-size: 20px;
    border-radius: 20px;
    border: 7px dotted;
    border-radius: 20px;
    border-bottom-right-radius: 30px;
    border-image: linear-gradient(-160deg, rgb(222, 243, 228), rgba(11, 151, 25, 0.868));
    border-image-slice: 1;
}

.img1 {

    height: 40px;
    width: 100px;
    margin-left: 50%;
    margin-bottom: 15px;
}

.grid1 {
    display: grid;
    width: 100%;

    grid-template-columns: auto auto auto;
    text-align: center;
    grid-gap: 10px;
    padding: 10px;

}

.grid1 .item {
    background-color: white;
    font-size: 20px;
    border-radius: 20px;
    border: 7px dotted;
    border-radius: 20px;
    border-bottom-right-radius: 30px;
    border-image: linear-gradient(-160deg, rgb(222, 243, 228), rgba(11, 151, 25, 0.868));
    border-image-slice: 1;
}

.btn {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 10px;
    background: #031321;
    font-family: consolas;
}

.btn a {
    position: relative;
    display: inline-block;

    color: #2196f3;
    text-transform: uppercase;
    letter-spacing: 4%;
    text-decoration: none;
    font-size: 24px;
    overflow: hidden;
    transition: 0.2s;
}

.btn a:hover {
    color: #f0f1f2;
    background: green;
    box-shadow: 0 0 10px green, 0 0 40px green, 0 0 80px green;
    transition-delay: 1s;
}

.btn a span {
    position: absolute;
    display: block;
}

.btn a span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, green);
}

.btn a:hover span:nth-child(1) {
    left: 100%;
    transition: 1s;
}

.btn a span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, green);
}

.btn a:hover span:nth-child(3) {
    left: 100%;
    transition: 1s;
    transition-delay: 0.5s;
}

.btn a span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, green);
}

.btna:hover span:nth-child(2) {
    top: 10%;
    transition: 1s;
    transition-delay: 0.25s;
}

.btn a span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, green);
}

.btn a:hover span:nth-child(4) {
    bottom: 100%;
    transition: 1s;
    transition-delay: 0.75s;
}

.del {
    color: red;
}
    </style>
</head>
<body>
<div class="gadget_gear">
    <h1 id="h1"> <i class="fa-solid fa-headphones"> </i>  </h1>
    <div class="grid1">
      <div class="item"><img src="img/E3.webp" alt="" srcset=""><br>XIAOMI MI AIR2<br>2,300৳<del class="del">
          2,800৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>
      <div class="item"><img src="img/E4.webp" alt="" srcset=""><br>Haylou GT1 PRO<br>1,449৳<del class="del">
          1,850৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>
      <div class="item"><img src="img/E1.webp" alt="" srcset=""><br>Edifier X3S True Wireless<br>2,999৳
        <del class="del"> 3,800৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>
      <div class="item"><img src="img/E2.webp" alt="" srcset=""><br><br>20,500৳<del class="del"> 21,500৳৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>
      <div class="item"><img src="img/E5.webp" alt="" srcset=""><br>Realme Buds Air 2 <br>2,300৳<del class="del">
          2,500৳৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>
      <div class="item"><img src="img/E6.webp" alt="" srcset=""><br>OnePlus Buds Pro<br>4,000৳<del class="del">
          4,500৳৳</del><br><br>
        <div class="btn">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Buy now
          </a>
        </div>
      </div>



    </div>
  </div>
</body>
</html>