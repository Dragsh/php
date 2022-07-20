<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Домашнее задание № 3 </title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">


    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />

</head>
<body>
<?php
session_name("HW3_Shvaiko");     // назначить имя сессии
session_start();            // начало сессии - при первом вызове

date_default_timezone_set('Europe/Moscow');
$_SESSION["timeStart1"] = date("H:i:s a");

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
                        <li class="nav-item active">
                            <a class="nav-link" href="page0.php" title="Главная страница">
                                ДЗ на 21.11.2020
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page1.php"
                               title="Товыры">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Трамвай">Задача 2</a>
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
        <article class="offset-1 col-10 bg-light shadow-lg" >
            <h3>Практическая часть</h3>
            <p class="text-justify">
                Разработайте приложение PHP. На главной странице разместите это задание,
                на других страницах – решение задачи. Доступ к функционалу приложения
                открывается только после создания сессии (клик по кнопке Войти). По клику
                на кнопку Выйти удаляется сессия, запрещается доступ к функционалу.
            </p>
            <p class="text-justify">
                В файле формата CSV хранить данные о моменте начала и завершения сессии.
                Начало сессии – момент нажатия кнопки «Вход», окончание сессии – момент
                нажатия кнопки «Выход». Логин и пароль не использовать.
            </p>
            <p class="text-justify">
                Предусмотрите страницу для просмотра файла-журнала сессий.
            </p>
            <p class="text-justify">
                В сеттерах классов выбрасывать исключения при некорректны параметрах.
                Обработка исключений – на страницах с таблицей товаров, таблицей транспортных средств.
            </p>
            <p class="text-justify">
                Формы обрабатывать в тех же файлах, где они определены, при некорректных значениях выбрасывать исключения.

            </p>
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
            <p class="text-justify">
                <b>Задача 3.</b>
                Обработка файла объектов в формате CSV. Объект – класс Планета (Солнечной системы) с закрытыми
                свойствами название, радиус, масса, количество спутников, расстояние до Солнца в а.е., фотография.
                Разработайте геттеры и сеттеры с выбросом исключений при невалидных данных. По кликам на кнопки типа «submit» реализуйте обработки:
            </p>
            <ul>
                <li>Вывод данных из файла на страницу с упорядочиванием по расстоянию</li>
                <li>Вывод данных из файла на страницу с упорядочиванием по алфавиту</li>
                <li>Вывод данных из файла на страницу с упорядочиванием по массе</li>
            </ul>

            <p class="text-justify">
                Выполнить стилизацию приложения при помощи Bootstrap или другими наборами стилей.
            </p>
        </article>
    </section>
</main>


</body>



</html>
