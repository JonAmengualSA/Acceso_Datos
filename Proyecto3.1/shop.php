<?php
		session_start();
	if (!isset ($_SESSION['ID']))	
	{
		header("location:Inicio.php");
	
	}	
		
		
	if (isset ($_POST['btSaldo']))
		{
			require_once("Class\LibProy.php"); 
				$Sal= new Saldo(); 
	
				$Sal->set_codigo($_SESSION['ID']);
	
			$Sal->set_Saldo($_POST['txtSaldo']);
			
			$Sal->UpdatePr();			


	
		}
		
	    if (isset ($_POST['btExit']))
        {
            
            header("location:Inicio.php");
            session_destroy();
        }
        
        
        

?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>TodoFlores 1</title>
   <link rel="stylesheet" 
    href="Class/estilos.css" />
        <style>
        html{background: url( Class/21.jpg);
            }
    </style>
</head>

<body>
    
	<form method="post" action="">
		<div>
		
			<ul>
                <li><img src="Class/logo.PNG" style="width:50px;height:50px;bacground-color:black;"></li>
                <li> <input  name="btCategorias" type="submit" value="Categorias" /></li>
                
					<li><input  name="btPlataforma" type="submit" value="Plataformas" /></li>
					<li><input  name="btJuegos" type="submit" value="Todos los Juegos" /></li>
				<li style="float:right;"><input name="btExit" type="submit" value="Cerrar" /></li>
                <li style="float:right;"><input name="txtBuscar" type="text" placeholder="Buscar" /> <input  name="btBuscar" type="submit" value="Buscar" /></li>
                <li style="float:right;"><input name="txtSaldo" type="text" placeholder="Saldo" /> <input  name="btSaldo" type="submit" value="Añadir Saldo" /></li>
            </ul>	
            </div>	
            <br>
            <br>
            <br>
	</form>
<?php

	if (isset ($_POST['btCategorias']))
        {	$conexion =mysqli_connect("localhost","root","","asir-jona");
        	$consulta='SELECT descripcion,codCat FROM categorias';
        	$resultado = mysqli_query($conexion,$consulta);
        	echo'<form method="post" action="" style="display: inline-block;">';
        	echo'<div>';
        	while ($fila = mysqli_fetch_array($resultado)) 
	            			{	
	            				echo'<div style="width:10%">';
	            				echo '<img src="Class/PortadaVJ.png" style="width:175px;height:150px;bacground-color:black;"><br><input type="submit" value="'.$fila['descripcion'].'">';
	            				echo '</div>';
	            			}
	         
        	echo '</div></form>';

        }

?>	



</body>

</html>
