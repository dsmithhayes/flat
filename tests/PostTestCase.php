<?php

use Flat\Post;
use Flat\Files\PostFile;
use Flat\Files\DraftFile;
use cebe\markdown\Markdown;

class PostTestCase extends PHPUnit_Framework_TestCase
{
    protected $testFile = __DIR__ . '/../md/test.md';
    protected $testDraft = __DIR__ . '/../md/test.md.draft';

    public function testPost()
    {
        $post = new Post(new PostFile($this->testFile), new Markdown());
        $this->assertEquals('# Test Post!', explode("\n", $post->raw())[0]);
    }
}
