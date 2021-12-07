<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$DB = "test_db";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass,$DB);

//hacemos llamado al imput de formuario

$id=$_GET['id'];
$numfactura = $_POST["id_fact"] ;
$numventa = $_POST["id_vent"] ;
$gasto= $_POST["totalGast_fact"] ;
$rfc_empresa = $_POST["rfc_empr_fact"] ;
$cant = $_POST["cant_fact"] ;
$descrip = $_POST["descrip_fact"] ;
$precio = $_POST["precioUnit_fact"] ;
$subtotal = $_POST["subtotal"] ;
$total = $_POST["total_fact"] ;
//verificamos la conexion a base datos
if(!$connection) 
        {
          printf ("No se ha podido conectar con el servidor" , mysqli_connect_error());
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor, tu factura sera enviada por correo</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "test_db";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "UPDATE `factura` SET `id_vent`='".$numventa."',`totalGast_fact`='".$gasto."',`rfc_empr_fact`='".$rfc_empresa."',`cant_fact`='".$cant."',`descrip_fact`='".$descrip."',`precioUnit_fact`='".$precio."',`subtotal`='".$total."',`total_fact`='".$precio."' where id_fact=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


mysqli_close( $connection );
header("location:nindex0.php");
die();

?>