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

    <!-- подключение файла вспомогательных функций -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/task3.js"></script>
    <script src="../js/jquery.cookie.js"></script>

</head>

<body id="bodyTask3">
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
    <section class ="row">
        <article class ="offset-1 col-10 bg-light" >
            <p class="text-justify">
                <b>Задача 3.</b> Загружать текстовый файл в кодировке UTF-8 на сервер, папка uploaded в приложении. Выводить на страницу текст из файла, а также:
            </p>
            <ul>
                <li>только строки, содержащие двузначные числа.</li>
                <li>только строки, не содержащие символов из строки ".,!?:"</li>
            </ul>

            <?php
            require_once("functions.php");

            echo "<h3 class='text-center'>Работа с файлом</h3>";

            if ($_FILES && $_FILES['filename']['error'] == UPLOAD_ERR_OK) {
                $name = '../uploaded/task3files/'.$_FILES['filename']['name'];
                $result = move_uploaded_file($_FILES['filename']['tmp_name'], $name);

                $fileName =  explode("/", $name)[3];

                echo "<h7 class='float-right'>Файл <span style='color: blue'>$fileName</span> ".($result?'':'НЕ ').'загружен</h7><br/><br/>';

                echo "<h5 class='text-center'>Все строки из файла <span style='color: blue'>$fileName</span></h5><br/>";
                // вывод файла
                view($name);

                echo "<br/><hr/><br/>";
                echo "<h5 class='text-center'>Строки из файла <span style='color: blue'>$fileName</span> в которых содержится двузначное число</h5><br/>";
                readStringsContainsTwoDigits($name);

                echo "<br/><hr/><br/>";
                echo "<h5 class='text-center'>Строки из файла <span style='color: blue'>$fileName</span> в которых не содержатся символы \".,!?:\"</h5><br/>";
                readStringsNotContainPunctuationMarks($name);
            } // if

            ?>
            <p class="text-center">
            <form class="form-row" method="post" enctype='multipart/form-data'>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="filename" id="filename" value="Выбрать">
                        <label class="custom-file-label" for="filename">Файл не выбран</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Загрузить</button>
                    </div>
                </div>
            </form>
            </p>
        </article>
    </section>

</main>





</body>
</html>
