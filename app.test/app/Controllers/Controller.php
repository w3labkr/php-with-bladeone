<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class Controller
{
    protected $blade;

    public function __construct()
    {
        $this->blade = new BladeOne(VIEW_PATH, VIEW_CACHE_PATH, BladeOne::MODE_DEBUG);
    }

    public function view(string $template, array $data = [])
    {
        return $this->blade->run($template, $data);
    }
}
