<?php
if (isset($_POST['Регистрация']))
{//Данные форм
    $data1=$_POST['namegroup'];
    $data2=$_POST['name'];
    $tovar=$_POST['kol1'];
    $price=$_POST['kol'];
    $kek=$_POST['FIO'];
    $dbconn3 = pg_connect("host=localhost port=5432 dbname=homestead user=homestead password=secret") or die('Could not connect: ' . pg_last_error());
    pg_query ($dbconn3,"insert into ГруппыСтудентов (НазваниеГруппы) VALUES ('$data1')");
    pg_query ($dbconn3,"insert into Дисциплина (Название,КолВоЛекЧасов,КолВоПрЧасов) VALUES ('$data2','$tovar','$price')");
    pg_query ($dbconn3,"insert into Преподаватели (ФИО) VALUES ('$kek')");
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
        <h2>Инструкция</h2>
        <center><h2>Инструкция</h2></center>
        <form method="post" name="Autoriz" action="test.php">
            <center>Ввод данных в таблицу</center>
            <CENTER>
                Название_Группы:
                <input type="text" placeholder="Название группы" name="namegroup" required="required">
                Название дисциплины:
                <input type = "text"placeholder="Название дисциплины" name = "name" required="required"><br>
                КолВоЛекЧасов:
                <input type = "text"placeholder="Кол-во часов" name = "kol1" required="required">
                КолВоПрЧасов:
                <input type = "text"placeholder="Кол-во практических часов" name = "kol" required="required"><br>
                ФИО Преподавателя:
                <input type = "text"placeholder="ФИО преподавателей" name = "FIO" required="required">
                <input type="submit" name="Регистрация" value="Создать"></CENTER>
        </form>
    </div>
    <div class="footer">&copy; 1</div>
</body>
</html>