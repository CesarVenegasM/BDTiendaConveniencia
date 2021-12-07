<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Reembolsos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
      body {
        background-image:url('../img/ts.png');
          width: 90%;
          height: 100vh;
          background-size: cover;
          background-position-x: center;
              }
 /*     h1 {
        text-align: center;
        width: 50%;
        margin: auto;
        margin-top: 30px;
      }*/
      .tabla {
        border: 3px solid #222222;
        padding: 20px 50px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #EDF383;
        width:50%;
      }
      th {
        background-color: #F4DE6F;
      }

    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="Reembolsos.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
            Numero de Reembolso:
          </td>
          <td>
            <label for="id_reemb"></label>
            <input type="text" name="id_reemb" id="id_r" required  />
          </td>
        </tr>
        <tr>
          <td>
            Motivo del Reembolso:
          </td>
          <td>
            <label for="motivo_reemb"></label>
            <input type="text" name="motivo_reemb" id="mot_r" required  />
          </td>
        </tr>
        <tr>
          <td>
            Costo de la pieza:
          </td>
          <td>
            <label for="costPieza_reemb"></label>
            <input type="text" name="costPieza_reemb" id="cost_r"  required />
          </td>
        </tr>
        <tr>
          <td>
            Numero de Producto:
          </td>
          <td>
            <label for="idProduc_reemb"></label>
            <input type="text" name="idProduc_reemb" id="idProduc_r" required  />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="cant_reemb"></label>
            <input type="text" name="cant_reemb" id="cant_r" required  />
          </td>
        </tr>
        <tr>
          <td>
            
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
    $consulta = "SELECT * FROM reembolsos"; //MODIFICA ESTO KEVIN 

    $result = mysqli_query($connection,$consulta);
    if(!$result) 
    {
        echo "No se ha podido realizar la consulta";
    }
            //vista usuario
              echo "<tr>";
              echo '<table class="table-bordered">';
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

    echo '<td> <form action="delete6.php?id='.$colum['id_reemb'].'" method="post"> 
        <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
        </form>

        <form action="update6.php?id='.$colum['id_reemb'].'" method="post"> 
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