<?php
include '../util/MySQLUtil.php';
class Category
{
    private $category_id;
    private $category_name;
    public function __construct($category_id,$category_name)
    {
        $this->category_id=$category_id;
        $this->category_name=$category_name;       
    }

    public function __destruct()
    {
        $this->category_id="";
        $this->category_name="";
    }
    public function getId()
    {
        return $this->category_id;
    }
    public function setId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getName()
    {
        return $this->category_name;
    }
    public function setName($category_name)
    {
        $this->category_id = $category_name;
    }
    public function insertCategory()
    {
        $mysql = new MySQLUtil();
        $data = [
            "category_name"=>$this->category_name,           
        ];

        $sql = "INSERT INTO category (category_name) VALUES (:category_name)";
        $mysql->insertData($sql, $data);
    }
    public function getAllCategory(){
        $mysql=new MySQLUtil();
        $query = "select * from category";
        $data= $mysql->getAllData($query);
        return $data;
    }
    public function getCategory($id)
    {
        $mysql = new MySQLUtil();
        $query = "select * from category where category_id = :id";
        $data = ['id' => $id];
        return $mysql->getData($query, $data);
    }

    public function deleteCategory($id)
    {
        $mysql = new MySQLUtil();
            $data = [
                'id' => $id,
            ];
            $sql = "DELETE FROM category WHERE category_id = :id";
            $mysql->deleteData($sql,$data);
    }
    public function updateCategory($id)
    {
        $mysql = new MySQLUtil();
            $data = [
                'name'=>$this->category_name,
                'id' => $id,
            ];
            $sql = "UPDATE category SET category_name = :name  WHERE category_id = :id";
            $mysql->updateData($sql,$data);
    }
    
}
?>