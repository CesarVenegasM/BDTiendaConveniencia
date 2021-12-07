<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      body {
        background-image:url('../img/fu.png');
	width: 90%;
	height: 100vh;
	background-size: cover;
	background-position-x: center;
      }
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #9BD898;
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
        $instruccion_SQL = "INSERT INTO proveedores (id_prov, nom_prov, tel_prov, cant_prov, total_prov, id_emp) 
                             VALUES ('$id_prov','$nom_prov','$tel_prov','$cant_prov','$total_prov','$id_emp')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM proveedores"; //MODIFICA ESTO KEVIN 
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Id del proveedor</th></h1>";
echo "<th><h1>Nombre del proveedor</th></h1>";
echo "<th><h1>Telefono del proveedor</th></h1>";
echo "<th><h1>Cantidad de productos</th></h1>";
echo "<th><h1>Monto total de la compra</th></h1>";
echo "<th><h1>Id del empleado</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_prov']. "</td></h2>";
    echo "<td><h2>" . $colum['nom_prov']. "</td></h2>";
    echo "<td><h2>" . $colum['tel_prov'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant_prov'] . "</td></h2>";
    echo "<td><h2>" . $colum['total_prov'] . "</td></h2>";
    echo "<td><h2>" . $colum['id_emp'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );
//echo "Fuera " ;
echo'<a href="home.php"> Volver Atrás</a>';


?>