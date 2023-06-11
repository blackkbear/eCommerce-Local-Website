<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de productos a comprar</title>
    <script src="https://kit.fontawesome.com/0dd36181c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilo_Primario.css">
    <link rel="stylesheet" href="estiloSecundario.css">
    <style>
        .contenido{
            width: 90%;
            max-width: 100%;
            margin: 50px auto;
            display: grid;
            grid-gap: 20px;
            background: rgb(231, 239, 247);
            grid-template-columns: repeat(2, 1fr);
            grid-template-areas:"boxImagen boxTexto";
        }
        .boxImagen{
            grid-area: boxImagen;
        }
        .boxTexto{
            grid-area: boxTexto;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="inicio">
            <div class="seccion1">
                <div class="s1SubSec1"> <!--NOTA: s1SubSec1 =  Seccion 1 de la subseccion 1-->
                    <h4><a href="indexSesionIniciadaCliente.php" style="color: #fff;">Home</a></h4>
                </div>
                <div class="s1SubSec2">

                </div>
                <div class="s1SubSec3">
                    <a class="carrito" href="carritoSesion.php"><i class="fa-solid fa-cart-shopping iconCarrito"></i></a>
                </div>

                <div class= "usuarioIniciadoCliente">
        <li>
        <?php echo "Bienvenido " .$_SESSION["usuario"] ?>
            </li>

            

            </div>

                <div class="s1SubSec4">
                <a href="logout.php">
                    <span class="cerrar_sesion">Cerrar sesión</span>
                </a>
                </div>
            </div>
            <ul class="seccion2">
                    <li><a href="categoriaProductoSesion.php?id=1">Teclado</a></li>
                    <li><a href="categoriaProductoSesion.php?id=3">Monitor</a></li>
                    <li><a href="categoriaProductoSesion.php?id=2">Celular</a></li>
                    <li><a href="categoriaProductoSesion.php?id=4">Consola</a></li>
                </ul>   
        </div>
        <div class="contenido">
                    <?php 
                        $query = mysqli_query($conexion, "SELECT p.id_product, p.name_product, p.price, p.quantity, p.imagen FROM PRODUCTS p inner join TYPE_PRODUCTS t ON p.fk_id_type_product = t.id_type_product WHERE p.state=1 AND p.id_product=".$_GET['id'])or die(mysql_error());
                            while($row = mysqli_fetch_array($query))
                            {
                    ?>
                    <div class="boxTexto">
                        <br>
                        <span><h4><?php echo $row["name_product"];?></h4></span><br>
                        <span>Precio: <?php echo $row["price"];?></span><br>
                        <span>En almacen: <?php echo $row["quantity"];?></span><br><br>
                        <span><a href="carritoSesion.php?id=<?php echo $row['id_product']; ?>">Añadir a Carrito</a></span>
                    </div>    
                            <span><img class="boxImagen" style="width:60%" src="data:image/png;base64,<?php echo base64_encode($row['imagen']); ?>"/></span>
                        <?php
                            }
                        ?>
        </div>
        <footer class="footer">
                <div class="g1">
                    <div class="bx">
                        <figure>
                            <a href="#">
                                <img src="./Logo.png" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="bx">
                        <h2>Creadores:</h2>
                        <p>Rachel Ariana Montero Branford</p>
                        <P>Nicole Marie Cascante</P>
                        <p>Victor Saúl Salas Zamora</p>
                    </div>
                    <div class="bx">
                        <h2>Siguenos</h2>
                        <div class="red-social">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-instagram"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-youtube"></a>
                        </div>
                    </div>
                </div>
                <div class="g2">
                    <small>&copy; 2022 <b>Grupo #</b> - Proyecto.</small>
                </div>
        </footer>
    </div> 
</body>
</html>