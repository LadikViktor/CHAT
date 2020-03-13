<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <form action='?' method='POST'>
        <input type='text' value="<?= isset($_POST['userName']) ? $_POST['userName'] : ''; ?>" name='userName'>
        <input type='text' name='age'>
        <input class="submit" type="submit" value="OK">
    </form>
    <?php
    include('config.php');
    $bans = file('ban.txt');

    if (in_array($_SERVER['REMOTE_ADDR'], $bans)) {
        echo "<div class = 'banstyle'> Вас забанили </div>";
    } elseif (!empty($_POST['age']) && !empty($_POST['userName'])) {

        file_put_contents('text.txt', $_SERVER['HTTP_USER_AGENT'] . $separete  . $_SERVER['REMOTE_ADDR'] . $separete  . $_POST['userName'] . $separete  . $_POST['age'] .  $separete . time() . "\n", FILE_APPEND);
    }

    



    ?>


</body>

</html>