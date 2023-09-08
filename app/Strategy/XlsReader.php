<?php

namespace App\Strategy;

use Exception;

/**
 *  Handle xls files
 */
class XlsReader implements IReader
{

    public function readFile(string $path): array|false
    {
        throw new Exception('Not implemented');
    }
}
