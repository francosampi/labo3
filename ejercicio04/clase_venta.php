<?php

class Venta{
    public string $id;
    public $fecha;
    public string $usuario;
    public string $cantidad;
    public string $nombre;
    
    public function __construct($_usuario, $_nombre, $_cantidad)
    {
        $this->id=rand(1, 10000);
        $this->usuario=$_usuario;
        $this->nombre=$_nombre;
        $this->cantidad=$_cantidad;
        $this->fecha=date("Y-m-d H:i:s");
    }

    public static function realizarVenta($_id, $_codigo, $_cantidad)
    {
        $ret=0;
        $ruta='productos.json';
        $data=json_decode(file_get_contents($ruta));
        $producto=Producto::existeProductoJSON_codigo($data, $_codigo);
        if($producto!=NULL && $producto->stock>=$_cantidad)
            echo 'El producto "'.$producto->nombre.'" existe! y tiene stock: x'.$producto->stock.PHP_EOL;
        else
        {
            echo 'El producto no existe o no tiene stock...'.PHP_EOL;
            $ret=1;
        }
    
        $ruta='usuarios.json';
        $data=json_decode(file_get_contents($ruta));
        $usuario=Usuario::existeUsuarioJSON_ID($data, $_id);
        if($usuario!=NULL)
            echo 'El usuario "'.$usuario->nombre.'" existe!'.PHP_EOL;
        else
        {
            echo 'El usuario no existe...'.PHP_EOL;
            $ret=1;
        }

        if($ret==0)
        {
            $venta = new Venta($usuario->nombre, $producto->nombre, $_cantidad);
            Venta::guardarVentaJSON($venta);    
        }
        else
            echo 'No se pudo realizar la venta...'.PHP_EOL;
    }

    public static function guardarVentaJSON(Venta $venta)
    {
        $ruta='ventas.json';

        $data = json_decode(file_get_contents($ruta));
        if ($data!=NULL)
            array_push($data, $venta);
        else
            $data=array($venta);

        $archivo = fopen($ruta, 'w');
        
        $oper=fwrite($archivo, json_encode($data));

        if ($oper!=false && fclose($archivo))
            echo 'Se registró la venta!'.PHP_EOL;
    }
}

?>