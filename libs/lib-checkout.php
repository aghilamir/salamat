<?php 


function getOrder($cellphone){
    global $pdo;
    $sql="select * from orders where cellphone=$cellphone";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;

}
function setOrder($requesst){

    global $pdo;
    $sql="INSERT INTO `orders` ( `cellphone`, `product_id`, `totoal_price`,`is_sale`) 
    VALUES (?, ?, ?,?);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$requesst['user_cellphone'],$requesst['product_id'],$requesst['total_price'],$requesst['is_sale']]);
   return true;
}

function checkOrder($detailesOrder,$request){
   foreach($detailesOrder as $order){
    if($order->cellphone==$request['user_cellphone'] 
    and $order->product_id==(int)$request['product_id'] 
    and $order->is_sale==(int)$request['is_sale']){
        return false;

    }else{
        return true; 
    }
   
   }
   

}

function getProductDeetails($id){

    global $pdo;
    $sql="select * from product where id=$id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;


}