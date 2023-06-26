<?php
/*Tamaño de el archivo*/
require('config.php');
$tipo       = $_FILES['dataeditorial']['type'];
$tamanio    = $_FILES['dataeditorial']['size'];
$archivotmp = $_FILES['dataeditorial']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
/* Variables a cargar*/
		$editorial                = !empty($datos[0])  ? ($datos[0]) : '';
        $estado                = !empty($datos[1])  ? ($datos[1]) : '';
/*Insetar variables en tabla editorial*/
    $insertar = "INSERT INTO editorial( 
           
			editorial,
            estado
        ) VALUES(
			'$editorial',
            '$estado'
        )";
        mysqli_query($con, $insertar);
    }

      echo '<div>'. $i. "). " .$linea.'</div>';
    $i++;
}


  echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

?>

<a href="index.php">Atras</a>