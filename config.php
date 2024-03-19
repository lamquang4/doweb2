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
        $result = mysqli_query($this->conn, "SELECT * FROM tb_ad WHERE username='$username'");
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
        $query = "SELECT * FROM tb_user LIMIT $start, $limit";
        $result1 = mysqli_query($this->conn, $query);
        return $result1;
    }
    public function getUserCount() {
        $query = "SELECT COUNT(*) as total FROM tb_user";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectUserById($idkh) {
        $query = "SELECT * FROM tb_user WHERE idkh = $idkh";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}
class Adinad extends Connection{
    public function selectAds($start,$limit) {
        $query = "SELECT * FROM tb_ad LIMIT $start, $limit";
        $result1 = mysqli_query($this->conn, $query);
        return $result1;
    }
    public function getAdCount() {
        $query = "SELECT COUNT(*) as total FROM tb_ad";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectAdById($idad) {
        $query = "SELECT * FROM tb_ad WHERE idad = $idad";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}

class Register extends Connection {
    public function registration($username, $email, $password, $password2, $sonha, $duong, $quan, $phuong, $fullname, $phone, $imguser, $gender, $birthday, $status) {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username ='$username' OR email ='$email'");
        
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            if ($password == $password2) {
                $random_id = $this->generateRandomId();
                $query = "INSERT INTO tb_user (idkh, username, email, password, sonha, duong, quan, phuong, fullname, phone, gender, imguser, birthday, status) 
                          VALUES ('$random_id', '$username', '$email', '$password', '$sonha','$duong','$quan','$phuong', '$fullname', '$phone', '$gender', 'assets/images/pic/usernew.png', '$birthday','normal')";
                mysqli_query($this->conn, $query);
                return 1;
            } else {
                return 100;
            }
        }
    }

    private function generateRandomId() {
        $idkh = "";
        do {
       
            $idkh = sprintf("%06d", rand(0, 999999));
          
            $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE idkh = '$idkh'");
        } while (mysqli_num_rows($result) > 0); 

        return $idkh;
    }
}


class Login extends Connection{
    public $idkh;
    public function login($usernamelogin,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username='$usernamelogin'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
$this->idkh = $row["idkh"];
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
    return $this->idkh;
   }

}

class Select extends Connection{
    public function selectUserById($idkh){
        $result = mysqli_query($this->conn,"SELECT * FROM tb_user WHERE idkh=$idkh");
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