<?php
declare(strict_types=1);

class PostLoader
{
    //private const MAX_POSTS = 20;
    private int $max_posts;
    private string $encoded_posts;

    public function readPosts(): array
    {
        $this->encoded_posts = file_get_contents("guestbook.json");
        //cast objects in json file as guestbookpost objects
        $objects = json_decode($this->encoded_posts);
        var_dump($objects);
        $posts = [];
        if (isset($objects)) {
            foreach ($objects as &$object) {
                $post = new GuestbookPost();
                $post->set($object);
                $posts[] = $post;
            }
        }
        return $posts;
    }

    private function readFile() {
        return file_get_contents('guestbook.json');
    }

    public static function savePost($guest_post)
    {
        $decoded_posts = json_decode(file_get_contents('guestbook.json'));
        empty($decoded_posts) ? $decoded_posts[] = $guest_post : array_unshift($decoded_posts, $guest_post->toArr());
        $all_encoded = json_encode($decoded_posts);
        file_put_contents("guestbook.json", $all_encoded);
    }

    public static function displayPosts($all_posts, $max_posts): string
    {

        $display = "";
        $max = (count($all_posts) < $max_posts) ? count($all_posts) : $max_posts;
        $display_arr = array_slice($all_posts,0, $max);
        foreach ($display_arr as $post) {
            $display .= $post->displayPost();
        }
        return $display;
    }
}