<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 1</title>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="page1.php"
                               title="Обработка одномерных массивов">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page2.php"
                               title="Вариант 6">Задача 2</a>
                        </li>
                        <li class="nav-item">
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
            <p class="text-center">
                <?php
                require_once("functions.php");
                $array = fillArray();
                showArray($array);
                echo "<br/>";
                echo "Элементов равных нулю: ",
                "<span class='badge badge-success'>", zeroElems($array);
                echo "</span><br/>";
                echo "Элементов меньше нуля: ",
                "<span class='badge badge-success'>", negativeElems($array);
                echo "</span><br/>";
                echo "Сумма элементов после минимального: ",
                "<span class='badge badge-success'>", sprintf("%01.2f", sumAfterMin($array));
                echo "</span><br/>";
                echo "Сумма модулей элементов после минимального по модулю: ",
                "<span class='badge badge-success'>", sprintf("%01.2f", sumAfterAbsMin($array));
                echo "</span><br/>";
                echo "Массив упорядочен по возрастанию модулей: ",
                showArray(sortByIncreaseAbs($array));
                echo "<br/>";
                echo "Отрицательные возведены в квадрат, массив упорядочен по возрастанию: ",
                showArray(squareNegSortByAscending($array));
                echo "<br/>";
                echo "Удалены все отрицательные элементы: ",
                showArray(delNegElems($array));
                echo "<br/>";
                echo "После первого и перед последним вставлен -1010: ",
                showArray(insertElems($array));
                echo "<br/>";
                ?>
            </p>
        </article>
    </section>
</main>
</body>
</html>