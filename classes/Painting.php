<?php
// classes/Painting.php

class Painting {
    public $id;
    public $title;
    public $artist;
    public $year;
    public $image;

    public function __construct($id, $title, $artist, $year, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->artist = $artist;
        $this->year = $year;
        $this->image = $image;
    }
}
?>
