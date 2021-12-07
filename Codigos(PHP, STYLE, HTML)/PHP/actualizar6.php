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
$numreembolso = $_POST["id_reemb"] ;
$motivoreembolso = $_POST["motivo_reemb"] ;
$costo= $_POST["costPieza_reemb"] ;
$producto = $_POST["idProduc_reemb"] ;
$cantidad = $_POST["cant_reemb"] ;
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
        $instruccion_SQL = "UPDATE `reembolsos` SET `motivo_reemb`='".$motivoreembolso."',`costPieza_reemb`='".$costo."',`idProduc_reemb`='".$producto."',`cant_reemb`='".$cantidad."' where id_reemb=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


mysqli_close( $connection );
header("location:nindex6.php");
die();

?>