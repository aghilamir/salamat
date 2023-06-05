<?php 

function getProducts_chosen($id){

    global $pdo;
    $sql="select * from product where is_active=1 && id=$id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;


}