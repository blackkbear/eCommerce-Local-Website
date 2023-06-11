<?php
include "db.php";
if(isset($_GET['deleteid_order'])){
    $id_order=$_GET['deleteid_order'];

    $sql="DELETE from orders WHERE id_order=$id_order";
    $result=mysqli_query($conexion,$sql);
    if($result){
        //echo "Usuario eliminado correctamente";
        header('location:displayOrder.php');
    } else{
        die(mysqli_error($conexion));
    }
}

?>