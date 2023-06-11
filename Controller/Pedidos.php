<?php
    require("Model/Pedidos.php");

    $pedido = new pedido();
    $listado = $pedido->listado();

    require("View/Pedidos.php");
?>