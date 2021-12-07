<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      body {
        background-image:url('../img/p.png');
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
        background-color: #98D8D7;
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
$numperdid = $_POST["id_perdidas"] ;
$numperdida = $_POST["id_produc"] ;
$precio= $_POST["precio_perdidas"] ;
$Cantidad = $_POST["cant_perdidas"] ;
$Total = $_POST["total_perdidas"] ;
$Proveedor = $_POST["Proveedor_perdidas"] ;
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
        $instruccion_SQL = "INSERT INTO perdidas (id_perdidas, id_produc, precio_perdidas,cant_perdidas,total_perdidas,proveedor_perdidas)
                             VALUES ('$numperdid','$numperdida','$precio','$Cantidad','$Total','$Proveedor')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM perdidas";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Numero de Perdida</th></h1>";
echo "<th><h1>Numero de Productos</th></h1>";
echo "<th><h1>Precio</th></h1>";
echo "<th><h1>Cantidad</th></h1>";
echo "<th><h1>Total</th></h1>";
echo "<th><h1>Proveedor</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_perdidas']. "</td></h2>";
    echo "<td><h2>" . $colum['id_produc']. "</td></h2>";
    echo "<td><h2>" . $colum['precio_perdidas'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant_perdidas'] . "</td></h2>";
    echo "<td><h2>" . $colum['total_perdidas'] . "</td></h2>";
    echo "<td><h2>" . $colum['proveedor_perdidas'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

  //echo "Fuera " ;
  echo'<a href="home.php"> Volver Atrás</a>';

?>