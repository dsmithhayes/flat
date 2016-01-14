<?php

namespace Flat\Files;

/**
 * This object represents an open file resource of the markdown file.
 */
class PostFile implements \Serializable
{
    /**
     * @var string
     *      The full path in the filesystem of the markdown file
     */
    protected $path;

    /**
     * @var resource
     *      The open file resource of the markdown file
     */
    private $handle;

    /**
     * @param string $path
     *      The full file path of the markdown file.
     * @throws \InvalidArgumentException
     *      If the file does not exist
     * @throws \Exception
     *      If the file handle resource cannot be established
     */
    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException(
                "'" . $path . "' does not exists."
            );
        }

        $this->path = $path;
        $this->handle = fopen($path, 'r+');

        if (!$this->handle) {
            throw new \Exception("Error opening '" . $this-path . "'");
        }
    }

    /**
     * Make sure you close the file resource when the object destroys itself
     *
     * RIP
     */
    public function __destruct()
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

    /**
     * Reads and returns the contents of the file resource
     *
     * @param int $buffer
     *      The buffer size of the read action
     */
    public function read($buffer = 0)
    {
        $buffer = (!$buffer) ? filesize($this->path) : $buffer;
        return fread($this->handle, $buffer);
    }

    /**
     * Serialize just the file path of the post
     */
    public function serialize()
    {
        return serialize($this->path);
    }

    /**
     * Fill out the file, open the file stream
     *
     * @throws \Exception
     *      If the file can't be opened
     */
    public function unserialize($data)
    {
        $this->path = unserialize($data);
        $this->handle = fopen($this->path, 'r+');

        if (!$this->handle) {
            throw new \Exception("'" . $this->path . "' no longer exists.");
        }
    }

    /**
     * @return bool
     *      Always false, because its not a DraftFile object
     */
    public function isDraft()
    {
        return false;
    }
}
