<?php
$conexion =mysqli_connect("localhost","root","","oe");
				
				$consulta="SELECT PRODUCT_NAME FROM product_information";
     			 $resultado=mysqli_query($conexion,$consulta);
      
		echo "Productos". "<select name='Productos'>".'<form method="post" action="">';
			  while ($fila = mysqli_fetch_array($resultado)) 
					{	
						echo '<option value="'.$fila['PRODUCT_NAME'].'">'.$fila['PRODUCT_NAME'].'</option>';
					}
		echo	"</select>";
		echo	"</div>";
	mysqli_free_result($resultado);
	mysqli_close($conexion);
	if(isset($_POST['btNombre']))
		{
			header("location:consultaProductos.php");
		}
echo '<input name="btNombre" type="submit" value="Consultar" />'."</form>"
?>			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

	  			      


</body>

</html>
