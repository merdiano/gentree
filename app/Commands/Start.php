<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;
use Gentree;
class Start extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'start';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Starts application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        do{
            $input_file = $this->ask('Путь к входящему файлу (input.csv) : ');

            if($input_file == 'exit' ) return;
        }
        while(!$this->checkFile($input_file));

        $outnput_file = $this->ask('Путь для выгружаемого файла (output.json) : ');

        /*
         *  Dlya urovnya abstraknosti iszpolzovalos Facade
         */

        Gentree::generate($input_file, $outnput_file);


        $this->info('Great! your output has been generated .');
    }

    /**
     * Checks file
     *
     * @param $path
     * @return bool
     */
    private function checkFile($path) : bool
    {
        if(! $check = File::exists($path))
        {
            $this->error('File does not exist');
        }

        /*
         * mozhno dobavit esho neskolko chekov v budishem esli ponadobitsa
         */

        return $check;
    }

}
