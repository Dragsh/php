<?php

// генерация случайного вещественного числа
function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
} // random_float

// рассчет периметра и площади
// равностороннего треугольника
function trianglePS($a, &$p, &$s) {
    // вычисление периметра и площади
    $p = 3 * $a;
    $s = $a * $a * sqrt(3/4);;
} //  trianglePS

// x - минимальное, y - максимальное
function minMax(&$x,&$y){
    if($x > $y)
        list($x, $y) = array($y, $x);
} // minMax

// по возрастанию
function sortInc3(&$a, &$b, &$c){
    $numbers = array($a, $b, $c);
    asort($numbers);
    $a = array_shift($numbers);
    $b = array_shift($numbers);
    $c = array_shift($numbers);
} // sortInc3