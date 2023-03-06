<?php
include_once('../util/MySQLUtil.php');
class Order_detail{
    private $id;
    private $product_id;
    private $order_id;
    private $amount;
    private $price;
    public function __construct($id,$product_id,$order_id,$amount,$price)
    {
        $this->id=$id;
        $this->product_id=$product_id;
        $this->order_id=$order_id;
        $this->amount=$amount;
        $this->price=$price;
    }

    public function __destruct()
    {
        $this->id="";
        $this->order_id="";
        $this->product_id="";
        $this->amount="";
        $this->price="";
    }
    public function getId(){
        return $this->id;
    }
    public function getorderId(){
        return $this->order_id;
    }
    public function getProduct_id(){
        return $this->product_id;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setOrderId($order_id){
        $this->order_id=$order_id;
    }
    public function setProductId($product_id){
        $this->product_id=$product_id;
    }
    public function setAmount($amount){
        $this->amount=$amount;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function getAllOrderDeltail(){
        $mysql=new MySQLUtil();
        $query = "select * from order_detail";
        $data= $mysql->getAllData($query);
        return $data;
    }
    public function insertOrderDetail(){
        $mysql = new MySQLUtil();
        $data = [
             'order_id'=>$this->order_id,
             'product_id'=>$this->product_id,
             'amount'=>$this->amount,
             'price'=>$this->price
        ];

        $sql = "INSERT INTO order_detail (product_id,order_id,amount,price ) VALUES (:product_id, :order_id, :amount, :price)";
        $mysql->insertData($sql, $data);
    }
    public function getAllByOrderId($order_id){
        $mysql = new MySQLUtil();
        $data = [
             'order_id'=>$order_id,
        ];
        $sql = "select * from order_detail where order_id=:order_id";
        return $mysql->getAllDataByValue($sql, $data);
    }
}
?>