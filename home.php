<?php
	require "pages/constante.php";
	include "pages/pantallas.php";
	// $object = new _screen('localhost','3030','.\\Data\\OMVSA.FDB','SYSDBA','masterkey');
	$object = new _screen(_SERVER,_DB,_USER,_PASSWORD,_PORT);
?>
<!DOCTYPE html>
<html lang="es">
<?php
	echo $object->_head();
?>
<body>
	<!-- SideBar -->
	<?php
		echo $object->barra_de_lado();
		echo $object->contenido();
		echo $object->js();
	?>
</body>
</html>