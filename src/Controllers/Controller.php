<?php

namespace Danie\Rack\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {
    protected $twig;

    public function __construct() {
        $loader = new FilesystemLoader("../src/views");
        $this->twig = new Environment($loader, [
            'cache' => '../cache',
            'debug' => true
        ]);
    }
}