<?php

// inheretance ili nasledjivanje klasa
class Order extends Cart
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function create($delivery_address)
    {
        $run = $this->conn->prepare("INSERT INTO orders (user_id, delivery_address) VALUES (?, ?)");
        $run->bind_param("is", $_SESSION['user_id'], $delivery_address);
        $run->execute();

        $order_id = $this->conn->insert_id;

        $cart_items = $this->get_cart_items();

        $run = $this->conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");

        foreach ($cart_items as $item) {
            $run->bind_param("iis", $order_id, $item['product_id'], $item['quantity']);
            $run->execute();
        }

        $this->destroy_cart();
    }

    public function get_orders()
    {
        $user_id = $_SESSION['user_id'];

        $sql = "
        SELECT
            orders.order_id,
            orders.delivery_address,
            orders.created_at,
            order_items.quantity,
            products.name,
            products.size,
            products.image,
            products.price
        FROM orders
        INNER JOIN order_items ON orders.order_id = order_items.order_id
        INNER JOIN products ON order_items.product_id = products.product_id
        WHERE orders.user_id = ?
        ";

        $run = $this->conn->prepare($sql);
        $run->bind_param('i', $user_id);
        $run->execute();

        $result = $run->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
