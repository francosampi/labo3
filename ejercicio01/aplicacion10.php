<?php

//Franco Sampietro

/*Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

$arrLapicerasIndexadas=array();

$lapicera1['color']="rojo";
$lapicera1['marca']="bic";
$lapicera1['trazo']="fino";
$lapicera1['precio']= '$30 ARS';

$lapicera2['color']="verde";
$lapicera2['marca']="bic";
$lapicera2['trazo']="grueso";
$lapicera2['precio']= '$35 ARS';

$lapicera3['color']="azul";
$lapicera3['marca']="bic";
$lapicera3['trazo']="fino";
$lapicera3['precio']= '$30 ARS';

$arrLapicerasIndexadas[0]=$lapicera1;
$arrLapicerasIndexadas[1]=$lapicera2;
$arrLapicerasIndexadas[2]=$lapicera3;

foreach($arrLapicerasIndexadas as $lapicera)
{
    echo "<br>Lapiceras arreglo indexado:";
    foreach($lapicera as $valor)
        echo "<br> -",$valor;
    echo "<br>";
}

$arrLapicerasAsociativo["lapicera1"]=$lapicera1;
$arrLapicerasAsociativo["lapicera2"]=$lapicera2;
$arrLapicerasAsociativo["lapicera3"]=$lapicera3;

foreach($arrLapicerasAsociativo as $lapicera)
{
    echo "<br>Lapiceras arreglo asociativo:";
    foreach($lapicera as $valor)
        echo "<br> -",$valor;
    echo "<br>";
}
    
?>