<?php

class Usuario{
    private string $nombre;
    private string $clave;
    private string $mail;

    public function __construct($_nombre, $_clave, $_mail) {
        $this->nombre = $_nombre;
        $this->clave = $_clave;
        $this->mail = $_mail;
    }

    public static function guardarUsuario($usuario)
    {
        $ruta='usuarios.csv';
        $archivo = fopen($ruta, 'a');
    
        $oper=fwrite($archivo, implode(',',[$usuario->nombre, $usuario->clave, $usuario->mail]).PHP_EOL);
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

    public static function mostrarTablaUsuario($usuario)
    {
        echo '<ul>'.
            '<li>'.$usuario[0].'</li>'.
            '<li>'.$usuario[1].'</li>'.
            '<li>'.$usuario[2].'</li>'.
        '</ul>';
    }
}

?>