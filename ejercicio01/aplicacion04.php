<?php

//Franco Sampietro

/*Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

$n1=2;
$n2=2;
$operador='*';
$res=0;

switch($operador){
    case '+':
        echo ($n1 + $n2);
        break;
    case '-':
        echo ($n1 - $n2);
        break;
    case '*':
        echo ($n1 * $n2);
        break;
    case '/':
        if($n2 == 0){
            echo "No se permite división por 0";
        }else{
            echo ($n1 / $n2);
        }
        break;
}

?>