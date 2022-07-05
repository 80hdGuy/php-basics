<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        rock-paper-scissors
    </title>
    <style>
        body {
            background: darkgray;
            padding-top: 50px;
        }
        form {
            margin-top: 10px;
        }
        input{
            margin-top: 20px;
        }
       
        #tournamentNode1 {
            margin: 20px;
            padding: 6px;
            color: blue;
            background: #d2880a;
        }
        #tournamentNode2 {
            margin: 120px;
            padding: 6px;
            color: blue;
            background: #d2880a;
        }
        #tournamentNode3 {
            margin: 120px;
            padding: 6px;
            color: blue;
            background: #d2880a;
        }
        #splitterImage1 {
            width: 300px;
            height: auto;
            margin-right: 40px;
            margin-left: 40px;
        }
        #splitterImage2 {
            width: 400px;
            height: auto;
        }

    </style>
    
</head>

<body style="text-align: center">
<?php
include("game-logic.php");
$playerName = $_GET['name'];
$tournamentGameDataFilePath = "tournament-game-data.txt";
$mainGameDataFilePath = "main-game-data.txt";

$mainGameData = file_get_contents($mainGameDataFilePath);
/** @var Game $mainGame */
$mainGame = unserialize($mainGameData);

$tournamentGamesData = file_get_contents($tournamentGameDataFilePath);
$tournamentGames = [];

if ($tournamentGamesData == "" && $mainGameData == ""){//for initializing tournament games
    $mainGame = new Game();
    $mainGame->addPlayers(new Player($playerName,false),new Player("CPU1"));
    $objData = serialize($mainGame);
    $fp = fopen($mainGameDataFilePath, "w");
    fwrite($fp, $objData);
    fclose($fp);

    $tournamentGames[0][] = $mainGame;
    $cpuNameCounter = 2;
    for ($i = 1; $i < 4; $i++){
        $cpuGame = new Game();
        $cpu1 = new Player("CPU". $cpuNameCounter);
        $cpuNameCounter++;
        $cpu2 = new Player("CPU". $cpuNameCounter);
        $cpuNameCounter++;
        $cpuGame->addPlayers($cpu1,$cpu2);
        $tournamentGames[0][] = $cpuGame;
    }

    $objData = serialize($tournamentGames);
    $fp = fopen($tournamentGameDataFilePath, "w");
    fwrite($fp, $objData);
    fclose($fp);

}
else if($mainGame->getWinner() !== null){

    $objData = file_get_contents($tournamentGameDataFilePath);
    $tournamentGames = unserialize($objData);

        /** @var Game $game */
        foreach ($tournamentGames[count($tournamentGames)-1] as $game){
            if (!$game->isMainGame()){
                $game->runCpuGame();
            }
        }

        $tournamentGames[count($tournamentGames)-1][0] = $mainGame;
        $tournamentGames[] = [];
    if(count($tournamentGames) != 4){
        for ($i = 0; $i < count($tournamentGames[count($tournamentGames)-2]); $i+=2){

            $nextGame = new Game();
            $nextPlayerOne = $tournamentGames[count($tournamentGames)-2][$i]->getWinner();
            $nextPlayerTwo = $tournamentGames[count($tournamentGames)-2][$i+1]->getWinner();
            $nextGame->addPlayers($nextPlayerOne,$nextPlayerTwo);
            if($nextGame->isMainGame()){
                $objData = serialize($nextGame);
                $fp = fopen($mainGameDataFilePath, "w");
                fwrite($fp, $objData);
                fclose($fp);
            }
            $tournamentGames[count($tournamentGames)-1][] = $nextGame;
        }
        $objData = serialize($tournamentGames);
        $fp = fopen($tournamentGameDataFilePath, "w");
        fwrite($fp, $objData);
        fclose($fp);
    }

}



if (count($tournamentGames) == 4){?>
    <h1>
        <?php echo  $playerName . " won the tournament!!!🥳🥳🥳"; ?>
    </h1>
    <?php
}
if(count($tournamentGames) >= 3){
    ?>
    <form>
        <?php /** @var Game $game */
        foreach ($tournamentGames[2] as $game){?>
            <label id="tournamentNode3" class="tournamentNode">
                <?php
                $playerOne = $game->getPlayerOne();
                $playerTwo = $game->getPlayerTwo();
                echo $game->getWinner() === null? $playerOne->getName():($game->getWinner() === $playerOne? $playerOne->getName() : ("<del>".$playerOne->getName()."</del>")) ;
                ?>
                vs
                <?php
                echo $game->getWinner() === null? $playerTwo->getName():($game->getWinner() === $playerTwo? $playerTwo->getName() : ("<del>".$playerTwo->getName()."</del>")) ;
                ?>
            </label>
        <?php }?>
    </form>
    <form>
        <img id="splitterImage2" src="splitter-image.png" alt="there would be an image">
    </form>
    <?php
}
if(count($tournamentGames) >= 2){
    ?>
    <form>
        <?php /** @var Game $game */
        foreach ($tournamentGames[1] as $game){?>
            <label id="tournamentNode2" class="tournamentNode">
                <?php
                $playerOne = $game->getPlayerOne();
                $playerTwo = $game->getPlayerTwo();
                echo $game->getWinner() === null? $playerOne->getName():($game->getWinner() === $playerOne? $playerOne->getName() : ("<del>".$playerOne->getName()."</del>")) ;
                ?>
                vs
                <?php
                echo $game->getWinner() === null? $playerTwo->getName():($game->getWinner() === $playerTwo? $playerTwo->getName() : ("<del>".$playerTwo->getName()."</del>")) ;
                ?>
            </label>
        <?php }?>
    </form>
    <form>
        <img id="splitterImage1" src="splitter-image.png" alt="there would be an image">
        <img id="splitterImage1" src="splitter-image.png" alt="there would be an image">
    </form>
    <?php
}
if(count($tournamentGames) >= 1){


    ?>
    <form>
        <?php /** @var Game $game */
        foreach ($tournamentGames[0] as $game){?>
            <label id="tournamentNode1" class="tournamentNode">
                <?php
                $playerOne = $game->getPlayerOne();
                $playerTwo = $game->getPlayerTwo();
                echo $game->getWinner() === null? $playerOne->getName():($game->getWinner() === $playerOne? $playerOne->getName() : ("<del>".$playerOne->getName()."</del>")) ;
                ?>
                vs
                <?php
                echo $game->getWinner() === null? $playerTwo->getName():($game->getWinner() === $playerTwo? $playerTwo->getName() : ("<del>".$playerTwo->getName()."</del>")) ;
                ?>
            </label>
        <?php }?>
    </form>




<?php
}
if($mainGame->isMainGame()){
    $cpuName = $mainGame->getPlayerTwo()->getName();
    if(isset($_POST["start"])) {
        header('Location: main-game-manager.php?name='. $playerName.'&cpuName='.$cpuName);
    }
}
if (count($tournamentGames) != 4){?>
<form method="post">
    <input type="submit"  name="start" value="Start"><br>
</form>
<?php }?>

</body>

</html>