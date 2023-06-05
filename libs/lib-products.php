<?php 

function getProducts($query=''){

    global $pdo;
    $sql="select * from product where is_active=1 $query";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;


}