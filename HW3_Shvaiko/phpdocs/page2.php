<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 2</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />


</head>
<body>

<?php

//обработка формы
$number = null;
$route = null;
$quantity = null;
$speed= null;
$capacity =null;
$id = null;

//удаление
$delete = null;

//редактирование
$edit = null;



if(isset($_POST["number"])){

    $number = htmlentities($_POST["number"]);
}
if(isset($_POST["route"])){

    $route = htmlentities($_POST["route"]);
}
if(isset($_POST["quantity"])){

    $quantity = htmlentities($_POST["quantity"]);
}
if(isset($_POST["speed"])){

    $speed = htmlentities($_POST["speed"]);
}
if(isset($_POST["capacity"])){

    $capacity = htmlentities($_POST["capacity"]);
}
if(isset($_POST["delete"])){
    $delete = htmlentities($_POST["delete"]);
}

require_once("../models/DepoTrams.php");
$depoTram = new DepoTrams();

if(isset($number) && isset($route) && isset($quantity) && isset($speed) && isset($capacity))
    $depoTram->addTram($number, $route, $quantity, $speed, $capacity);
if(isset($delete))
    $depoTram->delTram($delete);

if(isset($_POST["edit"])){

    $edit = htmlentities($_POST["edit"]);
}

if(isset($edit) && isset($number) && isset($route) && isset($quantity) && isset($speed) && isset($capacity))
    $depoTram->redactTram($edit, $number, $route,$quantity, $speed, $capacity)
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
                <b>Задача 2.</b>
                Cоздайте веб-приложение для решения следующей задачи:
            </p>

            <p class="text-justify">
                Разработайте иерархию: Интерфейс ТранспортноеСредство --> абстрактный класс
                ОбщественныйТранспорт --> класс Трамвай.
            </p>

            <p class="text-justify">
                Данные по трамваю вводить в форме, трамвай добавляем в массив, массив трамваев сохранять на сервере,
                в CSV-файле. Отображение массива трамваев – в таблице. Предусмотрите возможность добавления, удаления,
                изменения данных о конкретном трамвае.
            </p>

            <p class="text-justify">
                Некоторые рекомендуемые свойства трамвая: маршрут, пассажировместимость, фактическое количество
                пассажиров, текущая скорость. Некоторые рекомендуемые методы: начало движения, завершение движения,
                посадка пассажиров, высадка пассажиров.
            </p>

            <p class="text-justify">
                Очевидно, что посадка и высадка пассажиров не выполняются в процессе движения трамвая.
            </p>
            <p class="text-justify">
                Примените magic-методы __get(), __sett(), __toString() в классе Трамвай. Добавление трамвая в массив
                трамваев реализовать при помощи клонирования.
            </p>
        </article>

        <article class="offset-1 col-11 bg-light">
            <form method="post">
                <table class="table shadow-lg table-bordered table-striped table-hover caption-top " >
                    <caption>Список трамваев</caption>
                    <thead class=" table-dark text-white text-center ">
                    <th  scope="col">Номер трамвая</th>
                    <th  scope="col">Маршрут</th>
                    <th scope="col">Количество пассажиров</th>
                    <th scope="col">Скорость</th>
                    <th scope="col">Вместимость</th>
                    <th scope="col">Операции</th>
                    </thead>
                    <tbody>
                    <?php
                    require_once("../models/DepoTrams.php");
                   // $depoTram = new DepoTrams();
                    $depoTram->showTrams();
                    ?>
                    </tbody>
                </table>
            </form>

            <br />

            <br/>
        </article>

        <article class="offset-1 col-10 bg-light">
            <h3 class="text-center">Добавить трамвай</h3>
            <form  method="post">

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="number">Номер:</label>
                        <input type="number"  class="form-control" name="number" id="number" placeholder="Номер трамвая" value= 11 required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="route">Маршрут:</label>
                        <input type="text"  class="form-control" name="route" id="route" placeholder="Мапшрут трамвая" value="туда-сюда" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="quantity">Количество пассажиров:</label>
                        <input type="number" min="0" step="1" class="form-control" name="quantity" id="quantity" value="12" placeholder="Количество пассажиров в трамвае" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="speed">Скорость:</label>
                        <input type="number" min="0" step="1" class="form-control" name="speed" id="speed" value="20" placeholder="Скорость трамвая" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label">Вместимость:</label>
                        <select id="inputState" name="capacity" class="form-select" required>
                            <option selected>Выбрать...</option>
                            <option value="48">48</option>
                            <option value="38">38</option>

                        </select>
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
