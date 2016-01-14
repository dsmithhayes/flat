<?php

require_once '../vendor/autoload.php';

use Flat\PostList;

$flat = new \Silex\Application;

$flat->get('/', function () {
    $postList = new PostList('../md');

    foreach ($postList as $post) {
        $body .= $post->title() . "\n";
    }

    return $body;
});

$flat->run();
