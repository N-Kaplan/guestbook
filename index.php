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

$test_date =  new DateTime();
$test_message = (object) array('date' => $test_date, 'title' => 'hi', 'author' => 'bob', 'content'=> 'some text');
$test_encoded = json_encode($test_message);
//var_dump($test_encoded);

$allPosts = [];
$allPosts[] = $test_message;
$allPosts_encoded = json_encode($allPosts);

$test = PostLoader::readPosts($allPosts_encoded);
var_dump($test);
PostLoader::savePost($test_message);

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

    $post_json_format = json_encode($current_post);
}

whatIsHappening();



require 'form-view.php';