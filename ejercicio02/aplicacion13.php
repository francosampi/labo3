<?php

//Franco Sampietro

/*Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/

function comprobarMaxString($palabra, $max=0)
{
    $palabrasValidas=array('Recuperatorio', 'Parcial', 'Programacion');

    echo '<br>', $palabra, '<br>';

    if (strlen($palabra)>$max)
        echo 'Supera la cantidad de ', $max, ' caracteres...<br>';
    else   
        echo 'No supera la cantidad de ', $max, ' caracteres...<br>';

    foreach($palabrasValidas as $valor)
    {
        if (strcmp($palabra, $valor)==0)
        {
            echo $valor, ' se encuentra en el listado.<br>';
            return 1;
        }
    }
    return 0;
}

comprobarMaxString('Franco');
comprobarMaxString('Franco', 7);
comprobarMaxString('Recuperatorio', 1);

?>