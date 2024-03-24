<?php
	include "pages/pantallas.php";
	// $object = new _screen('localhost','3030','.\\Data\\OMVSA.FDB','SYSDBA','masterkey');
	$object = new _screen('localhost','OMVSA','root','','3307');
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