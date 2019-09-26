<?php	

	

		if(isset($_POST['btRegistrar']))
		{	require_once("Class\LibProy.php"); 
			$Cli= new cliente(); 

			$Cli->set_nickName($_POST['txtNick']);
			echo $Cli-> get_nickName();
	
			$Cli->set_nombre($_POST['txtNombre']);
			echo $Cli-> get_nombre();
	
			$Cli->set_apellido($_POST['txtApellido']);
			echo $Cli-> get_apellido();
			
			$Cli->set_contrasena($_POST['txtPwd']);
			echo $Cli-> get_contrasena();	
			
			$Cli->set_telefono($_POST['txtTelef']);
			echo $Cli-> get_telefono();	
			
			$Cli->set_direccion($_POST['txtDirec']);
			echo $Cli-> get_direccion();
				
			$Cli->set_DNI($_POST['txtDNI']);
			echo $Cli-> get_DNI();
			
			$Cli->set_email($_POST['txtEmail']);
			echo $Cli-> get_email();

			$Cli->set_sexo($_POST['sexo']);
			echo $Cli-> get_sexo();


			$Cli->insertarPr();
				
			header("location:Inicio.php");
					
		}


        
?>


<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Registrate</title>
    
        <style>
        html{background: url( Class/21.jpg)}
    </style>
</head>

<body>
	<form method="post" action="">
	<div><input name="txtNick" type="text" placeholder="nickName" onkeyup="comprobar(this.value)" required/></div>
	<div><input name="txtNombre" type="text" placeholder="Nombre" required/></div>
	<div><input name="txtApellido" type="text" placeholder="Apellido" required/></div>
	<div><input name="txtPwd" type="password" placeholder="Contraseña" required/></div>	
	<div><input name="txtTelef" type="text" placeholder="Telefono" required/></div>
	<div><input name="txtDirec" type="text" placeholder="Direccion" required/></div>
	<div><input name="txtDNI" type="text" placeholder="DNI" required/></div>
	<div><input name="txtEmail" type="email" placeholder="Correo electronico" required/></div>
	<div><select name="sexo"  required >
				<option value="">Sexo</option>
				<option value="H">Hombre</option>
				<option value="M">Mujer</option>
	</select></div>
	<div><input name="btRegistrar" type="submit" value="Registrarse" /></div>
	
	</form>
</body>

</html>