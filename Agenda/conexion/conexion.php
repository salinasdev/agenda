<?php
class Conectar{

	public static function conexion(){
		//$con = mysql_connect("localhost","personal","personal") or die(mysql_error()); //Credenciales de acceso a la BBDD MySQL
		//mysql_select_db("personal"); //Nombre de la BBDD
		$mysqli = new mysqli('localhost', 'personal', 'personal', 'personal');
        $mysqli->set_charset("utf8");
		//mysql_query("SET NAMES 'utf-8'");
		return $mysqli;
	}
}

?>