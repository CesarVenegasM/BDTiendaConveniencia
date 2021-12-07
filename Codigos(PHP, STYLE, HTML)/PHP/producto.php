<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      body {
        background-image:url('../img/re.png');
        width: 90%;
        height: 100vh;
        background-size: cover;
        background-position-x: center;
      }
      table {
        border: solid 2px ;
        border-collapse: collapse;
                     
      }
     
      th {
        background-color: #5ACF69;
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
<h1>
    <br><br><br>
    </h1>  
</body>
</html>


<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$DB = "test_db";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass,$DB);

//hacemos llamado al imput de formuario
$id_produc = $_POST["id_produc"] ;
$nom_produc = $_POST["nom_produc"] ;
$UPC_produc = $_POST["UPC_produc"] ;
$fechadeCad_produc = $_POST["fechadeCad_produc"] ;
$contNeto_produc = $_POST["contNeto_produc"] ;
$marca_produc = $_POST["marca_produc"] ;
//verificamos la conexion a base datos
if(!$connection) 
        {
          printf ("No se ha podido conectar con el servidor" , mysqli_connect_error());
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
        $instruccion_SQL = "INSERT INTO producto (id_produc, nom_produc, UPC_produc, fechadeCad_produc, contNeto_produc, marca_produc)
                             VALUES ('$id_produc','$nom_produc','$UPC_produc','$fechadeCad_produc','$contNeto_produc','$marca_produc')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM producto"; //MODIFICA ESTO KEVIN 
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
//vista usuario
echo "<table>";
echo "<tr>";
echo "<th><h1>Id del Producto</th></h1>";
echo "<th><h1>Nombre del producto</th></h1>";
echo "<th><h1>Código de Producto Universal</th></h1>";
echo "<th><h1>Fecha de caducidad</th></h1>";
echo "<th><h1>Contenido neto</th></h1>";
echo "<th><h1>Marca del producto</th></h1>";
echo "</tr>";

//nombre campo
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_produc']. "</td></h2>";
    echo "<td><h2>" . $colum['nom_produc']. "</td></h2>";
    echo "<td><h2>" . $colum['UPC_produc'] . "</td></h2>";
    echo "<td><h2>" . $colum['fechadeCad_produc'] . "</td></h2>";
    echo "<td><h2>" . $colum['contNeto_produc'] . "</td></h2>";
    echo "<td><h2>" . $colum['marca_produc'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="home.php"> Volver Atrás</a>';


?>