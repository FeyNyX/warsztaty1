<!DOCTYPE html>
<html>
    <head>
        <title>Napisz "hello world".</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        $name = '';

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $name = $_GET['name'];
        }
        if($name){
            echo("Cześć $name!");
            echo("<br><a href=\"index.php\">Przedstaw się ponownie.</a>");
        }
        else{
            echo("Cześć nieznajomy! Może warto by wpisać swoje imię?");
            echo("<br><a href=\"index.php\">Wpisz swoje imię.</a>");
        }
        ?>
    </body>
</html>
