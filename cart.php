<?php
ob_start();
include ('header.php');
?>

<?php

        count($product->getData('cart')) ? include ('Template/_cart-template.php') :  include ('Template/notFound/_cart_notFound.php');

      
      
        include ('Template/_new-event.php');
  

?>

<?php
include ('footer.php');
?>


