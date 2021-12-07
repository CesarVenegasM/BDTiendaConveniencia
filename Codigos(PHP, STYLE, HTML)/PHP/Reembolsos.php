<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      body {
        background-image:url('../img/fi.png');
	width: 90%;
	height: 100vh;
	background-size: cover;
	background-position-x: center;
      }
      table {
        border: solid 2px ;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #FF7133;
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
$numreembolso = $_POST["id_reemb"] ;
$motivoreembolso = $_POST["motivo_reemb"] ;
$costo= $_POST["costPieza_reemb"] ;
$producto = $_POST["idProduc_reemb"] ;
$cantidad = $_POST["cant_reemb"] ;
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
        $instruccion_SQL = "INSERT INTO reembolsos (id_reemb, motivo_reemb, costPieza_reemb,idProduc_reemb,cant_reemb)
                             VALUES ('$numreembolso','$motivoreembolso','$costo','$producto','$cantidad')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM reembolsos";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Numero de Reembolso</th></h1>";
echo "<th><h1>Motivo del Reembolso</th></h1>";
echo "<th><h1>Costo de la pieza</th></h1>";
echo "<th><h1>Numero de Producto</th></h1>";
echo "<th><h1>Cantidad</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_reemb']. "</td></h2>";
    echo "<td><h2>" . $colum['motivo_reemb']. "</td></h2>";
    echo "<td><h2>" . $colum['costPieza_reemb'] . "</td></h2>";
    echo "<td><h2>" . $colum['idProduc_reemb'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant_reemb'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="home.php"> Volver Atrás</a>';


?>