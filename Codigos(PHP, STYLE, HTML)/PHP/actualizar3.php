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
$id_prov = $_POST["id_prov"] ;
$nom_prov = $_POST["nom_prov"] ;
$tel_prov = $_POST["tel_prov"] ;
$cant_prov = $_POST["cant_prov"] ;
$total_prov = $_POST["total_prov"] ;
$id_emp = $_POST["id_emp"] ;
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
        $instruccion_SQL = "UPDATE `proveedores` SET `nom_prov`='".$nom_prov."',`tel_prov`='".$tel_prov."',`cant_prov`='".$cant_prov."',`total_prov`='".$total_prov."',`id_emp`='".$id_emp."' where id_prov=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


mysqli_close( $connection );
header("location:nindex3.php");
die();

?>