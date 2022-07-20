<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>01 Домашнее задание №1(Часть 2)</title>

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
                               title="Обработка одномерных массивов">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="phpdocs/page2.php"
                               title="Вариант 6">Задача 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="phpdocs/page3.php"
                               title="Вариант 8">Задача 3</a>
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
            <h3>Задача 2.</h3>
            <p class="text-justify">
                Разработайте веб-приложение по следующей спецификации – главная страница с меню для перехода на страницы
                решения задач обработки одномерных числовых массивов и двумерных числовых массивов
                из учебника Павловской Т.А. по C#. На главной странице выводите также текст этого задания.
            </p>
            <p class="text-center">
                Решение этих задач позволит Вам развить навыки программирования на PHP с использованием функций,
                массивов, констант. Развить навыки стилизации веб-приложений.
            </p>
            <p class="text-justify">
                На странице задачи отображать условие задачи, выводить результаты работы задачи,
                должна быть ссылка для возврата на главную страницу. Значения элементов массива для выполнения задач
                формировать при помощи функции – генератора случайных чисел.
            </p>
            <p class="text-justify">
                Обработка одномерных массивов. В одномерном массиве, состоящем из n вещественных чисел выполнить:
            </p>
            <ul>
                <li>Заполнение массива случайными числами</li>
                <li>Вычислить количество элементов массива, равных нулю</li>
                <li>Вычислить количество отрицательных элементов массива</li>
                <li>Вычислить сумму элементов массива, расположенных после минимального элемента</li>
                <li>Вычислить сумму модулей элементов массива, расположенных после минимального по модулю элемента</li>
                <li>Упорядочить элементы массива по возрастанию модулей</li>
                <li>Заменить все отрицательные элементы массива их квадратами и упорядочить элементы массива по возрастанию</li>
                <li>Удалить все отрицательные элементы массива</li>
                <li>После первого элемента и перед последними элементом массива вставить элемент со значением -1010.</li>
            </ul>
            <p class="text-justify">
                Разработайте два варианта решения – один с использованием циклов,
                второй – с использованием стандартных функций для работы с массивами (возможно, с callback-функциями)
            </p>
            <p class="text-justify">
                Обработка многомерных массивов:
            </p>
            <p class="text-center">
                <img src="imgs/var6.jpg"/>
                <img src="imgs/var8.jpg"/>
            </p>
            <p class="text-justify">
                Результаты должны быть выделены (например, выделение цветом и жирностью).
                Выполнить стилизацию приложения при помощи Bootstrap или другими наборами стилей.
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
            <h5 class="text-center">ДЗ №1 часть 2 по PHP, студент Швайко Олег, группа СПУ811, Донецк, 2021</h5>
        </div>
    </div>
</footer>


</body>
</html>
