<?php
require_once 'controller.php'; //Añadimos controller.php

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda Azarquiel</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/JavaScript">
    // funcion para pedir una cosita por teclado y pasarsela al controler para actuar  
    function pedirbuscar(){
        respuesta=prompt("Nombre: ");
        if (respuesta!=null){
            url="controller.php?op=buscar&nombre="+respuesta;
            window.location=url;
        }
    }
     //la ventana principal se llama principal y a la pequeña popup
    window.name="principal";
    function ir(pagina,ancho,alto){
        arriba=(window.screen.availheight-alto)/2;
        izquierda=(window.screen.availwidth-ancho)/2;
        window.open(pagina,"peque","top="+arriba+",left="+izquierda+",width="+ancho+",height="+alto); 
    }
    // funcion para confirmar si o no algo pasandole al controles que actue en caso afirmativo
    function confirmar(nombre,id){
        respuesta=confirm("Estas seguro de eliminar al amigo "+nombre);
        if (respuesta==true){
            url="controller.php?op=borrar&id="+id;
            window.location=url;
        }
    }
</script>

</head>

<body>
<div id="contenedor">
  <div id="header"></div>
  <div id="cuerpo">
<?php
$c = new Controller(); //Instanciamos Controller
$reg = $_SESSION["reg"];
$amigos = $_SESSION["amigos"];
?>

<form id="fagenda" name="fagenda" method="post" action="controller.php?op=guardar">
  <fieldset>
    <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agenda Azarquiel</legend>
<table width="40%" border="0" align="center">
  <tr>
    <td><label>IdAmigo:</label></td>
    <td><input name="txtId" type="text" size="5" readonly="readonly" value="<?php print($amigos[$reg]["id"]);?>"/></td>
    <td><a href="javascript:pedirbuscar()"><img src="img/buscar.gif" width="46" height="46" /></a></td>
  </tr>
  <tr>
    <td><label>Nombre: </label></td>
    <td><input name="txtNombre" type="text" size="30"  value="<?php print($amigos[$reg]["name"]);?>"/></td>
    <td><a href="javascript:ir('nuevo.php',500,200)"><img src="img/nuevo.gif" width="46" height="46" /></a></td>
  </tr>
  <tr>
    <td><label>Telefono:</label></td>
    <td><input name="txtTelefono" type="text" size="12"  value="<?php print($amigos[$reg]["tlf"]);?>"/></td>
    <td><a href="javascript:confirmar('<?=$amigos[$reg]['name']?>','<?=$amigos[$reg]['id']?>')"><img src="img/borrar.gif" width="46" height="46" /></a></td>
  </tr>
  <tr>
    <td><label>Email: </label></td>
    <td><input name="txtEmail" type="text" size="30"  value="<?php print($amigos[$reg]["email"]);?>"/></td>
    <td><img src="img/guardar.gif" width="46" height="46" onclick="document.fagenda.submit()"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="controller.php?op=primero"><img src="img/primero.gif" width="46" height="46" /></a><a href="controller.php?op=anterior"><img src="img/anterior.gif" width="46" height="46" /></a><a href="controller.php?op=siguiente"><img src="img/siguiente.gif" width="46" height="46" /></a><a href="controller.php?op=ultimo"><img src="img/ultimo.gif" width="46" height="46" /></a></td>
    <td><a href="controller.php?op=salir"><img src="img/salir.gif" width="46" height="46" /></a></td>
  </tr>
</table>
  </fieldset>
</form>

<?php

if(isset($_SESSION['error'])){
	$error=$_SESSION['error'];
	
	print '<script type="text/javascript">'; 
	print 'alert("'.$error.'")'; 
	print '</script>';  
	unset($_SESSION['error']); //Borramos de la sesion esta variable
}
?>
  
  
  </div>
  <div id="pie"></div>
</div>
</body>
</html>