<?php

namespace Core;

class Controller
{
    protected $twig;
    protected $db;

    public function __construct($twig, $db)
    {
        $this->twig = $twig;
        $this->db = $db;
    }

    protected function render($template, array $variables = [])
    {
        return $this->twig->render($template, $variables);
    }
}
