<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario de empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      body {
        background-color: #87ccc1;
        margin: 0;
        padding: 0;
        background-image:url('../img/m.png');
        width: 85%;
        height: 100vh;
        background-size: cover;
        background-position-x: center;
      }
      .tabla {
        border: 3px solid #222222;
        padding: 20px 50px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #B8A4F2;
        width:50%;
      }
      th {
        background-color: #845CFF;
      }
    </style>
  </head>
  <body>  
  <h1>
    <br><br><br>
    </h1>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->
    <form action="empleado.php" name="" method="POST">
      <table border="0" align="center" class="tabla">
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
          <td>
           Nombre(s) del empleado:
          </td>
          <td>
            <label for="nom_emp"></label>
            <input type="text" name="nom_emp" id="nom_e" required  />
          </td>
        </tr>
        <tr>
          <td>
           Apellidos del empleado:
          </td>
          <td>
            <label for="apell_emp"></label>
            <input type="text" name="apell_emp" id="ape_e"  required />
          </td>
        </tr>
        <tr>
          <td>
           CURP del empleado:
          </td>
          <td>
            <label for="curp_emp"></label>
            <input type="text" name="curp_emp" id="curp" required  />
          </td>
        </tr>
        <tr>
          <td>
           Telefono del empleado:
          </td>
          <td>
            <label for="tel_emp"></label>
            <input type="text" name="tel_emp" id="tel_e" required  />
          </td>
        </tr>
        <tr>
          <td>
           Direccion del empleado:
          </td>
          <td>
            <label for="direc_emp"></label>
            <input type="text" name="direc_emp" id="dir_e" required  />
          </td>
        </tr>
        <tr>
          <td>
           Rol del empleado:
          </td>
          <td>
            <label for="rol_emp"></label>
            <input type="text" name="rol_emp" id="rol" required  />
          </td>
        </tr>
        <tr>
          <td>
           Salario del empleado:
          </td>
          <td>
            <label for="salario_empp"></label>
            <input type="text" name="salario_emp" id="salr_e" required  />
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
    $consulta = "SELECT * FROM empleado"; //MODIFICA ESTO KEVIN 

    $result = mysqli_query($connection,$consulta);
    if(!$result) 
    {
        echo "No se ha podido realizar la consulta";
    }
        //vista usuario
        echo '<table class="table-bordered">';
        echo "<tr>";
        echo "<th><h1>Id del empleado</th></h1>";
        echo "<th><h1>Nombre(s) del empleado</th></h1>";
        echo "<th><h1>Apellidos del empleado</th></h1>";
        echo "<th><h1>CURP del empleado</th></h1>";
        echo "<th><h1>Telefono del empleado</th></h1>";
        echo "<th><h1>Direccion del empleado</th></h1>";
        echo "<th><h1>Rol del empleado</th></h1>";
        echo "<th><h1>Salario del empleado</th></h1>";
        echo "</tr>";

        //nombre campo
        while ($colum = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td><h2>" . $colum['id_emp']. "</td></h2>";
            echo "<td><h2>" . $colum['nom_emp']. "</td></h2>";
            echo "<td><h2>" . $colum['apell_emp'] . "</td></h2>";
            echo "<td><h2>" . $colum['curp_emp'] . "</td></h2>";
            echo "<td><h2>" . $colum['tel_emp'] . "</td></h2>";
            echo "<td><h2>" . $colum['direc_emp'] . "</td></h2>";
            echo "<td><h2>" . $colum['rol_emp'] . "</td></h2>";
            echo "<td><h2>" . $colum['salario_emp'] . "</td></h2>";

    echo '<td> <form action="delete2.php?id='.$colum['id_emp'].'" method="post"> 
        <p><input class="btn btn-danger" name="delete" type="submit" value="Delete" /></p>
        </form>

        <form action="update2.php?id='.$colum['id_emp'].'" method="post"> 
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