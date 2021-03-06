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
        $current_post->setDate();
        PostLoader::savePost($current_post);
    }

    $loader = new PostLoader();
    $display_guestbook = PostLoader::displayPosts($loader->readPosts(), intval($_POST['display_nr']));

}
require 'form-view.php';

