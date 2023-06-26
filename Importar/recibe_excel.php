<?php
require('config.php');
$tipo       = $_FILES['dataestudiante']['type'];
$tamanio    = $_FILES['dataestudiante']['size'];
$archivotmp = $_FILES['dataestudiante']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);

        
        $codigo                = !empty($datos[0])  ? ($datos[0]) : '';
		$nombre                = !empty($datos[1])  ? ($datos[1]) : '';
        $carrera               = !empty($datos[2])  ? ($datos[2]) : '';
        $direccion             = !empty($datos[3])  ? ($datos[3]) : '';
        $telefono              = !empty($datos[4])  ? ($datos[4]) : '';
        $estado                = !empty($datos[5])  ? ($datos[5]) : '';

    $insertar = "INSERT INTO estudiante( 
           
            codigo,
			nombre,
            carrera,
            direccion,
            telefono,
            estado
        ) VALUES(
            '$codigo',
			'$nombre',
            '$carrera',
            '$direccion',
            '$telefono',
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