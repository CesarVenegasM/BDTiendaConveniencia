<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Facturas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      body {
        background-image:url('../img/ss.png');
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
        background-color: #F58453;
        width:50%;
      }
      th {
        background-color: #FF7133;
      }

    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="Facturas.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
            Numero de factura:
          </td>
          <td>
            <label for="id_fact"></label>
            <input type="text" name="id_fact" id="id_f" required  />
          </td>
        </tr>
        <tr>
          <td>
            Numero de venta:
          </td>
          <td>
            <label for="id_vent"></label>
            <input type="text" name="id_vent" id="id_v" required  />
          </td>
        </tr>
        <tr>
          <td>
            Gasto total:
          </td>
          <td>
            <label for="totalGast_fact"></label>
            <input type="text" name="totalGast_fact" id="gast_f"  required />
          </td>
        </tr>
        <tr>
          <td>
            RFC Empresa facturada:
          </td>
          <td>
            <label for="rfc_empr_fact"></label>
            <input type="text" name="rfc_empr_fact" id="rfc" required  />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="cant_fact"></label>
            <input type="text" name="cant_fact" id="cant" required  />
          </td>
        </tr>
        <tr>
          <td>
            Descripcion:
          </td>
          <td>
            <label for="descrip_fact"></label>
            <input type="text" name="descrip_fact" id="desc" required  />
          </td>
        </tr>
        <tr>
          <td>
            Precio Unitario:
          </td>
          <td>
            <label for="precioUnit_fact"></label>
            <input type="text" name="precioUnit_fact" id="pre" required  />
          </td>
        </tr>
        <tr>
          <td>
            SubTotal:
          </td>
          <td>
            <label for="subtotal"></label>
            <input type="text" name="subtotal" id="sub" required  />
          </td>
        </tr>
        <tr>
          <td>
            Total:
          </td>
          <td>
            <label for="total_fact"></label>
            <input type="text" name="total_fact" id="tot" required  />
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
        $consulta = "SELECT * FROM factura"; //MODIFICA ESTO KEVIN 

        $result = mysqli_query($connection,$consulta);
        if(!$result) 
        {
            echo "No se ha podido realizar la consulta";
        }
        //vista usuario
        echo '<table class="table-bordered">';
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

        echo '<td> <form action="delete0.php?id='.$colum['id_fact'].'" method="post"> 
            <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
            </form>

            <form action="update0.php?id='.$colum['id_fact'].'" method="post"> 
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