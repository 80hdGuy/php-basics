<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        rock-paper-scissors
    </title>
    <style>
        input {
            padding: 2em;
            margin: 1em;
        }
        body {
            background: darkgray;
        }
    </style>
</head>

<body style="text-align:center;">
<?php
include("game-logic.php");

$playerName = $_GET["name"];
$cpuName = $_GET["cpuName"];
$mainGameDataFilePath = "main-game-data.txt";
$game = new Game();
$game->addPlayers(
    new Player("$playerName",false),
    new Player("$cpuName",true)
);
foreach ($game->getElementNames() as $elementName){
    if(isset($_POST[$elementName])) {
        $game->setInput($elementName);
        $game->runMainGame();

    }
}
if(isset($_POST["back"])) {
    $mainGameData = file_get_contents($mainGameDataFilePath);
    /** @var Game $mainGame */
    $mainGame = unserialize($mainGameData);
    if($mainGame->getWinner()->isCpu()){
        header('Location: index.php');
    }else{
        header('Location: tournament-manager.php?name='. $playerName);
    }
}
?>
<h1>
    <?php

    echo $game->getPlayerOne()->getName() . "<br>" ;
    echo " --- VS --- <br>";
    echo $game->getPlayerTwo()->getName() . "<br>" ;
    ?>
</h1>

<h4>
    <?php
    $element1 = $game->getPlayerOne()->getChosenElement();
    $element2 = $game->getPlayerTwo()->getChosenElement();
    if ($element1 !== null && $element2 !== null){
        if($element1 === $element2){
            echo "___";
        }else{
            echo (in_array($element2,$element1->getWeaker())?
                ($element1->getName() . " wins " . $element2->getName()):
                ($element2->getName() . " wins " . $element1->getName()));
        }
    }else {
        echo "___";
    }

    ?>
</h4>
<h1 style="color:green;">
    <?php

    if($element1 !== null && $element2 !== null){
        if ($element2 === $element1){
            echo "It's a tie!";
        }else{
            echo $game->getWinner()->getName() . " WINS!!!";
            $objData = serialize( $game);
            if (is_writable($mainGameDataFilePath)) {
                $fp = fopen($mainGameDataFilePath, "w");
                fwrite($fp, $objData);
                fclose($fp);
            }
        }
    }else{
        echo "Make your choice";
    }

    ?>
</h1>
<form method="post">
    <?php
    if ($game->getWinner() === null){
        foreach ($game->getElementNames() as $elementName) { ?>
            <input type="submit" name="<?php echo $elementName ?>"
                   value="<?php echo $elementName ?>"/>
        <?php }
    }else{?>
        <input type="submit" name="back"
               value="back"/>
    <?php }

    ?>


</form>


</body>

</html>