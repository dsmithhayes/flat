<?php

namespace Flat;

use Extended\LinkedList;
use Flat\Post;
use Flat\PostFile;

class PostList extends LinkedList
{
    /**
     * @param string
     *      The full path of the posts in the list
     */
    public function __construct($path)
    {
        if (!is_dir($path)) {
            throw new \Exception("'" . $path "' is not a directory.");
        }

        foreach (scandir($path) as $file) {
            $this->add(new Post($path . $file));
        }
    }

    /**
     * Overrides the parent method by enforcing a type on the parameter.
     *
     * @param \Flat\Post
     *      An instance of the Post object
     */
    public function add(Post $post)
    {
        parent::add($post);
    }
}
