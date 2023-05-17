<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class Controller
{
    protected array $data;
    protected BladeOne $blade;

    public function __construct()
    {
        $this->data = $this->data();
        $this->blade = new BladeOne(VIEW_PATH, VIEW_CACHE_PATH, BladeOne::MODE_DEBUG);
    }

    public function view(string $template, array $data = [])
    {
        return $this->blade->run($template, $data);
    }

    public function data(): array
    {
        return [
            'status' => 'success',
            'message' => '',
            'errors' => [],
        ];
    }
}
