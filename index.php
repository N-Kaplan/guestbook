<?php

require "code/Post.php";
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
    $date = date("F j, Y, g:i a");

    //create new post
    $current_post = new Post($date);
}

whatIsHappening();
print_r($current_post);


require 'form-view.php';