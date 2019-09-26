<?php	
	
	session_start();


	if (!isset ($_SESSION['ID']))	
	{
		header("location:Inicio.php");
	
	}	
		

    if (isset ($_POST['btExit']))
        {
            
            header("location:Inicio.php");
            session_destroy();
        }
        
	foreach($_GET as $clave => $valor)
	{
		if($valor=="Editar")
			$codCliente = $clave;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
   <link rel="stylesheet" 
    href="Class/estilos.css" />
    <style type="text/css">
        html{background: url( Class/21.jpg)}
		table {
		    	border-collapse: collapse;
		    	width: 100%;
				}
		
		tr, td {
		   		 text-align: left;
		    	padding: 8px;
				}
		
		tr,td{background-color: #f2f2f2}
    </style>
</head>

<body>
    <form method="post">
            <div>

                <ul>
                    <li><input name="btProductos" type="submit" value="Productos" /></li>
                     <li><input name="btClientes" type="submit" value="Cambiar Clientes" /></li>
                     <li style="float:right;"><input name="btExit" type="submit" value="Cerrar" /></li>
                </ul>	
                </div>	
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </form>
    
<?php

/*		Mostrar los datos de los clientes		*/
	if(isset($_POST['btClientes'])){
	    $conexion =mysqli_connect("localhost","root","","asir-jona");
	
		$consulta = 'SELECT codigo,nombre,apellido,fechaAlta,telefono,direccion,dni,email,sexo,saldo,rango FROM cliente';
		$resultado = mysqli_query($conexion,$consulta);
	  
	  echo '<table border="1">';
	   echo '<tr>
	   			<td>Editar</td><td>Codigo</td><td>Nombre</td><td>Apellido</td><td>Fecha Alta</td><td>Telefono</td><td>Direccion</td><td>DNI</td><td>Email</td><td>Sexo</td><td>Saldo</td><td>Borrar</td></tr>';
	          while ($fila = mysqli_fetch_array($resultado)) 
	            {
	                echo '<tr><form type="get" action="'.$_SERVER['PHP_SELF'].'">';
	                 echo '<td><input type="submit" value="Editar" name="btEdit"</td>';
	
	                echo '<td><input type="text" name="codigo" value="'.$fila['codigo'].'" readonly/></td>';
	                echo '<td><input type="text" name="txtNom" value="'.$fila['nombre'].'"></td> ';
	                echo '<td><input type="text" name="txtApel" value="'.$fila['apellido'].'"></td> ';
	                echo '<td><input type="text"  value="'.$fila['fechaAlta'].'"readonly ></td> ';
	                echo '<td><input type="text" name="txtTelef" value="'.$fila['telefono'].'"></td> ';
	                echo '<td><input type="text" name="txtDirect" value="'.$fila['direccion'].'"></td> '; 
	                echo '<td><input type="text" name="txtDNI" value="'.$fila['dni']  .'"></td> ';
	                echo '<td><input type="text" name="txtEmail" value="'.$fila['email']  .'"></td> ';   
	                echo '<td><input type="text" name="txtSexo"  value="'.$fila['sexo']  .'"></td> ';
	                echo '<td><input type="text"  name="txtSaldo" value="'.$fila['saldo'] .'"></td> ';
	                echo '<td><input type="submit" value="Delete" name="btEliminar"</td>';
	                
	                echo '</form></tr>';
	
	            }
	 
	
	        echo '</table>';       
       } 
/*		Editar Cliente		*/

       if(isset($_GET['btEdit'])){

		$conexion =mysqli_connect("localhost","root","","asir-jona");
	
		$update ='UPDATE cliente SET nombre="'.$_GET['txtNom'].'",apellido="'.$_GET['txtApel'].'",telefono="'.$_GET['txtTelef'].'",direccion="'.$_GET['txtDirect'].'",dni="'.$_GET['txtDNI'].'",email="'.$_GET['txtEmail'].'",sexo="'.$_GET['txtSexo'].'",saldo="'.$_GET['txtSaldo'].'" WHERE codigo="'.$_GET['codigo'].'"';
		    $resultado = mysqli_query($conexion,$update);
	  


    }
    /*		Mostrar los datos de los clientes		*/
	if(isset($_POST['btProductos'])){
	    $conexion =mysqli_connect("localhost","root","","asir-jona");
	
		$consulta = 'Select ju.codJuego as  codJuegos, ju.nombre as nombre, cat.descripcion as categoria, ca2.descripcion as subCategoria, ju.fechaSalida as FechaSalida, pla.plataforma as Plataforma, pro.proveedor as Proveedor, ju.precio as Precio, ju.stock as Stock , ju.calificacion as Calificacion, ju.descripcion as Descripcion from juegos as ju JOIN categorias as cat on ju.codCategoria=cat.codCat JOIN categorias AS ca2 ON ju.codSubcategoria=ca2.codCat JOIN plataforma as pla on ju.codPlataforma=pla.codPlataforma JOIN proveedor as pro on ju.codProveedor= pro.codigo';
		$consulta2='SELECT descripcion,codCat FROM categorias';
		$consulta3='SELECT codPlataforma, plataforma FROM plataforma';
		$consulta4='SELECT codigo, proveedor from proveedor';
		$consulta5='SELECT descripcion,codCat FROM categorias';
		$resultado = mysqli_query($conexion,$consulta);
		$resultado2 = mysqli_query($conexion,$consulta2);
	    $resultado3 = mysqli_query($conexion,$consulta3);
	    $resultado4 = mysqli_query($conexion,$consulta4);
	    $resultado5 = mysqli_query($conexion,$consulta5);
	
	  
	  echo '<table border="1" >';
	   echo '<tr>
	   			<td>Editar</td><td>CodJuego</td><td>Nombre</td><td>Categoría</td><td>SubCategoría</td><td>FechaSalida</td><td>Plataforma</td><td>Proveedor</td><td>Precio</td><td>Stock</td><td>Calificacion</td><td>Descripcion</td></tr>';
	          while ($fila = mysqli_fetch_array($resultado)) 
	            {
	                echo '<tr><form type="get" action="'.$_SERVER['PHP_SELF'].'">';
	                echo '<td><input type="submit" value="Editar" name="btEdita"</td>';
	
	                echo '<td><input type="text" name="codigo" value="'.$fila['codJuegos'].'" readonly/></td>';
	                echo '<td><input type="text" name="txtNom" value="'.$fila['nombre'].'"></td> ';
	                echo '<td><input type="text" name="txtCat" value="'.$fila['categoria'].'"readonly></td> ';
	                echo '<td><input type="text" name="txtsubCat" value="'.$fila['subCategoria'].'" readonly></td> ';
	                echo '<td><input type="text" name="txtFecha" value="'.$fila['FechaSalida'].'" readonly></td> ';
	                echo '<td><input type="text" name="txtPlat" value="'.$fila['Plataforma'].'"readonly></td> '; 
	                echo '<td><input type="text" name="txtProveedor" value="'.$fila['Proveedor']  .'"readonly></td> ';
	                echo '<td><input type="text" name="txtPrecio" value="'.$fila['Precio']  .'"></td> ';   
	                echo '<td><input type="text" name="txtStock"  value="'.$fila['Stock']  .'"></td> ';
	                echo '<td><input type="text"  name="txtClaificacion" value="'.$fila['Calificacion'] .'"></td> ';
	                echo '<td><input type="text"  name="txtDescripcion" value="'.$fila['Descripcion'] .'"></td> ';
	               
					echo '<td><input type="submit" value="Delete" name="btEliminacion"</td>';
	                
	                echo '</form></tr>';
	
	            }

	 		echo '<form type="get" action="'.$_SERVER['PHP_SELF'].'">';
	
	        echo '<tr><form type="get" action="'.$_SERVER['PHP_SELF'].'">' ; 
	        echo '<td><input type="submit" value="Insertar" name="btInsertar"</td>';
	
	                echo '<td><input type="number" name="codigo" value="" required/></td>';
	                echo '<td><input type="text" name="txtNom" value=""required></td> ';
	                
	                echo '<td><select name="txtCat"><option value=""required>Categorias</option>';
	                	while ($fila = mysqli_fetch_array($resultado2)) 
	            			{	
	            				echo'<option value="'.$fila['codCat'].'">'.$fila['descripcion'].'</option>';
	            			}
					echo '</select></td>';
					
	                echo '<td><select name="txtSubCat"><option value=""required>SubCategorias</option>';
	                	while ($fila = mysqli_fetch_array($resultado5)) 
	            			{	
	            				echo'<option value="'.$fila['codCat'].'"required>'.$fila['descripcion'].'</option>';
	            			}
					echo '</select></td>';

	                echo '<td><input type="date" name="txtFecha" value=""required></td> ';
	                echo '<td><select name="txtPlat"><option value=""required>Plataforma</option>';
	                	while ($fila = mysqli_fetch_array($resultado3)) 
	            			{	
	            				echo'<option value="'.$fila['codPlataforma'].'">'.$fila['plataforma'].'</option>';
	            			}
					echo '</select></td>';
 
	                echo '<td><select name="txtProve"><option value=""required>Proveedores</option>';
	                	while ($fila = mysqli_fetch_array($resultado4)) 
	            			{	
	            				echo'<option value="'.$fila['codigo'].'"required>'.$fila['proveedor'].'</option>';
	            			}
					echo '</select></td>';

	                echo '<td><input type="text" name="txtPrecio" value=""required></td> ';   
	                echo '<td><input type="text" name="txtStock"  value=""required></td> ';
	                echo '<td><input type="number"  name="txtClaificacion" value=""readonly></td> ';
	                echo '<td><input type="text"  name="txtDescripcion" value=""required></td> ';
	                echo '</form></tr>';


	              
       } 
/*		Editar Cliente		*/

       if(isset($_GET['btEdita']))
       	{

				$conexion =mysqli_connect("localhost","root","","asir-jona");
				
				$update ='UPDATE juegos SET nombre="'.$_GET['txtNom'].'",precio="'.$_GET['txtPrecio'].'",stock="'.$_GET['txtStock'].'",
											calificacion="'.$_GET['txtClaificacion'].'",descripcion="'.$_GET['txtDescripcion'].'"
									 WHERE codJuego="'.$_GET['codigo'].'"';
					   $resultado = mysqli_query($conexion,$update);
					
		}
	if(isset($_GET['btInsertar']))
       	{	require_once("Class\LibProy.php"); 
			$Cli= new Emple;

			$Cli->set_codJuego($_GET['codigo']);
			//echo $Cli-> get_codJuego();
	
			$Cli->set_nombre($_GET['txtNom']);
			//echo $Cli-> get_nombre();
	
			$Cli->set_codCategoria($_GET['txtCat']);
			//echo $Cli-> get_codCategoria();
			
			$Cli->set_codSubcategoria($_GET['txtSubCat']);
			//echo $Cli-> get_codSubcategoria();	
			
			$Cli->set_fechaSalida($_GET['txtFecha']);
			//echo $Cli-> get_fechaSalida();			
			
			$Cli->set_codPlataforma($_GET['txtPlat']);
			//echo $Cli-> get_codPlataforma();	
			
			$Cli->set_codProveedor($_GET['txtProve']);
			//echo $Cli-> get_codProveedor();
				
			$Cli->set_precio($_GET['txtPrecio']);
			//echo $Cli-> get_precio();
			
			$Cli->set_stock($_GET['txtStock']);
			//echo $Cli-> get_stock();
			
			$Cli->set_descripcion($_GET['txtDescripcion']);
			//echo $Cli-> get_descripcion();
			


			$Cli->PrInsertJuegos();
		}
	
	if(isset($_GET['btEliminacion']))
		{
			require_once("Class\LibProy.php"); 
			$Cli= new Emple;

			$Cli->set_codJuego($_GET['codigo']);
			//echo $Cli-> get_codJuego();
			
			$Cli->EliminarJuegos();


		}
	
	if(isset($_GET['btEliminar']))
		{
			require_once("Class\LibProy.php"); 
			$Cli= new cliente;

			$Cli->set_codigo($_GET['codigo']);
			//echo $Cli-> get_codJuego();
			
			$Cli->delete();


		}


?>
</body>

</html>
