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
            <h3 class="text-center">Журнал</h3>
            <?php
            $fileName = '../uploaded/log.txt';
            // чтение и вывод файла
            function view($fileName) {
                // открыть файл для чтения
                $fd = fopen($fileName, 'r') or die("<h4>Не удалось открыть файл $fileName</h4>");

                while(true) {
                    // htmlentities() - перкодировка html-разметки для вывода в браузер
                    $str = htmlentities(fgets($fd));
                    if(feof($fd)){break;}
                    $words = explode(";", $str);
                    echo "<tr>
                            <td>{$words[0]}</td>
                            <td>{$words[1]}</td>
                            <td>{$words[2]}</td>
                            <td>{$words[3]}</td>
                            <td>{$words[4]}</td>
                            <td>{$words[5]}</td>
                          </tr>";
                }
                fclose($fd);
            } // view

            if (isset($_POST['clearLog']))
            {
                file_put_contents('../uploaded/log.txt', '');
            }
            echo "<table class='table table-bordered'>
                    <tr>
                        <th>Дата и время</th>
                        <th>Сторона A</th>
                        <th>Сторона B</th>
                        <th>Сторона C</th>
                        <th>Периметр</th>
                        <th>Площадь</th>
                    </tr>";
            view($fileName);
            echo "</table>";
            ?>

            <form action="task1_log.php" method="POST">
                <input name="clearLog" type="submit" value="Очистить журнал" />
            </form>
        </article>
    </section>
</main>
</body>
</html>


