<?php
declare(strict_types=1);

class PostLoader
{
    //private const MAX_POSTS = 20;
    private int $max_posts;
    private string $encoded_posts;

    public function readPosts($encoded_posts): array
    {
        $this->encoded_posts = $encoded_posts;
        //cast objects in json file as guestbookpost objects
        $objects = json_decode($encoded_posts);
        $posts = [];
        foreach ($objects as &$object) {
            $post = new GuestbookPost();
            $post->set($object);
            $posts[] = $post;
        }
        return $posts;
    }

    public static function savePost($encoded_posts, $guest_post)
    {
        $decoded_posts = json_decode($encoded_posts);
        array_unshift($decoded_posts, $guest_post->toArr());
        $all_encoded = json_encode($decoded_posts);
        file_put_contents("guestbook.json", $all_encoded);
    }

    public static function displayPosts($all_posts, $max_posts): string
    {
        $display = "";
        //$max = (count($all_posts) < self::MAX_POSTS) ? count($all_posts) : self::MAX_POSTS;
        $max = (count($all_posts) < $max_posts) ? count($all_posts) : $max_posts;
        $display_arr = array_slice($all_posts,0, $max);
        foreach ($display_arr as $post) {
            echo $post->displayPost();
        }
        return $display;
    }
}