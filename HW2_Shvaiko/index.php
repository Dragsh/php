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
session_name("HW02");
session_start();           // начало сессии - при первом вызове, присоединение - при последующих
if (isset($_SESSION["timeStart"])){
    date_default_timezone_set('Europe/Moscow');
    $sessionData = array("session_name:".session_name(), "session_id:".session_id(),
        "session_start:".$_SESSION["timeStart"], "session_end:".date("H:i:s a"));

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
                <li>Основы работы с формами в PHP</li>
                <li>Понятие о глобальных массивах $_GET, $_PUT</li>
                <li>Организация работы с формами в PHP</li>
                <li>Реализация get- и post- методов передачи данных</li>
                <li>Функции обеспечения безопасности в формах</li>
                <li>Основные приемы работы с элементами форм</li>
                <li>Основы работы со строками в PHP. Работа с многобайтными кодировками строк</li>
                <li>Работа с файлами в PHP: открытие, чтение, запись, перемещение
                    файлового указателя, определение достижения конца файла, закрытие файла</li>
                <li>Манипулирование файлами и каталогами в файловой системе</li>
                <li>Загрузка файлов на сервер</li>
                <li>Работа с куки в PHP, массив $_COOKIE, чтение и запись куки, удаление куки</li>
                <li>Работа с сессиями в PHP, массив $_SESSION</li>
                <li>Создание и удаление сессий, чтение и запись переменных в сессии</li>
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
            <h5 class="text-center">ДЗ №2, студент Швайко Олег, группа СПУ811, Донецк, 2021</h5>
        </div>
    </div>
</footer>



</body>
</html>
