<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario de registro</title>

    <style>
      body {
        background-color: #87ccc1;
        margin: 0;
        padding: 0;
      }
      h1 {
        text-align: center;
        width: 50%;
        margin: auto;
        margin-top: 30px;
      }
      table {
        border: 3px solid #cca633;
        padding: 20px 50px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #edf797;
      }
    </style>
  </head>
  <body>  
  <!-- FOR Y NAME IGUAL A LA BD, ID ABREVIACIÓN -->

    <h1>Formulario de registro</h1>
    <form action="registro.php" name="" method="POST">
      <table border="0" align="center">
        <tr>
          <td>
            Nombre y Apellido:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="nombre" id="name" required  />
          </td>
        </tr>
        <tr>
          <td>
            Usuario/Correo:
          </td>
          <td>
            <label for="user"></label>
            <input type="text" name="usuario" id="user" required  />
          </td>
        </tr>
        <tr>
          <td>
            Direccion:
          </td>
          <td>
            <label for="direccion"></label>
            <input type="text" name="direccion" id="direc"  required />
          </td>
        </tr>
        <tr>
          <td>
            RFC Empresa:
          </td>
          <td>
            <label for="rfc_empresa"></label>
            <input type="text" name="rfc_empresa" id="rfc" required  />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="cant"></label>
            <input type="text" name="cant" id="canti" required  />
          </td>
        </tr>
        <tr>
          <td>
            Descripcion:
          </td>
          <td>
            <label for="descrip"></label>
            <input type="text" name="descrip" id="des" required  />
          </td>
        </tr>
        <tr>
          <td>
            Precio Unitario:
          </td>
          <td>
            <label for="precio"></label>
            <input type="text" name="precio" id="pre" required  />
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
            <label for="total"></label>
            <input type="text" name="total" id="tot" required  />
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
  </body>
</html>