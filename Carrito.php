
<?php

include "db.php";
    
    if(isset($_SESSION['carrito'])){
        if(isset($_GET['id'])){
                $array=$_SESSION['carrito'];
                $flag=false;
                $numero=0;
                for ($i=0; $i < count($array) ; $i++) { 
                    if($array[$i]['Id']==$_GET['id']){
                        $flag=true;
                        $numero=$i;
                    }
                }
                if($flag==true){
                    $array[$numero]['quantity']=$array[$numero]['quantity']+1;
                    $_SESSION['carrito']=$array;
                }else{
                    $nombre="";
                    $precio=0;
                    $result=mysqli_query($conexion,"SELECT * FROM PRODUCTS WHERE id_product=".$_GET['id']);
                    while($f=mysqli_fetch_array($result)){
                        $nombre=$f['name_product'];
                        $precio=$f['price'];
                    }
                    $arrayNuevos=array('Id'=>$_GET['id'],'name_product'=>$nombre, 'quantity'=>1, 'price'=>$precio);

                    array_push($array, $arrayNuevos);
                    $_SESSION['carrito']=$array;
                }
             }

    }else{
        if(isset($_GET['id'])){
            $nombre="";
            $precio=0;
            $result=mysqli_query($conexion, "SELECT * FROM PRODUCTS WHERE id_product=".$_GET['id']);
            while($f=mysqli_fetch_array($result)){
                $nombre=$f['name_product'];
                $precio=$f['price'];
            }
            $array[]=array('Id'=>$_GET['id'], 'name_product'=>$nombre, 'quantity'=>1, 'price'=>$precio);
            $_SESSION['carrito']=$array;
        }
    }
    //variable de sesion
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras - Kento</title>
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
        }
        .producto{
            background: #D5D6D8;
        }
    </style>
</head>
<body>
<div class="contenedor">
        <div class="inicio">
            <div class="seccion1">
                <div class="s1SubSec1"> <!--NOTA: s1SubSec1 =  Seccion 1 de la subseccion 1-->
                    <h4><a href="index.php" style="color: #fff;">Home</a></h4>
                </div>
                <div class="s1SubSec2">

                </div>
                <div class="s1SubSec3">
                    <a class="carrito" href="Carrito.php"><i class="fa-solid fa-cart-shopping iconCarrito"></i></a>
                </div>
                
                <div class="s1SubSec4">
                <a href="indexLogin.php">Iniciar sesión</a>
                </div>
            </div>
            <ul class="seccion2">
                    <li><a href="categoriaProducto.php?id=1">Teclado</a></li>
                    <li><a href="categoriaProducto.php?id=3">Monitor</a></li>
                    <li><a href="categoriaProducto.php?id=2">Celular</a></li>
                    <li><a href="categoriaProducto.php?id=4">Consola</a></li>
            </ul>    
        </div>
        <div class="contenido">
            <?php
            $total=0;
            if(isset($_SESSION['carrito'])){
                $f=$_SESSION['carrito'];
                
                for($i=0; $i<count($f);$i++){
            ?>
            <hr>
                    <div class=producto>
                        <span>Nombre: <?php echo $f[$i]['name_product'];?></span><br>
                        <span>Cantidad: <?php echo $f[$i]['quantity'];?></span><br>
                        <span>Precio: <?php echo $f[$i]['price'];?></span><br>
                        <span>Precio total: <?php echo $f[$i]['price']*$f[$i]['quantity'];?></span><br>

                    </div>
            <?php 
            $total=($f[$i]['price']*$f[$i]['quantity'])+$total;
                }
            }else{
                echo '<p>Su carrito de compras esta vacio</p>';
            }
                echo '<p>Total: '.$total.'</p>';
            ?>
            <a href="index.php">Ver catalogo</a>
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