<?php 
    include "db.php";
?>
<?php 
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
    <script src="https://kit.fontawesome.com/0dd36181c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Mantenimiento productos - Kento</title>
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
    <div class = "container">
        <br><br><br><br><br><br>
        <a class="btn btn-primary"  href="CRUD-Productos-(INSERT).php">Crear</i></a>
        <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">DML</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                $query = mysqli_query($conexion, "SELECT p.id_product, p.name_product, p.quantity, p.price, t.descrip_product, p.imagen FROM PRODUCTS p inner join TYPE_PRODUCTS t ON p.fk_id_type_product = t.id_type_product WHERE p.state=1 ORDER BY id_product");
                $result = mysqli_num_rows($query);
                if($result>0)
                {
                    while($row = mysqli_fetch_assoc($query))
                    {

            ?> 
                <tr class="detalle">
                    <td><?php echo $row["id_product"];?></td>
                    <td><?php echo $row["name_product"];?></td>
                    <td><?php echo $row["quantity"];?></td>
                    <td><?php echo $row["price"];?></td>
                    <td><?php echo $row["descrip_product"];?></td>
                    <td><img style="width:20%" src="data:image/png;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
                    <td><a class="btn btn-primary" href="CRUD-Productos-(UPDATE).php?id=<?php echo $row["id_product"];?>"><i class="fa-solid fa-square-pen"></i></a> | <a class="btn btn-danger" href="CRUD-Productos-(DELETE).php?id=<?php echo $row["id_product"];?>"><i class="fa-solid fa-trash"></i></i></a></td>
                </tr>

                <?php
                    }
                }
                ?> 
                </tbody>           
        </table>

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