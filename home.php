<?php
	include "pages/pantallas.php";
	$object = new _screen();
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