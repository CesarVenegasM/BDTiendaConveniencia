<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     body {
        background-image:url('../img/ra.png');
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
        background-color: #D4B3F0;
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
$DB = "test_db";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass, $DB);

//hacemos llamado al imput de formuario
$numventa = $_POST["id_vent"] ;
$numempleado = $_POST["id_emp"] ;
$costo= $_POST["cost_produc_vent"] ;
$fecha = $_POST["fecha_vent"] ;
$cant = $_POST["cant_produc_vent"] ;
$iva = $_POST["iva_vent"] ;
$descuentos = $_POST["descuentos_vent"] ;
$subtotal = $_POST["subtotal_vent"] ;
$total = $_POST["total_vent"] ;
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
        $instruccion_SQL = "INSERT INTO ventas (id_vent, id_emp, cost_produc_vent ,fecha_vent, cant_produc_vent, iva_vent, descuentos_vent, subtotal_vent, total_vent)
                             VALUES ('$numventa','$numempleado','$costo','$fecha','$cant','$iva','$descuentos','$subtotal','$total')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM ventas";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Numero de Ventas</th></h1>";
echo "<th><h1>Numero de Empleado</th></h1>";
echo "<th><h1>Costo del producto</th></h1>";
echo "<th><h1>Fecha</th></h1>";
echo "<th><h1>Cantidad</th></h1>";
echo "<th><h1>IVA</th></h1>";
echo "<th><h1>Descuentos</th></h1>";
echo "<th><h1>Subtotal</th></h1>";
echo "<th><h1>Total</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_vent']. "</td></h2>";
    echo "<td><h2>" . $colum['id_emp']. "</td></h2>";
    echo "<td><h2>" . $colum['cost_produc_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['fecha_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant_produc_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['iva_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['descuentos_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['subtotal_vent'] . "</td></h2>";
    echo "<td><h2>" . $colum['total_vent'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="home.php"> Volver Atrás</a>';


?>