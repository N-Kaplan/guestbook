<?php
declare(strict_types=1);

class GuestbookPost
{
    private ?string $title = null;
    private ?DateTime $date = null;
    private ?string $content= null;
    private ?string $author= null;

    public function __construct()
    {}


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
    public function setDate(): void
    {
        $this->date = new DateTime();
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
        var_dump($this->date);
        if ($this->date !== null) {
            return
                self::wrapElement($this->title, 'h3') . "<br>" .
                self::wrapElement($this->content, 'p') . "<br>" .
                self::wrapElement($this->author, 'h5') . "<br>" .
                self::wrapElement($this->date->format('d-m-Y H:i:s'), 'h5') . "<br>";
        }
        else {
            return '';
        }
    }

    //function to cast decoded json objects as Guestbookpost objects
    //todo: move this function to a dedicated Converter class
    public function set($post_to_display) {
        foreach ($post_to_display as $key=>&$value) {
            if ($key === "date") {
                $this->{$key} = new DateTime($value->date);
            } else {
                $this->{$key} = $value;
            }
        }
    }

}
