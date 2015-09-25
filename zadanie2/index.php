<?php
$lottoStart = 0;
$lottoEnd = 48;

function Generate($start, $end){
    $tab = array();
    for($i = $start+1; $i <= $end+1; $i++){
        array_push($tab, $i);
    }
    return $tab;
}

$chosenNumbers = array(); // numbers chosen by user

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    for($i = $lottoStart+1; $i <= $lottoEnd+1; $i++){
        if($_POST["check$i"] == 'on'){
            array_push($chosenNumbers, $i);
        }
    }
    if(count($chosenNumbers) != 6){
        $chosenNumbers = array();
        $error = 'Wybierz dokładnie 6 liczb.';
    }
    else{
        $error = '';
        $generatedTab = Generate($lottoStart, $lottoEnd); // generated tab of numbers that can be chosen
        shuffle($generatedTab);
        $slicedTab = array_slice($generatedTab, 0, 6, true);
        sort($slicedTab);
        $numDisplay = ''; // numbers to display at the end
        $count = 0; // counting good guesses
        foreach($chosenNumbers as $chNum){
            if(in_array($chNum, $slicedTab)){
                $numDisplay .= "<font color=\"green\">".$chNum."</font> ";
                $count++;
            }
            else{
                $numDisplay .= $chNum." ";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Symulator Lotto.</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="index.php" method="POST">
            <legend>Symulator Lotto:</legend>
            <fieldset>
                <table border="1">
                    <?php
                    for($i = $lottoStart; $i <= $lottoEnd; $i++){
                        if($i % 10 == 0){
                            echo("<tr>");
                        }
                        echo(
                            "<td>"
                                . "<input type='checkbox' name='check".($i+1)."'>" . ($i + 1) .
                            "</td>"
                        );
                        if(($i + 1) % 10 == 0){
                            echo("</tr>");
                        }
                    }
                    ?>
                </table>
                <br>
                <button type="submit">Losuj</button>
            </fieldset>
        </form>
        <?php
        if(strlen($error) > 0){
            echo($error);
        }
        if(trim(strlen($numDisplay)) > 0){
            echo("<p>Wylosowane: ");
            foreach($slicedTab as $num){
                echo("$num ");
            }
            echo("<br>Twoje: ");
            echo("$numDisplay");
            echo("<br>Ilość trafień: $count</p>");
        }
        ?>
    </body>
</html>
