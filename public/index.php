<?php

require_once '../vendor/autoload.php';

use Flat\PostList;
use Flat\Post;
use Flat\Files\PostFile;
use Silex\Provider\TwigServiceProvider;
use cebe\markdown\Markdown as Parser;

$flat = new \Silex\Application;

/**
 * Register the twig templates service provider.
 */
$flat->register(
    new \Silex\Provider\TwigServiceProvider(),
    [
        'twig.path' => __DIR__ . '../views'
    ]
);

/**
 * The index of the blog. This will render a view with links to all of the
 * posts. I will work a lot on this one.
 */
$flat->get('/', function () {
    $postList = new PostList('../md');

    $body = [];

    foreach ($postList as $post) {
        $body[] = [
            'title' => $post->title(),
            'route' => '/' . $post->postFile()->fileName()
        ];
    }

    if (empty($body)) {
        $body = ['There are no posts.'];
    }

    return json_encode($body);
});

/**
 * Basic API entry point for the single post
 */
$flat->get('/{fileName}', function($fileName) {
    $post = new Post(
        new PostFile('../md/'. $fileName . '.md'),
        new Parser()
    );

    return json_encode([
        'title' => $post->title()
    ]);
});

/**
 * Run the application!
 */
$flat->run();
