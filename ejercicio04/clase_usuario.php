<?php

class Usuario{
    public string $nombre;
    public string $clave;
    public string $mail;
    public int $id;
    public $fecha;
    public $img;

    public function __construct($_nombre, $_clave, $_mail) {
        $this->nombre = $_nombre;
        $this->clave = $_clave;
        $this->mail = $_mail;
        $this->id = rand(1, 10000); //
        $this->fecha = date("Y-m-d H:i:s");
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getClave(){
        return $this->clave;
    }

    public function getMail(){
        return $this->mail;
    }

    public static function guardarUsuarioCSV(Usuario $usuario)
    {
        $ruta='usuarios.csv';
        $archivo = fopen($ruta, 'a');

        if (!empty($usuario))
            $oper=fwrite($archivo, implode(',',[$usuario->getNombre(), $usuario->getClave(), $usuario->getMail()]).PHP_EOL);
        fclose($archivo);

        if ($oper!=false)
            echo 'Se guardó el usuario!'.PHP_EOL;
    }

    public static function leerUsuarios()
    {
        $ruta='usuarios.csv';
        $archivo = fopen($ruta, 'r');

        while(!feof($archivo))
        {
            $usuario = fgetcsv($archivo);
            if (!empty($usuario))
                Usuario::mostrarTablaUsuario($usuario);
        }
        fclose($archivo);
    }

    public static function validarUsuario($clave, $mail)
    {
        $ruta='usuarios.csv';
        $archivo = fopen($ruta, 'r');

        echo '****Cargando****<br>';
        while(!feof($archivo))
        {
            $usuario = fgetcsv($archivo);
            if (!empty($usuario) && $usuario[2]==$mail && $usuario[1]==$clave)
            {
                echo '****Iniciando sesión****<br><br>Bienvenido, '.$usuario[0].'!';
                break;
            }     
        }
        fclose($archivo);
    }

    public static function guardarUsuarioJSON(Usuario $usuario)
    {
        $ruta='usuarios.json';
        $data = json_decode(file_get_contents($ruta));
        $ret=0;

        if (!empty($data))
        {
            if(Usuario::existeUsuarioJSON($data, $producto)!=NULL)
                $ret=1;
            else
                array_push($data, $usuario);
        }    
        else
            $data=array($usuario);

        $archivo = fopen($ruta, 'w');
        $oper=fwrite($archivo, json_encode($data));

        if ($oper!=false && fclose($archivo))
            echo $ret==0?"Se ha registrado el usuario!".PHP_EOL:"Ya existe ese usuario en la base de datos!".PHP_EOL;
    }

    public static function existeUsuarioJSON($data, Usuario $usuario)
    {
        $usuarioExistente=null;

        foreach ($data as $item) {
            if (Usuario::equals($item, $usuario))
            {
                $usuarioExistente=$item;
                break;
            }
        }
        return $usuarioExistente;
    }

    public static function existeUsuarioJSON_ID($data, $id)
    {
        $usuarioExistente=null;

        foreach ($data as $item) {
            if ($item->id==$id)
            {
                $usuarioExistente=$item;
                break;
            }
        }
        return $usuarioExistente;
    }

    public static function equals(Usuario $usuarioUno, Usuario $usuarioDos)
    {
        return ($usuarioUno->id==$usuarioDos->id && $usuarioUno->nombre==$usuarioDos->nombre && $usuarioUno->mail==$usuarioDos->mail && $usuarioUno->clave==$usuarioDos->clave);
    }

    public static function mostrarTablaUsuarioArreglo(Usuario $usuario)
    {
        echo '<ul>'.
            '<li> Nombre: '.$usuario[0].'</li>'.
            '<li> Clave: '.$usuario[1].'</li>'.
            '<li> Mail: '.$usuario[2].'</li>'.
            '<li> Id: '.$usuario[3].'</li>'.
        '</ul>';
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