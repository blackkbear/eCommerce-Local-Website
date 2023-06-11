<?php
    include "db.php";
    class pedido {
        private $id_order;
        private $date;
        private $state;
        private $id_user;

        public function setid_order(int $id_order) {
            $this->id_order = $id_order;
        }

        public function getid_order(): int {
            return $this->id_order;
        }

        public function setdate(int $id_order) {
            $this->date = $date;
        }

        public function getdate(): int {
            return $this->date;
        }

        public function setistate(int $state) {
            $this->state = $state;
        }

        public function getstate(): int {
            return $this->state;
        }

        public function setid_user(): int {
            return $this->$id_user;
        }

        public function getid_user(): int {
            return $this->id_user;
        }

        public function listado(string $filtro = "") {
            $conexion = new Conexion();
            if ($filtro == "") {
                return $conexion->ejecutar("select * from pedidos order by id_order");
            } else {
                return $conexion->ejecutar("select * from pedidos where " . $filtro . " order by id_order asc");
            }
        }

        
    }
?>