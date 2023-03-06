<?php

class MySQLUtil
{

    private $servername;
    private $password;
    private $username;
    private $myDB;
    private $conn;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->password = "";
        $this->username = "root";
        $this->myDB = "doanthaylam";
    }
    public function connected()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;port=3306;dbname=$this->myDB", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function disconnected()
    {
        $this->conn = null;
    }
    public function insertData($sql, $data = array())
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnected();
    }
    public function updateData($sql, $data = array())
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnected();
    }
    public function deleteData($sql, $data = array())
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnected();
    }
    public function getData($query, $username)
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($query);
        $stmt->execute($username);
        $pdo = $dbCon->disconnected();
        return $stmt->fetch();
    }
    public function getAllData($query)
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $pdo = $dbCon->disconnected();
        return $stmt->fetchAll();
    }
    public function getAllDataByValue($query,$data)
    {
        $dbCon = new MySQLUtil();
        $pdo = $dbCon->connected();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
        $pdo = $dbCon->disconnected();
        return $stmt->fetchAll();
    }
}

