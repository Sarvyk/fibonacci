<?php
if (isset($_POST['Регистрация']))
{//Данные форм
    $id=$_POST['id'];
    $data1=$_POST['data1'];
    $data2=$_POST['data2'];
    $tovar=$_POST['tovar'];
    $price=$_POST['price'];
    $db = new SQLite3('magazin.db');
    $db->query("INSERT INTO `Продажа`(`ID поставки`,`Дата продажи`) VALUES ('$id','$data1')");
    $db->query("INSERT INTO `Списание товара`(`ID поставки`,`Дата_списания`) VALUES ('$id','$data2')");
    $db->query("INSERT INTO `Товар`(`Название`,`Цена`) VALUES ('$tovar','$price')");
    if ($db) {
        echo ("Добавление прошло успешно");
        //    header('Location: Login.php');
    } else {
        echo ("Данные не были добавлены");
    }
}

?>
<html>
<head>
    <head>
        <title>Сайт</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <style>
            body {
                font: 13pt Arial, Helvetica, sans-serif; /* Шрифт теста */
                background: #e1dfb9; /* Цвет фона */
            }
            h2 {
                font-size: 18px; /* Размер шрифта в заголовке */
                color: #080808; /* Цвет заголовка */
                margin-top: 0; /* Отступ сверху */
            }
            .container {
                width: 1300px; /* Ширина слоя */
                margin: 0 auto; /* Выравнивнить весь блок по центру */
                background: #f0f0f0; /* Цвет фона левой колонки */
            }
            .header {
                font-size: 38px; /* Размер текста в шапке */
                text-align: center; /* Выравнивание текст шапки по центру */
                padding: 5px; /* Отступы внутри блока шапки */
                background: #8fa09b; /* Цвет фона шапки */
                color: #fff; /* Цвет текста */
            }
            .sidebar {
                margin-top: 10px;
                width: 110px; /* Ширина блока */
                padding: 0 10px; /* Отступы внутри левого блока */
                float: left; /* Обтекание блока по правому краю */
            }
            .content {
                margin-left: 130px; /* Отступ слева */
                padding: 10px; /* Отступы внутри правого блока */
                background: #fff; /* Цвет фона правого блока */
            }
            .footer {
                background: #8fa09b; /* Цвет фона нижнего блока-подвала */
                color: #fff; /* Цвет текста подвала */
                padding: 5px; /* Отступы внутри блока */
                clear: left; /* Отменяем действие float */
            }
        </style>
    </head>
</head>
<body>
<div class="container">
    <div class="header">Сайт</div>
    <div class="sidebar">
        <p><a href="test.php">Учителя</a></p>
        <p><a href="test2.php">Сим карты</a></p>
        <p><a href="test3.php">Магазин</a></p>
    </div>
    <div class="content">
        <center><h2>Инструкция</h2></center>
        <form method="post" name="Autoriz" action="test3.php">
            <fieldset><legend>Ввод данных в таблицу</legend><CENTER>
                    ID поставки:
                    <input type="text" placeholder="ID поставки" name="id" required="required">
                    Товар:
                    <input type = "password"placeholder="Товар" name = "tovar" required="required">
                    Цена товара:
                    <input type = "password"placeholder="Цена товара" name = "price" required="required"><br>
                    Дата продажи:
                    <input type = "password"placeholder="Дата продажи" name = "data1" required="required">
                    Дата списания:
                    <input type = "password"placeholder="Дата списания" name = "data2" required="required">
                    <input type="submit" name="Регистрация" value="Создать"></CENTER></fieldset>
        </form>
    </div>
    <div class="footer">&copy; 1</div>
</body>
</html>
