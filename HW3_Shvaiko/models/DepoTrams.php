<?php
require_once("Tram.php");

class DepoTrams
{

    //файл товаров
     private  string $fileName;

    //массив трамваев
    private array $Trams;

    //константы
    const FILE_NAME = "../uploaded/Trams.csv";
    /**
     * DepoTrams constructor.
     */
    public function __construct()
    {
        $arr =[
            new Tram(9, "ул. Держинского - Пожарка", 13, 15),
            new Tram(1, "ДМЗ - ЖД вокзал", 20, 20),
            new Tram(6, "ДМЗ - МРКиевский", 22, 22),
            new Tram(10, "Пожарка - п.Будённого", 28, 30),
            new Tram(15, "п.Будённого - мр.Восточный", 28, 30),
            new Tram(8, "Южный - Текстиль", 35, 40),
            new Tram(3, "Южный - Боссе", 45, 25),
            new Tram(4, "Южный - Туда", 40, 34)

        ];
        $this ->fileName = self::FILE_NAME;


        // создание файла если его нет и запись данных из массива
        if (file_exists($this->fileName) == false)
        {
           $this-> writeCsv($this->fileName, $arr);
        }//if
         $this->Trams = $this-> readCsv($this->fileName);


    }//__construct



    //запись массива объектов в файл
    function writeCsv($fileName, $arr){

        //открытие файла
        $fp = fopen($fileName, "a")or die("<h4>Не удалось открыть файл $fileName</h4>");

        foreach($arr as $item)
        {
            //формируем строку для записи
            $str = "{$item->getNumber()},{$item->getRoute()},{$item->getActualQuantPassengers()},{$item->getActualSpeed()},{$item->getPassengerCapacity()},{$item->getId()}\r\n";
            //запись строки в файл
            fwrite($fp, $str);

        }//foreach
        //закрываем файл
        fclose($fp);
    }//writeArr

    //чтение из файла в массив
    function readCsv($fileName): array
    {
        $arr = [];
        if (($fd = fopen($fileName, "r")) !== FALSE) {
            //проблема дублтрования последней строки в файле
            while (!feof($fd)){

                $str =htmlentities(fgets($fd));
                $clean = trim( $str,  "\n\r");
                //удаления разделителя из строки
                $pieces = explode(",", $clean);

                if(isset($pieces[0]) && isset($pieces[1]) && isset($pieces[2]) && isset($pieces[3]) && isset($pieces[4]) && isset($pieces[5])) //без проверки выдаёт ошибку в разметку(особенности php 8)
                    $tram= new Tram( (int)$pieces[0], $pieces[1], (int)$pieces[2],  (int)$pieces[3], (int)$pieces[4], (int)$pieces[5]);

                if(isset($tram))
                    array_push($arr, $tram);


            }//while
            fclose($fd);
            //костыль(удалить последнюю продублированную строку)
            unset($arr[count($arr)-1]);
        }//if
        return $arr;
    }//readArr

    //вывести трамваи в таблицу
    function showTrams(){
        foreach($this->Trams as $item)
            echo "<tr>$item</tr>";
    }//showGoods

    //добавить трамвай в массив

    function addTram($number, $route,$actualQuantPassengers, $actualSpeed, $capacity)
    {


        $tram = new Tram($number, $route, $actualQuantPassengers, $actualSpeed, $capacity == Tram::TRAM_CAPACITY_OLD? $capacity : Tram::TRAM_CAPACITY_NEW);
        $str = "$number,$route,$actualQuantPassengers,$actualSpeed,{$tram->getPassengerCapacity()},{$tram ->getId()}\r\n";
        array_push($this->Trams, $tram);


        //запись в файл
        //открытие файла
        $fp = fopen($this->fileName, "a")or die("<h4>Не удалось открыть файл $this->fileName</h4>");
        fwrite($fp, $str);
        fclose($fp);

    }//addGood

    //удалить трамвай из массива

    function delTram($id){

        $key = null;

        for($i = 0; $i < count($this->Trams); $i++)
        {
            if($this->Trams[$i]->getId() == $id) $key = $i;
        }//for
        if(array_key_exists($key, $this->Trams))
        {
            unset($this->Trams[$key]);

        }//if

        // if (isset($fileName)) {
        //      unlink($fileName);
        // }
        // Первый способ
        $f = fopen($this->fileName, 'w');
        fclose($f);
        $this->writeCsv($this->fileName, $this->Trams);

    }//delGood

   //редактировать трамвай из массива
    function redactTram($id, $number, $route,$actualQuantPassengers, $actualSpeed, $capacity){

        $key = null;

        for($i = 0; $i < count($this->Trams); $i++)
        {
            if($this->Trams[$i]->getId() == $id) $key = $i;
        }//for
        if(array_key_exists($key, $this->Trams))
        {
            $this->Trams[$key]->setNumber($number);
            $this->Trams[$key]->setRoute($route);
            $this->Trams[$key]->setActualQuantPassengers($actualQuantPassengers);
            $this->Trams[$key]->setActualSpeed($actualSpeed);
            $capacity == Tram::TRAM_CAPACITY_OLD? $this->Trams[$key]->setPassengerCapacity($capacity) : $this->Trams[$key]->setPassengerCapacity(Tram::TRAM_CAPACITY_NEW);
        }//if

        // if (isset($fileName)) {
        //      unlink($fileName);
        // }
        // Первый способ
        $f = fopen($this->fileName, 'w');
        fclose($f);
        $this->writeCsv($this->fileName, $this->Trams);

    }//delGood

}//DepoTrams