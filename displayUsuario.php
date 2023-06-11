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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Usuarios - Kento</title>

    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
    </nav>

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
        <button class="btn btn-primary my-5"><a href="addUsuario.php"  class="text-light">Añadir Usuario</a>
    </button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Número de Teléfono</th>
      <th scope="col">Estado del Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Tipo de Usuario</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT * from users";
  $result=mysqli_query($conexion, $sql);
  if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id_user=$row['id_user'];
        $name_user=$row['name_user'];
        $surnames_user=$row['surnames_user'];
        $phone_user=$row['phone_user'];
        $state_user=$row['state_user'];
        $email_user=$row['email_user'];
        $password_user=$row['password_user'];
        $fk_id_type_user=$row['fk_id_type_user'];
        echo'<tr>
        <th scope="row">'.$id_user.'</th>
        <td>'.$name_user.'</td>
        <td>'.$surnames_user.'</td>
        <td>'.$phone_user.'</td>
        <td>'.$state_user.'</td>
        <td>'.$email_user.'</td>
        <td>'.$password_user.'</td>
        <td>'.$fk_id_type_user.'</td>
        <td>
        <button class="btn btn-primary"><a href="updateUsuario.php?updateid_user='.$id_user.'" class="text-light">Modificar</a></button>
        <button class="btn btn-danger"><a href="deleteUsuario.php?deleteid_user='.$id_user.'">Eliminar</a></button>
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