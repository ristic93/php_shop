<?php

class Cart
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function add_to_cart($product_id, $user_id, $quantity)
    {
        $run = $this->conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $run->bind_param("iis", $user_id, $product_id, $quantity);
        $run->execute();
    }

    public function get_cart_items()
    {
        $run = $this->conn->prepare("SELECT p.product_id, p.name, p.price, p.size, p.image, c.quantity
        FROM cart c
        INNER JOIN products p
        ON c.product_id = p.product_id
        WHERE c.user_id = ?");

        $run->bind_param("i", $_SESSION['user_id']);
        $run->execute();
        $result = $run->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function destroy_cart()
    {
        $run = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $run->bind_param("i", $_SESSION['user_id']);
        $run->execute();
    }
}
