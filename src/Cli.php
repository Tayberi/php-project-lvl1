<?php
/**
 * Created by PhpStorm.
 * User: taiberi
 * Date: 1/28/21
 * Time: 8:55 AM
 */
use Php\Project\Lvl1\Cli;

use function cli\line;
use function cli\prompt;


function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
