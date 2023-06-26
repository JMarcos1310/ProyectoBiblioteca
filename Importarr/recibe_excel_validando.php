<?php
require('config.php');
$cant_duplicidad =0 ;
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

		$editorial                = !empty($datos[0])  ? ($datos[0]) : '';
        $estado               = !empty($datos[1])  ? ($datos[1]) : '';
       
if( !empty($editorial) ){
    $checkemail_duplicidad = ("SELECT editorial FROM editorial WHERE editorial ='".($editorial)."' ");
    $cant_duplicidad = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($cant_duplicidad);
        }   

//No existe Registros Duplicados

if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO editorial( 
			editorial,
            estado

) VALUES(
			'$editorial',
            '$estado'
)";
mysqli_query($con, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE editorial SET 

		editorial= '" .$editorial. "',

        estado= '".$estado."'  
        
        WHERE editorial='".$editorial."'
    ");
    $result_update = mysqli_query($con, $updateData);
    } 
  }

 $i++;
}
header("Location:http://localhost/biblioteca/editorial");
exit();
?>
