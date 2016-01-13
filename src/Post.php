<?php

namespace Flat;

use cebe\markdown\Parser;

class Post
{
    /**
     * @var string
     *      The full path in the filesystem of the markdown post
     */
    protected $path;

    /**
     * @var resource
     *      An open file handle
     */
    private $handle;

    /**
     * @var \cebe\markdown\Parser
     *      An instance of the markdown parser
     */
    protected $parser;

    /**
     * @param string $path
     *      The full file path of the markdown file of the post
     * @param \cebe\markdown\Parser $parser
     *      An instance of the cebe markdown Parser
     */
    public function __construct(string $path, Parser $parser)
    {
        if (!file_exists($path)) {
            throw new \Exception("'" . $path . "' doesn't exists.");
        }

        $this->path = $path;

        if (!($this->handle = fopen($path, 'r+'))) {
            throw new \Exception("Error opening '" . $this-path . "'");
        }
    }

    /**
     * Enforce the handle to close when the object deconstructs.
     */
    public function __destruct()
    {
        fclose($this->handle);
    }
}
