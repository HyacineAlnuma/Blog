<?php

namespace App\Controllers;

abstract class Controller
{
    protected $twig;

    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    protected function display(string $path, array $parameters)
    {
        $parameters['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : null;
        $this->twig->display($path, $parameters);
    }
}
