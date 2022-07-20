<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="imgs/alien.png" type="image/x-icon" />

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
session_name("HW3_Shvaiko"); //задать имя сессии
session_start();           // начало сессии - при первом вызове, присоединение - при последующих
if (isset($_SESSION["timeStart1"])){
    date_default_timezone_set('Europe/Moscow');
    $sessionData = ["session_name:".session_name(), "session_id:".session_id(),
        "session_start:".$_SESSION["timeStart1"], "session_end:".date("H:i:s a")];

    $fp = fopen('uploaded/session.csv', 'a');

    fputcsv($fp, $sessionData, ';');

    fclose($fp);
}
// для удаления сессии необходимо
$_SESSION = [];
if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-10, '/');
session_destroy(); // удаление данных сессии на сервере

?>

<header class="container-fluid">
    <a href="phpdocs/page0.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Вход</a>

</header>

<main class="container">
    <section class="row">
        <article class="offset-1 col-10 bg-light">
            <h3>Теоретическая часть</h3>
            <ul class="text-justify">
                <li>Введение в объектно-ориентированное программирование в PHP</li>
                <li>Конструктор и деструктор класса</li>
                <li>Свойства класса</li>
                <li>Методы класса</li>
                <li>Статические свойства и константы</li>
                <li>Статические методы класса</li>
                <li>Создание объектов классов, оператор new</li>
                <li>Работа с массивами объектов</li>
                <li>Magic-методы классов – перегруженные геттер и сеттер __get(), __set(),
                    перегруженный вызов метода __call(), формирование строкового представления
                    объекта класса __toString()</li>
                <li>Наследование в PHP, абстрактные классы, абстрактные методы </li>
                <li>Интерфейсы и наследование в PHP</li>
                <li>Запрет наследования для классов, методов, ключевое слово final</li>
                <li>Клонирование объектов в PHP, ключевое слово clone, magic-метод __clone()</li>
                <li>Исключения в PHP, ключевые слова try, catch, finally</li>
                <li>Классы исключений, иерархия исключений</li>
                <li>Собственные классы исключений</li>
            </ul>

            <h3>Дополнительно</h3>
            <p class="text-justify">
                Запись занятия можно скачать
                <a href="https://cloud.mail.ru/public/qwvq/52cj6GwpL">
                    <b>тут</b>
                </a>. материалы занятия – в этом же архиве.
            </p>

        </article>

    </section>

</main>

<footer class="container-fluid bg-dark">
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">ДЗ №3, студент Швайко Олег, группа СПУ811, Донецк, 2021</h5>
        </div>
    </div>
</footer>

</body>
</html>
