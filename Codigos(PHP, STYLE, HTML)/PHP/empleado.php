<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      body {
        background-image:url('../img/FIFI.png');
	width: 95%;
	height: 100vh;
	background-size: cover;
	background-position-x: center;
      }
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
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
            echo "No se ha podido conectar con el servidor" . mysql_error();
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
        $instruccion_SQL = "INSERT INTO empleado (id_emp, nom_emp, apell_emp, curp_emp, tel_emp, direc_emp, rol_emp, salario_emp)
                             VALUES ('$id_emp','$nom_emp','$apell_emp','$curp_emp','$tel_emp','$direc_emp','$rol_emp','$salario_emp')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM empleado"; //MODIFICA ESTO KEVIN 
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Id del empleado</th></h1>";
echo "<th><h1>Nombre(s) del empleado</th></h1>";
echo "<th><h1>Apellidos del empleado</th></h1>";
echo "<th><h1>CURP del empleado</th></h1>";
echo "<th><h1>Telefono del empleado</th></h1>";
echo "<th><h1>Direccion del empleado</th></h1>";
echo "<th><h1>Rol del empleado</th></h1>";
echo "<th><h1>Salario del empleado</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_emp']. "</td></h2>";
    echo "<td><h2>" . $colum['nom_emp']. "</td></h2>";
    echo "<td><h2>" . $colum['apell_emp'] . "</td></h2>";
    echo "<td><h2>" . $colum['curp_emp'] . "</td></h2>";
    echo "<td><h2>" . $colum['tel_emp'] . "</td></h2>";
    echo "<td><h2>" . $colum['direc_emp'] . "</td></h2>";
    echo "<td><h2>" . $colum['rol_emp'] . "</td></h2>";
    echo "<td><h2>" . $colum['salario_emp'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="home.php"> Volver Atrás</a>';


?>