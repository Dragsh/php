<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 3</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />
</head>
<body id="bodyTask3">
<header class="container-fluid">
    <nav class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php"><i class="fas fa-home"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php" title="Главная страница">
                                ДЗ на 14.11.2020
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page1.php"
                               title="Proc4">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Proc11">Задача 2</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="page3.php"
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
            <p class="text-center">
                <img src="../imgs/proc12.jpg"/>
            </p>
            <p class="text-center">
                <?php
                require_once("functions.php");
                $a1 = random_float(1, 10);
                $b1 = random_float(1, 10);
                $c1 = random_float(1, 10);
                echo " <br/><br/>Исходные данные:";
                echo "<br/>A1: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $a1);
                echo "</span>";
                echo "<br/>B1: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $b1);
                echo "</span>";
                echo "<br/>C1: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $c1);
                echo "</span>";
                sortInc3($a1, $b1, $c1);
                echo " <br/><br/>Упорядочены по возрастанию:";
                echo "<br/>A1: ", "<span class='badge badge-primary'>", sprintf("%01.2f", $a1);
                echo "</span>";
                echo "<br/>B1: ", "<span class='badge badge-success'>", sprintf("%01.2f", $b1);
                echo "</span>";
                echo "<br/>C1: ", "<span class='badge badge-danger'>", sprintf("%01.2f", $c1);
                echo "</span><br/><br/>";

                $a2 = random_float(1, 10);
                $b2 = random_float(1, 10);
                $c2 = random_float(1, 10);
                echo " <br/><br/>Исходные данные:";
                echo "<br/>A2: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $a2);
                echo "</span>";
                echo "<br/>B2: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $b2);
                echo "</span>";
                echo "<br/>C2: ", "<span class='badge badge-secondary'>", sprintf("%01.2f", $c2);
                echo "</span>";
                sortInc3($a2, $b2, $c2);
                echo " <br/><br/>Упорядочены по возрастанию:";
                echo "<br/>A2: ", "<span class='badge badge-primary'>", sprintf("%01.2f", $a2);
                echo "</span>";
                echo "<br/>B2: ", "<span class='badge badge-success'>", sprintf("%01.2f", $b2);
                echo "</span>";
                echo "<br/>C2: ", "<span class='badge badge-danger'>", sprintf("%01.2f", $c2);
                echo "</span><br/><hr/>";
                ?>
            </p>
        </article>
    </section>
</main>
</body>
</html>
