<?php
include_once '../util/MySQLUtil.php';
class Product
{

    private $product_id;
    private $product_name;
    private $image;
    private $price;
    private $category_id;

    public function __construct($product_id,$product_name,$image,$price,$category_id)
    {
        $this->product_id=$product_id;
        $this->product_name=$product_name;
        $this->image=$image;
        $this->price=$price;
        $this->category_id=$category_id;
    }

    public function __destruct()
    {
        $this->product_id="";
        $this->product_name="";
        $this->image="";
        $this->price="";
        $this->category_id="";
    }

  
    public function getId()
    {
        return $this->product_id;
    }
    public function setId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function getName()
    {
        return $this->product_name;
    }
    public function setName($product_name)
    {
        $this->product_name=$product_name;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image=$image;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price=$price;
    }
    public function getCategoryid()
    {
        return $this->category_id;
    }
    public function setCategoryid($category_id)
    {
        $this->category_id=$category_id;
    }
    public function insertProduct()
    {
        $mysql = new MySQLUtil();

        $data = [
            "product_name"=>$this->product_name,
            "image"=>$this->image,
            "price"=>$this->price,
            "category_id"=>$this->category_id,
        ];

        $sql = "INSERT INTO product (product_name,image,price,category_id) VALUES (:product_name,:image,:price,:category_id)";
        $mysql->insertData($sql, $data);
    }
    public function getAllProduct(){
        $mysql=new MySQLUtil();
        $query = "select * from product";
        $data= $mysql->getAllData($query);
        return $data;
    }
    public function getProduct($id)
    {
        $mysql = new MySQLUtil();
        $query = "select * from product where id = :id";
        $data = ['id' => $id];

        return $mysql->getData($query, $data);
    }

    public function deleteProduct($id)
    {
        $mysql = new MySQLUtil();
            $data = [
                'id' => $id,
            ];
            $sql = "DELETE FROM product WHERE product_id = :id";
            $mysql->deleteData($sql,$data);
    }
    public function updateProduct($id)
    {
        $mysql = new MySQLUtil();
            $data = [
                'name'=>$this->product_name,
                'image'=>$this->image,
                'price'=>$this->price,
                'category_id'=>$this->category_id,
                'id'=>$id,
            ];
            $sql = "UPDATE product SET product_name = :name, image = :image, price = :price,category_id= :category_id WHERE product_id = :id";
            $mysql->updateData($sql,$data);
    }
    public function getCategoryName($category_id){
        $mysql = new MySQLUtil();
        $pdo = $mysql->connected();
        if ($pdo != null) {
            $data = [
                'category_id'=>$category_id,
            ];
            $sql ="select category_name from category where category_id=:category_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetch();
    }
    }
}

?>