<?php

//Franco Sampietro

/*Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

$fecha=date("m/d");

echo "<i> Hoy es: ", $fecha, "</i> <br>";
echo "<strong> Hoy es: ", date("y/m/d h:i:s"), "</strong> <br>";

if ($fecha>date("m/d", strtotime("11/21")) && $fecha<date("m/d", strtotime("4/20")))
{
    echo "Verano, <br>";
}
else if ($fecha>date("m/d", strtotime("2/21")) && $fecha<date("m/d", strtotime("7/20")))
{
    echo "Otoño, <br>";
}
else if ($fecha>date("m/d", strtotime("5/21")) && $fecha<date("m/d", strtotime("10/20")))
{
    echo "Invierno, <br>";
}
else
{
    echo "Primavera, <br>";
}

?>