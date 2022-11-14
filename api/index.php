<?php
    require_once '../models/estacion.php';
    header("Content-type: application/json");
    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
            if(isset($_GET["mode"])){
                if($_GET["mode"]=="list-stations"){
                    $estacion = new Estacion();
                    $body = $estacion -> listar();
                }else{
                    $body = array("errno"=>400,"error"=>"Mode errorneo");
                }
            }else{
                if(!isset($_GET["chipId"])){
                    $body = array("errno"=>404,"error"=>"No ingreso chipId");
                }else if(!isset($_GET["limit"])){
                    $estacion = new Estacion();
                    $body = $estacion -> buscar($_GET["chipId"]);
                }else{
                    $estacion = new Estacion();
                    $body = $estacion -> info($_GET["chipId"],$_GET["limit"]);
                }
            }
        break;
    }
    $body=json_encode($body);
    echo $body;
?>