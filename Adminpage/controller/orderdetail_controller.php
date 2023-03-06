<?php
    include_once '../model/Order_detail.php';
    include_once '../model/Order_product.php';
    $order=new Order_product("","","","","","");
    $allorder=$order->getAllOrder();
    $order_id=0;
    foreach($allorder as $item){
        $order_id=$item['order_id'];
    }
    session_start();
    $data=$_SESSION['cart'];
    for($i=0;$i<count($data);$i++){
        $detail=new Order_detail("",$data[$i][0],$order_id,$data[$i][4],$data[$i][3]);
        $detail->insertOrderDetail();
    }
 ?>