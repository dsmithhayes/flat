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
    protected $parser;

    /**
     * @param \Flat\PostFile $postFile
     *      An instance of the PostFile object
     * @param \cebe\markdown\Parser $parser
     *      An instance of the cebe markdown Parser
     */
    public function __construct(PostFile $postFile, Parser $parser)
    {
        $this->postFile = $postFile;
        $this->parser = $parser;
    }

    /**
     * This will effectively render all of the markdown in the file to its
     * appropriate HTML
     *
     * @return string
     *      The rendered HTML of the PostFile content
     */
    public function html()
    {
        return $this->parser->parse($this->raw());
    }

    /**
     * Parses inline markdown to HTML.
     *
     * @param string
     *      A string of markdown to parse, uses the internal buffer by default
     * @return string
     *      The rendered HTML
     */
    public function inline($string = null)
    {
        $string = (!$string) ? $this->raw() : $string;
        return $this->parse->parseParagraph($string);
    }

    /**
     * Some times all you want to look at is the raw markdown. So this method
     * will let you see it
     *
     * @return string
     *      The raw markdown of the post
     */
    public function raw()
    {
        return $this->postFile->read();
    }

    /**
     * @return string
     *      Return the title from the markdown file
     */
    public function title()
    {
        $title = explode("\n", $this->raw())[0];
        return preg_replace('/\#\s/', '', $title);
    }

    /**
     * @return \Flat\Files\PostFile
     *      The PostFile object
     */
    public function postFile()
    {
        return $this->postFile;
    }

    /**
     * @return \cebe\markdown\Parser
     *      And instance of the markdown parser used with the object
     */
    public function parser()
    {
        return $this->parser;
    }

    /**
     * @return bool
     *      True if the post is a draft
     */
    public function isDraft()
    {
        return $this->postFile->isDraft();
    }

    /**
     * @return bool
     *      True if the post is to be published
     */
    public function isPublished()
    {
        return !$this->postFile->isDraft();
    }
}
