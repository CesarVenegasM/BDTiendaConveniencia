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
$id_emp = $_POST["id_emp"] ;
$nom_emp = $_POST["nom_emp"] ;
$apell_emp = $_POST["apell_emp"] ;
$curp_emp = $_POST["curp_emp"] ;
$tel_emp = $_POST["tel_emp"] ;
$direc_emp = $_POST["direc_emp"] ;
$rol_emp = $_POST["rol_emp"] ;
$salario_emp = $_POST["salario_emp"] ;
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
        $instruccion_SQL = "UPDATE `empleado` SET `nom_emp`='".$nom_emp."',`apell_emp`='".$apell_emp."',`curp_emp`='".$curp_emp."',`tel_emp`='".$tel_emp."',`direc_emp`='".$direc_emp."',`rol_emp`='".$rol_emp."',`salario_emp`='".$salario_emp."' where id_emp=".$id." ";
        echo $instruccion_SQL;
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


mysqli_close( $connection );
header("location:nindex2.php");
die();

?>