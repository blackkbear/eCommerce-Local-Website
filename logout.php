<!-- Metodo de cerrar session -->

<?php 
    session_start();
    session_destroy();
    header("Location: indexLogin.php");

?>