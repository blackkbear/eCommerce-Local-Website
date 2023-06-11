<?php 
include "db.php";

session_start();
/* Si no hay usuario, nos mandara al login, no pueden llegar al admin sin el login. */
if(!isset($_SESSION["usuario"])){
    ?>
    <h1>sa</h1>
    <?php

    header("Location: indexLogin.php");
}

if(isset($_POST['submit'])){
    $date_order=$_POST['date_order'];
    $state_order=$_POST['state_order'];
    $quantity_order=$_POST['quantity_order'];
    $price_order=$_POST['price_order'];
    $fk_id_user=$_POST['fk_id_user'];

    $sql= "INSERT INTO orders (date_order, state_order, quantity_order, price_order, fk_id_user)
    values('$date_order', '$state_order', '$quantity_order', '$price_order', $fk_id_user)";
    $result=mysqli_query($conexion, $sql);
    if($result){
        //echo "Información insertada correctamente";
        header('location:displayOrder.php');
      }else{
        die (mysqli_error($conexion));
      }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Pedidos - Kento</title>

    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>

<body>

<div class="nav-main">

<!-- <div class="search">
    <li>
        <i class='bx bx-search-alt'></i>
        <input type="text" placeholder="Buscar...">
        
    </li>
    </div> -->


<div class= "botonCerrar">
<li>
        <a href="logout.php">
            <span class="cerrar_sesion">Cerrar sesión</span>
        </a>
        
    </li>
    </div>
    



    <div class= "usuarioIniciadoAdmin">
<li>
<?php echo "Bienvenido " .$_SESSION["usuario"] ?>
    </li>

    

    </div>


<div class='corte'></div>

</div>

    <div class="sidebarLogo">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-component'></i>
                <div class="logo_name">Kento</div>

            </div>

            <div id="toggle"></div>

        </div>
        <ul class="nav_list">
            <li>
                <a href="indexAdmin.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Inicio</span>
                </a>
                 <!-- <span class="tooltip">Inicio</span>  -->
            </li>
            <li>
                <a href="displayOrder.php">
                    <i class='bx bx-cart'></i>
                    <span class="links_name">Pedidos</span>
                </a>
                 <span class="tooltip">Pedidos</span> 
            </li>

            <li>
                <a href="CRUD-Productos.php">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="links_name">Productos</span>
                </a>
                 <span class="tooltip">Productos</span> 
            </li>

            <li>
                <a href="displayUsuario.php">
                    <i class='bx bx-briefcase-alt'></i>
                    <span class="links_name">Usuarios</span>
                </a>
                 <span class="tooltip">Usuarios</span> 
            </li>

            <li>
                <a href="ayudaAdmin.php">
                    <i class='bx bx-help-circle'></i>
                    <span class="links_name">Ayuda</span>
                </a>
                 <span class="tooltip">Ayuda</span> 
            </li>
        </ul>
    </div>
    <div class = "home_content">
    <div class="Content tablas my-5">
        <form method="POST">
            <div class="form-group">
                <label>Fecha del pedido</label>
                <input type="text" class="form-control" placeholder="Ingresa la fecha de entrega del pedido:" name="date_order" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Estado del pedido</label>
                <input type="text" class="form-control" placeholder="Ingresa el estado del pedido:" name="state_order" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Cantidad de productos</label>
                <input type="text" class="form-control" placeholder="Ingresa la cantidad de productos:" name="quantity_order" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Coste total</label>
                <input type="text" class="form-control" placeholder="Ingresa el coste total del pedido:" name="price_order"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>ID Usuario Asociado</label>
                <input type="text" class="form-control" placeholder="Ingresa el ID del Usuario Asociado:" name="fk_id_user"
                    autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
        </form>
    </div>

    </div>
    <div id="toggle"></div>

</body>

<!-- codigo de responsive sidebar -->
<script>
let toggle = document.querySelector("#toggle");
let sidebarLogo = document.querySelector(".sidebarLogo");

/* sig. codigo es para que al seleccionar cualquier sitio, se pueda quitar el sidebar */
document.onclick = function(e){
        if(e.target.id !== 'sidebarLogo' && e.target.id !== 'toggle')
        {
            toggle.classList.remove('active');
        sidebarLogo.classList.remove('active');
        }
    }

   /*  para habilitar y deshabilitar el abrir sidebar */
toggle.onclick = function(){
    toggle.classList.toggle('active');
    sidebarLogo.classList.toggle('active');
  }

</script>



</html>