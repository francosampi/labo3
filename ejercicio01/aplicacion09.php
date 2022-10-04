<?php

//Franco Sampietro

/*Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/

$lapicera['color']="rojo";
$lapicera['marca']="bic";
$lapicera['trazo']="fino";
$lapicera['precio']= '$30 ARS';

echo "Lapicera 1: ";
foreach($lapicera as $valor)
    echo "<br> -",$valor;

$lapicera['color']="verde";
$lapicera['marca']="bic";
$lapicera['trazo']="grueso";
$lapicera['precio']= '$35 ARS';

 echo "<br><br>Lapicera 2: ";
 foreach($lapicera as $valor)
     echo "<br> -",$valor;

$lapicera['color']="azul";
$lapicera['marca']="bic";
$lapicera['trazo']="fino";
$lapicera['precio']= '$30 ARS';

echo "<br><br>Lapicera 3: ";
foreach($lapicera as $valor)
    echo "<br> -",$valor;

?>