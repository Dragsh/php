<?php

//Создать класс Goods (товар). В классе должны быть представлены поля: наименование товара, дата оформления (прихода),
// цена товара, количество единиц товара, номер накладной, по которой товар поступил на склад.
//Реализовать методы изменения цены товара, изменения количества товара (увеличения и уменьшения), вычисления стоимости
// товара. Разработать форму добавления/редактирования товара. Использовать __toString().




class Goods
{
    //свойства класса
    private string $title;      //название товара
    private string $date;              //дата прихода товара
    private float $price;        //цена товара
    private int $amount;        //количество товара
    private int $invoiceNumber; //номер накладной

    /**
     * Goods constructor.
     * @param string $title
     * @param string $date
     * @param float|int $price
     * @param int $amount
     * @param int $invoiceNumber
     */
     public function __construct(string $title = "Утюг", string $date = "2019-01-14", float|int $price = 4500, int $amount = 3, int $invoiceNumber = 10029)
    {
        $this->title = $title;
        $this->date = $date;
        $this->price = $price;
        $this->amount = $amount;
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    public function setTitle(string $title): void
    {
        if (!preg_match_all("/[.,!?:]/m", $title))
            throw new Exception("Название товар не должно содержать знаки препинания");

        $this->title = $title;

    }//setTitle

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }//getDate

    /**
     * @param mixed|string $date
     * @throws Exception
     */

    public function setDate(mixed $date): void
    {
        if (!preg_match_all("/[.,!?:]/m", $date))
            throw new Exception("Дата не должна содержать знаки препинания");
        $this->date = $date;
    }//setDate

    /**
     * @return float|int
     */
    public function getPrice(): float|int
    {
        return $this->price;
    }//getPrice

    /**
     * @param float|int $price
     * @throws Exception
     */
    public function setPrice(float|int $price): void
    {
        if(!$price > 0 )
            throw new Exception("Цена на товар должна быть больше нуля");
        $this->price = $price;
    }//setPrice

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }//getAmount

    /**
     * @param int $amount
     * @throws Exception
     */
    public function setAmount(int $amount): void
    {
        if(!$amount > 0 )
            throw new Exception("Цена на товар должна быть больше нуля");
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber(): int
    {
        return $this->invoiceNumber;
    }//getInvoiceNumber

    /**
     * @param int $invoiceNumber
     * @throws Exception
     */

    public function setInvoiceNumber(int $invoiceNumber): void
    {
        if(!$invoiceNumber> 0 )
            throw new Exception("Индекс товара должен быть больше нуля");
        $this->invoiceNumber = $invoiceNumber;
    }//construct

    //вывод
    public function __toString(): string
    {
        return  "<td  >$this->title</td>
                 <td>$this->date</td>
                 <td>$this->price</td>
                 <td>$this->amount</td>
                 <td>$this->invoiceNumber</td>
                 <td><button type='submit' name='del' value='$this->title'>Удалить</button></td>
                 ";
    }//__toString()

    //изменение цены. $change может принимать отрицательные значения для уменьшения цены
    public function priceChanges($price, $change): void{
        $this->price = $price + $change;
    }//priceChanges

    //изменение  количества. $change может принимать отрицательные значения для уменьшения количества
    public function amountChanges($amount, $change): void{
        $this->amount = $amount + $change;
    }//priceChanges

    // расчет стоимости товара $quantityGoods - колличество товара, $value - колличество цена
    public function cost($quantityGoods, $value): float|int
    {
        return $quantityGoods * $value;
    }//cost

}//Goods