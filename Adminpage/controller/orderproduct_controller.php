<?php
include_once '../model/Order_product.php';
if(isset($_POST['btn_action'])&&$_POST['btn_action']=='Check out')
{
$user_id=$_POST['user_id'];
$total=$_POST['total'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$status=0;
$order= new Order_product("",$user_id,$total,$address,$phone,$status);
$order->insertOrder();
}
header('location:orderdetail_controller.php');
?>