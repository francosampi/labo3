<?php

//Franco Sampietro

/*Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

$arr;
$promedio=0;
define("TAM", 5);

for($i=0; $i<TAM; $i++)
{
    $arr[$i] = rand(0,10);
    echo $arr[$i], "-";
}

for($i=0; $i<TAM; $i++)
{
    $promedio+=$arr[$i];
}
$promedio/=TAM;

echo "<br>";

if ($promedio > 6)
    echo $promedio, " es mayor a 6";
else if ($promedio < 6)
    echo $promedio, " es menor a 6";
else
    echo $promedio, " es igual a 6";

?>