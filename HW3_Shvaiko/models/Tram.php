<?php
require_once ("PublicTransport.php");
//Разработайте иерархию: Интерфейс ТранспортноеСредство --> абстрактный класс ОбщественныйТранспорт -->
// класс Трамвай.
//Данные по трамваю вводить в форме, трамвай добавляем в массив, массив трамваев сохранять на сервере,
// в CSV-файле.
// Отображение массива трамваев – в таблице. Предусмотрите возможность добавления, удаления, изменения
// данных о конкретном трамвае.
//Некоторые рекомендуемые свойства трамвая: маршрут, пассажировместимость, фактическое количество
// пассажиров, текущая скорость.
// Некоторые рекомендуемые методы: начало движения, завершение движения, посадка пассажиров,
// высадка пассажиров.

class Tram extends PublicTransport
{

    private int $number;                 //номер трамвая
    private string $route;               //маршрут трамвая
    private int $actualQuantPassengers;  //фактическое количество пассажиров
    private int $actualSpeed;            //текущая скоость трамвая
    private int $id;                     // id трамвая
    private static int $counter = 0;          // cчётчик объектов

    ///константы
    const TRAM_CAPACITY_OLD = 48;   //вместимость старого трамвая
    const TRAM_CAPACITY_NEW = 38;   //вместимость нового трамвая
    const MAX_SPEED = 60;           //максимальная скорость трамвая

     //конструкторы

    /**
     * Tram constructor.
     * @param int $id
     * @param int $number
     * @param string $route
     * @param int $actualQuantPassengers
     * @param int $actualSpeed
     * @param int $capacity
     */
    public function __construct(  int $number = 1, string $route = "Туда-Сюда", int $actualQuantPassengers = 25,
                                int $actualSpeed = 32, int $capacity = self::TRAM_CAPACITY_OLD, int $id = 0)
    {
       if($id == 0)
       {
        self::$counter++;
        $this->id = self::$counter;
       }//if
       else
       {
           $this->id = $id;
       }//else
        $this-> number = $number;
        $this->route = $route;
        $this->actualQuantPassengers = $actualQuantPassengers;
        $this->actualSpeed = $actualSpeed;
        parent::__construct($capacity);

    }//__construct

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @throws Exception
     */
    public function setNumber(int $number): void
    {
        if(!$number > 0 )
            throw new Exception("Номер не может быть отрицательным");
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @throws Exception
     */
    public function setRoute(string $route): void
    {
        if (!preg_match_all("/[,!?:]/m", $route))
            throw new Exception("Маршрут не должен содержать знаки ,!?: ");
        $this->route = $route;
    }

    /**
     * @return int
     */
    public function getActualQuantPassengers(): int
    {
        return $this->actualQuantPassengers;
    }

    /**
     * @param int $actualQuantPassengers
     * @throws Exception
     */
    public function setActualQuantPassengers(int $actualQuantPassengers): void
    {
        if($actualQuantPassengers < 0 || $actualQuantPassengers > $this-> getPassengerCapacity() )
            throw new Exception("Количество пассажиров не может быть отрицательным и больше вместимости трамвая");
        $this->actualQuantPassengers = $actualQuantPassengers;
    }//setActualQuantPassengers

    /**
     * @return int
     */
    public function getActualSpeed(): int
    {
        return $this->actualSpeed;
    }

    /**
     * @param int $actualSpeed
     * @throws Exception
     */
    public function setActualSpeed(int $actualSpeed): void
    {
        if($actualSpeed < 0 || $actualSpeed > self::MAX_SPEED )
            throw new Exception("Скорость не может быть отрицательной");
        $this->actualSpeed = $actualSpeed;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPassengerCapacity(): int
    {
        return $this ->passengerCapacity;
    }

    /**
     * @param int $passengerCapacity
     */
    public function setPassengerCapacity(int $passengerCapacity): void
    {

        $this->passengerCapacity = $passengerCapacity;
    }//__toString()


//вывод данных трамвая в таблицу
    public function __toString(): string
    {
        return  "<td  >$this->number</td>
                 <td>$this->route</td>
                 <td>$this->actualQuantPassengers</td>
                 <td>$this->actualSpeed</td>
                 <td>$this->passengerCapacity</td>
                 <td>
                 <div class='form-group row'>
                    <div >
                        <button type='submit' name='delete' class='btn btn-danger' value='$this->id'>Удалить</button>
                        <button type='submit' name='edit' class='btn btn-primary float-right' value='$this->id'>Изменить</button>
                    </div>
                </div>
                 </td>";

    }// __toString()


    function addPassenger($passenger)
    {

        if (isset($this-> actualQuantPassengers) && $this->actualQuantPassengers < $this-> passengerCapacity)
            $this->actualQuantPassengers += $passenger;

        // TODO: Implement addPassenger() method.
    }//addPassenger()

    function delPassenger($passenger)
    {
        if (isset($this-> actualQuantPassengers) && $this-> actualQuantPassengers >= $passenger ) {
            $this->actualQuantPassengers -= $passenger;
        }
        // TODO: Implement delPassenger() method.
    }//delPassenger()
}//Tram