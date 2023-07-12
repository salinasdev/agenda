<?php
// controllers.php
require_once("entidades/personal.php");
session_start(); //iniciamos la session

$op=$_REQUEST['op'] ?? null;
if( isset ($op)){
$c = new Controller(); //Instanciamos Controller
	if($op=="siguiente"){		
		$c->arriba();
	}elseif($op=="anterior"){
		$c->abajo();
	}elseif($op=="primero"){
		$c->primero();
	}elseif($op=="ultimo"){
		$c->ultimo();
	}elseif($op=="nuevo"){
		$c->nuevo();
	}elseif($op=="buscar"){
		$c->buscar();
	}elseif($op=="borrar"){
		$c->borrar();
	}elseif($op=="guardar"){
		$c->guardar();
	}elseif($op=="salir"){
		$c->salir();
	}
}
class Controller{
	function inicio() //Funcion de inicio
	{
		$pers = new Personal(); 
		$_SESSION["reg"] = 0;
		$_SESSION["amigos"] = $pers->get_personal() ?? null;
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
		exit(); //Salimos
	}

	function arriba()
	{
		$amigos = $_SESSION["amigos"] ?? null;
		if (is_countable($amigos) && count($amigos) > 0){
		if($_SESSION["reg"]<(sizeof($amigos))-1){
			$_SESSION["reg"]++;			
		}
		}
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
		
	}
	
	function abajo()
	{
		if($_SESSION["reg"]>0){
			$_SESSION["reg"]--;			
		}
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
	}
	
	function primero(){
		$_SESSION["reg"]=0;
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
	}
	
	function ultimo(){
		$amigos = $_SESSION["amigos"] ?? null;
		$_SESSION["reg"]=sizeof($amigos)-1;
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
	}
	
	function nuevo(){
		//Recogemos los datos:
		$name=$_REQUEST['txtNombre'];
		$tlf=$_REQUEST['txtTelefono'];
		$email=$_REQUEST['txtEmail'];
		//Insertamos al tio
		$pers = new Personal();
		$pers->set_personal($name,$tlf,$email);
		//Recogemos los amigos (ahora estara el nuevo)
		$_SESSION["amigos"] = $pers->get_personal();
		$amigos = $_SESSION["amigos"] ?? null;;
		//Colocamos el cursor en el ultimo para visualizarlo
		$_SESSION["reg"]=sizeof($amigos)-1;
		
		?>
		<script language="JavaScript" type="text/JavaScript">
            opener.location="principal.php";
            self.close();
        </script>
		<?php
	}
	function buscar(){
		$name=$_REQUEST['nombre']?? null;
		$amigos = $_SESSION["amigos"] ?? null;
		$encontrado=FALSE;
		if (is_countable($amigos) && count($amigos) > 0){
		for($i=0;$i<sizeof($amigos);$i++){
			$otro = $amigos[$i][$name] ?? null;
			if(strcmp($name, $otro)==0){
				$_SESSION["reg"]=$i;
				$encontrado=TRUE;
			}
		}
		}
		if($encontrado==FALSE){			
			$_SESSION['error']="Amigo no encontrado";
		}
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
		
	}
	
	function borrar(){
		$id = $_REQUEST['id']; //Recogemos el id
		$pers = new Personal(); //Instanciamos a la persona
		$pers->delete_personal($id);
		$_SESSION['reg']=0;
		$_SESSION["amigos"] = $pers->get_personal();
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
	}
	
	function guardar(){
		//Recogemos los datos:
		$id=$_REQUEST['txtId'];
		$name=$_REQUEST['txtNombre'];
		$tlf=$_REQUEST['txtTelefono'];
		$email=$_REQUEST['txtEmail'];
		//Instanciamos y hacemos el update:
		$pers = new Personal();
		$pers->update_personal($id,$name,$tlf,$email);
		//Recogemos los amigos (ahora estara el nuevo)
		$_SESSION["amigos"] = $pers->get_personal();
		header("Location: /Agenda/principal.php"); //Redireccionamos a principal.php
	}
	
	function salir(){?>
		<script language="JavaScript" type="text/JavaScript">
            window.close();
        </script>
	<?php }

}
?>