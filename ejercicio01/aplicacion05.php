<?php

//Franco Sampietro

/*Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

$num=63;

if ($num>59)
{
    echo "sesenta";
}
else if ($num>49)
{
    echo "cincuenta";
}
else if ($num>39)
{
    echo "cuarenta";
}
else if ($num>29)
{
    echo "treinta";
}
else if ($num>20)
{
    echo "veinti";
}
else if ($num==20)
{
    echo "veinte";
}

echo ($num%10==0 || ($num>19 && $num<30))?"":" y ";

$unidades=substr((string)$num, -1);
switch($unidades)
{
    case "1":
        echo "uno";
    break;
    case "2":
        echo "dos";
    break;
    case "3":
        echo "tres";
    break;
    case "4":
        echo "cuatro";
    break;
    case "5":
        echo "cinco";
    break;
    case "6":
        echo "seis";
    break;
    case "7":
        echo "siete";
    break;
    case "8":
        echo "ocho";
    break;
    case "9":
        echo "nueve";
    break;
}

?>