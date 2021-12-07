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
$id_prov=$_GET['id'];


echo  ' <form action="actualizar3.php?id='.$id_prov.'" method="POST">     
        <table class="table  table-bordered">
            <tr>
                <th>
                    <h3>
                        Nombre del proveedor
                    </h3>
                </th>

                <th>
                    <h3>
                        Telefono del proveedor
                    </h3>
                </th>
                <th>
                    <h3>
                        Cantidad de productos
                    </h3>
                </th>

                <th>
                    <h3>
                        Monto total de la compra
                    </h3>
                </th>

                <th>
                    <h3>
                        Id del empleado
                    </h3>
                </th>

            </tr>
            <tr>
                <td>
          
                    <input name="nom_prov" required="" type="text" />
       
                </td>
                <td>
            
                    <input name="tel_prov" required="" type="text" />
     
                </td>
                <td>
              
                    <input name="cant_prov" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="total_prov" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="id_emp" required="" type="text" />
                
                </td>
                
            </tr>

        </table> 

        <p><input class="btn btn-success" name="update" type="submit" value="Update" /></p>

</form>';
    ?>
</body>
</html>