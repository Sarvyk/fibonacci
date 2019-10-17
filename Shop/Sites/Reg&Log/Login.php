<?php
$connect=mysqli_connect('localhost','root','','KinoStorm');
if(isset($_POST['send'])) {
    $DBtable="users";
    $DBUserName="Username";
    $DBPass="Password";

    $Unickname = $_POST['NickName'];
    $Upass = $_POST['password'];
    $query = mysqli_query($connect,"SELECT `id`,`Username`,`Password` FROM `users` WHERE `Username`='$Unickname' AND `Password` = '$Upass'");
    $Data = mysqli_fetch_assoc($query);
    if ($Data['Username']==$Unickname||$Data['Password']==$Upass)
    {
        session_start();
        $_SESSION['Name']=$Unickname;
        $_SESSION['id']=$Data['id'];
        header ('Location: ../../index.php');
    }
    else {
        $Error = "Такой пары Имени пользователя и пароля нет в базе данных!";
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
                <form action="/Sites/Reg&Log/Login.php"method="post" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Имя пользователя</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input name="NickName" pattern="[A-Za-z]{4,}" type="text" class="form-control" id="validationCustomUsername" placeholder="Например:DarkWood" aria-describedby="inputGroupPrepend" required>
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
                    <?php echo "<div style='color: red'>$Error</div>"?>
                    <input class="btn btn-primary" type="submit"name="send"value="Войти">
                </form>
                <!--Конец формы-->
            </div>

        </div>
    </div>
</div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>