<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Perdidas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
      body {
        background-image:url('../img/gr.png');
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
        background-color: #FFFFFF;
        width:50%;
      }
      th {
        background-color: #999999;
      }

    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="Perdidas.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
            Numero de Perdida:
          </td>
          <td>
            <label for="id_perdidas"></label>
            <input type="text" name="id_perdidas" id="id_p" required  />
          </td>
        </tr>
        <tr>
          <td>
            Numero de Productos:
          </td>
          <td>
            <label for="id_produc"></label>
            <input type="text" name="id_produc" id="id_p" required  />
          </td>
        </tr>
        <tr>
          <td>
            Precio:
          </td>
          <td>
            <label for="precio_perdidas"></label>
            <input type="text" name="precio_perdidas" id="precio_p"  required />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="cant_perdidas"></label>
            <input type="text" name="cant_perdidas" id="cant_p" required  />
          </td>
        </tr>
        <tr>
          <td>
            Total:
          </td>
          <td>
            <label for="total_perdidas"></label>
            <input type="text" name="total_perdidas" id="total_p" required  />
          </td>
        </tr>
        <tr>
          <td>
            Proveedor:
          </td>
          <td>
            <label for="Proveedor_perdidas"></label>
            <input type="text" name="Proveedor_perdidas" id="prov_p" required  />
          </td>
        </tr>
        <!--<tr>
          <td>
            Repetir contraseña:
          </td>
          <td>
            <label for="rep_pasword"></label>
            <input type="pasword" name="rep_contraseña" id="rep_pasword"  required />
          </td>
        </tr>-->
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
    $consulta = "SELECT * FROM perdidas"; //MODIFICA ESTO KEVIN 

    $result = mysqli_query($connection,$consulta);
    if(!$result) 
    {
        echo "No se ha podido realizar la consulta";
    }
            //vista usuario
            echo "<tr>";
            echo '<table class="table-bordered">';
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

    echo '<td> <form action="delete5.php?id='.$colum['id_perdidas'].'" method="post"> 
        <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
        </form>

        <form action="update5.php?id='.$colum['id_perdidas'].'" method="post"> 
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