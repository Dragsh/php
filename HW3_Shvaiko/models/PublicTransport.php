<?php
include_once ("iVehicle.php");
//Некоторые рекомендуемые свойства трамвая: маршрут, пассажировместимость, фактическое количество
// пассажиров, текущая скорость.

 abstract class PublicTransport implements iVehicle
{
    //свойства класса
    protected int $passengerCapacity; //пассажировместимость

     //  посадка пассажира
     /**
      * PublicTransport constructor.
      * @param int $passengerCapacity
      */
     public function __construct(int $passengerCapacity)
     {
         $this->passengerCapacity = $passengerCapacity;
     }//__construct

     abstract function addPassenger($passenger);
     //высадка пасажиров
     abstract function delPassenger($passenger);

    function startMovement()
    {
        // TODO: Implement startMovement() method.
    }

    function endMovement()
    {
        // TODO: Implement endMovement() method.
    }

}//PublicTransport