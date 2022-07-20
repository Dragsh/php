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
                        <li class="nav-item active">
                            <a class="nav-link" href="page2.php"
                               title="Геометрические тела">Задача 2</a>
                        </li>
                        <li class="nav-item">
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

            $a = htmlentities(($_POST['a'])) ? htmlentities(($_POST['a'])) : 0;
            $b = htmlentities(($_POST['b'])) ? htmlentities(($_POST['b'])) : 0;

            $density = 0;

            switch ($_POST['materialType']){
                case "steel":
                    $density= 7.8;
                    break;
                case "aluminum":
                    $density= 2.7;
                    break;
                case "waterice":
                    $density= 0.9;
                    break;
                case "granite":
                    $density= 2.6;
                    break;
            }

            $surfaceArea = 0;
            $volume = 0;
            $weight = 0;

            echo "<p class='text-center'>";

            echo "<br/>A = ",
            "<span class='badge badge-success'>", sprintf("%01.2f", $a);
            echo "</span>";

            if($b > 0){
            echo "<br/>B = ",
            "<span class='badge badge-success'>", sprintf("%01.2f", $b);
            echo "</span>";
            }

            echo "<br/>Тело - ",
            "<span class='badge badge-success'>", $_POST['bodyType'];
            echo "</span>";

            echo "<br/>Материал - ",
            "<span class='badge badge-success'>", $_POST['materialType'];
            echo "</span>";

            if(isset($_POST['surfaceArea'])){
                switch ($_POST['bodyType']){
                    case "cone":
                        $surfaceArea = pi() * $a ($a + $b);
                        echo "<br/>Площадь поверхности конуса = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $surfaceArea);
                        echo "</span>";
                        break;
                    case "sphere":
                        $surfaceArea = 4 * pi() * $a * $a;
                        echo "<br/>Площадь поверхности сферы = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $surfaceArea);
                        echo "</span>";
                        break;
                    case "cylinder":
                        $surfaceArea = 2 * pi() * $a * $b;
                        echo "<br/>Площадь поверхности цилиндра = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $surfaceArea);
                        echo "</span>";
                        break;
                    case "pyramid":
                        $surfaceArea = $a * $a + 2 * $a * sqrt($b - $a * $a/4);
                        echo "<br/>Площадь поверхности пирамиды = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $surfaceArea);
                        echo "</span>";
                        break;
                }
            }
            if (isset($_POST['volume'])){
                switch ($_POST['bodyType']){
                    case "cone":
                        $volume = pi()*$a*$a*$b/3;
                        echo "<br/>Объем конуса = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $volume);
                        echo "</span>";
                        break;
                    case "sphere":
                        $volume = 4*pi()*$a*$a*$a/3;
                        echo "<br/>Объем сферы = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $volume);
                        echo "</span>";
                        break;
                    case "cylinder":
                        $volume = pi()*$a*$a*$b;
                        echo "<br/>Объем цилиндра = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $volume);
                        echo "</span>";
                        break;
                    case "pyramid":
                        $volume = $a*$b*$b/3;
                        echo "<br/>Объем пирамиды = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $volume);
                        echo "</span>";
                        break;
                }
            }
            if (isset($_POST['weight'])){
                switch ($_POST['bodyType']){
                    case "cone":
                        $weight = pi()*$a*$a*$b/3 * $density;
                        echo "<br/>Масса конуса = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $weight);
                        echo "</span>";
                        break;
                    case "sphere":
                        $weight = 4*pi()*$a*$a*$a/3 * $density;
                        echo "<br/>Масса сферы = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $weight);
                        echo "</span>";
                        break;
                    case "cylinder":
                        $weight = pi()*$a*$a*$b * $density;
                        echo "<br/>Масса цилиндра = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $weight);
                        echo "</span>";
                        break;
                    case "pyramid":
                        $weight =  $a*$b*$b/3 * $density;
                        echo "<br/>Масса пирамиды = ",
                        "<span class='badge badge-success'>", sprintf("%01.2f", $weight);
                        echo "</span>";
                        break;
                }
            }
            if(!isset($_POST['surfaceArea']) && !isset($_POST['volume']) && !isset($_POST['weight'])){
                echo "<br/>Не был указан <span class='badge badge-danger'>параметр рассчета</span>";
            }
            echo "</p>";

            $_SESSION['$a'] = $a;
            $_SESSION['$b'] = $b;
            $_SESSION['$body'] = $_POST['bodyType'];
            $_SESSION['$material'] = $_POST['materialType'];
            $_SESSION['$surfaceArea'] = $surfaceArea;
            $_SESSION['$volume'] = $volume;
            $_SESSION['$weight'] = $weight;
            ?>
            <a href="page2.php" class="btn btn-secondary btn-lg active"
               role="button" aria-pressed="true" title="Геометрические тела">Назад</a>
        </article>
    </section>
</main>
</body>
</html>