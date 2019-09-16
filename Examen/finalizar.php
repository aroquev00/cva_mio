<?php

$nombre =$calif = $pregunta1 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = test_input($_POST["nombre"]);
  $pregunta1 = test_input($_POST["pregunta1"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($pregunta1 == "c"){
	$calif = 100;
}

echo '<p id="p01">Nombre: ', $nombre,'</p>';
echo '<p id="p01">Calificación: ', $calif,'</p>';

if($calif >= 100){
	echo '<p id="p01">¡Felicitaciones! Lograste pasar el examen. A continuación podras obtener tu carta constancia.</p><br><br><form method="post" action="carta-constancia.php"><input style="display:none" type="text" name="nombreAlumno" value="',$nombre,'" readonly><input type="submit" value="Ver Carta Constancia" class="button"></form>';
}
else{
	echo '<p id="p01">Lo sentimos, no pudiste aprobar el examen.</p><br><a class="button" href="introduccion.html">Regresar</a><br>';
}

?>

