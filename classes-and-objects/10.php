<?php


class Application
{
    private VideoStore $videoStore;

    function run()
    {

        $this->videoStore = new VideoStore();
        //for testing
        $this->videoStore->addVidToLib("The Matrix");
        $this->videoStore->addVidToLib("Godfather II");
        $this->videoStore->addVidToLib("Star Wars Episode IV: A New Hope");
        //for testing

        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies(readLine("Move title to add: "));
                    break;
                case 2:
                    $this->rent_video(readLine("Move to rent: "));
                    break;
                case 3:
                    $title = readLine("Move to return: ");
                    $rating = (int)readLine("Give it a rating from 1 to 10: ");
                    $this->return_video($title, $rating);
                    break;
                case 4:
                    echo PHP_EOL;
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies(string $title)
    {
        $this->videoStore->addVidToLib($title);
    }

    private function rent_video(string $title)
    {
        $this->videoStore->checkOutVidFromLib($title);
    }

    private function return_video(string $title, int $rating)
    {
        $this->videoStore->bringBackTheTape($title, $rating);
    }

    private function list_inventory()
    {
        $listOfVids = $this->videoStore->getListOfVids();
        echo implode(PHP_EOL, $listOfVids) . PHP_EOL;
        echo PHP_EOL;
    }
}

class VideoStore
{
    private array $videoLib = [];

    public function addVidToLib(string $title)
    {
        $this->videoLib[$title] = new Video($title);
    }

    public function checkOutVidFromLib(string $title): bool
    {
        if ($this->videoLib[$title] == null) {
            return false;
        }
        return $this->videoLib[$title]->checkOut();
    }

    public function bringBackTheTape(string $title, int $rating): bool
    {
        if ($this->videoLib[$title] == null) {
            return false;
        }
        $this->videoLib[$title]->returnTape($rating);
        return true;
        //todo add rating validation;
    }

    public function getListOfVids(): array
    {
        return array_reduce(
            $this->videoLib,
            function (array $result, Video $video) {
                $result[] =
                    $video->title
                    . ", "
                    . ($video->checkedOut ? "checked out, " : "in stock, ")
                    . round($video->userRatingAverage, 1);
                return $result;
            },
            []
        );
    }
}

class Video
{
    public string $title;
    public bool $checkedOut = false;
    public float $userRatingAverage = 0;
    private array $userRatings = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    function checkOut(): bool
    {
        if ($this->checkedOut) {
            return false;
        }
        $this->checkedOut = true;
        return true;
    }

    function returnTape(int $userRating)
    {
        $this->userRatings[] = $userRating;
        $average = 0;
        foreach ($this->userRatings as $rating) {
            $average += $rating;
        }
        $this->userRatingAverage = $average / count($this->userRatings);
        $this->checkedOut = false;
    }
}

$app = new Application();
$app->run();
