<?php

//Franco Sampietro

/*Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems
,por POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases
*/

include_once "clase_usuario.php";
include_once "clase_producto.php";
include_once "clase_venta.php";

switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        if (isset($_POST['id']) && isset($_POST['codigo']) && isset($_POST['cantidad']))
        {
            Venta::realizarVenta($_POST['id'], $_POST['codigo'], $_POST['cantidad']);
        }
        break;
}