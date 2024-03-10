<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();

if ($user->isLogged() && $user->is_admin()) {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $product = new Product();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['photo_path'];

        $product->create($name, $price, $size, $image);

        header('location: index.php');
        exit();
    }
}

?>

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<form action="" method="POST">
    <input type="text" name="name" placeholder="Product Name">
    <input type="text" name="price" placeholder="Product Price">
    <input type="text" name="size" placeholder="Product Size">
    <input type="hidden" name="photo_path" id="photoPathInput">
    <div id="dropzone-upload" class="dropzone"></div>
    <input type="submit" value="Add Product">
</form>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo", // The name that will be used to transfer the file
        maxFilesize: 20, // MB
        acceptedFiles: "image/*",
        init: function() {
            this.on("success", function(file, response) {
                // Parse the JSON response
                const jsonResponse = JSON.parse(response);
                // Chech if the file was uploaded successfully
                if (jsonResponse.success) {
                    // Set the hidden input's value to the uploaded file's path
                    document.getElementById('photoPathInput').value = jsonResponse.photo_path;
                } else {
                    console.error(jsonResponse.error);
                }
            })
        }
    };
</script>