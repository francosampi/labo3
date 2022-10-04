<?php

//Franco Sampietro

/*Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

function invertirCaracteres($arr)
{
    $arrInv=array();
    
    for($i=count($arr)-1; $i>-1; $i--)
        array_push($arrInv, $arr[$i]);

    return $arrInv;
}

$saludo = array('H', 'O', 'L', 'A');

echo "Arreglo normal: <br>";
foreach($saludo as $valor)
    echo $valor;

echo "<br><br> Arreglo invertido: <br>";
foreach(invertirCaracteres($saludo) as $valor)
    echo $valor;

?>