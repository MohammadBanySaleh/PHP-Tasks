<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecommerce';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}

class crud{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addProduct($product_name, $product_brief_description, $product_description, $product_price, $product_image){
        $sql = "
        INSERT INTO products (product_name, product_brief_description, product_description, product_price, product_image) 
        VALUES (?,?,?,?,?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_brief_description, $product_description, $product_price, $product_image);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function getAllProducts(){
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleProduct($id){
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM products WHERE id=$id";
        $result = $this->db->query($sql);
        if ($result === true) {
            echo "record deleted successfully";
        }else {
            echo "Error deleting record: " . $this->db->error;
        }
    }

    public function updateProduct($id, $product_name, $product_brief_description, $product_description, $product_price, $product_image){
        $sql = "UPDATE products SET product_name=?, product_brief_description=?, product_description=?, product_price=?, product_image=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_brief_description, $product_description, $product_price, $product_image);
        mysqli_stmt_execute($stmt);
    }

}

$crudObj = new crud($conn);
?>