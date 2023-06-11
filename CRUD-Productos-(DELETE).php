

<?php
    include "db.php";

    session_start();
    /* Si no hay usuario, nos mandara al login, no pueden llegar al admin sin el login. */
    if(!isset($_SESSION["usuario"])){
       
    
        header("Location: indexLogin.php");
    }

    if(!empty($_POST)){
        $id_product = $_POST['id_product'];
        $query_delete = mysqli_query($conexion, "UPDATE PRODUCTS SET state=0 WHERE id_product = '$id_product';");
        if($query_delete){
            header("location: CRUD-Productos.php");
        }else{
            echo "Error durante su eliminacion";
        }
    }

    if(empty($_REQUEST['id']))
    {
        header("location: CRUD-Productos.php");
    }else{
        $id_product = $_GET['id'];
        $sql = mysqli_query($conexion, "SELECT p.name_product, p.imagen, t.descrip_product, p.fk_id_type_product FROM PRODUCTS p inner join TYPE_PRODUCTS t ON p.fk_id_type_product = t.id_type_product WHERE p.id_product=$id_product");
        $result_sql = mysqli_num_rows($sql);
        if($result_sql>0){
            while($data=mysqli_fetch_array($sql)){
                $nombre = $data['name_product'];
                $tipo_producto = $data['descrip_product'];
            }
        }else{
            header("location: CRUD-Productos.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
    <link rel="stylesheet" href="estilosCRUD_P.css">
    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .btn_aceptar{
            width: 20%;
            background: #BC4D47;
            color: #fff;
            border-radius: 6px;
        }
        .btn_cancelar{
            font-size: 12pt;
            background: #F1F2F4;
            padding: 10px;
            color: #020301;
            letter-spacing: 1px;
            border: 0;
            cursor: pointer;
            margin: 15px auto;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
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
                <a href="displayOrder.php">
                    <i class='bx bx-briefcase-alt'></i>
                    <span class="links_name">Usuarios</span>
                </a>
                 <span class="tooltip">Usuarios</span> 
            </li>

            <li>
                <a href="adminAyuda.php">
                    <i class='bx bx-help-circle'></i>
                    <span class="links_name">Ayuda</span>
                </a>
                 <span class="tooltip">Ayuda</span> 
            </li>
        </ul>
    </div>
    <div class = "container">
        <div class="text">Mantenimiento de Empresa - Página Administradora</div><br><br><br><br>
            <center>
                <h3>¿Esta seguro de eliminar el siguiente registro?</h3><br>
            <p>Nombre: <span><?php echo $nombre ?></span></p><br>
            <p>Tipo: <span><?php echo $tipo_producto ?></span></p><br>

            <form method="post" action="">
                <input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
                <input type="submit" value="Eliminar" class="btn_aceptar">
                <br>
                <a href="CRUD-Productos.php" class="btn_cancelar">Cancelar</a>
            </form>
            </center>
        

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