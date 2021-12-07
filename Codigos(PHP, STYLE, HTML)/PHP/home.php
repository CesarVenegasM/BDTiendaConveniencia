<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

     <a href="nindex0.php">Facturar  </a>
     <br>
     <a href="nindex1.php">Producto</a>
     <br>
     <a href="nindex3.php">Proveedores</a>
     <br>
     <a href="nindex2.php">Empleado</a>
     <br>
     <a href="nindex5.php">Perdidas</a>
     <br>
     <a href="nindex6.php">Rembolsos</a>
     <br>
     <a href="nindex4.php">Ventas</a>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>