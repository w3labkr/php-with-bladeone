<?php

namespace App\Interfaces;

interface Controller
{
    public function get();

    public function post();

    public function put();

    public function delete();

    public function options();

    public function patch();
}
