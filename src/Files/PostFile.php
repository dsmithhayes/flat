<?php

namespace Flat\Files;

/**
 * This object represents an open file resource of the markdown file.
 */
class PostFile
{
    /**
     * @var string The full path in the filesystem of the markdown file
     */
    protected $path;

    /**
     * @var resource The open file resource of the markdown file
     */
    private $handle;

    /**
     * @param string $path
     *      The full file path of the markdown file.
     * @throws \Exception
     *      If the file does not exist
     * @throws \Exception
     *      If the file handle resource cannot be established
     */
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

    /**
     * Make sure you close the file resource when the object destroys itself.
     *
     * RIP.
     */
    public function __destruct()
    {
        fclose($handle);
    }

    /**
     * Reads and returns the contents of the file resource.
     *
     * @param int $buffer
     *      The buffer size of the read action
     */
    public function read($buffer = 0)
    {
        if ($buffer === 0) {
            $buffer = filesize($this->path);
        }

        return fread($this->handle, $buffer);
    }
}
