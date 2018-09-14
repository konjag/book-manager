<?php

namespace Core;

class Controller
{
    protected function render($template, array $variables = [])
    {
        return Twig::render($template, $variables);
    }
}