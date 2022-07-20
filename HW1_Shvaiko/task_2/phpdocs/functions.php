<?php

#region вспомогательные функции
// генерация случайного вещественного числа
function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
} // random_float

// создание и заполнение массива случайными числами
function fillArray(){
    for($i=0;$i<rand(5, 10);$i++){
        $temp = random_float(-5, 5);
        $array[]= $temp < 1 ? $temp > -1 ? 0 : $temp : $temp;
    }
    return $array;
} // fillArray

// заполнение двумерного массива случайными числами
function fillMaxtrix(){
    $matrix = [];  // матрица - массив массивов, т.е. м.б. зубчатым массивом
    define("ROWS", rand(3, 5));  // строк в матрице
    define("COLS", rand(6, 9));  // столбцов в матрице
    // создание матрицы
    for ($i = 0; $i < ROWS; $i++) {
        $matrix[$i] = [];  // добавить ссылку на строку

        // заполняем строку элементами
        for($j = 0; $j < COLS; $j++) {
            $matrix[$i][$j] = rand(-10, 10);
        } // for $j
    } // for $i

    return $matrix;
} // fillMaxtrix

// вывод массива в браузер
function showArray($array){
//    foreach ($array as $item){
//        echo $item >= 0 ? "<span class='badge badge-danger'>" : "<span class='badge badge-primary'>",
//        sprintf("%01.2f", $item);
//        echo "</span>&#8195";
//    } // foreach

    array_walk($array, function($item){
        echo $item >= 0 ? "<span class='badge badge-danger'>" : "<span class='badge badge-primary'>",
        sprintf("%01.2f", $item);
        echo "</span>&#8195";
    }); // foreach
} // showArray

