<?php
it('starts app', function () {
    $this->artisan('start')
        ->expectsQuestion('Путь к входящему файлу (input.csv) : ','data/input.csv')
        ->expectsQuestion('Путь для выгружаемого файла (output.json) : ','data/myoutput.json')
        ->expectsOutput('Great! your output has been generated .')
        ->assertExitCode(0);
});

it('check file', function () {
    $this->assertFileExists('data/myoutput.json');

    $this->assertFileEquals('data/myoutput.json', 'data/output.json');

});

it('exits from app', function () {
    $this->artisan('start')
        ->expectsQuestion('Путь к входящему файлу (input.csv) : ','exit')
        ->assertExitCode(0);
});

