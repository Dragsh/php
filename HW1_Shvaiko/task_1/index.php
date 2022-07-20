<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Домашнее задание №1 PHP</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="imgs/alien.png" type="image/x-icon" />
</head>

<body>
<header class="container-fluid">
    <nav class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php" title="Главная страница">
                                ДЗ на 14.11.2020
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="phpdocs/page1.php"
                               title="Proc4">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="phpdocs/page2.php"
                               title="Proc11">Задача 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="phpdocs/page3.php"
                               title="Proc12">Задача 3</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </nav>
</header>
<main class="container">
    <section class="row">
        <article class="offset-1 col-10 bg-light">
            <h3>Теоретическая часть</h3>
            <ul class="text-justify">
                <li>Понятие о PHP, для чего нужен PHP</li>
                <li>Установка PHP, веб-сервера Apache 2.4</li>
                <li>Средство разработки для VS – PHP Tool, установка и первый запуск расширения</li>
                <li>Средство разработки – IDE Netbeans, установка и создание проекта, запуск проекта</li>
                <li>Серверные теги PHP, базовый синтаксис PHP</li>
                <li>Основные типы данных, переменные</li>
                <li>Вывод, оператор echo, функция printf() – форматированный вывод</li>
                <li>Основные операции языка</li>
                <li>Операторы if(), if() else, if() elseif() … else, switch() … case</li>
                <li>Циклы for(), while(), do while(), foreach(), операторы break, continue</li>
                <li>Понятие о функциях, передача параметров по значению, по ссылке</li>
                <li>Константы в PHP, определение констант, предопределенные константы</li>
                <li>Специальный тип null</li>
                <li>Проверка принадлежности переменной заданному типу, получение типа переменной, назначение типа переменной</li>
                <li>Понятие о heredoc-синтаксисе вывода длинных строк с большим количеством разметки</li>
                <li>Логические и битовые операции в PHP</li>
                <li>Запись чисел в шестнадцатеричной, восьмеричной и двоичной системах счисления</li>
                <li>Понятие о многомерных массивах в PHP</li>
                <li>Функции массивов в PHP</li>
                <li>Удаление произвольных элементов массива и всего массива</li>
            </ul>
            <h3>Практическая часть</h3>
            <h3>Задача 1.</h3>
            <p class="text-justify">
                Разработайте веб-приложение по следующей спецификации – главная страница с фотографией Абрамяна М.Э.
                и ссылками для перехода на страницы для решения задач <b>Proc4,</b> <b>Proc11,</b> <b>Proc12</b>
                из сборника Абрамяна М.Э. На главной странице разместите также текст этого задания.
            </p>
            <p class="text-center">
                <img src="imgs/abramyan.png"/>
                <img src="imgs/proc4.jpg"/>
                <img src="imgs/proc11.jpg"/>
                <img src="imgs/proc12.jpg"/>
            </p>
            <p class="text-justify">
                Решение этих задач позволит Вам развить навыки программирования на PHP с использованием функций,
                отработать передачу параметров в функции PHP по ссылке и по значению.
            </p>
            <p class="text-justify">
                На странице задачи отображать условие задачи, выводить результаты работы задачи, должна быть ссылка для
                возврата на главную страницу. Исходные данные для выполнения задач формировать при помощи функции – генератора случайных чисел.
            </p>
            <h3>Дополнительно</h3>
            <p class="text-justify">
                Запись занятия можно скачать
                <a href="https://cloud.mail.ru/public/2twe/2ysVrdtDn">
                    <b>тут</b>
                </a>. материалы занятия – в этом же архиве.
            </p>
        </article>
    </section>
</main>
<footer class="container-fluid bg-dark">
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">ДЗ №1, студент Швайко Олег, группа СПУ811, Донецк, 2021</h5>
        </div>
    </div>
</footer>

</body>
</html>