<?php
session_start();
$connect=mysqli_connect('localhost','root','','KinoStorm');
$Name = $_SESSION['Name'];
$id = $_SESSION['id'];
$queryuser = mysqli_query($connect, "SELECT * FROM `Admins` WHERE `user_id`='$id'");
$Datau = mysqli_fetch_assoc($queryuser);
$queryuser1 = mysqli_query($connect,"SELECT `id`, `Name`, `Lastname` FROM `users`");
$Datausers = mysqli_fetch_assoc($queryuser1);
if(isset($_POST['send']))
{
    $idfilm = $_GET['id'];
    $comment = $_POST['comment'];
$queryuser = mysqli_query($connect, "INSERT INTO `Comments`(`id_film`, `id_user`, `Comment`) VALUES ('$idfilm','$id','$comment')");
header ('Location: /Sites/AboutFilm.php?id='.$idfilm);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="/css/Style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #20252a;">
    <a href="/index.php"><img src="/Image/Logo/Logo2.0.png"width="130"/></a>
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
                            <div class='AdminColor'>". $Name. "</div>
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
    <!--<div class="inb">-->
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
<div class="mainindex">
    <h3 id="lastNew">Последние новинки</h3>
    <div>
    <?php
    $id = $_GET['id'];
    $querydataPost = mysqli_query($connect, "SELECT * FROM `Films` WHERE `id`='$id'");
    $result = mysqli_fetch_assoc($querydataPost);
        $filmname = $result['filmname'];
        $year = $result['year'];
        $style = $result['style'];
        $country = $result['country'];
        $quality = $result['quality'];
        $translation = $result['Translation'];
        $duration = $result['duration'];
        $about = $result['about'];
        $posterpath = $result['posterpath'];

        echo "<div class=\"blok\">
        <h3 id=\"lastNew2\">Название фильма: $filmname($year)</h3>
        <hr id=\"line\">
        <div class=\"poster\" alt=\"фото\">
        <img width='200'height='300' src=\"$posterpath\">
        </div>
        <div class=\"righthalf\">
        <p id=\"characteristic\">
        Год выпуска:$year
        </p>
            <p id=\"characteristic\">
        Страна: $country
        </p>
            <p id=\"characteristic\">
        Жанр: $style
            </p>
            <p id=\"characteristic\">
        Качество: $quality
            </p>
            <p id=\"characteristic\">
        Перевод: $translation
            </p>
            <p id=\"characteristic\">
        Продолжительность: $duration
            </p>
        </div>
        <div id=\"clear\"></div>
        <p id=\"description\">
            $about
        </p>
        <form method=\"POST\" action=\"https://money.yandex.ru/quickpay/confirm.xml\">
        <div class=\"form-row\">
                        <div class=\"col-md-4 mb-3\">
            <input type=\"hidden\" name=\"receiver\" value=\"410011017580870\">
            <input type=\"text\" name=\"label\" value=\"Login\">
            </div>
            </div>
            <div class=\"form-row\">
                        <div class=\"col-md-4 mb-3\">
            <input type=\"hidden\" name=\"quickpay-form\" value=\"shop\">
            <input type=\"hidden\" name=\"targets\" value=\"Покупка фильма\">
            <label><input type=\"hidden\" name=\"sum\" value=\"5\" data-type=\"number\">Сумма к оплате:5руб</label>
            <input type=\"hidden\" name=\"paymentType\" value=\"PC\">
            </div>
            </div>
            <input type=\"hidden\" name=\"successURL\" value=\"http://shop/Sites/success.php\">
            <input type=\"submit\" value=\"Купить\">
        </form>
    </div>";
        ?>
    </div>

    <div class="blok">
        <?php
            $querydataPost = mysqli_query($connect, "SELECT `id_user`,`Comment` FROM `Comments` WHERE `id_film`='$id'");
            //echo mysqli_errno($connect) . ": " . mysqli_error($connect) . "\n";
            while ($result = mysqli_fetch_assoc($querydataPost)) {
                $comment = $result['Comment'];
                echo "<div id='comments'><div class=\"blok2\">Написал:$Name<div>
        $comment
        </div>
</div></div>";
        }
        ?>
    </div>
        <div id="commentsBlock2">
        <?php
        echo "<div class=\"blok\">
        <h3 id=\"lastNew2\">Написать комментарий</h3>
        <hr id=\"line\">
        <div class=\"commentarySEND\">
        
        <form action=\"/Sites/AboutFilm.php?id=$id\"method=\"post\" class=\"needs-validation\"id='formadd' novalidate>
        <div class=\"form-group\">
    <textarea class=\"form-control\"name='comment' id=\"exampleFormControlTextarea1\" rows=\"3\" required></textarea>
  </div>
  <input class=\"btn btn-primary\" type=\"submit\"name=\"send\"value=\"Отправить\">
</form>

    </div></div>";
?>
        </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>