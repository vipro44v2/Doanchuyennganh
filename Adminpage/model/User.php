<?php
include_once '../util/MySQLUtil.php';
class User
{
    private $user_id;
    private $username;
    private $password;
    private $gmail;
    private $vaitro;

    public function __construct($id,$username, $password, $gmail, $vaitro)
    {
        $this->id=$id;
        $this->username = $username;
        $this->password = $password;
        $this->gmail = $gmail;
        $this->vaitro = $vaitro;
    }

    public function __destruct()
    {
        $this->user_id = "";
        $this->username = "";
        $this->password = "";
        $this->gmail = "";
        $this->vaitro = "";
    }

    public function showInfo()
    {
        echo $this->username . " " . $this->password;
    }
    public function getid()
    {
        return $this->user_id;
    }
    public function setid($user_id)
    {
        $this->user_id = $user_id;
    }


    public function getuser()
    {
        return $this->username;
    }
    public function setuser($username)
    {
        $this->username = $username;
    }


    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }


    public function getgmail()
    {
        return $this->gmail;
    }
    public function setgmail($gmail)
    {
        $this->gmail = $gmail;
    }

    public function getvaitro()
    {
        return $this->vaitro;
    }
    public function setvaitro($vaitro)
    {
        $this->vaitro = $vaitro;
    }


    public function insertUser()
    {
        $mysql = new MySQLUtil();

        $data = [
            'name' => $this->username,
            'pass' => $this->password,
            'gmail' => $this->gmail,
            'vaitro' => $this->vaitro,
        ];

        $sql = "INSERT INTO users (username, password, gmail, vaitro  ) VALUES (:name, :pass, :gmail, :vaitro)";
        $mysql->insertData($sql, $data);
    }
    
    public function getAllUsers()
    {
        $mysql = new MySQLUtil();
        $query = "select * from users ";     

        return $mysql->getAllData($query);
    }
    public function getUsers($username)
    {
        $mysql = new MySQLUtil();
        $query = "select * from users where username = :username";
        $data = ['username' => $username];

        return $mysql->getData($query, $data);
    }

    public function deleteUser()
    {
        $mysql = new MySQLUtil();
        $pdo = $mysql->connected();
        if ($pdo != null) {
            $data = [
                'name' => $this->username,
                'pass' => $this->password,
            ];
            $sql = "DELETE FROM users WHERE password = :pass AND username = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
        }
    }
    public function getIDByUserName($username){
        $mysql = new MySQLUtil();
        $query = "select user_id from users where username = :username";
        $data = ['username' => $username];

        return $mysql->getData($query, $data);
    }
    public function getUserNameById($id){
        $mysql = new MySQLUtil();
        $query = "select username from users where user_id = :user_id";
        $data = ['user_id' => $id];

        return $mysql->getData($query, $data);
    }
}
