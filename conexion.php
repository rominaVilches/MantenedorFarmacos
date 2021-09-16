<?php

$mysqli = new MYSQLI('localhost', 'root', 'root', 'basefarmacia');

if($mysqli->connect_errno > 0){
	die('Error en la conección' . $mysqli->connect_error);
}

?>