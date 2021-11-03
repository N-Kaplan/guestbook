<?php
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
    foreach ($_POST as $key=>$value) {
        if (empty($value))
        {
            //error message
        } else {
            $_POST[$key] = htmlspecialchars($value);
        }
    }
}

whatIsHappening();



require 'form-view.php';