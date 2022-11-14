<?php
    require_once 'credentials.php';

    class Database{
        public function conectar(){
            $this -> db_connect = mysqli_connect(HOST,USER,PASS,DB);
            //var_dump($this ->db_connect);
            if($this ->db_connect->errno!=0){
                echo $this ->db_connect->error;
            }else{
                return $this ->db_connect;
            }
        }
        public function consulta($query){
            $this ->conectar();
            $response = $this ->db_connect->query($query);
            if($this ->db_connect->errno!=0){
                echo $this ->db_connect->error;
            }else{
                return $response;
            }
        }
    }

?>