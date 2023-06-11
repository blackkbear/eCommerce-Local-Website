<?php 
    //Imports
    include "db.php";
    class Product 
    {
        //Atributos
        private $id_product;
        private $name;
        private $quantity;
        private $price;
        
        //Encapsulamiento
        public function setIdProduct(int $id_product)
        {
            $this->id_product = $id_product;
        }

        public function getIdProduct(): int
        {
            return $this->id_product;
        }

        public function setName(string $name)
        {
            if(strlen($name)==0)
            {
                $this->name = "Sin nombre definido";
            }else{
                $this->nombre = $name;
            }
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setQuantity(string $quantity)
        {
            if(strlen($quantity)==0)
            {
                $this->quantity = "Sin cantidad definida"
            }else{
                $this->quantity = $quantity;
            }
        }

        public function getQuantity(): string
        {
            return $this->quantity;
        }

        public function setPrice(int $price)
        {
            $this->price = $price;
        }

        public function getPrice(): int
        {
            return $this->price;
        }

        //Metodos
        public function listProducts(string $filter = "")
        {
            $conexion = new Conexion();
            if ($filter == "")
            {
                return $conexion->ejecutar("select * from products order by name");
            }
            else
            {
                return $conexion->ejecutar("select * from products where ". $filter . " order by name")
            }
        }

        public function addProduct(string $name_product, string $quantity, int $price, int $id_type_product)
        {
            $conexion = new Conexion();
            try {
                return $conexion->ejecutar("insert into product (name_product, quantity, price, fk_id_type_product) values ('" . $name_product . "', '" . $quantity . "', '" . $price . "', '" . $id_type_product . "')";
            } catch (\Throwable $th) {
                //throw $th;
                return error_reporting;
            }
        }

        public function deleteProduct(int $id_product)
        {
            $conexion = new Conexion();
            //FALTA
        }

    }
?>