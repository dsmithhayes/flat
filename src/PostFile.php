<?php

namespace Flat;

/**
 * This object represents an open file resource of the markdown file.
 */
class PostFile
{
    protected $path;

    private $handle;

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new \Exception("'" . $path . "' doesn't exists.");
        }

        $this->path = $path;

        if (!($this->handle = fopen($path, 'r+'))) {
            throw new \Exception("Error opening '" . $this-path . "'");
        }
    }

    public function __destruct()
    {
        fclose($handle);
    }
}
