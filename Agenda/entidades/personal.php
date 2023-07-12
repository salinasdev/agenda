<?php
//Clase Personal
require_once("./conexion/conexion.php");
class Personal{

	private $pers; //Atributo de la clase
	
	//Esto es el constructor de la clase
	public function constructor(){
		$this->pers = array();//Indicamos que pers sera un array de valores
	}
	
	//Metodo que devuelve todo el personal de la BBDD
	public function get_personal(){
		$con = new Conectar();
		$micon = $con->conexion();
		$sql = "select * from personal;";
		$res = $micon->query($sql);
		
		 while ($reg = $res->fetch_assoc())
              {
				  $this->pers[] = $reg;
				 } 
		
		return $this->pers;
	}
	
	public function set_personal($name, $tlf, $email){
		$con = new Conectar();
		$micon = $con->conexion();
		$sql = "insert into personal (name, tlf, email) values('$name','$tlf','$email');";
		$res = $micon->query($sql);
		
	}
	public function delete_personal($id){
		$con = new Conectar();
		$micon = $con->conexion();
		$sql = "delete from personal where id='$id';";
		$res = $micon->query($sql) or die(mysql_error());
		
	}
	
	public function update_personal($id,$name,$tlf,$email){
		$con = new Conectar();
		$micon = $con->conexion();
		$sql = "update personal set name='$name', tlf='$tlf', email='$email' where id='$id';";
		$res = $micon->query($sql) or die(mysql_error());
		
	}




}

?>