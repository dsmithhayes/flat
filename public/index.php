<?php

require_once '../vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$flat = new \Slim\Application();

/**
 * Index entry point to the blog.
 */
$flat->get("/", function (Request $req, Response $res) {

    return $res;
});

/**
 * This is for the single blog post
 */
$flat->get("/{title}", function (Request $req, Response $res, $args) {

    return $res;
});

/**
 * An index of all the raw markdown files, if a title is supplied render the
 * raw markdown of that post.
 */
$flat->get("/raw[/{title}]", function (Request $req, Response $res, $args) {

    return $res;
});
