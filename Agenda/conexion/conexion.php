<?php
class Conectar{

	public static function conexion(){
		$con = mysql_connect("localhost","personal","personal") or die(mysql_error()); //Credenciales de acceso a la BBDD MySQL
		mysql_select_db("personal"); //Nombre de la BBDD
		mysql_query("SET NAMES 'utf-8'");
		return $con;
	}
}

?>