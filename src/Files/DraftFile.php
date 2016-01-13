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
        if (!preg_match('\.draft', $path)) {
            throw new \Exception("'" . $path . "' is not a valid draft.");
        }

        parent::__construct($path);
    }
}
