<?php

use Flat\Files\PostFile;
use Flat\Files\DraftFile;

class PostFileTestCase extends PHPUnit_Framework_TestCase
{
    protected $testFile = __DIR__ . '/../md/test.md';

    public function testPostFileRead()
    {
        $postFile = new PostFile($this->testFile);
        $this->assertEquals(
            file_get_contents($this->testFile),
            $postFile->read()
        );

        return $postFile;
    }

    /**
     * @depends testPostFileRead
     */
    public function testPostFileReadBuffer($postFile)
    {
        $this->assertEquals('# Test P', $postFile->read(8));

        return $postFile;
    }
}
