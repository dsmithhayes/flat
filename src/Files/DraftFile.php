<?php

namespace Flat\Files;

use Flat\Files\PostFile;

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
        if (!self::isDraft($path)) {
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
    public static function isDraft($path = $this->path)
    {
        return preg_match('/\.draft/', $path);
    }
}
