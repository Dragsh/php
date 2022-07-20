<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Домашнее задание № 2 </title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">


    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />

</head>
<body>
<?php
session_name("HW02");     // назначить имя сессии
session_start();            // начало сессии - при первом вызове

date_default_timezone_set('Europe/Moscow');
$_SESSION["timeStart"] = date("H:i:s a");

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
                               title="Геометрические фигуры">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Геометрические тела">Задача 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page3.php"
                               title="Загрузка файла">Задача 3</a>
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
                Разработайте приложение с обработкой данных на PHP.
                На главной странице разместите это задание, на других страницах – решение задачи.
            </p>
            <p class="text-justify">
                Работа с приложением должна быть организована в виде сессии.
                В файле формата CSV хранить данные о моменте начала и завершения сессии.
                Начало сессии – момент нажатия кнопки «Вход», окончание сессии – момент нажатия кнопки «Выход».
                Логин и пароль не использовать. Переходы на решения задач – только после начала сессии.
            </p>
            <p class="text-justify">
                Доступ к функционалу приложения открывается только после создания сессии (клик по кнопке Войти).
                По клику на кнопку Выйти удаляется сессия, запрещается доступ к функционалу.
            </p>
            <p class="text-justify">
                <b>Задача 1.</b> Требуется вычислять параметры плоских геометрических фигур.
                Тип фигуры выбирается пользователем, при помощи радиокнопок:
            </p>
            <ul>
                <li>Прямоугольник</li>
                <li>Квадрат</li>
                <li>Треугольник</li>
                <li>Прямоугольная трапеция</li>
            </ul>
            <p class="text-justify">
                Параметры фигуры для вычисления задаются чек-боксами:
            </p>
            <ul>
                <li>площадь</li>
                <li>периметр</li>
            </ul>
            <p class="text-justify">
                Собственно вычисление выполнять при клике на кнопку "Вычислить" типа submit.
                Необходимые числовые параметры вводить при помощи строки ввода с типом number.
                Сохранять данные в куки, если куки определены, выводить данные в поля формы из куки.
            </p>
            <p class="text-justify">
                Требуется также вести журнал операций – текстовый файл,
                в котором записывать дату и время выполнения расчета, исходные данные расчета, результаты расчета.
            </p>
            <p class="text-justify">Предусмотрите страницу для просмотра журнала, очистки журнала.</p>
            <p class="text-justify">
                <b>Задача 2.</b> Требуется вычислять параметры геометрических тел по выбору пользователя:
            </p>
            <ul>
                <li>площадь поверхности</li>
                <li>объем</li>
                <li>масса</li>
            </ul>
            <p class="text-justify">
                Типы тел по выбору пользователя:
            </p>
            <ul>
                <li>конус</li>
                <li>сфера</li>
                <li>цилиндр</li>
                <li>правильная четырехгранная пирамида</li>
            </ul>
            <p class="text-justify">
                Варианты материала, из которого изготовлено тело:
            </p>
            <ul>
                <li>сталь</li>
                <li>алюминий</li>
                <li>водяной лед</li>
                <li>гранит</li>
            </ul>
            <p class="text-justify">
                Тип фигуры задавать радиокнопками, материал выбирать из выпадающего списка.
                Параметры вычисления задавать чек-боксами, собственно вычисление выполнять при клике на кнопку "Вычислить" типа submit.
            </p>
            <p class="text-justify">
                В отдельной странице выводить форму для ввода данных, в обработчике формы вычислять по заданию,
                выводить исходные данные и результаты расчета, картинки выбранного материала и фигуры.
                На еще одной странице выводить исходные данные и результаты расчетов (без картинок), данные хранить  в сессии.
            </p>
            <p class="text-justify">
                <b>Задача 3.</b> Загружать текстовый файл в кодировке UTF-8 на сервер, папка uploaded в приложении. Выводить на страницу текст из файла, а также:
            </p>
            <ul>
                <li>только строки, содержащие двузначные числа.</li>
                <li>только строки, не содержащие символов из строки ".,!?:"</li>
            </ul>
            <p class="text-justify">
                Выполнить стилизацию приложения при помощи Bootstrap или другими наборами стилей.
            </p>
        </article>
    </section>
</main>


</body>



</html>
