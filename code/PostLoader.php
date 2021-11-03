<?php
declare(strict_types=1);

class PostLoader
{
    private GuestbookPost $guest_post;

    // first post as example
    //add new post
    // save entire array to file
    //public static function readPosts()

    public static function readPosts($encoded_posts)
    {
        return json_decode($encoded_posts);
    }

    public static function savePost($decoded_posts, $new_post)
    {
        $decoded_posts[] = $new_post;
        $all_encoded = json_encode($decoded_posts);
        file_put_contents("guestbook.json", $all_encoded, 0);
    }
}