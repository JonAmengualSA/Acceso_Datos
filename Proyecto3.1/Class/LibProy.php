<?php
 class Conectar{

    public static function conexion()
        {
            $conexion=new mysqli("localhost","root","","asir-jona");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }
}


class cliente
    {
        private $bd;
        private $nickName;
        private $nombre;
        private $apellido;
        private $contrasena;
        private $telefono;
        private $direccion; 
        private $DNI;
        private $email;
        private $sexo;
        private $saldo;


           public function __construct()
            {
              $this->bd=Conectar::conexion();
             }
             
           
			function get_codigo() 
                {
                    return $this->codigo;
                }
            function set_codigo($codigo) 
                {
                    $this->codigo=$codigo;
                }

    

            function get_nickName() 
                {
                    return $this->nickName;
                }
            function set_nickName($nickName) 
                {
                    $this->nickName=$nickName;
                }
    
            function get_nombre() 
                {
                    return $this->nombre;
                }
            function set_nombre($nombre) 
                {
                    $this->nombre=$nombre;
                }

            function get_apellido() 
                {
                    return $this->apellido;
                }
            function set_apellido($apellido) 
                {
                    $this->apellido=$apellido;
                }


            function get_contrasena() 
                {
                    return $this->contrasena;
                }
            function set_contrasena($contrasena) 
                {
                    $this->contrasena=$contrasena;
                }


            function get_telefono() 
                {
                    return $this->telefono;
                }
            function set_telefono($telefono) 
                {
                    $this->telefono=$telefono;
                }

            function get_direccion() 
                {
                    return $this->direccion;
                }
            function set_direccion($direccion) 
                {
                    $this->direccion=$direccion;
                }

            function get_DNI() 
                {
                    return $this->DNI;
                }
            function set_DNI($DNI)
                {
                 $this->DNI=$DNI;
                }

    
            function get_email() 
                {
                    return $this->email;
                }
            function set_email($email)
                {
                    $this->email=$email;
                }


           function get_sexo()
                {
                    return $this->sexo;
                }
            function set_sexo($sexo) 
                {
                    $this->sexo=$sexo;
                }



            function insertarPr()
                {
                    $datos=$this->bd->query("call pr_altaCliente(@p_salida,'".$this->nombre."','".$this->apellido."','".$this->contrasena."','".$this->telefono."','".$this->direccion."','".$this->DNI."','".$this->email."','".$this->sexo."','".$this->nickName."')");				
                }
    
            function delete()
                {
                    $datos=$this->bd->query("Delete from clientes Where codCliente='".$this->codigo."' ");					
                }

            function ConsultaNick()
                {
                   $datos=$this->bd->query("Select nickName from clientes Where nickName='".$this->nickName."' "); 
                    return $datos;
                }

    }
class Saldo
    {
        private $bd;
        private $nombre;
        private $codigo;
        private $saldo;
    
           public function __construct()
                {
                    $this->bd=Conectar::conexion();
                }

            function get_codigo()
                {
                    return $this->codigo;
                }
            function set_codigo($codigo)
                {
                    $this->codigo=$codigo;
                }
    
            function get_Saldo() 
                {
                    return $this->saldo;
                }
            function set_Saldo($saldo) 
                {
                    $this->saldo=$saldo;
                }
    
            function UpdatePr()
                {
                    $datos=$this->bd->query("call pr_Saldo(@p_salida,'".$this->codigo."','".$this->saldo."')");
                }
    }

class Empleado
    {
        private $bd;  
        public $datos;
            public function __construct()
                        {
                            $this->bd=Conectar::conexion();
                            $this->juegos=array();
                            
                        }
            function consulJuegos()
                {
                    $datos=$this->bd->query("Select ju.codJuego, ju.nombre, cat.descripcion as categoria, ca2.descripcion as subCategoria, ju.fechaSalida, pla.plataforma, pro.proveedor, ju.precio, ju.stock, ju.calificacion, ju.descripcion from juegos as ju JOIN categorias as cat on ju.codCategoria=cat.codCat JOIN categorias AS ca2 ON ju.codSubcategoria=ca2.codCat JOIN plataforma as pla on ju.codPlataforma=pla.codPlataforma JOIN proveedor as pro on ju.codProveedor= pro.codigo"); 
                    
                    
                    	while ($fila=mysqli_fetch_assoc($datos))
                    		$this->juegos[]=$fila;
                    		
                    	
                    return $this->juegos;;
                }
    }
class Emple
	{
		private $bd;
        private $codJuego;
        private $nombre;
        private $codCategoria;
        private $codSubcategoria;
        private $fechaSalida;
        private $codPlataforma; 
        private $codProveedor;
        private $precio;
        private $stock;
        private $descripcion;


           public function __construct()
            {
              $this->bd=Conectar::conexion();
             }
    

            function get_codJuego() 
                {
                    return $this->codJuego;
                }
            function set_codJuego($codJuego) 
                {
                    $this->codJuego=$codJuego;
                }
    
    
            function get_nombre() 
                {
                    return $this->nombre;
                }
            function set_nombre($nombre) 
                {
                    $this->nombre=$nombre;
                }
                

            function get_codCategoria() 
                {
                    return $this->codCategoria;
                }
            function set_codCategoria($codCategoria) 
                {
                    $this->codCategoria=$codCategoria;
                }



            function get_codSubcategoria() 
                {
                    return $this->codSubcategoria;
                }
            function set_codSubcategoria($codSubcategoria) 
                {
                    $this->codSubcategoria=$codSubcategoria;
                }



            function get_fechaSalida() 
                {
                    return $this->fechaSalida;
                }
            function set_fechaSalida($fechaSalida) 
                {
                    $this->fechaSalida=$fechaSalida;
                }
                
                

            function get_codPlataforma() 
                {
                    return $this->codPlataforma;
                }
            function set_codPlataforma($codPlataforma) 
                {
                    $this->codPlataforma=$codPlataforma;
                }
                
                

            function get_codProveedor() 
                {
                    return $this->codProveedor;
                }
            function set_codProveedor($codProveedor)
                {
                 $this->codProveedor=$codProveedor;
                }


    
            function get_precio() 
                {
                    return $this->precio;
                }
            function set_precio($precio)
                {
                    $this->precio=$precio;
                }



           function get_stock()
                {
                    return $this->stock;
                }
            function set_stock($stock) 
                {
                    $this->stock=$stock;
                }

                
	
	
		  function get_descripcion()
                {
                    return $this->descripcion;
                }
            function set_descripcion($descripcion) 
                {
                    $this->descripcion=$descripcion;
                }




            function PrInsertJuegos()
                {
                    $datos=$this->bd->query("CALL pr_altaJuegos('".$this->codJuego."','".$this->nombre."','".$this->codCategoria."','".$this->codSubcategoria."','".$this->fechaSalida."','".$this->codPlataforma."','".$this->codProveedor."','".$this->precio."','".$this->stock."','".$this->descripcion."',@p_salida)");				
                }
                
                
           	function EliminarJuegos()
                {
                    $datos=$this->bd->query("DELETE FROM juegos WHERE codJuego= '".$this->codJuego."'");
                }

	}


                
?>