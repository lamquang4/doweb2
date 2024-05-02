<?php
if (basename($_SERVER['PHP_SELF']) === 'config.php') {
   
    header('Location: index.php');
    exit();
}
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
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $password2 = $this->conn->real_escape_string($password2);
        $fullname = $this->conn->real_escape_string($fullname);
        $phone = $this->conn->real_escape_string($phone);
        $status = $this->conn->real_escape_string($status);
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
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);
        $result = mysqli_query($this->conn, "SELECT * FROM tb_manager WHERE username='$username'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if(md5($password) == $row["password"]){
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

// tim kiem status
    public function selectUsersByStatus($status, $start, $limit) {
        $query = "SELECT * FROM tb_customer WHERE status = '$status' ORDER BY username LIMIT $start, $limit";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }

    public function getUserCountByStatus($status) {
        $query = "SELECT COUNT(*) as total FROM tb_customer WHERE status = '$status'";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
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

    // tim kiem status
    public function selectAdsByStatus($status, $start, $limit) {
        $query = "SELECT * FROM tb_manager WHERE status = '$status' ORDER BY username LIMIT $start, $limit";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }

    public function getAdCountByStatus($status) {
        $query = "SELECT COUNT(*) as total FROM tb_manager WHERE status = '$status'";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
}

class Register extends Connection {
    public function registration($username, $email, $password, $password2, $sonha, $duong, $district, $ward, $city, $fullname, $phone, $imguser, $gender, $birthday, $status) {
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $password2 = $this->conn->real_escape_string($password2);
        $sonha = $this->conn->real_escape_string($sonha);
        $duong = $this->conn->real_escape_string($duong);
        $district = $this->conn->real_escape_string($district);
        $ward = $this->conn->real_escape_string($ward);
        $city = $this->conn->real_escape_string($city);
        $fullname = $this->conn->real_escape_string($fullname);
        $phone = $this->conn->real_escape_string($phone);
        $imguser = $this->conn->real_escape_string($imguser);
        $gender = $this->conn->real_escape_string($gender);
        $birthday = $this->conn->real_escape_string($birthday);
        $status = $this->conn->real_escape_string($status);
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
        $usernamelogin = $this->conn->real_escape_string($usernamelogin);
        $password = $this->conn->real_escape_string($password);
        $result = mysqli_query($this->conn, "SELECT * FROM tb_customer WHERE username='$usernamelogin'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if(md5($password) == $row["password"]){
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
     $query .= " ORDER BY date_add";
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

    // tim kiem status
    public function selectProductsByStatus($status, $start, $limit) {
        $query = "SELECT * FROM product WHERE status = '$status' ORDER BY date_add LIMIT $start, $limit";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }

    public function getProductCountByStatus($status) {
        $query = "SELECT COUNT(*) as total FROM product WHERE status = '$status'";
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
        }elseif (!empty($minPrice)) {
            $query .= " AND price >= $minPrice";
        } elseif (!empty($maxPrice)) {
            $query .= " AND price <= $maxPrice";
        }
    
        if (!empty($searchBrand)) {
            $query .= " AND brand = '$searchBrand'";
        }

        $query .= " ORDER BY date_add";
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
        }elseif (!empty($minPrice)) {
            $query .= " AND price >= $minPrice";
        } elseif (!empty($maxPrice)) {
            $query .= " AND price <= $maxPrice";
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
        $query = "SELECT * FROM tb_order WHERE username = '$username' ORDER BY dateorder DESC LIMIT $start, $limit";
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

// hiện tất cả
    public function selectOrders($start,$limit,$dateStart = null,$dateEnd = null,$searchDistrict = null,$searchWard = null,$searchUsername = null, $searchStatus = null) {
        $query = "SELECT * FROM tb_order WHERE 1=1";

        if (!empty($dateStart) && !empty($dateEnd)) {
            $query .= " AND dateorder BETWEEN '$dateStart' AND '$dateEnd'";
        }elseif (!empty($dateStart)) {
            $query .= " AND dateorder >= '$dateStart'";
        } elseif (!empty($dateEnd)) {
            $query .= " AND dateorder <= '$dateEnd'";
        }
   
        if (!empty($searchDistrict)) {
            $query .= " AND district = '$searchDistrict'";
        }
        if (!empty($searchWard)) {
            $query .= " AND ward = '$searchWard'";
        }
        if (!empty($searchUsername)) {
            $query .= " AND username = '$searchUsername'";
        }
        if (!empty($searchStatus) || $searchStatus === '0') {
            $query .= " AND status = $searchStatus";
        }
        $query .= " ORDER BY username";
        $query .= " LIMIT $start, $limit";
        $result2 = mysqli_query($this->conn, $query);
        return $result2;
    }
    public function getOrderCount($dateStart = null,$dateEnd = null,$searchDistrict = null,$searchWard = null,$searchUsername = null, $searchStatus = null) {
        $query = "SELECT COUNT(*) as total FROM tb_order WHERE 1=1";
        
        if (!empty($dateStart) && !empty($dateEnd)) {
            $query .= " AND dateorder BETWEEN '$dateStart' AND '$dateEnd'";
        }elseif (!empty($dateStart)) {
            $query .= " AND dateorder >= '$dateStart'";
        } elseif (!empty($dateEnd)) {
            $query .= " AND dateorder <= '$dateEnd'";
        }

      if (!empty($searchDistrict)) {
            $query .= " AND district = '$searchDistrict'";
        }
        if (!empty($searchWard)) {
            $query .= " AND ward = '$searchWard'";
        }
        if (!empty($searchUsername)) {
            $query .= " AND username = '$searchUsername'";
        }
        if (!empty($searchStatus) || $searchStatus === '0') {
            $query .= " AND status = $searchStatus";
        }
        $result2 = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result2);
        return $data['total'];
    }

    public function selectOrdersById($idorder) {
        $query = "SELECT * FROM tb_order WHERE idorder = '$idorder'";
        $result2 = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result2);
    }

    // tim tong tien status = 1 lon nhat cua username do
    public function selectTopOrder($dateStart = null,$dateEnd = null){

$query ="SELECT *, SUM(total) AS total_total
FROM tb_order
WHERE status = 1 ";

 if (!empty($dateStart) && !empty($dateEnd)) {
    $query .= " AND dateorder BETWEEN '$dateStart' AND '$dateEnd'";
}elseif (!empty($dateStart)) {
    $query .= " AND dateorder >= '$dateStart'";
} elseif (!empty($dateEnd)) {
    $query .= " AND dateorder <= '$dateEnd'";
}
$query .= " GROUP BY username ORDER BY total_total DESC";
$query .= " LIMIT 5";
       $result = mysqli_query($this->conn, $query);
       return $result;
    }
   
    public function selectOrderWithMaxTotal($username, $dateStart = null, $dateEnd = null){
        $query = "SELECT o.*, c.*, SUM(o.total) AS total_total FROM tb_order o INNER JOIN tb_customer c ON c.username = o.username WHERE o.status = 1 AND o.username = '$username' ";
        
        if (!empty($dateStart) && !empty($dateEnd)) {
            $query .= " AND o.dateorder BETWEEN '$dateStart' AND '$dateEnd'";
        } elseif (!empty($dateStart)) {
            $query .= " AND o.dateorder >= '$dateStart'";
        } elseif (!empty($dateEnd)) {
            $query .= " AND o.dateorder <= '$dateEnd'";
        }
        
        $query .= " GROUP BY o.username ORDER BY total_total DESC LIMIT 1"; // Sử dụng LIMIT 1 để chỉ lấy đơn hàng có tổng giá trị lớn nhất
        
        $result = mysqli_query($this->conn, $query);
        
        return $result;
    }

    public function selectOrderWithMaxTotal1($username,$dateStart = null,$dateEnd = null){
        $query = "SELECT * FROM tb_order WHERE status = 1 AND username = '$username' ";
        if (!empty($dateStart) && !empty($dateEnd)) {
            $query .= " AND dateorder BETWEEN '$dateStart' AND '$dateEnd'";
        }elseif (!empty($dateStart)) {
            $query .= " AND dateorder >= '$dateStart'";
        } elseif (!empty($dateEnd)) {
            $query .= " AND dateorder <= '$dateEnd'";
        }
        $query .= " ORDER BY  username";
         $result = mysqli_query($this->conn, $query);
         return $result;
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