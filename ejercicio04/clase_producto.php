<?php

class Producto{
    public int $id;
    public string $codigo;
    public string $nombre;
    public string $tipo;
    public int $stock;
    public float $precio;
    
    public function __construct($_codigo="000000", $_nombre="", $_tipo="", $_stock=1, $_precio=0){
        $this->id=rand(1, 10000);
        $this->codigo=$_codigo;
        $this->nombre=$_nombre;
        $this->tipo=$_tipo;
        $this->stock=$_stock;
        $this->precio=$_precio;
    }

    public static function guardarProductoJSON(Producto $producto)
    {
        $ruta='productos.json';
        $data = json_decode(file_get_contents($ruta));
        $ret=0;

        if (!empty($data))
        {
            $item=Producto::existeProductoJSON($data, $producto);
            if($item!=NULL)
            {
                $item->stock+=$producto->stock;
                $ret=1;
            }
            else
                array_push($data, $producto);
        }
        else
            $data=array($producto);

        $archivo = fopen($ruta, 'w');
        $oper=fwrite($archivo, json_encode($data));

        if ($oper!=false && fclose($archivo))
            echo $ret==0?"Ingresado".PHP_EOL:"Actualizado".PHP_EOL;
    }

    public static function existeProductoJSON($data, Producto $producto)
    {
        $productoExistente=null;
        $itemPorCodigo=Producto::existeProductoJSON_codigo($data, $producto->codigo);

        if($itemPorCodigo!=NULL && $itemPorCodigo->nombre==$producto->nombre && $itemPorCodigo->tipo == $producto->tipo)
            $productoExistente=$itemPorCodigo;

        return $productoExistente;
    }

    public static function existeProductoJSON_codigo($data, $codigo)
    {
        $productoExistente=null;

        foreach ($data as $item) {
            if ($item->codigo==$codigo)
            {
                $productoExistente=$item;
                break;
            }
        }
        return $productoExistente;
    }
}