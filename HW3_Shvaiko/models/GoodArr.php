<?php
require_once("Goods.php");
require_once ("../phpdocs/functions.php");

//файл товаров
    $fileName = '../uploaded/goods.csv';

//массив товаров(начальные данные)
    $goods = [
        new Goods("крем", "23-05-21", 100, 4, 22001),
        new Goods("пылесос", "22-05-21", 4000, 25, 22098),
        new Goods("спички", "26-05-21", 50, 50, 22198),
        new Goods("сковородка", "26-05-21", 1700,  5, 22128),
        new Goods("часы", "26-05-21", 500,  7, 22127),
        new Goods("глобус", "27-05-21", 400,  2, 22327),
        new Goods("ложка", "27-05-21", 70,  15, 22357),
        new Goods("стакан", "25-05-21", 100,  12, 22357),
        new Goods("ручка", "25-05-21", 40,  8, 20357),
        new Goods("вилка", "29-05-21", 50,  8, 20257),
    ];

    $goods1 = [];
    if (file_exists($fileName) == true)
    $goods1 = readArr($fileName);

//показать таблицу товаров
function run(){
    global $fileName;
    global $goods;
    global $goods1;

      // создание файла если его нет и запись данных из массива
      if (file_exists($fileName) == false)
      {
          writeArr($fileName, $goods);
      }//if
    $goods1 = readArr($fileName);
    showGoods($goods1);//else


}//run


//чтение из файла в массив
function readArr($fileName): array
{
    $arr = [];
    if (($fd = fopen($fileName, "r")) !== FALSE) {
        //проблема дублтрования последней строки в файле
        while (!feof($fd)){

            $str =htmlentities(fgets($fd));
            $clean = trim( $str,  "\n\r");
            //удаления разделителя из строки
            $pieces = explode(",", $clean);

            if(isset($pieces[0]) && isset($pieces[1]) && isset($pieces[2]) && isset($pieces[3]) && isset($pieces[4])) //без проверки выдаёт ошибку в разметку(особенности php 8)
            $good = new Goods( (string)$pieces[0], (string)$pieces[1], (int)$pieces[2],  (int)$pieces[3], (int)$pieces[4]);

            if(isset($good))
            array_push($arr, $good);
            //костыль(удалить последнюю продублированную строку)

        }//while
        fclose($fd);
        unset($arr[count($arr)-1]);
    }//if
    return $arr;
}//readArr


//вывод таблицы товаров в разметку
function showGoods($goods){
    foreach($goods as $item)
        echo "<tr>$item</tr>";
    }//showGoods

//добавить товар
function addGood($title, $date, $price, $amount, $invoiceNumber)
{
    global $fileName;
    global $goods1;
    $good = new Goods($title, $date, $price, $amount, $invoiceNumber);
    $str = "$title,{$date},{$price},{$amount},{$invoiceNumber}\r\n";
    array_push($goods1, $good);


   //запись в файл
    //открытие файла
    $fp = fopen($fileName, "a")or die("<h4>Не удалось открыть файл $fileName</h4>");
    fwrite($fp, $str);
    fclose($fp);

}//addGood

//удалить товар
function delGood($title){
    global $fileName;
    global $goods1;
    $key = null;
    //$arr[] = $goods1;
    for($i = 0; $i < count($goods1); $i++)
    {
        if($goods1[$i]->getTitle() === $title) $key = $i;
    }//for
    if(array_key_exists($key, $goods1))
    {
        unset($goods1[$key]);
    }//if

   // if (isset($fileName)) {
  //      unlink($fileName);
   // }
    // Первый способ
    $f = fopen($fileName, 'w');
    fclose($f);
    writeArr($fileName, $goods1);

}//delGood

//общая сумма товаров
function totalSum()
{

    global $goods1;
    $sum = 0;
    foreach($goods1 as $item){
        $sum += $item->getPrice() * $item->getAmount();
    }//foreach
        echo $sum;

}//totalSum
