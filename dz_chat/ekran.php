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
    foreach (mass('ws.xml') as $value) {
        $date = $value["date"];
        $name = $value["name"];
        $text = $value["text"];
        $string = "$name:$text";


        echo "<div class = '" . (($key % 2) ? "odd" : 'even') . "'>" . bbCode(smile(cens(MarcDown(htmlspecialchars($string))))) . "<br></div>" . "<div class = 'day'> $date</div>";
    }








    ?>
</body>

</html>