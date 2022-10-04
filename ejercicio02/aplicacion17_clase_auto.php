<?php

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_marca, $_color, $_precio=0, $_fecha = '-'){
        $this->_marca = $_marca;
        $this->_color = $_color;
        $this->_precio = $_precio;
        $this->_fecha = $_fecha;
    }

    public function AgregarImpuestos($impuesto)
    {
        $this->_precio+=$impuesto;
    }

    public static function MostrarAuto(Auto $_auto)
    {
        echo '----------<br>Marca: ',$_auto->_marca, '<br>Precio: ',$_auto->_precio, '<br>Color: ',$_auto->_color, '<br>Fecha: ',$_auto->_fecha, '<br>';
    }

    public function Equals(Auto $autoUno, Auto $autoDos)
    {
        return (strcmp($autoUno->_marca, $autoDos->_marca)==0);
    }

    public static function Add(Auto $autoUno, Auto $autoDos)
    {
        if(!(Auto::Equals($autoUno, $autoDos) && $autoUno->_color==$autoDos->_color))
        {
            echo '<br>No se pudo hacer la suma...<br>';
            return 0;
        }
        return $autoUno->_precio+$autoDos->_precio;
    }
}

?>