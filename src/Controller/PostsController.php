<?php declare(strict_types = 1);

namespace Flat\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Flat\PostList;
use Flat\Post;

class PostsController implements ControllerProviderInterface
{
    /**
     * TODO: Write the posts controllers here
     */
    public function connect(Application $application)
    {
        $controllers = $application['controllers_factory'];

        return $controllers;
    }
}
