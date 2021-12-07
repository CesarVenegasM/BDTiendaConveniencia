<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     
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
$nombre = $_POST["nombre"] ;
$usuario = $_POST["usuario"] ;
$direccion = $_POST["direccion"] ;
$rfc_empresa = $_POST["rfc_empresa"] ;
$cant = $_POST["cant"] ;
$descrip = $_POST["descrip"] ;
$precio = $_POST["precio"] ;
$subtotal = $_POST["subtotal"] ;
$total = $_POST["total"] ;
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
        $instruccion_SQL = "INSERT INTO tabla_form (nombre, usuario, direccion,rfc_empresa,cant,descrip,precio,subtotal,total)
                             VALUES ('$nombre','$usuario','$direccion','$rfc_empresa','$cant','$descrip','$precio','$subtotal','$total')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM tabla_form";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Usuario</th></h1>";
echo "<th><h1>Direccion</th></h1>";
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
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['usuario'] . "</td></h2>";
    echo "<td><h2>" . $colum['direccion'] . "</td></h2>";
    echo "<td><h2>" . $colum['rfc_empresa'] . "</td></h2>";
    echo "<td><h2>" . $colum['cant'] . "</td></h2>";
    echo "<td><h2>" . $colum['descrip'] . "</td></h2>";
    echo "<td><h2>" . $colum['precio'] . "</td></h2>";
    echo "<td><h2>" . $colum['subtotal'] . "</td></h2>";
    echo "<td><h2>" . $colum['total'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="home.php"> Volver Atrás</a>';

?>