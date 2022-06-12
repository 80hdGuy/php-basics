<?php



class Game{
    private array $winningCombos = [
            [[0, 0],[0, 1],[0, 2]],
            [[1, 0],[1, 1],[1, 2]],
            [[2, 0],[2, 1],[2, 2]],
            [[0, 0],[1, 0],[2, 0]],
            [[0, 1],[1, 1],[2, 1]],
            [[0, 2],[1, 2],[2, 2]],
            [[0, 0],[1, 1],[2, 2]],
            [[0, 2],[1, 1],[2, 0]]
        ];
    public int $turnCount = 0;
    private bool $isOsTurn = false;
    function __construct(){
        $this->board = [
            [' ',' ',' '],
            [' ',' ',' '],
            [' ',' ',' ']
        ];
    }
    private array $board;
    public int $turnCounter = 0;
    public function drawBoard(): void{
        echo "\t   0   1   2" . PHP_EOL;
        echo "\t  ---+---+---". PHP_EOL;
        echo "\t0| " . implode(" | ", $this->board[0]) . PHP_EOL;
        echo "\t |---+---+---\n";
        echo "\t1| " . implode(" | ", $this->board[1])  . PHP_EOL;
        echo "\t |---+---+---\n";
        echo "\t2| " . implode(" | ", $this->board[2])  . PHP_EOL;
    }
    private function isInputValid(string $input): bool{

        if(strlen($input) != 3) {
            return false;
        }
        if(!in_array(' ', str_split($input), true)) {
            return false;
        }
        if( $this->board[(int)str_split($input)[0]][(int)str_split($input)[2]] != ' ') {
            return false;
        }
        $this->turnCount++;
        return true;
    }
    public function doTurn(): void{
        $this->drawBoard();
        $userInput = readline(($this->isOsTurn? "'O'" : "'X'") .
            ", choose your location (row, column): ");
        if (!$this->isInputValid($userInput)) {
            echo "Error(invalid input)\nTry again!\n";
            $this->doTurn();
            return;
        }
        $charToDraw = $this->isOsTurn ? "O" : "X";
        $this->board[(int)$userInput[0]][(int)$userInput[2]] = $charToDraw;
        $this->isOsTurn = !$this->isOsTurn;
        $this->turnCounter++;
    }
    public function getWinner(): string{
        foreach ($this->winningCombos as $winningCombo){
                if( $this->board[$winningCombo[0][0]][$winningCombo[0][1]] == 
                    $this->board[$winningCombo[1][0]][$winningCombo[1][1]] &&
                    $this->board[$winningCombo[0][0]][$winningCombo[0][1]] ==
                    $this->board[$winningCombo[2][0]][$winningCombo[2][1]] &&
                    $this->board[$winningCombo[0][0]][$winningCombo[0][1]] != " ")
                {
                    return $this->board[$winningCombo[0][0]][$winningCombo[0][1]];
                }
        }
        return "";

    }

}
$game = new Game();
$winner = '';

do {
    $game->doTurn();
    $winner = $game->getWinner();

} while ($winner == '' && $game->turnCount < 9);

$game->drawBoard();
if ($winner != '') {
    echo "'" . $winner . "'" . " WON!!! Congrats!" . PHP_EOL;
}
else {
    echo "The game is a tie." . PHP_EOL;
}


