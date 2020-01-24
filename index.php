<?php

// Start sessiom
session_start();
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload file
require("vendor/autoload.php");

// Instantiate Fat-Free
$f3 = Base::Instance();

// Define a default route (view)
$f3 -> route("GET /", function () {
    $view = new Template();
    echo $view->render("views/home.html");
});

$f3->route('GET /@animal',function ($f3, $params) {
//    var_dump($params);
    $animal = $params['animal'];
    if ($animal == 'chicken') {
        echo "<p>Cluck!</p>";
    } elseif ($animal == 'dog') {
        echo "<p>Woof!</p>";
    }elseif ($animal == 'snake') {
        echo "<p>SSsssss!</p>";
    }elseif ($animal == 'anteater') {
        echo "<p>Slurp!</p>";
    }elseif ($animal == 'vulture') {
        echo "<p>The sound of eating a corpse!</p>";
    } else {
        $f3->error(404);
    }

});

// Run Fat-Free
$f3->run();