<?php

class Dog{
    public string $name;
    public string $sex;
    public ?Dog $mother = null;
    public ?Dog $father = null;
    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }
    public function fathersName():string{
        if ($this->father == null){
            return "Unknown";
        }
        return $this->father->name;
    }
    public function HasSameMotherAs(Dog $otherDog):bool{
        return $this->mother === $otherDog->mother;
    }
}

class DogTest{
    public array $dogs;
    public function Main(){
        $this->dogs[] = new Dog("Max", "male");
        $this->dogs[] = new Dog("Rocky", "male");
        $this->dogs[] = new Dog("Sparky", "male");
        $this->dogs[] = new Dog("Buster", "male");
        $this->dogs[] = new Dog("Sam", "male");
        $this->dogs[] = new Dog("Lady", "female");
        $this->dogs[] = new Dog("Molly", "female");
        $this->dogs[] = new Dog("Coco", "female");
        $this->dogs = array_combine(array_column($this->dogs,"name"),$this->dogs);

        $this->dogs["Max"]->mother = $this->dogs["Lady"];
        $this->dogs["Max"]->father = $this->dogs["Rocky"];

        $this->dogs["Coco"]->mother = $this->dogs["Molly"];
        $this->dogs["Coco"]->father = $this->dogs["Buster"];

        $this->dogs["Rocky"]->mother = $this->dogs["Molly"];
        $this->dogs["Rocky"]->father = $this->dogs["Sam"];

        $this->dogs["Buster"]->mother = $this->dogs["Lady"];
        $this->dogs["Buster"]->father = $this->dogs["Sparky"];

        echo $this->dogs["Coco"]->fathersName();
        echo PHP_EOL;
        echo $this->dogs["Sparky"]->fathersName();
        echo PHP_EOL;
        echo $this->dogs["Coco"]->HasSameMotherAs($this->dogs["Rocky"])?"true":"false";
        echo PHP_EOL;
        echo $this->dogs["Rocky"]->HasSameMotherAs($this->dogs["Max"])?"true":"false";
        echo PHP_EOL;
    }
}
$test = new DogTest();
$test->Main();