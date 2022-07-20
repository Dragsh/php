<!DOCTYPE html>
<html lang="ru">
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 1</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />

    <!-- подключение файла вспомогательных функций -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/task1.js"></script>
    <script src="../js/jquery.cookie.js"></script>
</head>

 <body>

 <?php

 //обработка формы
 $title = null;
 $date = null;
 $price = null;
 $amount= null;
 $invoiceNumber = null;

 //удаление
 $del = null;

 if(isset($_POST["title"])){

     $title = htmlentities($_POST["title"]);
 }
 if(isset($_POST["date"])){

     $date = htmlentities($_POST["date"]);
 }
 if(isset($_POST["price"])){

     $price = htmlentities($_POST["price"]);
 }
 if(isset($_POST["amount"])){

     $amount = htmlentities($_POST["amount"]);
 }
 if(isset($_POST["invoiceNumber"])){

     $invoiceNumber = htmlentities($_POST["invoiceNumber"]);
 }
 if(isset($_POST["del"])){
     $del = htmlentities($_POST["del"]);
 }

 require_once("../models/GoodArr.php");
 if(isset($title) && isset($date) && isset($price) && isset($amount) && isset($invoiceNumber))
 addGood($title, $date, $price, $amount, $invoiceNumber);
 if(isset($del))
 delGood($del);

 ?>

   <header class="container-fluid">
    <nav class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="page0.php"><i class="fas fa-home"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="page0.php" title="Главная страница">
                                На главную
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="page1.php"
                               title="Товары">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="task1_log.php"
                               title="Переход к журналу операций – текстовый файл,
                               в который записывается дата и время выполнения расчета,
                               исходные данные расчета, результаты расчета">Журнал Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Геометрические тела">Задача 2</a>
                        </li>

                    </ul>
                </div>
                <form class="float-right" action="../index.php" method="post" >
                    <button class="btn btn-danger">Выход</button>
                </form>
            </nav>
        </div>
    </nav>
</header>

   <main class="container">
       <section class="row">
           <article class="offset-1 col-10 bg-light">

               <p class="text-justify">
                   <b>Задача 1.</b>
                   Создать класс Goods (товар). В классе должны быть представлены поля: наименование товара,
                   дата оформления (прихода), цена товара, количество единиц товара, номер накладной, по которой
                   товар поступил на склад.
               </p>
               <p class="text-justify">
                   Реализовать методы изменения цены товара, изменения количества товара (увеличения и уменьшения),
                   вычисления стоимости товара. Разработать форму добавления/редактирования товара. Использовать __toString().
               </p>

               <p class="text-justify">
                   Добавление товара реализовать при помощи клонирования.
               </p>

               <p class="text-justify">
                   Реализовать массив товаров, добавление в массив, удаление из массива. Данные по товарам охранять в файле
                   в формате CSV. Также требуется выводить таблицу товаров, итоговую сумму хранимых товаров.
               </p>
           </article>

           <article class="offset-1 col-10 bg-light">
               <form method="post">
                   <table class="table shadow-lg table-bordered table-striped " >
                       <thead class=" bg-secondary text-white text-center ">
                       <th >Название</th>
                       <th>Дата</th>
                       <th>Цена</th>
                       <th>Количество</th>
                       <th>Номер накладной</th>
                       <th>Операции</th>
                       </thead>
                       <tbody>
                       <?php
                       require_once("../models/GoodArr.php");
                       run();
                       ?>
                       </tbody>
                   </table>
               </form>

               <br />
               <div class="offset-9 col-10 bg-light">
                   Общая сумма:
                   <?php
                   require_once("../models/GoodArr.php");
                   totalSum();
                   ?>
                    руб.
               </div>
               <br/>
           </article>

           <article class="offset-1 col-10 bg-light">
               <h3 class="text-center">Форма ввода товара</h3>
               <form  method="post">

                   <div class="form-row">
                       <div class="col-md-4 mb-3">
                           <label for="a">Название:</label>
                           <input type="text"  class="form-control" name="title" id="title" placeholder="Название товара" value="какао" required>
                           <div class="invalid-feedback">
                               Please provide a valid number.
                           </div>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="b">Дата заказа:</label>
                           <input type="date"  class="form-control" name="date" id="date"  required>
                           <div class="invalid-feedback">
                               Please provide a valid number.
                           </div>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="c">Цена:</label>
                           <input type="number" min="0.1" step="0.1" class="form-control" name="price" id="price" value="55" placeholder="Цена товара" required>
                           <div class="invalid-feedback">
                               Please provide a valid number.
                           </div>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="c">Количестово:</label>
                           <input type="number" min="0.1" step="0.1" class="form-control" name="amount" id="amount" value="4" placeholder="Количество товара" required>
                           <div class="invalid-feedback">
                               Please provide a valid number.
                           </div>
                       </div>
                       <div class="col-md-4 mb-3">
                           <label for="c">Номер накладной:</label>
                           <input type="number" min="1" step="1" class="form-control" name="invoiceNumber" id="invoiceNumber" value="56565" placeholder="Номер накладной" required>
                           <div class="invalid-feedback">
                               Please provide a valid number.
                           </div>
                       </div>
                   </div>
                   <br/><br/>
                   <div class="form-group row">
                       <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary">Отправить</button>
                           <button type="reset" class="btn btn-danger float-right">Отменить</button>
                       </div>
                   </div>
               </form>

           </article>
       </section>
   </main>





 </body>

</html>
