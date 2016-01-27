<?php

use Flat\Post;
use Flat\Files\PostFile;
use Flat\Files\DraftFile;
use cebe\markdown\Markdown;

/**
 * Writing this test case I realized the PHPUnit serializes objects inbetween
 * each method when it runs as its own process. Now that I'd typed it out, that
 * makes a lot of sense to do. Unfortunately because the PostFile has a live
 * and active file handle open while its instanciated, I had to bring the handle
 * back to life after the object gets serialized.
 */
class PostTestCase extends PHPUnit_Framework_TestCase
{
    protected $testFile = __DIR__ . '/../md/test.md';
    protected $testDraft = __DIR__ . '/../md/test.md.draft';

    public function testPostRaw()
    {
        $post = new Post(new PostFile($this->testFile), new Markdown());
        $this->assertEquals('# Test Post!', explode("\n", $post->raw())[0]);

        return $post;
    }

    /**
     * @depends testPostRaw
     */
    public function testPostIsPublished($post)
    {
        $this->assertTrue($post->isPublished());

        return $post;
    }

    /**
     * @depends testPostIsPublished
     */
    public function testPostIsDraft($post)
    {
        $this->assertFalse($post->isDraft());

        return $post;
    }

    /**
     * @depends testPostIsDraft
     */
    public function testPostTitle($post)
    {
        $this->assertEquals('Test Post!', $post->title());

        return $post;
    }

    public function testDraftIsPublished()
    {
        $draft = new Post(new DraftFile($this->testDraft), new Markdown());
        $this->assertFalse($draft->isPublished());

        return $draft;
    }

    /**
     * @depends testDraftIsPublished
     */
    public function testDraftIsDraft($draft)
    {
        $this->assertTrue($draft->isDraft());

        return $draft;
    }
}
