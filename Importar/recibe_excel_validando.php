<?php
require('config.php');
$cant_duplicidad =0 ;

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
        $direccion               = !empty($datos[3])  ? ($datos[3]) : '';
        $telefono               = !empty($datos[4])  ? ($datos[4]) : '';
        $estado               = !empty($datos[5])  ? ($datos[5]) : '';
       
if( !empty($telefono) ){
    $checkemail_duplicidad = ("SELECT telefono FROM estudiante WHERE telefono ='".($telefono)."' ");
    $cant_duplicidad = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($cant_duplicidad);
        }   

//No existe Registros Duplicados

if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO estudiante( 

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
mysqli_query($con, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE estudiante SET 
        codigo= '" .$codigo. "',

		nombre= '" .$nombre. "',

        carrera= '" .$carrera. "',

        direccion= '".$direccion."',

        telefono= '".$telefono."',

        estado= '".$estado."'  
        
        WHERE telefono='".$telefono."'
    ");
    $result_update = mysqli_query($con, $updateData);
    } 
  }

 $i++;
}

?>

<a href="http://localhost/biblioteca/estudiantes">Atras</a>