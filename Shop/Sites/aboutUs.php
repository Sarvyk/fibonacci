<?php
session_start();
$connect=mysqli_connect('localhost','root','','KinoStorm');
if (!empty($_SESSION)) {
    $id = $_SESSION['id'];
    $Name = $_SESSION['Name'];
    $queryuser = mysqli_query($connect, "SELECT * FROM `Admins` WHERE `user_id`='$id'");
    $queryAboutUs=mysqli_query($connect,"SELECT * FROM `AboutUs` WHERE `id`='1'");
    $Datau = mysqli_fetch_assoc($queryuser);
    $Data = mysqli_fetch_assoc($queryAboutUs);
    if (isset($_POST['Transform'])){
        $Title = $_POST['Title'];
        $Text = $_POST['About'];
        $query = mysqli_query($connect,"UPDATE `AboutUs` SET `Title`='$Title',`Text`='$Text' WHERE `id`='1'")or mysqli_errno($connect);
        header ('Location: ../Sites/aboutUs.php');
    }
    if($Datau['root']=='1'&& $Data['id']!='1')
    {
        $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <p id='f'>Заполните поля, чтобы обновить этот раздел!</p>
                    <form action=\"/Sites/aboutUs.php\"method=\"post\" class=\"needs-validation\" novalidate>
                        <div class=\"form-row\">
                            <div class=\"col-md-4 mb-3\">
                <label for=\"validationCustom02\">Заголовок</label>
                <input name=\"Title\" type=\"text\" class=\"form-control\" required>
            </div>
                        </div>
                        <div class=\"form-row\">
                            <label for=\"exampleFormControlTextarea1\">О нас</label>
    <textarea class=\"form-control\"name='About' id=\"exampleFormControlTextarea1\" rows=\"3\"></textarea>
                            </div>
                        </div>
                        <input class=\"btn btn-primary\" type=\"submit\"name=\"send\"value=\"Обновить\">
                    </form>
                    <!--Конец формы-->
                </div>
            </div>";
        if (isset($_POST['send']))
        {
            $Title = $_POST['Title'];
            $Text = $_POST['About'];
            $query = mysqli_query($connect, "INSERT INTO `AboutUs`(`Title`, `Text`) VALUES ('$Title','$Text')");
            header ('Location: ../Sites/aboutUs.php');
        }
    }else if ($Datau['root']=='1'&& $Data['id']=='1')
    {
        $Title = $Data['Title'];
        $Text = $Data['Text'];
        $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <h3 id='a'>$Title</h3>
            <p id='g'>$Text</p>
                </div>
                <form action=\"/Sites/aboutUs.php\"method=\"post\" class=\"needs-validation\" novalidate>
                 <input class=\"btn btn-primary\" type=\"submit\"name=\"transform\"value=\"Обновить\">
                </form>
            </div>";
        if(isset($_POST['transform']))
        {
            $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <p id='f'>Заполните поля, чтобы обновить этот раздел!</p>
                    <form action=\"/Sites/aboutUs.php\"method=\"post\" class=\"needs-validation\" novalidate>
                        <div class=\"form-row\">
                            <div class=\"col-md-4 mb-3\">
                <label for=\"validationCustom02\">Заголовок</label>
                <input name=\"Title\" type=\"text\" class=\"form-control\"value='$Title' required>
            </div>
                        </div>
                        <div class=\"form-row\">
                            <label for=\"exampleFormControlTextarea1\">О нас</label>
    <textarea class=\"form-control\"name='About' id=\"exampleFormControlTextarea1\" rows=\"3\">$Text</textarea>
                            </div>
                        </div>
                        <input class=\"btn btn-primary\" type=\"submit\"name=\"Transform\"value=\"Обновить\">
                    </form>
                    <!--Конец формы-->
                </div>
            </div>";
            }
    }
    else
    {
        if($Datau[root]!='1'&&$Data['id']=='1') {
            $Title = $Data['Title'];
            $Text = $Data['Text'];
            $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <h3 id='a'>$Title</h3>
            <p id='g'>$Text</p>
                </div>
            </div>";
        }else{
            $Text = "В настоящий момент данных нет. Зайдите на сайт под рутом, чтобы заполнить этот раздел!";
            $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <p id='d'>$Text</p>
                </div>
            </div>";
        }
    }
}else if(empty($_SESSION))
{
    $queryAboutUs=mysqli_query($connect,"SELECT * FROM `AboutUs` WHERE `id`='1'");
    $Data = mysqli_fetch_assoc($queryAboutUs);
    if(empty($Data))
    {
        $Text = "В настоящий момент данных нет. Зайдите на сайт под рутом, чтобы заполнить этот раздел!";
        $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <p id='d'>$Text</p>
                </div>
            </div>";
    }
    else {
        $Title = $Data['Title'];
        $Text = $Data['Text'];
        $AboutUs = "<div class=\"aboutUs\">
            <div class=\"wrap\"><div class=\"gradient\">
            <h3 id='a'>$Title</h3>
            <p id='g'>$Text</p>
                </div>
            </div>";
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../css/Style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #20252a;">
    <a href="../index.php"><img src="../Image/Logo/Logo2.0.png"width="130"/></a>
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
                    <?php
                    if (!empty($_SESSION['Name']))
                    {
                        if(empty($Datau['user_id'])) {
                            echo"<div style='color: #66afe9'>Вы зашли как: " . $Name . "&nbsp&nbsp&nbsp&nbsp&nbsp" . '<a class="btn btn-primary" href="/Sites/Reg&Log/Logout.php">Выход</a></div>';
                        }else if($Datau['user_id']==$_SESSION['id'])
                        {
                            echo "<div class='Admin' style='color: #66afe9'>
                            <div class='mass'>Вы зашли как: </div> 
                            <div class='AdminColor'>". $Name. "
                            </div>
                            &nbsp&nbsp&nbsp&nbsp&nbsp" .'<a class="btn btn-primary buttonExit" href="/Sites/add_films.php">Добавить фильм</a>'."&nbsp&nbsp".
                                '<a class="btn btn-primary buttonExit" href="/Sites/Reg&Log/Logout.php">Выход</a>
                            </div>';
                        }
                    }else {
                        echo '<a class="btn btn-primary mr-3" href="/Sites/Reg&Log/Login.php">Вход</a>';
                        echo '<a class="btn btn-primary" href="/Sites/Reg&Log/Registration.php">Регистрация</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</nav>
<nav class="navbar navbar-expand-lg navbar-light navbarTWO" style="background-color: #fbbe18;">
    <div class="collapse navbar-collapse">
        <div class="general">
            <div class="leftBtn">
                <div class="btn-group">
                    <ul class="nav nav-pills">
                        <li class="nav-item" id="s" >
                            <a class="nav-link active"id="aboutUS" href="/index.php">Главная</a>
                        </li>
                    </ul>
                    <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fbbe18">
                        Категории
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/Sites/Catigories/militant.php">Боевик</a>
                        <a class="dropdown-item" href="/Sites/Catigories/Western.php">Вестерн</a>
                        <a class="dropdown-item" href="/Sites/Catigories/detective.php">Детектив</a>
                        <a class="dropdown-item" href="/Sites/Catigories/history.php">Исторические</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Sites/Catigories/other.php">Другие</a>
                    </div>
                </div>
            </div>
            <div class="center">
                <!--<div class="centerBtn">-->
                <ul class="navbar-nav mr-auto d">
                    <li class="s">
                        <a href="#" class="round green">КиноШторм<span class="round">Добро пожаловать!</span></a>
                    </li>
                </ul>
            </div>
            <div class="rightBtn">
                <ul class="nav nav-pills">
                    <li class="nav-item" id="s">
                        <a class="nav-link active"id="aboutUS" href="/Sites/aboutUs.php">О нас</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</nav>
        <?php echo $AboutUs;?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>