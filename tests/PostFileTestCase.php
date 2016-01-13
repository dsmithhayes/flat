<?php

use Flat\Files\PostFile;
use Flat\Files\DraftFile;

class PostFileTestCase extends PHPUnit_Framework_TestCase
{
    public function testPostFile()
    {
        $postFile = new PostFile(__DIR__ . '/../md/test.md');
        $this->assertEquals(file_get_contents(__DIR__ . '/../md/test.md'), $postFile->read());
    }
}
