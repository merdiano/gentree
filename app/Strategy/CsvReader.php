<?php

namespace App\Strategy;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 *  Handle csv files
 */
class CsvReader implements IReader
{
    /**
     * Implementation of IReader
     *
     * @param string $path
     * @return array|false
     */
    public function readFile(string $path): array|false
    {
        try {
            //try to open file
            if($file = fopen($path, 'r')){

                //read first line as header
                $header = fgetcsv($file,0,";");

                //convert headers to camelCases using Laravel's helpers examp: 'Item Name' => itemName
                $keys = Arr::map($header, function (string $value, string $key) {
                    return Str::camel($value);
                });

                $records = [];

                while ($row = fgetcsv($file,0,";"))
                {
                    $records[] = array_combine($keys, $row);//mapping keys with values
                }

                fclose($file);

                return $records;
            }

            return false;
        }catch (\Exception $ex){

            Log::error($ex->getMessage());
            return false;
        }

    }
}
