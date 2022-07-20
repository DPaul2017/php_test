<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="styles/styles.css" rel="stylesheet">
        <title>sessions test</title>
    </head>
    <body class="mainBody">
        <div class="mainDiv">
            <div class="formDiv">

                <form method='POST' action='index.php' >
                    <input type='text' name='link' placeholder="Enter image link here" style="width: 600px;">
                    <input type='submit' name='submit' value='Submit'>
                </form>

                <form method='POST' action='index.php' >
                    <input type='submit' name='clearSession' value='Clear session'>
                </form>

            </div>
            <?php
            // Подключаю сторонний файл

            require_once 'drawElements.php';

            //Создаю экземпляр класса
            $drawElement = new drawElements();

            //Проверяю массивы и метод отправики запроса, добавляю данные в сессию
            if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['link'])) {
                if ($_POST['link'] != null) {
                    $_SESSION['linkArray'][] = htmlentities(trim($_POST['link']));
                    header("Location: index.php");
                }
            }

            // Для очистки созданного выше массива
            if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['clearSession'])) {
                unset($_SESSION['linkArray']);
                $_POST['clearSession'] = null;
            }

            // Отрисовываю панель с картинкой
            if (isset($_SESSION['linkArray'])) {
                foreach ($_SESSION['linkArray'] as $link) {
                    $drawElement->drawImgPanel($link);
                }
            }
            ?>
        </div>
    </body>
</html>
