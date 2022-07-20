<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задача 2</title>

    <!-- подключение внешних таблиц стилей  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- картинка для отображения в заголовке вкладки браузера -->
    <link rel="shortcut icon" href="../imgs/alien.png" type="image/x-icon" />
    <link rel="icon" href="../imgs/alien.png" type="image/x-icon" />


    <!-- подключение файла вспомогательных функций -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/task2.js"></script>
    <script src="../js/jquery.cookie.js"></script>

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
            <p class="text-justify">
                <b>Задача 2.</b> Требуется вычислять параметры геометрических тел по выбору пользователя:
            </p>
            <ul>
                <li>площадь поверхности</li>
                <li>объем</li>
                <li>масса</li>
            </ul>
            <p class="text-justify">
                Типы тел по выбору пользователя:
            </p>
            <ul>
                <li>конус</li>
                <li>сфера</li>
                <li>цилиндр</li>
                <li>правильная четырехгранная пирамида</li>
            </ul>
            <p class="text-justify">
                Варианты материала, из которого изготовлено тело:
            </p>
            <ul>
                <li>сталь</li>
                <li>алюминий</li>
                <li>водяной лед</li>
                <li>гранит</li>
            </ul>
            <p class="text-justify">
                Тип фигуры задавать радиокнопками, материал выбирать из выпадающего списка.
                Параметры вычисления задавать чек-боксами, собственно вычисление выполнять при клике на кнопку "Вычислить" типа submit.
            </p>
            <p class="text-justify">
                В отдельной странице выводить форму для ввода данных, в обработчике формы вычислять по заданию,
                выводить исходные данные и результаты расчета, картинки выбранного материала и фигуры.
                На еще одной странице выводить исходные данные и результаты расчетов (без картинок), данные хранить  в сессии.
            </p>

            <h3 class="text-center">Форма ввода параметров</h3>

            <form action ="task2.php" method="post" >
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-5"><b>Тело:</b></legend>
                        <div class="col-sm-4 pt-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bodyType" id="bodyType1" value="cone" checked>
                                <label class="form-check-label" for="bodyType1">
                                    Конус
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bodyType" id="bodyType2" value="sphere">
                                <label class="form-check-label" for="bodyType2">
                                    Сфера
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="bodyType" id="bodyType3" value="cylinder">
                                <label class="form-check-label" for="bodyType3">
                                    Цилиндр
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="bodyType" id="bodyType4" value="pyramid">
                                <label class="form-check-label" for="bodyType4">
                                    Правильная четырехгранная пирамида
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <img class="col-sm-4" src="" id="bodyTypeImg" width="256" height="256">
                    </div>
                    <div class="form-group">
                        <label for="materialType"><b>Материал:</b></label>
                        <select class="form-control" name="materialType" id="materialType">
                            <option value="steel">Сталь</option>
                            <option value="aluminum">Алюминий</option>
                            <option value="waterice">Водяной лед</option>
                            <option value="granite">Гранит</option>
                        </select>
                    </div>
                    <div class="row">
                        <div  class="col-sm-6">
                            <img src="" id="materialTypeImg" width="256" height="256">
                            <label/>
                        </div>
                        <legend class="col-form-label col-sm-2 pt-5"><b>Вычислить:</b></legend>
                        <div class="col-sm-4 pt-5">
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="surfaceArea" name="surfaceArea">
                                    <label class="custom-control-label" for="surfaceArea">Площадь поверхности</label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="volume" name="volume">
                                    <label class="custom-control-label" for="volume">Объем</label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="weight" name="weight">
                                    <label class="custom-control-label" for="weight">Масса</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="a">Сторона A</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="a" id="a" placeholder="A" required>
                        <div class="invalid-feedback">
                            Введите правильное число
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="b">Сторона B</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="b" id="b" placeholder="B" required>
                        <div class="invalid-feedback">
                            Введите правильное число
                        </div>
                    </div>
                </div>
                <br/><br/>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                        <button type="reset" class="btn btn-danger float-right">Отменить</button>
                    </div>
                </div>
            </form>

        </article>


    </section>



</main>





</body>

</html>

