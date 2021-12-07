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
$numventa=$_GET['id'];


echo  ' <form action="actualizar4.php?id='.$numventa.'" method="POST">     
        <table class="table  table-bordered">
            <tr>
                <th>
                    <h3>
                        Numero de Empleado
                    </h3>
                </th>

                <th>
                    <h3>
                        Costo del producto
                    </h3>
                </th>
                <th>
                    <h3>
                        Fecha
                    </h3>
                </th>

                <th>
                    <h3>
                        Cantidad
                    </h3>
                </th>

                <th>
                    <h3>
                        IVA
                    </h3>
                </th>
                <th>
                    <h3>
                        Descuentos
                    </h3>
                </th>

                <th>
                    <h3>
                        Subtotal
                    </h3>
                </th>

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
            
                    <input name="id_emp" required="" type="text" />
     
                </td>
                <td>
              
                    <input name="cost_produc_vent" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="fecha_vent" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="cant_produc_vent" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="iva_vent" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="descuentos_vent" required="" type="text" />
                
                </td>
                <td>
              
                    <input name="subtotal_vent" required="" type="text" />
                
                </td>

                <td>
              
                    <input name="total_vent" required="" type="text" />
                
                </td>
            </tr>

        </table> 

        <p><input class="btn btn-success" name="update" type="submit" value="Update" /></p>

</form>';
    ?>
</body>
</html>