<?php declare(strict_types = 1);

/**
 * @author Dave Smith-Hayes
 */

namespace Flat\Files;

use Flat\Files\PostFile;

/**
 * A draft is just a file with '.draft' as an extension.
 */
class DraftFile extends PostFile
{
    /**
     * @param string
     *      The full path of the draft file
     * @throws \Exception
     *      If the file is not a valid draft
     */
    public function __construct($path)
    {
        if (!$this->isDraft($path)) {
            throw new \InvalidArgumentException(
                "'" . $path . "' is not a valid draft."
            );
        }

        parent::__construct($path);
    }

    /**
     * @param string $path
     *      The full path of the file
     * @return bool
     *      True if the post is a draft
     */
    public function isDraft($path = null): bool
    {
        if (!$path) {
            $path = $this->path;
        }

        return (bool) preg_match('/\.draft/', $path);
    }
}
