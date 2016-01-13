<?php

use Flat\Post;
use Flat\Files\PostFile;
use Flat\Files\DraftFile;
use cebe\markdown\Markdown;

class PostTestCase extends PHPUnit_Framework_TestCase
{
    public function testPost()
    {
        $post = new Post(new PostFile('md/test.md'), new Markdown());
    }
}
