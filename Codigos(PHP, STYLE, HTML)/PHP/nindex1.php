<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario de productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      body {
        background-image:url('../img/re.png');
          width: 90%;
          height: 100vh;
          background-size: cover;
          background-position-x: center;
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
        background-color: #5ACF69;
        width:50%;
      }
      th {
        background-color: #8FE39A;
      }

    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="producto.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
        <tr>
          <td>
            Id del Producto:
          </td>
          <td>
            <label for="id_produc"></label>
            <input type="text" name="id_produc" id="id_pr" required  />
          </td>
        </tr>
        <tr>
          <td>
           Nombre del producto:
          </td>
          <td>
            <label for="nom_produc"></label>
            <input type="text" name="nom_produc" id="nom_pr" required  />
          </td>
        </tr>
        <tr>
          <td>
           Código de Producto Universal
          </td>
          <td>
            <label for="UPC_produc"></label>
            <input type="text" name="UPC_produc" id="UPC"  required />
          </td>
        </tr>
        <tr>
          <td>
           Fecha de caducidad:
          </td>
          <td>
            <label for="fechadeCad_produc"></label>
            <input type="text" name="fechadeCad_produc" id="fechaCad" required  />
          </td>
        </tr>
        <tr>
          <td>
           Contenido neto:
          </td>
          <td>
            <label for="contNeto_produc"></label>
            <input type="text" name="contNeto_produc" id="contNeto" required  />
          </td>
        </tr>
        <tr>
          <td>
           Marca del producto:
          </td>
          <td>
            <label for="marca_produc"></label>
            <input type="text" name="marca_produc" id="marc" required  />
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
        $consulta = "SELECT * FROM producto"; //MODIFICA ESTO KEVIN 
        
        $result = mysqli_query($connection,$consulta);
        if(!$result) 
        {
            echo "No se ha podido realizar la consulta";
        }
        //vista usuario
        echo '<table class="table-bordered">';
        echo "<tr>";
        echo "<th><h1>Id del Producto</th></h1>";
        echo "<th><h1>Nombre del producto</th></h1>";
        echo "<th><h1>Código de Producto Universal</th></h1>";
        echo "<th><h1>Fecha de caducidad</th></h1>";
        echo "<th><h1>Contenido neto</th></h1>";
        echo "<th><h1>Marca del producto</th></h1>";
        echo "<th><h1></th></h1>";
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
            
            echo '<td> <form action="delete.php?id='.$colum['id_produc'].'" method="post"> 
            <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
            </form>

            <form action="update.php?id='.$colum['id_produc'].'" method="post"> 
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