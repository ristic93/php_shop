<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();

if ($user->isLogged() && $user->is_admin()) :

    $products = new Product();
    $products = $products->fetchAll();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>

        <div class="container mt-5">
            <a href="add_product.php" class="btn btn-success">Add Product</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Size</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <th scope="row"><?= ($product['product_id']); ?></th>
                            <td><?= ($product['name']); ?></td>
                            <td><?= ($product['price']); ?></td>
                            <td><?= ($product['size']); ?></td>
                            <td><img src="<?= ($product['image']); ?>" alt="<?= ($product['name']); ?>" height="40" width="40"></td>
                            <td><?= ($product['created_at']); ?></td>
                            <td>
                                <a href="edit_product.php?id=<?= $product['product_id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_product.php?id=<?= $product['product_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>


<?php endif; ?>