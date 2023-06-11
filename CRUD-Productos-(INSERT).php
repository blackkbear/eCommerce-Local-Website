


<?php 

include "db.php";

session_start();
/* Si no hay usuario, nos mandara al login, no pueden llegar al admin sin el login. */
if(!isset($_SESSION["usuario"])){
   

    header("Location: indexLogin.php");
}
    
    $alerte='';
    if(!empty($_POST)){  
        if(empty($_POST['name_product']) || empty($_POST['quantity']) || empty($_POST['price'])){
            $alerte='<p>Debe de llenar todos los campos</p>';
        }else{
            $nombre = $_POST['name_product'];
            $cantidad = $_POST['quantity'];
            $precio = $_POST['price'];
            $tipo_producto = $_POST['id_type_product'];
            $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
                $query = mysqli_query($conexion, "INSERT INTO PRODUCTS (name_product, quantity, price, imagen, fk_id_type_product) VALUES ('$nombre','$cantidad','$precio','$Imagen','$tipo_producto');");        
                if($query)
                {
                    $alerte='<p class="msg_save">El producto se ha creado correctamente</p>';
                }else{
                    $alerte='<p class="msg_error">Error al crear el producto</p>';
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto - Kento</title>
    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="estilosCRUD_P.css">
    <style>
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
<div class="Content tablas my-5">
    <br><br>
        <h1>Registre un producto</h1>
        <hr>
        <div class="alerte"><?php echo $alerte ?></div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_product">Nombre</label>
                <input class="form-control" id="name_product" type="text" name="name_product" placeholder="Nombre del producto">
            </div>
            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input class="form-control" id="quantity" type="text" name="quantity" placeholder="Cantidad">
            </div>
            <div class="form-group">
                 <label for="price">Precio</label>
                 <input class="form-control" id="price" type="text" name="price" placeholder="Precio">
            </div>
            <div class="form-group">
                <label for="id_type_product">Tipo de producto</label>
                <?php 
                    $query_box = mysqli_query($conexion, "select * from TYPE_PRODUCTS");
                    $result_box = mysqli_num_rows($query_box);     
                ?>
                <select class="form-control" name="id_type_product" id="id_type_product">
                    <?php 
                        if($result_box > 0){
                            while($id_type_product = mysqli_fetch_array($query_box)){
                    ?>
                    <option value=<?php echo $id_type_product["id_type_product"]; ?>><?php echo $id_type_product["descrip_product"]; ?></option>
                    <?php
                            }
                        }    
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Foto</label>
                <input class="form-control" type="file" REQUIRED name="Imagen" id="Imagen">
            </div><br>
            <input type="submit" value="Registar" class="btn btn-primary">
        </form>
        <br>
        <a href="CRUD-Productos.php" class="btn_cancelar">Volver</a>
</div>

</div>
<div id="toggle"></div>

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
</body>
</html>