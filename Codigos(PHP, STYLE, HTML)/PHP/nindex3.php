<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario de proveedores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
     
      body {
        background-color: #87ccc1;
        margin: 0;
        padding: 0;
        background-image:url('../img/ROSA.png');
        width: 90%;
        height: 100vh;
        background-size: cover;
        background-position-x: center;
      }
      .tabla {
        border: 3px solid #222222;
        padding: 20px 50px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #FEC7FA;
        width:50%;
      }
      th {
        background-color: #FE92F6;
      }
    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="proveedores.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
           Id del proveedor:
          </td>
          <td>
            <label for="id_prov"></label>
            <input type="text" name="id_prov" id="id_pv" required  />
          </td>
        </tr>
        <tr>
          <td>
           Nombre del proveedor:
          </td>
          <td>
            <label for="nom_prov"></label>
            <input type="text" name="nom_prov" id="nom_pv" required  />
          </td>
        </tr>
        <tr>
          <td>
           Telefono del proveedor
          </td>
          <td>
            <label for="tel_prov"></label>
            <input type="text" name="tel_prov" id="tel_pv"  required />
          </td>
        </tr>
        <tr>
          <td>
           Cantidad de productos:
          </td>
          <td>
            <label for="cant_prov"></label>
            <input type="text" name="cant_prov" id="cant_pv" required  />
          </td>
        </tr>
        <tr>
          <td>
           Monto total de la compra:
          </td>
          <td>
            <label for="total_prov"></label>
            <input type="text" name="total_prov" id="tot_pv" required  />
          </td>
        </tr>
        <tr>
          <td>
           Id del empleado:
          </td>
          <td>
          <label for="id_emp"></label>
            <input type="text" name="id_emp" id="id_e" required  />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">
            <input
              type="submit"
              name="enviar"
              id="enviar"
              value="Registrarse"
            />
          </td>
          <td align="center">
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
          </td>
        </tr>
      </table>
    </form>
    <br>

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

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
    $consulta = "SELECT * FROM proveedores"; //MODIFICA ESTO KEVIN 

    $result = mysqli_query($connection,$consulta);
    if(!$result) 
    {
        echo "No se ha podido realizar la consulta";
    }
    //vista usuario
    
    echo "<tr>";
    echo '<table class="table-bordered">';
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

    echo '<td> <form action="delete3.php?id='.$colum['id_prov'].'" method="post"> 
        <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
        </form>

        <form action="update3.php?id='.$colum['id_prov'].'" method="post"> 
        <p><input class="btn btn-danger" name="update" type="submit" value="Update" /></p>
        </form>
        
        </td>';
        echo "</tr>";
    }
    echo "</table>";
  }
    mysqli_close( $connection );

?>
  </body>
</html>