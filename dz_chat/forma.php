<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="main.css" rel='stylesheet'>
</head>

<body>
       <form action='?' method='POST'>
        <input type='text' value="<?= isset($_POST['UserName']) ? $_POST['UserName'] : ''; ?>" name="UserName">
        <input type='text' name="for">


        <input class="submit" type="submit" value="OK">
    </form>

    <?php
    //176.60.152.116
       
    $bans = file('ban.txt');

    if (in_array($_SERVER['REMOTE_ADDR'], $bans)) {
        echo "<div class = 'bans'> Вас забанили </div>";
    } else {

        file_put_contents('script.txt', $_SERVER['HTTP_USER_AGENT'] . ": " . $_SERVER['REMOTE_ADDR'] . ": " . $_POST['userName'] . ": " . $_POST['message'] . "\n", FILE_APPEND);
    }


    ?>


</body>



    ?>
</body>

</html>