<?php
session_start();
$connect=mysqli_connect('localhost','root','','KinoStorm');
if(isset($_POST['send'])) {
    $DBtable="users";
    $DBNameUser="Name";
    $DBLastNameUser="Lastname";
    $DBUserName="Username";
    $Email="Email";
    $DBPass="Password";
    $DBCity="City";

    $Uname = $_POST['Name'];
    $Ulastname = $_POST['LastName'];
    $Unickname = $_POST['NickName'];
    $Uemail = $_POST['Email'];
    $Upass = $_POST['password'];
    $Ucity = $_POST['City'];
    $query = mysqli_query($connect,"SELECT `Username`,`Email` FROM `users` WHERE `Email`='$Uemail' OR `Username` = '$Unickname'");
    $Data = mysqli_fetch_assoc($query);
    if ($Data['Username']!=$Unickname||$Data['Email']!=$Uemail)
    {
        $query = mysqli_query($connect, "INSERT INTO `users`($DBNameUser,$DBLastNameUser,$DBUserName,$Email,$DBPass,$DBCity) VALUES ('$Uname','$Ulastname','$Unickname','$Uemail','$Upass','$Ucity')") or mysqli_connect();
        $_SESSION['Name']=$Unickname;
        header ('Location: ../../index.php');
    }
    else {
        $Error = "Такой NickName или Email уже есть!";
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../../css/Style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #20252a;">
    <a href="../../index.php"><img src="../../Image/Logo/Logo2.0.png"width="130"/></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            </li>
            </li>
        </ul>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #20252a;height: 10px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-rg-auto">
                        <a class="btn btn-primary mr-3" href="/Sites/Reg&Log/Login.php">Вход</a>
                        <a class="btn btn-primary" href="/Sites/Reg&Log/Registration.php">Регистрация</a>
                </li>
            </ul>
        </div>
    </nav>
</nav>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #fbbe18;">
    <div class="general">
        <div class="inb">
            <div class="collapse navbar-collapse">
                <div class="leftBtn">
                    <div class="btn-group">
                        <ul class="nav nav-pills">
                            <li class="nav-item" id="s" >
                                <a class="nav-link active"id="aboutUS" href="../../index.php">Главная</a>
                            </li>
                        </ul>
                        <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fbbe18">
                            Категории
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Боевик</a>
                            <a class="dropdown-item" href="#">Вестерн</a>
                            <a class="dropdown-item" href="#">Детектив</a>
                            <a class="dropdown-item" href="#">Исторические</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Другие</a>
                        </div>
                    </div>
                </div>
                <div class="centerBtn">
                    <ul class="navbar-nav mr-auto d">
                        <li class="s">
                            <a href="#" class="round green">КиноШторм<span class="round"style="font: 32px Monotype Corsiva">Добро пожаловать!</span></a>
                        </li>
                    </ul>
                </div>
                <div class="rightBtn">
                    <ul class="nav nav-pills">
                        <li class="nav-item" id="s">
                            <a class="nav-link active"id="aboutUS" href="../../Sites/aboutUs.php">О нас</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="figure">
</div>
<!--Форма-->
<div class="Registration">
    <div class="reg">
        <div class="wrap"><div class="gradient">
    <form action="/Sites/Reg&Log/Registration.php"method="post" class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Имя</label>
                <input name="Name"pattern="[А-Яа-яЁё]{3,15}" type="text" class="form-control" id="validationCustom01" placeholder="Например:Дмитрий" required>
                <div class="valid-feedback">
                    Всё верно!
                </div>
                <div class="invalid-feedback">
                    Имя должно состоять из русских букв и должно быть по длине больше 2-ух букв и меньше 15!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Фамилия</label>
                <input name="LastName" pattern="[А-Яа-яЁё]{3,15}" type="text" class="form-control" id="validationCustom02" placeholder="Например:Чичиков" required>
                <div class="valid-feedback">
                    Всё верно!
                </div>
                <div class="invalid-feedback">
                    Фамилия должна состоять из русских букв и должна быть по длине больше 2-ух букв и меньше 15!
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Имя пользователя</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input name="NickName" pattern="[A-Za-z]{4,15}" type="text" class="form-control" id="validationCustomUsername" placeholder="Например:DarkWood" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Имя пользователя должно состоять из английских букв и должно быть больше трёх букв!
                    </div>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Email</label>
                <input name="Email" pattern="(.*)@(.*)\.(com|ru{1})" type="text" class="form-control" id="validationCustom03" placeholder="Например:Example@yandex.ru" required>
                <div class="valid-feedback">
                    Всё верно!
                </div>
                <div class="invalid-feedback">
                    Email должен быть такого типа: "Name@example.com" или "Name@example.ru"
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Пароль</label>
                <input name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" type="password" class="form-control" id="validationCustom04" placeholder="Ваш пароль" required>
                <div class="valid-feedback">
                    Всё верно!
                </div>
                <div class="invalid-feedback">
                    Пожалуйста, введите ваш Пароль
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Ваш город</label>
                <input name="City"pattern="([А-Яа-я]{3,50})|([А-Яа-я]{3,25}-[А-Яа-я]{3,25})" type="text" class="form-control" id="validationCustom05" placeholder="Ваш город" required>
                <div class="invalid-feedback">
                    Название города должно состоять как минимум из 3-ёх русских букв
                </div>
                <div class="valid-feedback">
                    Всё верно!
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Я согласен с условиями лицензионного соглашения
                </label>
                <div class="invalid-feedback">
                    Прежде чем продолжить, прочтите соглашение и поставьте галочку.
                </div>
            </div>
            <?php echo "<div style='color: red'>$Error</div>"?>
        </div>
        <input class="btn btn-primary" type="submit"name="send"value="Зарегестрироваться">
    </form>
<!--Конец формы-->
        <script>
            //Валидация данных
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>