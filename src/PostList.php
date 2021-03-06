<?php declare(strict_types = 1);

namespace Flat;

use Extended\LinkedList;
use Flat\Post;
use Flat\Files\PostFile;
use cebe\markdown\Markdown;

class PostList extends LinkedList
{
    /**
     * @param string
     *      The full path of the posts in the list
     * @throws \Exception
     *      If the path given isn't a directory
     */
    public function __construct($path)
    {
        if (!is_dir($path)) {
            throw new \Exception("'" . $path . "' is not a directory.");
        }

        foreach (scandir($path) as $file) {
            // skip current and parent directories
            if ($file === '.' || $file === '..') {
                continue;
            }

            $this->add(
                new Post(
                    new PostFile($path . '/' . $file),
                    new Markdown()));
        }
    }

    /**
     * Overrides the parent method by enforcing a type on the parameter,
     * making a type-safe list
     *
     * @param \Flat\Post
     *      An instance of the Post object
     * @return bool
     *      True if the Post object was added to the list
     */
    public function add(Post $post)
    {
        parent::add($post);
        return true;
    }
}
