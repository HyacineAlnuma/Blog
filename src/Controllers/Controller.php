<?php

namespace App\Controllers;

abstract class Controller
{
    protected $twig;

    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }
}
