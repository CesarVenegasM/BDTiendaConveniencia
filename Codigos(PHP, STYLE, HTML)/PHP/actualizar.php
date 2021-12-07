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
$id_produc = $_POST["id_produc"] ;
$nom_produc = $_POST["nom_produc"] ;
$UPC_produc = $_POST["UPC_produc"] ;
$fechadeCad_produc = $_POST["fechadeCad_produc"] ;
$contNeto_produc = $_POST["contNeto_produc"] ;
$marca_produc = $_POST["marca_produc"] ;
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
        $instruccion_SQL = "UPDATE `producto` SET `nom_produc`='".$nom_produc."',`UPC_produc`='".$UPC_produc."',`fechadeCad_produc`='".$fechadeCad_produc."',`contNeto_produc`='".$fechadeCad_produc."',`marca_produc`='".$marca_produc."' where id_produc=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

     

mysqli_close( $connection );
header("location:nindex1.php");
die();

?>