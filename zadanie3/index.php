<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['cookie'] === "delete"){
        setcookie('time', time(), time()-3600*24);
        $message = 'Witaj!<br>Ciasteczko zostało usunięte.';
    }
}
else{
    if(!isset($_COOKIE['time'])){
        setcookie('time', time(), time()+3600*24);
        $message = 'Witaj!<br>Ciasteczko zostało utworzone.';
    }else{
        echo 'Witaj!<br>';
        echo 'Ostatnio odwiedziłeś nas: ' . date('Y-m-d H:i:s', $_COOKIE['time']);
        setcookie('time', time(), time()+3600*24);
        echo '.<br>Ciasteczko zostało zaktualizowane.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ostatnie odwiedziny.</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <p><?php echo($message);?></p>
        <form action="index.php" method="POST">
            <legend>Czy usunąć ciasteczko?</legend>
                <button name="cookie" value="delete" type="submit">Usuń ciasteczko</button>
        </form>
    </body>
</html>
