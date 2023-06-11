<?php
    include("db.php");

    session_start();

    if($conexion===false){
        die("connection error");

    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $usuario=$_POST['usuario'];
        $password=$_POST['password'];

        $consulta = "SELECT * FROM users WHERE email_user = '$usuario' and password_user = '$password' ";
    

    }

    $resultado = mysqli_query($conexion,$consulta);
    /* fila variable  */
    $row = mysqli_fetch_array($resultado);

    if($row["fk_id_type_user"]== "1" ){
        
         $_SESSION["usuario"]=$usuario; 

        header("location: indexAdmin.php"); 

    }else if($row["fk_id_type_user"] == "2"){
         $_SESSION["usuario"]=$usuario; 

        header("location: indexSesionIniciadaCliente.php"); 


    }else{
        include("indexLogin.php");
        ?>
        <h1>ERROR DE VALIDACION</h1>
        <?php
    }

     mysqli_free_result($resultado);
    mysqli_close($conexion); 

?>