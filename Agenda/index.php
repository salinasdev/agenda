<?php
// index.php
// load and initialize any global libraries

require_once ("controller.php");

// route the request internally
$uri = $_SERVER['REQUEST_URI'] ?? null;
//echo $uri;
if ($uri == '/Agenda/index.php') {
	$c = new Controller(); //Instanciamos Controller
	$c->inicio(); //Llamamos a su metodo inicio();
}
else {
	header('Status: 404 Not Found');
	echo '<html><body><h1>Page Not Found</h1></body></html>';
}
?>