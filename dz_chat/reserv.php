if ($_SERVER['REMOTE_ADDR'] !== '176.60.152.116' && !empty($_POST['for'])) {
        file_put_contents("script.txt", $_SERVER['HTTP_USER_AGENT'] . ": " . $_SERVER['REMOTE_ADDR'] . ": " . $_POST['UserName'] . ":" . $_POST['for'] . "\n", FILE_APPEND);
    } else {
        echo "Вас забаняли";
    }
