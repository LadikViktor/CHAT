<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="1">
    <link href="main.css" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <?php
    include('config.php');
    include('bbcode.php');
    $mes_arr = file("text.txt");
    foreach ($mes_arr as $key => $value) {
        $buf = explode($separete, $value);
        
        $day = date('l,d-M-Y H:i:s', $buf[4]);
        $f = "$buf[2]: $buf[3]";
        echo   "<div class = '" . (($key % 2) ? 'odd' : 'even') . "'>" . bbcode(smile(cens(htmlspecialchars($f)))) .  "</div>" . "<div class = 'day'> $day </div>";
    }
  

    
    ?>
</body>

</html>