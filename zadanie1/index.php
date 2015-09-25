<?php
$name = '';
$redirectURL = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name']) && strlen(trim($_POST['name'])) > 1){
        $name = trim($_POST['name']);
        $redirectURL = "greeting.php?name=" . $name;
        header('Location: ' . $redirectURL);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Napisz "hello world".</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="index.php" method="POST">
            <legend>Powitanie:</legend>
            <fieldset>
                <label>Imię:</label>
                <input name="name" type="text" placeholder="wpisz swoje imię">
                <button type="submit">Zatwierdź</button>
            </fieldset>
        </form>
    </body>
</html>
