<?php
if (isset($_POST['Регистрация']))
{//Данные форм
    $dog=$_POST['dog'];
    $ta=$_POST['ta'];
    $client=$_POST['client'];
    $log=$_POST['log'];
    $log1=$_POST['log1'];
    $cmc=$_POST['cmc'];
    $int=$_POST['int'];
    //Данные сервера
    $host="localhost";
    $user="homestead";
    $passw="secret";
    //имя DB
    $db="homestead";
    //Коннект по адресу, логину и паролю
    $connect=mysqli_connect($host,$user,$passw);
    echo mysqli_error($connect);
    //проверка конекта
    if (!$connect)
    {
        exit("<P>B настоящий момент сервер базы данных недоступен, поэтому
    корректное отображение страницы невозможно.</Р>");
    } else
    {
        echo ("Соединение установлено ");
        //Указание BD и конект
        $db = mysqli_select_db($connect,$db);
        echo mysqli_error($db);
        //проверка
        if (!$db) {
            exit("<P>B настоящий момент база данных недоступен, поэтому
    корректное отображение страницы невозможно.</Р>");
        } else {
            echo ("Соединение установлено ");
        }
        //Конект с запросом
        $sql=mysqli_query($connect,"INSERT INTO TEST(`Dogovor`, `Tarif`, `Client`, `Logirovanie`, `LogirZvonkov`, `cmc`, `Internet`) VALUES ('$dog','$ta','$client','$log','$log1','$cmc','$int')");
        var_dump($sql);
        echo mysqli_error($sql);
        if ($sql) {
            echo ("Добавление прошло успешно");
            //    header('Location: Login.php');
        } else {
            echo ("Данные не были добавлены");
        }
    }
}
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.11.2017
 * Time: 18:40
 */
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
        <form method="post" name="Autoriz" action="test2.php">
           Ввод данных в таблицу<CENTER>
                    Договор:
                    <input type="text" placeholder="Договор" name="dog" required="required">
                    Тариф:
                    <input type = "text"placeholder="Тариф" name = "ta" required="required">
                    Клиент:
                    <input type = "text"placeholder="Клиент" name = "client" required="required">
                    Логирование:
                    <input type = "text"placeholder="Логирование" name = "log" required="required"><br>
                    Логир. звонков:
                    <input type = "text"placeholder="Логир. звонков" name = "log1" required="required">
                    Смс:
                    <input type = "text"placeholder="Смс" name = "cmc" required="required">
                    Интернет:
                    <input type = "text"placeholder="Интернет" name = "int" required="required">
                    <input type="submit" name="Регистрация" value="Создать"></CENTER>
        </form>
    </div>
    <div class="footer">&copy; 1</div>
</body>
</html>
