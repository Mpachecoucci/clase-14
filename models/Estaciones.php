<?php
    require_once 'database.php';
    class Estaciones extends Database{
        
        public function listar(){
            return $this -> consulta ("SELECT * FROM appcl__estaciones;") -> fetch_all (MYSQLI_ASSOC);
        }
        public function buscar(int $chipId){
    
            return $this -> consulta ("SELECT * FROM appcl__estaciones WHERE chipId=".$chipId.";") -> fetch_all (MYSQLI_ASSOC);
        }
        public function info(int $chipId,int $limit){
            
            return $this -> consulta ("SELECT * FROM appcl__tiempo WHERE chipId=".$chipId." ORDER BY fecha DESC LIMIT $limit;") -> fetch_all (MYSQLI_ASSOC);
        }
        public function nueva (){
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $method = $_POST;
                return $this -> consulta("INSERT INTO appcl__estaciones (`chipId`, `ubicacion`, `apodo`) VALUES('".$method["chipId"]."','".$method["ubicacion"]."','".$method["apodo"]."' )");
            }
        }
    }

?>