<?php
session_start();
$connect=mysqli_connect('localhost','root','','KinoStorm');
$Name = $_SESSION['Name'];
$id = $_SESSION['id'];
$queryuser = mysqli_query($connect, "SELECT * FROM `Admins` WHERE `user_id`='$id'");
$Datau = mysqli_fetch_assoc($queryuser);
if(empty($_SESSION))
    header('Location: ../Sites/Reg&Log/Login.php');
elseif ($Datau['user_id']!=$_SESSION['id'])
    header('Location: ../Sites/Reg&Log/Login.php');
if(isset($_POST['add']))
{
    $filmname=$_POST['filmname'];
    $year=$_POST['year'];
    $style=$_POST['style'];
    $country=$_POST['country'];
    $quality=$_POST['quality'];
    $Translate=$_POST['Translate'];
    $Time=$_POST['Time'];
    $About=$_POST['About'];
    $filename = $_FILES['file']['name'];
    $posterpath = "/Image/Posters/".$filename;
    move_uploaded_file($_FILES["file"]["tmp_name"],"W:/domains/Shop/Image/Posters/".$filename);
    $queryfilm = mysqli_query($connect, "INSERT INTO `Films`(`filmname`, `year`, `style`, `country`, `quality`, `Translation`, `duration`, `about`,`postersname`,`posterpath`,`filename`) VALUES ('$filmname','$year','$style','$country','$quality','$Translate','$Time','$About','$filename','$posterpath','ppp')");
//     echo mysqli_errno($connect) . ": " . mysqli_error($connect) . "\n";
      header('Location: /index.php');
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
                            <a class="nav-link active"id="aboutUS" href="../index.php">Главная</a>
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
    <h3 id="lastNew">Добавление фильма</h3>
    <div class="blok">
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <form action="/Sites/add_films.php"method="post"enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Название фильма</label>
                    <input name="filmname"pattern=".*{3,}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                    <div class="invalid-feedback">
                        В этом поле должно быть больше 3-ёх символов
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Год выпуска</label>
                    <input name="year"pattern="(19[0-9]{2}|20[0-9]{2})" type="text" class="form-control" id="validationCustom01" placeholder="Например:2005" required>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                    <div class="invalid-feedback">
                        В этом поле должно быть 4 цифры
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Страна</label>
                    <input name="country" pattern="[а-яА-ЯЁё\s,]{3,30}" type="text" class="form-control" id="validationCustom02" placeholder="Например:Россия" required>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Жанр</label>
                <select class="form-control" name="style" id="exampleFormControlSelect1">
                    <option>Боевик</option>
                    <option>Вестерн</option>
                    <option>Детектив</option>
                    <option>Историческое</option>
                    <option>Другое</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Качество</label>
                <select class="form-control"name="quality" id="exampleFormControlSelect1">
                    <option>CAMRip</option>
                    <option>TC</option>
                    <option>LDRip</option>
                    <option>DVDRip</option>
                    <option>HDRip</option>
                    <option>HDTVRip</option>
                    <option>HD DVDRip</option>
                    <option>HDTV</option>
                    <option>Blu-Ray Disc, BD</option>
                </select>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Перевод</label>
                    <input name="Translate" pattern="[А-Яа-яЁёA-Za-z0-9^0-9\s]{3,30}" type="text" class="form-control" id="validationCustom02" placeholder="Например:многоголосый" required>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                    <div class="invalid-feedback">
                        Размер данных в поле не должен превышать 30 символов
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Продолжительность фильма</label>
                    <input name="Time" pattern="[0-9]{2}:[0-9]{2}" type="text" class="form-control" id="validationCustom02" placeholder="Например:02:30" required>
                    <div class="valid-feedback">
                        Всё верно!
                    </div>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>
            <div class="form-row">
                <label for="exampleFormControlTextarea1">Описание фильма</label>
                <textarea class="form-control" name='About' id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Выбрать постер</label>
                <input type="file"name="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <input class="btn btn-primary" type="submit"name="add"value="Добавить">
        </form>
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
        <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>