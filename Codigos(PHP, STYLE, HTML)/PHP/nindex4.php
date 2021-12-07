<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Ventas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      body {
        background-color: #87ccc1;
        margin: 0;
        padding: 0;
        background-image:url('../img/ra.png');
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
        background-color: #98D8D7;
        width:50%;
      }
      th {
        background-color: #6FCCE3;
      }
    </style>
  </head>
  <body>
    <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="Ventas.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
            Numero de Venta:
          </td>
          <td>
            <label for="id_vent"></label>
            <input type="text" name="id_vent" id="id_v" required  />
          </td>
        </tr>
        <tr>
          <td>
            Numero de Empleado:
          </td>
          <td>
            <label for="id_emp"></label>
            <input type="text" name="id_emp" id="id_e" required  />
          </td>
        </tr>
        <tr>
          <td>
            Costo del producto:
          </td>
          <td>
            <label for="cost_produc_vent"></label>
            <input type="text" name="cost_produc_vent" id="cost_p"  required />
          </td>
        </tr>
        <tr>
          <td>
            Fecha:
          </td>
          <td>
            <label for="fecha_vent"></label>
            <input type="text" name="fecha_vent" id="fecha_v" required  />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="cant_produc_vent"></label>
            <input type="text" name="cant_produc_vent" id="cant" required  />
          </td>
        </tr>
        <tr>
          <td>
            IVA:
          </td>
          <td>
            <label for="iva_vent"></label>
            <input type="text" name="iva_vent" id="iva" required  />
          </td>
        </tr>
        <tr>
          <td>
            Descuentos:
          </td>
          <td>
            <label for="descuentos_vent"></label>
            <input type="text" name="descuentos_vent" id="desc_v" required  />
          </td>
        </tr>
        <tr>
          <td>
            SubTotal:
          </td>
          <td>
            <label for="subtotal_vent"></label>
            <input type="text" name="subtotal_vent" id="sub" required  />
          </td>
        </tr>
        <tr>
          <td>
            Total:
          </td>
          <td>
            <label for="total_vent"></label>
            <input type="text" name="total_vent" id="tot" required  />
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
    $consulta = "SELECT * FROM ventas"; //MODIFICA ESTO KEVIN 

    $result = mysqli_query($connection,$consulta);
    if(!$result) 
    {
        echo "No se ha podido realizar la consulta";
    }
            //vista usuario           
            echo "<tr>";
            echo '<table class="table-bordered">';
            echo "<th><h1>Numero de Venta</th></h1>";
            echo "<th><h1>Numero de Empleado</th></h1>";
            echo "<th><h1>Costo del producto</th></h1>";
            echo "<th><h1>Fecha </th></h1>";
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

    echo '<td> <form action="delete4.php?id='.$colum['id_vent'].'" method="post"> 
        <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
        </form>

        <form action="update4.php?id='.$colum['id_vent'].'" method="post"> 
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