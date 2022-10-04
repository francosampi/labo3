<?php

class Auto
{
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_marca, $_color, $_precio=0, $_fecha = '-'){
        $this->_marca = $_marca;
        $this->_color = $_color;
        $this->_precio = $_precio;
        $this->_fecha = $_fecha;
    }

    public function agregarImpuestos($impuesto)
    {
        $this->_precio+=$impuesto;
    }

    public static function mostrarAuto(Auto $_auto)
    {
        echo '----------<br>Marca: '. $_auto->_marca. '<br>Precio: '. $_auto->_precio. '<br>Color: '. $_auto->_color. '<br>Fecha: '. $_auto->_fecha. '<br>';
    }

    public static function datosAutoCSV(Auto $_auto)
    {
        return $_auto->_marca.','.$_auto->_color.','.$_auto->_precio.','.$_auto->_fecha;
    }

    public function equals(Auto $autoUno, Auto $autoDos)
    {
        return (strcmp($autoUno->_marca, $autoDos->_marca)==0);
    }

    public static function Add(Auto $autoUno, Auto $autoDos)
    {
        if(!(Auto::equals($autoUno, $autoDos) && $autoUno->_color==$autoDos->_color))
        {
            echo '<br>No se pudo hacer la suma...<br>';
            return 0;
        }
        return $autoUno->_precio+$autoDos->_precio;
    }

    public static function guardarAutos($_autos)
    {
        $ruta='autos.csv';
        $archivo = fopen($ruta, 'w');

        foreach($_autos as $item)
            fwrite($archivo, $item->_marca.', '.$item->_color.', '.$item->_precio.', '.$item->_fecha. PHP_EOL);
        
        fclose($archivo);
    }

    public static function leerAutos($_autos)
    {
        $ruta='autos.csv';
        $archivo = fopen($ruta, 'r');

        while(!feof($archivo))
        {
            $arrayAuto = fgetcsv($archivo);
            if ($arrayAuto!=[])
                Auto::mostrarAuto(new Auto($arrayAuto[0], $arrayAuto[1], (double)$arrayAuto[2], $arrayAuto[3]));
        }
        fclose($archivo);
    }
}

?>