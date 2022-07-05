<?php

class Element {
    private string $name;
    private array $weaker;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function addWeaker(Element $weaker): void
    {
        $this->weaker[] = $weaker;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getWeaker(): array
    {
        return $this->weaker;
    }
}
class Player {
    private bool $isCpu;
    private string $name;
    private ?Element $chosenElement = null;

    public function __construct(string $name, bool $isCpu = true)
    {
        $this->name = $name;
        $this->isCpu = $isCpu;
    }
    public function isCpu(): bool
    {
        return $this->isCpu;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChosenElement(): ?Element
    {
        return $this->chosenElement;
    }
    public function doTurn(array $elements, string $activePlayerInput )
    {
        $elementKeyNames = array_keys($elements);
        if($this->isCpu){
            $this->chosenElement = $elements[$elementKeyNames[rand(0, count($elements)-1)]];
            return;
        }
        $this->chosenElement = $elements[$activePlayerInput];
    }

}
class Game{
    private array $elements;
    private Player $playerOne;
    private Player $playerTwo;
    private int $playerOneWins = 0;
    private int $playerTwoWins = 0;
    private ?Player $winner = null;
    private string $activePlayerInput = '';

    public function __construct()
    {
        $this->setElements();
    }

    public function addPlayers(Player $playerOne, Player $playerTwo){
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }


    public function doRound()
    {
        $this->playerTwo->doTurn(
            $this->elements,
            $this->activePlayerInput
        );
        $this->playerOne->doTurn(
            $this->elements,
            $this->activePlayerInput
        );
    }
    public function setInput(string $activePlayerInput): void{
        $this->activePlayerInput = $activePlayerInput;
    }

    public function runCpuGame(int $minWins = 1)
    {
        while ( ($minWins) > $this->playerOneWins &&
                ($minWins) > $this->playerTwoWins ){
            $this->doRound();
            if ($this->playerOne->getChosenElement() ===
                $this->playerTwo->getChosenElement() ){
                continue;
            }
            if($this->getRoundWinner() === $this->playerOne){
                $this->playerOneWins++;
                continue;
            }
            $this->playerTwoWins++;
        }
        $this->winner = $this->playerOneWins > $this->playerTwoWins ? $this->playerOne : $this->playerTwo;
    }
    public function runMainGame(){
        $this->doRound();
        if ($this->playerOne->getChosenElement() ===
            $this->playerTwo->getChosenElement() ){
            return;
        }
        if($this->getRoundWinner() === $this->playerOne){
            $this->winner = $this->playerOne;
            return;
        }
        $this->winner = $this->playerTwo;

    }


    private function setElements()
    {
        $elementCombos = [
            "Rock" => ["Scissors","Lizard"],
            "Paper" => ["Rock","Spock"],
            "Scissors" => ["Lizard","Paper"],
            "Lizard" => ["Spock","Paper"],
            "Spock" => ["Rock","Scissors"]
        ];
        $elements = [];
        foreach (array_keys($elementCombos) as $comboKey){
            $elements[$comboKey] = new Element($comboKey);
        }

        /** @var Element $element */
        foreach ($elements as $element){
            foreach ($elementCombos[$element->getName()] as $weakerName){

                $element->addWeaker($elements[$weakerName]);
            }
        }
        $this->elements = $elements;
    }

    private function getRoundWinner(): Player
    {
        return in_array(
            $this->playerTwo->getChosenElement(),
            $this->playerOne->getChosenElement()->getWeaker()
        )?
            $this->playerOne : $this->playerTwo;
    }

    public function getElementNames(): array
    {
        return array_keys($this->elements);
    }
    public function getPlayerOne(): Player
    {
        return $this->playerOne;
    }
    public function getPlayerTwo(): Player
    {
        return $this->playerTwo;
    }
    public function getWinner(): ?Player
    {
        return $this->winner;
    }


    public function isMainGame(): bool
    {
        return !($this->playerTwo->isCpu() && $this->playerOne->isCpu());
    }


}


















