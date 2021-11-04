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

//$test_date =  new DateTime();
//$test_message = (object) array('date' => $test_date, 'title' => 'hi', 'author' => 'bob', 'content'=> 'some text');
//$test_encoded = json_encode($test_message);

$guestbook = file_get_contents("guestbook.json");

//var_dump($allPosts_encoded);

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $current_post = new GuestbookPost();
    foreach ($_POST as $key=>$value) {
        if (empty($value))
        {
            //error message
        } else {
            $_POST[$key] = htmlspecialchars($value);
        }
    }

    $current_post->setTitle($_POST['title']);
    $current_post->setAuthor($_POST['name']);
    $current_post->setContent($_POST['message']);


    PostLoader::savePost($guestbook, $current_post);
   // var_dump(PostLoader::readPosts($guestbook));

    echo $current_post->displayPost();
    $all_posts = PostLoader::readPosts($guestbook);
    PostLoader::displayPosts($all_posts);
}

//whatIsHappening();

//echo PostLoader::wrapElement("hello", "p");
//echo PostLoader::wrapElement("again", "h1");



require 'form-view.php';