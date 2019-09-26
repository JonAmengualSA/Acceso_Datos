<?php

	if (isset ($_POST['btIniciar']))
		{
			$nombre=$_POST['txtNombre'];
			$contrasena=$_POST['txtPwd'];
	
			if($nombre!="" && $contrasena!="")
			{
				$conexion =mysqli_connect("localhost","root","","asir-jona");
				
				$str="SELECT codigo,nickName,saldo FROM cliente WHERE nickName='$nombre' AND contrasena='$contrasena'";
     			 $deposito=mysqli_query($conexion,$str);
      
     			 $fila=mysqli_fetch_assoc($deposito);      
      				//echo $fila["codigo"];

				if(!$fila["codigo"])
				{
					$str="SELECT codigo, nombre FROM empleado WHERE nombre='".$nombre."' AND contrasena='".$contrasena."'";
					 $deposito=mysqli_query($conexion,$str);
      
    	 			 $fila=mysqli_fetch_assoc($deposito);      
    	  				//echo $fila["codigo"];

					
					if(!$fila["codigo"])
					{
						header("location:Registrar.php");
				
						
					}
					
					else
					{						
					//echo $fila["codigoUsuario"];
						session_start();
						$_SESSION['ID']=$fila["codigo"];
						$_SESSION['Nombre']=$fila["nombre"];
						header("location:Empleados.php");
					}

				}
				else 
				{
					//echo $str;
					$deposito=mysqli_query($conexion,$str);
				
					$fila = mysqli_fetch_assoc($deposito);
				
					//echo $fila["codigoUsuario"];
					session_start();
					$_SESSION['ID']=$fila["codigo"];
					$_SESSION['Nombre']=$fila["nombre"];
					header("location:shop.php");

				}	
			}
			
		}
		
			
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
<title>Inicio</title>
       <link rel="stylesheet" 
    href="Class/estilos.css" />
    
    <style>
        html{background: url( Class/21.jpg)}
    </style>
</head>
<body>
    
	<form method="post" action="">
       <div class="header"></div>
        <div class="row">
        <div class="column side"></div>
        
        <div class="column middel" >
          <div style="background-color: #F5F5F5; padding:inherit ">
                <img src="Class/logo.PNG"style="width:60%;height:100%;margin:0px 20%;align:middle;"><br>

                <input name="txtNombre" type="text" maxlength="20" placeholder="Inserte su nickname" style="width: 156px; margin:1px 40%;" required><br >
                <input name="txtPwd" type="password" maxlength="20"  placeholder="Contraseña"   style="width: 156px;margin:1px 40%;" required><br >
                <input name="btIniciar" type="submit" value="Iniciar" style="width: 156px;margin:1px 40%;" ><br >
                <a href="Registrar.php" style="margin:0px 45%;">Registrarse</a>
            </div>
      </div>
   
        
        <div class="column side">   </div>
    </div>
    
        <div class="footer"><a href="Registrar.php"> Español(España)</a> <a href="Registrar.php"> Català</a> <a href="Registrar.php"> English(US)</a> <a href="Registrar.php"> Français(France)</a> <a href="Registrar.php"> Română</a> <a href="Registrar.php"> Italiano</a> <a href="Registrar.php"> Galego </a><a href="Registrar.php"> Deutsch</a> <a href="Registrar.php"> Português(Brasil)</a> <a href="Registrar.php">  العربيةहिन्दी</a>
        <br>
            El contenido de esta página es demasiado importante como para hacerle caso solo al pie de página.<br>
            Porfavor centrese y deje de leer esto.<br>
            <p style="color:gray;">TodoFlores © 2018</p>
        </div>
	</form>
</body>

</html>
