<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(strlen(trim($_POST['new_task'])) > 0){
        $_SESSION['tasks'][] .= trim($_POST['new_task']);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista zadań.</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <legend>Lista zadań:</legend>
            <fieldset>
                <table>
                    <?php
                    foreach($_SESSION['tasks'] as $id => $task){
                        echo("
                        <tr>
                            <td>Zadanie " . ($id+1) . ": $task.</td>
                        </tr>
                        ");
                    }
                    ?>
                </table>
            </fieldset>
            <fieldset>
                <input type="text" name="new_task">
                <button type="submit">Dodaj zadanie</button>
            </fieldset>
        </form>
    </body>
</html>
