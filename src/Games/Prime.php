<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\run as runEngine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const LOWER_BORDER = 2;
const UPPER_BORDER = 3571;

function isPerfect(int $number)
{
    $sum = 0;

    for ($divisor = 2; $divisor <= $number; $divisor += 1) {
        if ($number % $divisor === 0) {
            $sum += $divisor;
        }
    }

    if ($sum == $number) {
        return 'yes';
    } else {
        return 'no';
    }
}

function run()
{
    $generateData = function () {
        $number = rand(LOWER_BORDER, UPPER_BORDER);
        $correctAnswer = isPerfect($number);
        return [
            'question' => "$number",
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateData, DESCRIPTION);
}
