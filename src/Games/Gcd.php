<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\run as runEngine;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $generateData = function () {
        $numberFirst = rand(1, 100);
        $numberSecond = rand(1, 100);
        $correctAnswer = calculateGcd($numberFirst, $numberSecond);

        return [
            'question' => "{$numberFirst} {$numberSecond}",
            'answer' => (string)$correctAnswer
        ];
    };

    runEngine($generateData, DESCRIPTION);
}



function calculateGcd(int $firstNumber, int $secondNumber): int
{
    $minNumber = min($firstNumber, $secondNumber);
    $maxNumber = max($firstNumber, $secondNumber);
    $remainder = $maxNumber % $minNumber;

    if ($remainder === 0) {
        return $minNumber;
    }

    return calculateGcd($minNumber, $remainder);
}
