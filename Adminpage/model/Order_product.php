<?php
    include_once('../util/MySQLUtil.php');
    class Order_product{
        private $order_id;
        private $user_id;
        private $total;
        private $address;
        private $phone;
        private $status;
        public function __construct($order_id,$user_id,$total,$address,$phone,$status)
        {
            $this->order_id=$order_id;
            $this->user_id=$user_id;
            $this->total=$total;
            $this->address=$address;
            $this->phone=$phone;
            $this->status=$status;
        }
    
        public function __destruct()
        {
            $this->order_id="";
            $this->user_id="";
            $this->total="";
            $this->address="";
            $this->phone="";
            $this->status="";
        }
        public function getOrderId(){
            return $this->order_id;
        }
        public function getUserId(){
            return $this->user_id;
        }
        public function getTotal(){
            return $this->total;
        }
        public function getAddress(){
            return $this->address;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getStatus(){
            return $this->status;
        }
        public function setOrderId($order_id){
            $this->order_id=$order_id;
        }
        public function setUserId($user_id){
            $this->user_id=$user_id;
        }
        public function setTotal($total){
            $this->total=$total;
        }
        public function setAddress($address){
            $this->address=$address;
        }
        public function setPhone($phone){
            $this->phone=$phone;
        }
        public function setStatus($status){
            $this->status=$status;
        }
        public function getAllOrder(){
            $mysql=new MySQLUtil();
            $query = "select * from order_product";
            $data= $mysql->getAllData($query);
            return $data;
        }
        public function insertOrder(){
            $mysql = new MySQLUtil();
            $data = [
                'user_id' => $this->user_id,
                'total' => $this->total,
                'address' => $this->address,
                'phone' => $this->phone,
                'status'=>$this->status
            ];
    
            $sql = "INSERT INTO order_product (user_id,total,address,phone,status  ) VALUES (:user_id, :total, :address, :phone, :status)";
            $mysql->insertData($sql, $data);
        }
    }
?>