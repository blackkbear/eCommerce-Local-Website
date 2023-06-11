<?php
/*se llama al model para cargar la base*/
    require("Model/Usuarios.php");

    /*se crea la instancia y se ejecuta metodo*/

    $usuario = new Usuario();
    $listado = $usuario->listado();
/*se carga la vista para usar metodo listado*/
    require("View/usuariosLogin.php");
?>