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
                        <li class="nav-item active">
                            <a class="nav-link" href="page1.php"
                               title="Геометрические фигуры">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="task1_log.php"
                               title="переход к журналу операций – текстовый файл,
                               в который записывается дата и время выполнения расчета,
                               исходные данные расчета, результаты расчета">Журнал Задача 1</a>
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
        <article class="offset-1 col-10 bg-light">
            <h3 class="text-center">Результаты рассчетов</h3>
            <?php
            require_once("functions.php");

            $fileName = '../uploaded/log.txt';
            $a = htmlentities(($_POST['a'])) ?: 0;
            $b = htmlentities(($_POST['b'])) ? htmlentities(($_POST['b'])) : 0;
            $c = htmlentities(($_POST['c'])) ? htmlentities(($_POST['c'])) : 0;
            setcookie('$a', $a, time()+5000);
            setcookie('$b', $b, time()+5000);
            setcookie('$c', $c, time()+5000);
            $square = 0;
            $perimeter = 0;

            echo "<p class='text-center'>";
            if(isset($_POST['square'])){
                switch ($_POST['figureType']){
                    case "Прямоугольник":
                        $square = $a * $b;
                        echo "<br/>Площадь прямоугольника = ", "<span class='badge badge-success'>", sprintf("%01.2f", $square);
                        echo "</span>";
                        break;
                    case "Квадрат":
                        $square = $a * $a;
                        echo "<br/>Площадь квадрата = ", "<span class='badge badge-success'>", sprintf("%01.2f", $square);
                        echo "</span>";
                        break;
                    case "Треугольник":
                        $p = ($a+$b+$c)/2;
                        $square = sqrt($p*($p - $a)*($p - $b)*($p - $c));
                        echo "<br/>Площадь треугольника = ", "<span class='badge badge-success'>", sprintf("%01.2f", $square);
                        echo "</span>";
                        break;
                    case "Прямоугольная трапеция":
                        $square = ($a + $b) / 2 * $c;
                        echo "<br/>Площадь прямоугольной трапеции = ", "<span class='badge badge-success'>", sprintf("%01.2f", $square);
                        echo "</span>";
                        break;
                }
            }
            if (isset($_POST['perimeter'])){
                switch ($_POST['figureType']){
                    case "Прямоугольник":
                        $perimeter = ($a + $b) * 2;
                        echo "<br/>Периметр прямоугольника = ", "<span class='badge badge-success'>", sprintf("%01.2f", $perimeter);
                        echo "</span>";
                        break;
                    case "Квадрат":
                        $perimeter = $a * 4;
                        echo "<br/>Периметр квадрата = ", "<span class='badge badge-success'>", sprintf("%01.2f", $perimeter);
                        echo "</span>";
                        break;
                    case "Треугольник":
                        $perimeter = $a + $b + $c;
                        echo "<br/>Периметр треугольника = ", "<span class='badge badge-success'>", sprintf("%01.2f", $perimeter);
                        echo "</span>";
                        break;
                    case "Прямоугольная трапеция":
                        $d = sqrt(pow($b - $c, 2) + $c * $c);
                        $perimeter = $a + $b + $c + $d;
                        echo "<br/>Периметр прямоугольной трапеции = ", "<span class='badge badge-success'>", sprintf("%01.2f", $perimeter);
                        echo "</span>";
                        break;
                }
            }
            if(!isset($_POST['square']) && !isset($_POST['perimeter'])){
                echo "<br/>Не был указан <span class='badge badge-danger'>параметр рассчета</span>";
            }
            echo "</p>";

            date_default_timezone_set('Europe/Moscow');
            $dateNow = date('m/d/Y h:i:s a', time());
            bar($fileName, "{$dateNow};{$a};{$b};{$c};{$perimeter};{$square}\r\n");
            ?>
            <a href="page1.php" class="btn btn-secondary btn-lg active"
               role="button" aria-pressed="true" title="Геометрические фигуры">Назад</a>
        </article>
    </section>
</main>
</body>



</html>
