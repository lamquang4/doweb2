<?php
session_start();


class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "reglog";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}

class Register extends Connection{
    public function registration($username,$email,$password,$password2){
        $duplicate = mysqli_query($this->conn,"SELECT * FROM tb_user WHERE username ='$username'");
   if(mysqli_num_rows($duplicate)>0){
    return 10;
   }else{
    if($password == $password2){
       $query = "INSERT INTO tb_user VALUE('','$username','$email','$password')"; 
   mysqli_query($this->conn,$query);
   return 1;
   
    }else{
        return 100;
    }
   }
    }
}
class Login extends Connection{
    public $id;
    public function login($usernamelogin,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username='$usernamelogin'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
$this->id = $row["id"];
return 1;
            }
            else{
                return 10;
            }
        }
        else{
            return 100;
        }
    }
   public function idUser(){
    return $this->id;
   }
}

class Select extends Connection{
    public function selectUserById($id){
        $result = mysqli_query($this->conn,"SELECT * FROM tb_user WHERE id=$id");
        return mysqli_fetch_assoc($result);
    }
}
class Product extends Connection {
    public function selectProducts($start, $limit) {
        $query = "SELECT * FROM product LIMIT $start, $limit";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function getProductCount() {
        $query = "SELECT COUNT(*) as total FROM product";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectProductsById($id) {
        $query = "SELECT * FROM product WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}


?>