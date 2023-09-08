<?php

namespace App\Strategy;

interface IReader
{
    public function readFile(string $path) : array|false;
}
