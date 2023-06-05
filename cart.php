<?php 
include 'bootstrap/init.php';


$products=getProducts_chosen($_POST['product_id']);




include 'tmp-views/tpl-cart.php';