// вывод матрицы в браузер
function showMatrix($matrix){
    echo "<table class='table table-bordered'>";
    foreach ($matrix as $rows){
        echo "<tr>";
        foreach ($rows as $elem) {
            echo "<td class='text-center'>";
            echo $elem >= 0 ? "<span class='badge badge-danger'>" : "<span class='badge badge-primary'>";
            echo $elem;
            echo "</span></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} // showMatrix
#endregion

#region Задача 1
// Вычислить количество элементов массива, равных нулю
function zeroElems($array){
    return count(array_filter($array, function($item){return $item === 0;}));
} // zeroElems

// Вычислить количество отрицательных элементов массива
function negativeElems($array){
    return count(array_filter($array, function($item){return $item < 0;}));
} // negativeElems

// Вычислить сумму элементов массива, расположенных после минимального элемента
function sumAfterMin($array){
    return array_sum(array_slice($array, array_search(min($array), $array) + 1));
} // sumAfterMin

// Вычислить сумму модулей элементов массива, расположенных после минимального по модулю элемента
function sumAfterAbsMin($array){
    $min = $array[0];
    $index = 0;
    foreach ($array as $key => $value) {
        if(abs($min) >  abs($value)){
            $min = $value;
            $index = $key;
        } // if
    } // foreach

    return array_sum(array_map(function ($item){return abs($item);}, array_slice($array, $index + 1)));
} // sumAfterAbsMin

// Упорядочить элементы массива по возрастанию модулей
function sortByIncreaseAbs($array){
    usort($array, function($a, $b) { return abs($a) <=> abs($b); });
    return $array;
} // sortByIncreaseAbs

// Заменить все отрицательные элементы массива их квадратами и упорядочить элементы массива по возрастанию
function squareNegSortByAscending($array){
    $arrayTemp = array_map(function ($item) {
        return ($item < 0 ? $item * $item : $item);
    }, $array);
    natsort($arrayTemp);

    return $arrayTemp;
} // squareNegSortByAscending

// Удалить все отрицательные элементы массива
function delNegElems($array){
    return array_diff($array, array_filter($array, function ($item){return $item < 0;}));
} // delNegElems

// После первого элемента и перед последними элементом массива вставить элемент со значением -1010.
function insertElems($array){
    $newVal = array(-1010);
    return array_merge(array_slice($array,0,1), $newVal,
                    array_slice($array,1, -1), $newVal,
                    array_slice($array,-1));
} // insertElems
#endregion

#region Задача 2
// сумма элементов строк матрицы, в которых
// есть минимум один отрицательный элемент
function sumElemsRowsNeg($matrix){
    $sum = 0;
    foreach ($matrix as $rows){
        if(min($rows) < 0) {
//            foreach ($rows as $elem) {
//                $sum += $elem;
//            } // foreach
            $sum = array_sum($rows);
        } // if
    } // foreach
    return $sum;
} // sumElemsRowsNeg

// номера строк и столбцов седловых точек матрицы
function saddlePointsRowsColumns($matrix){
    echo "<table class='table table-bordered'><thead><tr class='text-center'><th>Строка</th><th>Колонка</th></tr></thead><tbody class='text-center'>";
    $row = -1;
    foreach ($matrix as $rows) {
        $row++;
        $col = -1;
        foreach ($rows as $elem) {
            $col++;
            if ($elem === min($rows)){
                $max = PHP_INT_MIN;
                for ($i = 0; $i < count($matrix); $i++) {
                    if ($max < $matrix[$i][$col]) {
                        $max = $matrix[$i][$col];
                    } // if
                } // for $i
                if($elem === $max) {
                    echo "<tr><td>$row</td>";
                    echo "<td>$col</td></tr>";
                }
            } // if
        } // foreach
    } // foreach
    echo "</tbody></table>";
} // saddlePointsRowsColumns
#endregion

#region Задача 3
// расположение столбцов матрицы
// в соответствии с ростом их характеристик
function sortByColumnCharacteristic($matrix){
    // кол-во столбцов матрицы
    $columns = count(current($matrix));

    // массив [номер слобца => сумма модулей]
    // для нечетных отрицательных
    $columnsCharacteristic = array();

    // заполнение массива $columnsCharacteristic
    for ($i = 0; $i < $columns; $i++) {
        $sumOddNeg = 0;
        // признак отрицательного
        // элемента в столбце
        $flag = false;
        for ($j = 0; $j < count($matrix); $j++) {
            if ($matrix[$j][$i] < 0) {
                if ($matrix[$j][$i] & 1)
                    // модуль суммы отрицательных нечетных
                    $sumOddNeg += abs($matrix[$j][$i]);
            } // if
        } // for $j
        $columnsCharacteristic[$i] = $sumOddNeg;
    } // for $i

    // сортировка по модуль суммы нечетных отрицательных
    asort($columnsCharacteristic);

    // расположение столбцов матрицы
    // в соответствии с ростом их характеристик
    $newOrder = array_keys($columnsCharacteristic);
    $tempMatrix = array();
    for ($i = 0; $i < count($matrix); $i++){
        for ($j = 0; $j < count($matrix[$i]); $j++){
            $tempMatrix[$i][$j] = $matrix[$i][$newOrder[$j]];
        } // for $j
    } // for $i

    return $tempMatrix;
} // sortByColumnCharacteristic

// найти сумму эл-тов тех столбцов,
// в которых есть хотя бы один отрицательный
function sumElemColsWithNeg($matrix){
    // кол-во столбцов матрицы
    $columns = count(current($matrix));

    // массив [номер слобца => сумма]
    // для эл-тов тех столбцов матрицы,
    // которые содержат хотя бы один отрицательны
    $coulmsSumNeg = array();
    // заполнение массива $columnsCharacteristic
    for ($i = 0; $i < $columns; $i++) {
        $sumNeg = 0;
        // признак отрицательного
        // элемента в столбце
        $flag = false;
        for ($j = 0; $j < count($matrix); $j++) {
            $sumNeg += $matrix[$j][$i];
            if ($matrix[$j][$i] < 0) {
                $flag = true;
            } // if
        } // for $j
        // если есть отрицальные элемент в столбце
        // записываем индекс столбца и сумму в массив
        if($flag) {
            $coulmsSumNeg[$i] = $sumNeg;
        } // if
    } // for $i

    echo "<br/><h5 class='text-center'>Номера и суммы элементов столбцов с отрицательными эл-тами:</h5>";
    echo "<table class='table table-bordered'><thead><tr class='text-center'><th>Столбец</th><th>Сумма</th></tr></thead><tbody class='text-center'>";
    foreach ($coulmsSumNeg as $key => $value) {
        echo "<tr><td>$key</td>";
        echo "<td>$value</td></tr>";
    } // foreach
    echo "</tbody></table>";
} // sumElemColsWithNeg
#endregion
