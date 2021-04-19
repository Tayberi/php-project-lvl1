<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\run as runEngine;

const DESCRIPTION = 'Answer "yes" if given number is even, otherwise answer "no".';
const LOWER_BORDER = 1;
const UPPER_BORDER = 100;

function isEven(int $number)
{
    if ($number % 2 !== 0) {
        return 'no';
    }
    return 'yes';
}

function run()
{
    $generateData = function () {
        $number = rand(LOWER_BORDER, UPPER_BORDER);
        $correctAnswer = isEven($number);
        return [
            'question' => "$number",
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateData, DESCRIPTION);
}
