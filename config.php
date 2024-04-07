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

class Registerad extends Connection {
    public function registration($username, $email, $password, $password2, $fullname, $phone, $role, $status) {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_manager WHERE username ='$username' OR email ='$email' OR phone='$phone'");
        
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            if ($password == $password2) {
               
                $query = "INSERT INTO tb_manager ( username, email, password, fullname, phone, role, status) 
                          VALUES ( '$username', '$email', '$password', '$fullname', '$phone', '$role', 1)";
                mysqli_query($this->conn, $query);
                return 1;
            } else {
                return 100;
            }
        }
    }


}
class Loginad extends Connection{
    public $username;
    public function loginad($username,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM tb_manager WHERE username='$username'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
$this->username = $row["username"];
return 1;
            }
            else{
                return 10;
            }
        }else{
            return 100;
        }
     
    }
   public function idUserad(){
    return $this->username;
   }
   public function getAdStatus($username) {
    $result = mysqli_query($this->conn, "SELECT status FROM tb_manager WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        return $row['status'];
    }
    return null;
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
    public function selectAdById($username) {
        $query = "SELECT * FROM tb_manager WHERE username = '$username'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}

class Register extends Connection {
    public function registration($username, $email, $password, $password2, $sonha, $duong, $district, $ward, $city, $fullname, $phone, $imguser, $gender, $birthday, $status) {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_customer WHERE username ='$username' OR email ='$email'");
        
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            if ($password == $password2) {
               
                $query = "INSERT INTO tb_customer ( username, email, password, sonha, duong, district, ward, city, fullname, phone, gender, imguser, birthday, status) 
                          VALUES ( '$username', '$email', '$password', '$sonha','$duong','$district','$ward', '$city', '$fullname', '$phone', '$gender', 'assets/images/pic/usernew.png', '$birthday', 1)";
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

   public function getUserStatus($username) {
    $result = mysqli_query($this->conn, "SELECT status FROM tb_customer WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        return $row['status'];
    }
    return null;
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
     $query .= " ORDER BY date_add DESC";
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

    public function selectProducts1($start, $limit, $searchText = null, $searchType = null, $minPrice = null, $maxPrice = null, $searchBrand = null) {
        $query = "SELECT * FROM product WHERE status=1";
    
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
     $query .= " ORDER BY date_add DESC";
        $query .= " LIMIT $start, $limit";
    
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function getProductCount1($searchText = null, $searchType = null, $minPrice = null, $maxPrice = null, $searchBrand = null) {
        $query = "SELECT COUNT(*) as total FROM product WHERE status=1";
    
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

  
}


class Order extends Connection{

    public function selectOrdersByUsername($username,$start,$limit) {
        $query = "SELECT * FROM tb_order WHERE username = '$username' LIMIT $start, $limit ";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }
    public function getOrderCount1($username) {
        $query = "SELECT COUNT(*) as total FROM tb_order WHERE username = '$username'";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function selectOrdersById1($idorder, $username) {
        $query = "SELECT * FROM tb_order WHERE idorder = '$idorder' AND username = '$username'";
        $result2 = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result2);
    }


    public function selectOrders($start,$limit) {
        $query = "SELECT * FROM tb_order ORDER BY username LIMIT $start, $limit";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }
    public function getOrderCount() {
        $query = "SELECT COUNT(*) as total FROM tb_order";
        $result2 = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result2);
        return $data['total'];
    }
    public function selectOrdersById($idorder) {
        $query = "SELECT * FROM tb_order WHERE idorder = '$idorder'";
        $result2 = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result2);
    }
}

class Orderdetail extends Connection{
    public function selectOrdertails(){
        $query = "SELECT * FROM order_detail";
        $result3 = mysqli_query($this->conn, $query);
        return $result3;  
    }
    public function selectOrderdetailsById($idorder) {
        $query = "SELECT * FROM order_detail WHERE idorder = '$idorder'";
        $result3 = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result3);
    }
    public function selectOrdertailsandProduct($orderId){
        $query = "SELECT od.*, p.* FROM order_detail od
        INNER JOIN product p ON od.id = p.id
        WHERE od.idorder = '$orderId'";
        $result3 = mysqli_query($this->conn, $query);
        return $result3;  
    }

    
}
?>