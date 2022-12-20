<?php

if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];
    include('server.php');

    $sql = "DELETE FROM product WHERE product_id=$product_id";
    $conn->query($sql);
}

header("location: index.php");
exit;

?>