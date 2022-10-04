<?php

//Franco Sampietro

/*Aplicación No 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
*/

include_once "aplicacion17_clase_auto.php";

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
        if (count($this->_autos)!=0)
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
}

echo '<br>****Genero autos y garaje****<br>';

$auto1 = new Auto('TOYOTA', 'Blanco', 500000);
$auto2 = new Auto('FORD', 'Rojo', 600000);

$garaje = new Garaje('GARAJE SAMPI SA.', 350);
$garaje->MostrarGaraje();

echo '<br>****Agrego un auto****<br>';

$garaje->Add($auto1);
$garaje->MostrarGaraje();

echo '<br>****Agrego otro auto****<br>';

$garaje->Add($auto2);
$garaje->MostrarGaraje();

echo '<br>****Remuevo un auto****<br>';

$garaje->Remove($auto1);
$garaje->MostrarGaraje();

echo '<br>****Remuevo otro auto****<br>';

$garaje->Remove($auto2);
$garaje->MostrarGaraje();

?>