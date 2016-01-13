<?php

namespace Flat;

class Post
{
    /**
     * @var string The full path in the filesystem of the markdown post
     */
    protected $path;

    /**
     * @var resource An open file handle
     */
    private $handle;

    /**
     * @param string $path The full file path of the markdown file of the post
     */
    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new \Exception("'" . $path . "' doesn't exists.");
        }

        $this->path = $path;
        $this->handle = fopen($path, 'r+');
    }

    /**
     * Enforce the handle to close when the object deconstructs.
     */
    public function __destruct()
    {
        fclose($this->handle);
    }
}
