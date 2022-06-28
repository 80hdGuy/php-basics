<?php

class Movie{
    public string $title;
    public string $studio;
    public string $rating;
    public function __construct(string $title,string $studio,string $rating)
    {
        $this->rating = $rating;
        $this->studio = $studio;
        $this->title = $title;
    }
}
$movies = [
    new Movie("Casino Royale","Eon Productions","PG13"),
    new Movie("Glass","Buena Vista International","PG13"),
    new Movie("Spider-Man: Into the Spider-Verse","Columbia Pictures","PG")
];

function getPG(array $movies): array {
    $filteredMovies = [];
    foreach ($movies as $movie){
        if ($movie->rating == "PG"){
            $filteredMovies[] = $movie;
        }
    }
    return $filteredMovies;
}

$filteredMovies = getPG($movies);
foreach ($filteredMovies as $movie){
    echo $movie->title . " " . $movie->studio . " " . $movie->rating;
    echo PHP_EOL;
}