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
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
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
     * @return array
     */

    //courtesy of Jorg von Dzerzawa
    public function toArr() : array {
        $arr = [];
        $arr["title"] = $this->title;
        $arr["date"] = $this->date;
        $arr["content"] = $this->content;
        $arr["author"] = $this->author;
        return $arr;
    }

    private static function wrapElement($element, $tag): string
    {
        return "<$tag>$element</$tag>";
    }

    public function displayPost(): string
    {
        return
        self::wrapElement($this->title, 'h3') . "<br>" .
        self::wrapElement($this->content, 'p') . "<br>" .
        self::wrapElement($this->author, 'h5'). "<br>" .
        self::wrapElement($this->date->format('d-m-Y H:i:s'), 'h5') . "<br>";
    }
}
