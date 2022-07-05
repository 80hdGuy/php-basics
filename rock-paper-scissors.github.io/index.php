<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        rock-paper-scissors
    </title>
    <style>
        body {
            padding-top: 120px;
            background: darkgray;
        }
        form {
            margin: 20px;
        }


    </style>
</head>

<body style="text-align: center">




<?php
$cookie_name = "user";

file_put_contents("tournament-game-data.txt","");
file_put_contents("main-game-data.txt","");
if(isset($_POST["fname"])) {
        $name = $_POST["fname"];
        setcookie($cookie_name, $name, time() + 60, "/");
        header('Location: tournament-manager.php?name=' . $name);
}
if(isset($_POST["playAgain"])) {
    header('Location: tournament-manager.php?name=' . $_COOKIE[$cookie_name]);
}
if(isset($_COOKIE[$cookie_name])) {
?>
<h4>
    You lost. 🥑<br>
</h4>
<form id="playAgainForm" method="post">
    <label for="playAgain">Play again as <?=$_COOKIE[$cookie_name]?>?</label><br>
    <input type="submit" id="playAgain" name="playAgain" value="Yes!">
</form>
<h4>
    or <br>
</h4>
<form id="inputForm" method="post">
    <label for="playerName">Enter different name:</label><br>
    <input type="text" id="playerName" name="fname" value=""><br>
</form>
<?php }else{?>
<form id="inputForm" method="post">
    <label for="playerName">Enter your name:</label><br>
    <input type="text" id="playerName" name="fname" value=""><br>
</form>
<?php }?>

</body>

</html>