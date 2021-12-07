<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
$idproducto=$_GET['id'];


echo  ' <form action="actualizar.php?id='.$idproducto.'" method="POST">     
        <table class="table  table-bordered">
            <tr>

                <th>
                    <h3>
                        Nombre del producto
                    </h3>
                </th>

                <th>
                    <h3>
                        Código del producto
                    </h3>
                </th>
                <th>
                    <h3>
                        Fecha de caducidad
                    </h3>
                </th>

                <th>
                    <h3>
                        Contenido neto
                    </h3>
                </th>

                <th>
                    <h3>
                        Marca del producto
                    </h3>
                </th>
            </tr>
            <tr>
                <td>
          
                    <input name="nom_produc" required="" type="text" />
       
                </td>
                <td>
            
                    <input name="UPC_produc" required="" type="text" />
     
                </td>
                <td>
              
                    <input name="fechadeCad_produc" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="contNeto_produc" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="marca_produc" required="" type="text" />
                
                </td>
                
            </tr>

        </table> 

        <p><input class="btn btn-success" name="update" type="submit" value="Update" /></p>

</form>';
    ?>
</body>
</html>