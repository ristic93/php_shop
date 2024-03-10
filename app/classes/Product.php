<?php

class Product
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function fetchAll() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function read($product_id) {
        $run = $this->conn->prepare("SELECT * FROM products WHERE product_id=?");
        $run->bind_param("i", $product_id);
        $run->execute();
        $result = $run->get_result();
        return $result->fetch_assoc();
    }
}
