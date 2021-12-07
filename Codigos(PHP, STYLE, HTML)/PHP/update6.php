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
$numreembolso=$_GET['id'];


echo  ' <form action="actualizar6.php?id='.$numreembolso.'" method="POST">     
        <table class="table  table-bordered">
            <tr>
                <th>
                    <h3>
                        Motivo del Reembolso
                    </h3>
                </th>

                <th>
                    <h3>
                        Costo de la pieza
                    </h3>
                </th>
                <th>
                    <h3>
                        Numero de Producto
                    </h3>
                </th>

                <th>
                    <h3>
                        Cantidad
                    </h3>
                </th>

            </tr>
            <tr>
                <td>
          
                    <input name="motivo_reemb" required="" type="text" />
       
                </td>
                <td>
            
                    <input name="costPieza_reemb" required="" type="text" />
     
                </td>
                <td>
              
                    <input name="idProduc_reemb" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="cant_reemb" required="" type="text" />
                
                </td>
                
            </tr>

        </table> 

        <p><input class="btn btn-success" name="update" type="submit" value="Update" /></p>

</form>';
    ?>
</body>
</html>