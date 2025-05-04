<?php
namespace app\Controllers\render;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigRenderer
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('./app/Views');
        $this->twig = new Environment($loader);
    }

    public function render($template, $data = [])
    {
        echo $this->twig->render($template, $data);
    }
}
