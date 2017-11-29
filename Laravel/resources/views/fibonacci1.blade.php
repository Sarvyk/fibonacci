<html>
<head>
    <title>
        fIbonacci
    </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Style.css')}}" rel="stylesheet" />
</head>
<body>
<div>
    <h1>Числа:</h1>
    <div class="dew">
        <?=feb($i)?>
    </div>
</div>
</body>
</html>
<?php
function feb($i)
{
    $a=0;
    $b=1;
        for ($q=0;$q<$i; $q++)
        {

            $c=$a+$b;
            $a=$b;
            $b=$c;
            echo $c,',';
        }
}

?>