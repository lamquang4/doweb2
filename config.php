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

class Loginad extends Connection{
    public $idad;
    public function loginad($username,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM tb_manager WHERE username='$username'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
$this->idad = $row["idad"];
return 1;
            }
            else{
                return 10;
            }
        }
     
    }
   public function idUserad(){
    return $this->idad;
   }

}

class Userinad extends Connection{
    public function selectUsers($start,$limit) {
        $query = "SELECT * FROM tb_customer LIMIT $start, $limit";
        $result1 = mysqli_query($this->conn, $query);
        return $result1;
    }
    public function getUserCount() {
        $query = "SELECT COUNT(*) as total FROM tb_customer";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectUserByUsername($username) {
        $query = "SELECT * FROM tb_customer WHERE username = $username";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}
class Adinad extends Connection{
    public function selectAds($start,$limit) {
        $query = "SELECT * FROM tb_manager LIMIT $start, $limit";
        $result1 = mysqli_query($this->conn, $query);
        return $result1;
    }
    public function getAdCount() {
        $query = "SELECT COUNT(*) as total FROM tb_manager";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectAdById($idad) {
        $query = "SELECT * FROM tb_manager WHERE idad = $idad";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}

class Register extends Connection {
    public function registration($username, $email, $password, $password2, $sonha, $duong, $quan, $phuong, $tp, $fullname, $phone, $imguser, $gender, $birthday, $status) {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_customer WHERE username ='$username' OR email ='$email'");
        
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            if ($password == $password2) {
               
                $query = "INSERT INTO tb_customer ( username, email, password, sonha, duong, quan, phuong, tp, fullname, phone, gender, imguser, birthday, status) 
                          VALUES ( '$username', '$email', '$password', '$sonha','$duong','$quan','$phuong', '$tp', '$fullname', '$phone', '$gender', 'assets/images/pic/usernew.png', '$birthday','normal')";
                mysqli_query($this->conn, $query);
                return 1;
            } else {
                return 100;
            }
        }
    }


}


class Login extends Connection{
    public $username;
    public function login($usernamelogin,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM tb_customer WHERE username='$usernamelogin'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
$this->username = $row["username"];
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
    return $this->username;
   }

}

class Select extends Connection{
    public function selectUserById($username){
        $result = mysqli_query($this->conn,"SELECT * FROM tb_customer WHERE username='$username'");
        return mysqli_fetch_assoc($result);
    }
 
}


class Product extends Connection {
    
    public function selectProducts($start, $limit, $searchText = null, $searchType = null, $minPrice = null, $maxPrice = null, $searchBrand = null) {
        $query = "SELECT * FROM product WHERE 1=1";
    
        if (!empty($searchText)) {
            $query .= " AND name LIKE '%$searchText%'";
        }
    
        if (!empty($searchType)) {
            $query .= " AND type LIKE '%$searchType%'";
        }
    
        if (!empty($minPrice) && !empty($maxPrice)) {
            $query .= " AND price BETWEEN $minPrice AND $maxPrice";
        }
    
        if (!empty($searchBrand)) {
            $query .= " AND brand = '$searchBrand'";
        }
    
        $query .= " LIMIT $start, $limit";
    
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function getProductCount($searchText = null, $searchType = null, $minPrice = null, $maxPrice = null, $searchBrand = null) {
        $query = "SELECT COUNT(*) as total FROM product WHERE 1=1";
    
        if (!empty($searchText)) {
            $query .= " AND name LIKE '%$searchText%'";
        }
    
        if (!empty($searchType)) {
            $query .= " AND type LIKE '%$searchType%'";
        }
    
        if (!empty($minPrice) && !empty($maxPrice)) {
            $query .= " AND price BETWEEN $minPrice AND $maxPrice";
        }
    
        if (!empty($searchBrand)) {
            $query .= " AND brand = '$searchBrand'";
        }
    
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectProductsById($id) {
        $query = "SELECT * FROM product WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

  
}


?>