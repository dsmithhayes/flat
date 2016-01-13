<?php

namespace Flat;

use cebe\markdown\Parser;
use Flat\Files\PostFile;
use Flat\Files\DraftFile;

class Post
{
    /**
     * @var \Flat\PostFile
     *      And instance of a PostFile object
     */
    protected $postFile;

    /**
     * @var \cebe\markdown\Parser
     *      An instance of the markdown parser
     */
    public $parser;

    /**
     * @var bool
     *      True if the post is to be published publically
     */
    private $published = false;

    /**
     * @param \Flat\PostFile $postFile
     *      An instance of the PostFile object
     * @param \cebe\markdown\Parser $parser
     *      An instance of the cebe markdown Parser
     */
    public function __construct(PostFile $postFile, Parser $parser)
    {
        if ($postFile instanceof DraftFile) {
            $published = true;
        }

        $this->postFile = $postFile;
        $this->parser = $parser;
    }

    /**
     * This will effectively render all of the markdown in the file to its
     * appropriate HTML
     *
     * @return string The rendered HTML of the PostFile content
     */
    public function html()
    {

    }

    /**
     * Some times all you want to look at is the raw markdown. So this method
     * will let you see it
     *
     * @return string The raw markdown of the post
     */
    public function raw()
    {

    }
}
