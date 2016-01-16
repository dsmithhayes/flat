<?php

require_once '../vendor/autoload.php';

use Flat\PostList;

$flat = new \Silex\Application;

/**
 * The index of the blog. This will render a view with links to all of the
 * posts. I will work a lot on this one.
 */
$flat->get('/', function () {
    $postList = new PostList('../md');

    foreach ($postList as $post) {
        $body .= $post->title() . "<br />";
    }

    return $body;
});

$flat->run();
