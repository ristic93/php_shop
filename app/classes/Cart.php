<?php

class Cart
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function add_to_cart($product_id, $user_id)
    {
        $run = $this->conn->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)");
        $run->bind_param("ii", $user_id, $product_id);
        $run->execute();
    }

    public function get_cart_items()
    {
        $run = $this->conn->prepare("SELECT p.product_id, p.name, p.price, p.size, p.image
        FROM cart c
        INNER JOIN products p
        ON c.product_id = p.product_id
        WHERE c.user_id = ?");

        $run->bind_param("i", $_SESSION['user_id']);
        $run->execute();
        $result = $run->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
