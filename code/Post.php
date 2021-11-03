<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private string $date;
    private string $content;
    private string $author;

    /**
     * @param string $title
     * @param string $date
     * @param string $content
     * @param string $author
     */
    public function __construct(string $title, string $date, string $content, string $author)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author = $author;
    }



}