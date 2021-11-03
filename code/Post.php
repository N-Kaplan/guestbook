<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private string $date;
    private string $content;
    private string $author;
    private string $error_message;

    /**
     * @param string $title
     * @param string $date
     * @param string $content
     * @param string $author
     */
    public function __construct($date)
    {
        $this->title = $_POST['title'];
        $this->date = $date;
        $this->content = $_POST['message'];
        $this->author = $_POST['name'];
    }

    public function method() {
        foreach ($_POST as $key=>$value) {
            if (empty($value))
            {
                $_POST['error_message'] = $this->error_message;
            } else {
                $_POST[$key] = htmlspecialchars($value);
            }
        }
    }

}