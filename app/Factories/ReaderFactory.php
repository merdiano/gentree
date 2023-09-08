<?php

namespace App\Factories;

use App\Strategy\CsvReader;
use App\Strategy\XlsReader;
use App\Strategy\IReader;

/**
 * This class helps to produce a proper strategy object for handling file reader.
 */
class ReaderFactory
{
    /**
     * Get a reader by file extension.
     *
     * @param $ext
     * @return IReader
     * @throws \Exception
     */
    public static function getReader(string $ext) : IReader
    {
        switch ($ext){
            case 'csv' :
                return new CsvReader;
            case 'xls' :
                return new XlsReader;
            default :
                throw new \Exception("Unknown extension");
        }
    }
}
