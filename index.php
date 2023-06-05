<?php
include 'bootstrap/init.php';
require './vendor/autoload.php';


$redis=new Predis\Client();
$productsCache=$redis->get('products');




    if(isset($_GET['sortBy'])){
        $sortBy=$_GET['sortBy'];
        switch($sortBy){
            case 'max':
                $query="ORDER BY `product`.`price` DESC";
                $products=getProducts($query);
                break;
            case 'min':
                $query="ORDER BY `product`.`price` ASC";
                $products=getProducts($query);
                break;
            case 'latest':
                $query="ORDER BY `product`.`created_at` DESC";
                $products=getProducts($query);
                break;
            case 'oldest':
                $query="ORDER BY `product`.`created_at` ASC";
                $products=getProducts($query);
                break;
        }
    }else{
        if($productsCache){
            $products=$productsCache;
        }
         $products=getProducts();
        $redis->set('products',$products);
        $redis->expire('products',1000);
    }

include 'tmp-views/tpl-index.php';