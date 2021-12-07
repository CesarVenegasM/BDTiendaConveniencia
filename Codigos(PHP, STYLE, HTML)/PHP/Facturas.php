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
$numfactura = $_POST["id_fact"] ;
$numventa = $_POST["id_vent"] ;
$gasto= $_POST["totalGast_fact"] ;
$rfc_empresa = $_POST["rfc_empr_fact"] ;
$cant = $_POST["cant_fact"] ;
$descrip = $_POST["descrip_fact"] ;
$precio = $_POST["precioUnit_fact"] ;
$subtotal = $_POST["subtotal"] ;
$total = $_POST["total_fact"] ;
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
        $instruccion_SQL = "INSERT INTO factura (id_fact, id_vent, totalGast_fact,rfc_empr_fact,cant_fact,descrip_fact,precioUnit_fact,subtotal,total_fact)
                             VALUES ('$numfactura','$numventa','$gasto','$rfc_empresa','$cant','$descrip','$precio','$subtotal','$total')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM factura";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Numero de factura</th></h1>";
echo "<th><h1>Numero de venta</th></h1>";
echo "<th><h1>Gasto total</th></h1>";
echo "<th><h1>RFC Empresa</th></h1>";
echo "<th><h1>Cantidad</th></h1>";
echo "<th><h1>Descripcion</th></h1>";
echo "<th><h1>Precio</th></h1>";
echo "<th><h1>Subtotal</th></h1>";
echo "<th><h1>Total</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_fact']. "</td></h2>";
    echo "<td><h2>" . $colum['id_vent']. "</td></h2>";
    echo "<td><h2>" . $colum['totalGast_fact'] . "</td></h2>";
    echo "<td><h2>" . $colum['rfc_empr_fact'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant_fact'] . "</td></h2>";
    echo "<td><h2>" . $colum['descrip_fact'] . "</td></h2>";
    echo "<td><h2>" . $colum['precioUnit_fact'] . "</td></h2>";
    echo "<td><h2>" . $colum['subtotal'] . "</td></h2>";
    echo "<td><h2>" . $colum['total_fact'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';


?>