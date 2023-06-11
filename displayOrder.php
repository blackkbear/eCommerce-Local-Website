<?php 
include "db.php";

session_start();
/* Si no hay usuario, nos mandara al login, no pueden llegar al admin sin el login. */
if(!isset($_SESSION["usuario"])){


    header("Location: indexLogin.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <button class="btn btn-primary my-5"><a href="addOrder.php"  class="text-light">Añadir Pedido</a>
    </button>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Pedido</th>
      <th scope="col">Fecha del pedido</th>
      <th scope="col">Estado del pedido</th>
      <th scope="col">Cantidad de productos</th>
      <th scope="col">Coste del pedido</th>
      <th scope="col">ID Usuario Asociado</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>

  <div id="toggle"></div>
  
  <tbody>

  <?php
  $sql = "SELECT * from orders";
  $result=mysqli_query($conexion, $sql);
  if($result){
      while($row=mysqli_fetch_assoc($result)){    
        $id_order=$row['id_order'];
        $date_order=$row['date_order'];
        $state_order=$row['state_order'];
        $quantity_order=$row['quantity_order'];
        $price_order=$row['price_order'];
        $fk_id_user=$row['fk_id_user'];
        echo'<tr>
        <th scope="row">'.$id_order.'</th>
        <td>'.$date_order.'</td>
        <td>'.$state_order.'</td>
        <td>'.$quantity_order.'</td>
        <td>'.$price_order.'</td>
        <td>'.$fk_id_user.'</td>
        <td>
        <button class="btn btn-primary"><a href="updateOrder.php?updateid_order='.$id_order.'" class="text-light">Modificar</a></button>
        <button class="btn btn-danger"><a href="deleteOrder.php?deleteid_order='.$id_order.'">Eliminar</a></button>
        </td>
        </tr>';
      }
  }

 ?>
 <td>
     
 </td>
    
  </tbody>
</table>

    </div>

    </div>
    

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