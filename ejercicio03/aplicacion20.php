<?php

include_once "aplicacion19_clase_auto.php";

class Garaje
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos=array();

    public function __construct($_razonSocial, $_precioPorHora)
    {
        $this->_razonSocial = $_razonSocial;
        if(is_float($_precioPorHora))
            $this->_precioPorHora = $_precioPorHora;
    }

    public function MostrarGaraje()
    {
        echo '----------<br>Razon social: ',$this->_razonSocial, '<br>Precio por hora: ',$this->_precioPorHora, '<br>Autos:<br>';
        if (!empty($this->_autos))
        {
            foreach ($this->_autos as $key) {
                Auto::MostrarAuto($key);
            }
        }
        else
            echo'(VACÍO)';
        echo '<br>';
    }

    public function Equals(Garaje $garaje, Auto $auto)
    {
        foreach ($garaje->_autos as $key) {
            if($key->Equals($key, $auto))
                return true;
        }
        return false;
    }

    public function Add(Auto $auto)
    {
        if($this->Equals($this, $auto))
            echo '<br>Este auto ya se encuentra en el garaje...';
        else
            array_push($this->_autos, $auto);
    }

    public function Remove(Auto $auto)
    {
        if($this->Equals($this, $auto))
        {
            $key = array_search($auto, $this->_autos);
            unset($this->_autos[$key]);
        }
    }

    public function guardarGaraje()
    {
        $ruta='garajes.csv';
        $archivo = fopen($ruta, 'w');

        fwrite($archivo, $this->_razonSocial.', '.$this->_precioPorHora. PHP_EOL);
        foreach($this->_autos as $auto)
            fwrite($archivo, Auto::datosAutoCSV($auto));
        fwrite($archivo, '/');
        fclose($archivo);
    }

    public static function leerGarajes()
    {
        $ruta='garajes.csv';
        $archivo = fopen($ruta, 'r');

        while(!feof($archivo))
        {
            $arrayGaraje = fgetcsv($archivo, 0, '/');
            if (!empty($arrayGaraje))
            {
                $garaje=new Garaje($arrayGaraje[0], (double)$arrayGaraje[1]);
                $garaje->MostrarGaraje();
            }
        }
        fclose($archivo);
    }
}

$garaje = new Garaje('GARAJE SAMPI SA.', 100.0);
$auto1 = new Auto('TOYOTA', 'Blanco', 500000);
$auto2 = new Auto('FORD', 'Rojo', 600000);

$garaje->Add($auto1);
$garaje->Add($auto2);

echo '****Guardo garaje en .csv****<br>';
$garaje->guardarGaraje();

echo '<br>****Leo lista de garajes de .csv****<br>';
Garaje::leerGarajes();

?>