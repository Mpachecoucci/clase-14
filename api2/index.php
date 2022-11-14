<?php 
header ("Access-Control-Allow-Origin:*");
header ("Credentials: true");
header("Methods: PUT,POST,DELETE,GET");
define("URL_BASE","/alumno/3792/ACTIVIDADES/APP-CLIMA/api2/");
$request = explode("/", str_replace(URL_BASE,"",$_SERVER["REQUEST_URI"]));
$request = array_filter($request);
$modelo="";
if(!count($request)){
	echo json_encode(array("en"=>404,"error"=>"falta modelo"));
}else{
	$modelo=ucfirst(strtolower($request[0]));
	if(!file_exists("../models/".$modelo.".php")){
			echo json_encode(array("en"=>404,"error"=>"no existe modelo"));
	}else{
		if (!isset($request[1])) {
			echo json_encode(array("en"=>404,"error"=>"no puso metodo"));
		}else{
			include "../models/".$modelo.".php";
			$metodo = $request[1];
			if(!method_exists($modelo,$metodo)){
				echo json_encode(array("en"=>404,"error"=>"no existe metodo dentro de la clase"));
			}else{
				$obj= new $modelo;
				echo json_encode($obj -> $metodo());
			}
		}
	}

	//var_dump($request[0]);
}
	//var_dump($_SERVER['REQUEST_URI']);
 ?>