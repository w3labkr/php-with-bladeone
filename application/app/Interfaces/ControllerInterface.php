<?php

namespace App\Interfaces;

interface ControllerInterface
{
    public function get();

    public function post();

    public function patch();

    public function put();

    public function delete();

    public function options();
}
