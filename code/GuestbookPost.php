<?php
declare(strict_types=1);

class GuestbookPost
{
    private string $title;
    private DateTime $date;
    private string $content;
    private string $author;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @param string $title
     * @param string $date
     * @param string $content
     * @param string $author
     */




}