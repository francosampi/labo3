<?php

include_once "DAO.php";

class Usuario{
    public int $id;
    public string $nombre;
    public string $apellido;
    public string $mail;
    public string $clave;
    public string $localidad;
    public $fecha;

    public function __construct($_nombre, $_apellido, $_mail, $_clave, $_localidad) {
        $this->id = rand(1, 10000);
        $this->nombre = $_nombre;
        $this->apellido = $_apellido;
        $this->mail = $_mail;
        $this->clave = $_clave;
        $this->localidad = $_localidad;
        $this->fecha = date("Y-m-d H:i:s");
    }

    public static function insertarUsuarioTabla(Usuario $usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (id,nombre,apellido,mail,clave,localidad,fecha_de_registro) values (:id,:nombre,:apellido,:mail,:clave,:localidad,:fecha)");
		$consulta->bindValue(':id', $usuario->id, PDO::PARAM_INT);
		$consulta->bindValue(':nombre', $usuario->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':apellido', $usuario->apellido, PDO::PARAM_STR);
		$consulta->bindValue(':mail', $usuario->mail, PDO::PARAM_STR);
		$consulta->bindValue(':clave',$usuario->clave, PDO::PARAM_STR);
		$consulta->bindValue(':localidad',$usuario->localidad, PDO::PARAM_STR);
		$consulta->bindValue(':fecha', $usuario->fecha, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

    public static function traerUsuarios()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,apellido,mail,clave,localidad,fecha_de_registro as fecha from usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
    }

    public static function equals(Usuario $usuarioUno, Usuario $usuarioDos)
    {
        return ($usuarioUno->id==$usuarioDos->id && $usuarioUno->nombre==$usuarioDos->nombre && $usuarioUno->mail==$usuarioDos->mail && $usuarioUno->clave==$usuarioDos->clave);
    }

    public static function mostrarTablaUsuario(Usuario $usuario)
    {
        echo '<ul>'.
            '<li> Id: '.$usuario->id.'</li>'.
            '<li> Nombre: '.$usuario->nombre.'</li>'.
            '<li> Mail: '.$usuario->mail.'</li>'.
            '<li> Clave: '.$usuario->clave.'</li>'.
            '<li> Fecha de registro: '.$usuario->fecha.'</li>'.
        '</ul>';
    }
}

?>