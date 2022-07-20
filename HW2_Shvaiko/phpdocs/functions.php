<?php
// запись в файл
function bar($fileName, $str) {
    $fp = fopen($fileName, "a") or die("<h4>Не удалось открыть файл $fileName</h4>");
    fwrite($fp, $str);
    fclose($fp);
}

// чтение и вывод файла построчно
function view($name) {
    // открыть файл для чтения
    $fd = fopen($name, 'r') or die("<h4>Не удалось открыть файл $name</h4>");

    while(!feof($fd)) {
        // htmlentities() - перкодировка html-разметки для вывода в браузер
        $str = htmlentities(fgets($fd));
        echo "$str<br/>";
    }
    fclose($fd);
} // view

// вывод строк с двузначными числами
function readStringsContainsTwoDigits($name){
    // открыть файл для чтения
    $fd = fopen($name, 'r') or die("<h4>Не удалось открыть файл $name</h4>");

    while(!feof($fd)) {
        // htmlentities() - перкодировка html-разметки для вывода в браузер
        $str = htmlentities(fgets($fd));
        if(preg_match("/(^|\s)[1-9]\d?(\s|$)/m", $str)){
            echo "$str<br/>";
        }
    }
    fclose($fd);
} // readStringsContainsTwoDigits

// вывод строк без символов ".,!?:"
function readStringsNotContainPunctuationMarks($name){
    // открыть файл для чтения
    $fd = fopen($name, 'r') or die("<h4>Не удалось открыть файл $name</h4>");

    while(!feof($fd)) {
        // htmlentities() - перкодировка html-разметки для вывода в браузер
        $str = htmlentities(fgets($fd));
        if(!preg_match("/[.,!?:]/m", $str)){
            echo "$str<br/>";
        }
    }
    fclose($fd);
} // readStringsNotContainPunctuationMarks