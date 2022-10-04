<?php

//Franco Sampietro

/*Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.

Aplicación No 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>
*/

include_once "usuarioModel.php";

switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']))
        {
            $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['mail'], $_POST['localidad']);
            Usuario::insertarUsuarioTabla($usuario);
        }
        break;
    case 'GET':
        if (isset($_GET['listado']))
        {
            switch ($_GET['listado']) {
                case 'usuarios':
                    Usuario::traerUsuarios();
                    break;
            }
        }
        break;
}

?>