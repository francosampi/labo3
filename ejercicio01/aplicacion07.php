<?php

//Franco Sampietro

/*Aplicación No 7 (Mostrar impares) - CORRECCION
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.
*/

$arr=array();
$cantidadImpares=10;
$i=0;

while($cantidadImpares>0)
{
    if($i%2!=0)
    {
        array_push($arr, $i);
        $cantidadImpares--;
    }
    $i++;
}

echo "a- FOR<br>";
for($i=0; $i<count($arr); $i++)
{
    echo "<br>", $arr[$i];
}

$i=0;

echo "<br><br>b- WHILE<br>";
while($i<count($arr))
{
    echo "<br>", $arr[$i];
    $i++;
}

echo "<br><br>c- FOREACH<br>";
foreach($arr as $i)
{
    echo "<br>", $i;
}

?>