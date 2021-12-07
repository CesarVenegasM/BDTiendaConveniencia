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
$numperdid = $_POST["id_perdidas"] ;
$numperdida = $_POST["id_produc"] ;
$precio= $_POST["precio_perdidas"] ;
$Cantidad = $_POST["cant_perdidas"] ;
$Total = $_POST["total_perdidas"] ;
$Proveedor = $_POST["proveedor_perdidas"] ;
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
        $instruccion_SQL = "UPDATE `perdidas` SET `id_produc`='".$numperdida."',`precio_perdidas`='".$precio."',`cant_perdidas`='".$Cantidad."',`total_perdidas`='".$Total."',`proveedor_perdidas`='".$Proveedor."' where id_perdidas=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


mysqli_close( $connection );
header("location:nindex5.php");
die();

?>