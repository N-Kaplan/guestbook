<?php
declare(strict_types=1);

class PostLoader
{
    private const MAX_POSTS = 20;
    //private GuestbookPost $guest_post;

    // first post as example
    //add new post
    // save entire array to file
    //public static function readPosts()

    public static function readPosts($encoded_posts)
    {
        return json_decode($encoded_posts);
    }

    public static function savePost($encoded_posts, $guest_post)
    {
        $decoded_posts = json_decode($encoded_posts);
        array_unshift($decoded_posts, $guest_post->toArr());
        $all_encoded = json_encode($decoded_posts);
        file_put_contents("guestbook.json", $all_encoded);
    }

    public static function displayPosts($all_posts): string
    {
        $display = "";
        $max = (count($all_posts) < self::MAX_POSTS) ? count($all_posts) : self::MAX_POSTS;
        $display_arr = array_splice($all_posts, $max);
        foreach ($display_arr as $post) {
            //$display . $post->displayPost();
            var_dump($post);
        }
        return $display;


    }
}