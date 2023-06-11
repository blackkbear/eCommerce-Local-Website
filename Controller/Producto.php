<?php
    require("Model/Producto.php");

    $product = new Product();
    $listProducts = $product->listProducts();

    require("View/Product.php");
?>