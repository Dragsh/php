<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 1 - Результат</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />

</head>
<body>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="task2_sessionParam.php"
                               title="Переход к странице с
                               проверкой параметров сессии">
                                Параметры сессия Задание 2
                            </a>
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
        <article class="offset-1 col-10 bg-light">
            <h3 class="text-center">Результаты рассчетов</h3>
            <?php
            require_once("functions.php");
            session_name("HW02");
            session_start();


            echo "<p class='text-center'>";

            echo "<br/>A = ",
            "<span class='badge badge-success'>", sprintf("%01.2f", $_SESSION['$a']);
            echo "</span>";

            if($_SESSION['$b'] != '0.00'){
            echo "<br/>B = ",
            "<span class='badge badge-success'>", sprintf("%01.2f", $_SESSION['$b']);
            echo "</span>";
            }

            echo "<br/>Тело - ",
            "<span class='badge badge-success'>", $_SESSION['$body'];
            echo "</span>";

            echo "<br/>Материал - ",
            "<span class='badge badge-success'>", $_SESSION['$material'];
            echo "</span>";

            if($_SESSION['$surfaceArea'] != '0.00') {
                echo "<br/>Площадь поверхности = ",
                "<span class='badge badge-success'>", sprintf("%01.2f", $_SESSION['$surfaceArea']);
                echo "</span>";
            }

            if($_SESSION['$volume'] != '0.00') {
                echo "<br/>Объем = ",
                "<span class='badge badge-success'>", sprintf("%01.2f", $_SESSION['$volume']);
                echo "</span>";
            }

            if($_SESSION['$weight'] != '0.00') {
                echo "<br/>Масса = ",
                "<span class='badge badge-success'>", sprintf("%01.2f", $_SESSION['$weight']);
                echo "</span>";
            }

            echo  "</p>";
            ?>
            <a href="page2.php" class="btn btn-secondary btn-lg active"
               role="button" aria-pressed="true" title="Геометрические тела">К Заданию 2</a>
        </article>
    </section>
</main>
</body>
</html>