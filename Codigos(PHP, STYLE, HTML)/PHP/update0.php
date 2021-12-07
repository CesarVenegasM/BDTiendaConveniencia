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
$numfactura=$_GET['id'];


echo  ' <form action="actualizar0.php?id='.$numfactura.'" method="POST">     
        <table class="table  table-bordered">
            <tr>
                <th>
                    <h3>
                        Numero de venta
                    </h3>
                </th>

                <th>
                    <h3>
                        Gasto total
                    </h3>
                </th>
                <th>
                    <h3>
                        RFC Empresa facturada
                    </h3>
                </th>

                <th>
                    <h3>
                        Cantidad
                    </h3>
                </th>

                <th>
                    <h3>
                        Descripcion
                    </h3>
                </th>
                
                <th>
                    <h3>
                        Precio Unitario
                    </h3>

                <th>
                    <h3>
                        SubTotal
                    </h3>   
                    
                <th>
                    <h3>
                        Total
                    </h3>
            </th>

            </tr>
            <tr>
                <td>
          
                    <input name="id_vent" required="" type="text" />
       
                </td>
                <td>
            
                    <input name="totalGast_fact" required="" type="text" />
     
                </td>
                <td>
              
                    <input name="rfc_empr_fact" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="cant_fact" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="descrip_fact" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="precioUnit_fact" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="subtotal" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="total_fact" required="" type="text" />
                
                </td>
                
            </tr>

        </table> 

        <p><input class="btn btn-success" name="update" type="submit" value="Update" /></p>

</form>';
    ?>
</body>
</html>