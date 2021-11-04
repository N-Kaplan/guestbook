<?php

require "code/GuestbookPost.php";
require "code/PostLoader.php";

session_start();

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}



$guestbook = file_get_contents("guestbook.json");


if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $current_post = new GuestbookPost();
    foreach ($_POST as $key=>$value) {
        if (empty($value))
        {
            $error = "All fields are required.";
        } else {
            $_POST[$key] = htmlspecialchars($value);
        }
    }

    if (!empty($_POST['title']) && !empty($_POST['name']) && !empty($_POST['message'])) {
        $current_post->setTitle($_POST['title']);
        $current_post->setAuthor($_POST['name']);
        $current_post->setContent($_POST['message']);
        PostLoader::savePost($guestbook, $current_post);
        echo $current_post->displayPost();
    }


    $loader = new PostLoader();
    $all_posts = $loader->readPosts($guestbook);
    PostLoader::displayPosts($all_posts);
}

require 'form-view.php';