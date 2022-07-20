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
                               title="Обработка одномерных массивов">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Вариант 6">Задача 2</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="page3.php"
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
            <p class="text-center">
                <img src="../imgs/var8.jpg"/>
            </p>
            <p class="text-center">
                <?php
                require_once("functions.php");
                $matrix = fillMaxtrix();
                echo "<h5 class='text-center'>Матрица:</h5>";
                showMatrix($matrix);
                echo "<p class=\"text-center\"><br/>";
                $matrix = sortByColumnCharacteristic($matrix);
                echo "<h5 class='text-center'>Матрица упорядочена в соответствии с ростом хар-тик:</h5>";
                showMatrix($matrix);
                sumElemColsWithNeg($matrix);
                echo "</p>"
                ?>
            </p>
        </article>
    </section>
</main>
</body>
</html>