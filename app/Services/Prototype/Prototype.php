<?php

namespace App\Services\Prototype;

class Prototype
{
    public $title;
    public $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function __clone()
    {
        $this->title  = 'copying ' . $this->title;
        $this->author = 'copying ' . $this->author;
    }

    public function display()
    {
        return [
            "The title is: " . $this->title,
            "The author is: " . $this->author
        ];
    }
}
