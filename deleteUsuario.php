<?php
include "db.php";
if(isset($_GET['deleteid_user'])){
    $id_user=$_GET['deleteid_user'];

    $sql="DELETE from users WHERE id_user=$id_user";
    $result=mysqli_query($conexion,$sql);
    if($result){
        //echo "Usuario eliminado correctamente";
        header('location:displayUsuario.php');
    } else{
        die(mysqli_error($conexion));
    }
}

?>