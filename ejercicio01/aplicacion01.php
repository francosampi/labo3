<?php

//Franco Sampietro

/*Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

$num=1;
$cantidadSumados=0;
$resultado=0;

while($resultado<1000)
{
    $resultado+=$num;
    $num++;
    $cantidadSumados++;
    echo ", ",$num;
}
echo "<br>Cantidad de numeros sumados: ", $cantidadSumados;

?>