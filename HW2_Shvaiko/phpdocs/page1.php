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

    <!-- подключение файла вспомогательных функций -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/task1.js"></script>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="page1.php"
                               title="Геометрические фигуры">Задача 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="task1_log.php"
                               title="Переход к журналу операций – текстовый файл,
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
            <p class="text-justify">
                <b>Задача 1.</b>
                Требуется вычислять параметры плоских геометрических фигур.
                Тип фигуры выбирается пользователем, при помощи радиокнопок:
            </p>
            <ul>
                <li>Прямоугольник</li>
                <li>Квадрат</li>
                <li>Треугольник</li>
                <li>Прямоугольная трапеция</li>
            </ul>
            <p class="text-justify">
                Параметры фигуры для вычисления задаются чек-боксами:
            </p>
            <ul>
                <li>площадь</li>
                <li>периметр</li>
            </ul>
            <p class="text-justify">
                Собственно вычисление выполнять при клике на кнопку "Вычислить" типа submit.
                Необходимые числовые параметры вводить при помощи строки ввода с типом number.
                Сохранять данные в куки, если куки определены, выводить данные в поля формы из куки.
            </p>
            <p class="text-justify">
                Требуется также вести журнал операций – текстовый файл,
                в котором записывать дату и время выполнения расчета, исходные данные расчета, результаты расчета.
            </p>
            <p class="text-justify">Предусмотрите страницу для просмотра журнала, очистки журнала.
                <br/><br/>

            <h3 class="text-center">Форма ввода параметров</h3>
            <form action="task1.php" method="post">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0"><b>Фигура:</b></legend>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="figureType" id="figureType1" value="Прямоугольник" checked>
                                <label class="form-check-label" for="figureType1">
                                    Прямоугольник
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="figureType" id="figureType2" value="Квадрат">
                                <label class="form-check-label" for="figureType2">
                                    Квадрат
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="figureType" id="figureType3" value="Треугольник">
                                <label class="form-check-label" for="figureType3">
                                    Треугольник
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="figureType" id="figureType4" value="Прямоугольная трапеция">
                                <label class="form-check-label" for="figureType4">
                                    Прямоугольная трапеция
                                </label>
                            </div>
                        </div>
                        <legend class="col-form-label col-sm-2 pt-0"><b>Вычислить:</b></legend>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="square" id="square">
                                    <label class="custom-control-label" for="square">Площадь</label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="perimeter" name="perimeter">
                                    <label class="custom-control-label" for="perimeter">Периметр</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="a">Сторона A</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="a" id="a" placeholder="A" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="b">Сторона B</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="b" id="b" placeholder="B" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="c">Сторона C</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="c" id="c" placeholder="C" required>
                        <div class="invalid-feedback">
                            Please provide a valid number.
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