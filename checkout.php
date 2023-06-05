<?php 
include 'bootstrap/init.php';




$detailesOrder=getOrder($_POST['user_cellphone']);

// foreach($detailesOrder as $order){
//    var_dump( $order->cellphone);
//    echo '<hr>';
//    echo $order->is_sale;
//    echo '<hr>';
//    echo $order->product_id;
// }
$detailesProduct=getProductDeetails($_POST['product_id']);

// var_dump($_POST);
// echo '<hr>';
// var_dump((int)$_POST['product_id']);
// var_dump((int)$_POST['is_sale']);

// echo '<hr>';
// var_dump($detailesOrder[0]);
// echo '<hr>';
// var_dump($detailesOrder[0]->product_id);
// die();
if($detailesOrder==null){
   
    $order=setOrder($_POST);
    echo "سفارش شما با موفقیت ثبت شد";
     
}elseif(checkOrder($detailesOrder,$_POST)==false){
  echo "شما فقط یک بار می توانید این محصول را با تخفیف بخرید";
  die();
}else{
    $order=setOrder($_POST);
    echo "سفارش شما با موفقیت ثبت شد";
}



include 'tmp-views/tpl-checkout.php';