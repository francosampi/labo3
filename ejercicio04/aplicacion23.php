<?php

//Franco Sampietro

/*Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/

include_once "clase_usuario.php";

switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        if (isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail']))
        {
            $usuario = new Usuario($_POST['nombre'], $_POST['clave'], $_POST['mail']);
            
            Usuario::guardarUsuarioJSON($usuario);

            $destinoImagen = 'Usuarios/Fotos/'.$_FILES['img']['name'];
            $usuario->img=$destinoImagen;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $destinoImagen))
                echo "<br>Se ha subido la imagen '".$_FILES['img']['name']."'!";
        }
        break;
}

?>