<?php

$user = "root";
$pass = "";
$host = "localhost";

$numperdid=$_GET['id'];

echo $numperdid;

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//verificamos la conexion a base datos
if(!$connection) 
        {
          printf ("No se ha podido conectar con el servidor" , mysqli_connect_error());
        }
        else{
        //indicamos el nombre de la base datos
        $datab = "test_db";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);
        $consulta = "DELETE FROM `perdidas` WHERE id_perdidas='".$numperdid."'";
        echo $consulta;
        $result = mysqli_query($connection,$consulta);

        }
        mysqli_close( $connection );
        header("location:nindex5.php");
die();

?>