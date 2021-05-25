<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function run(callable $generateData, string $description): void
{
    line('Welcome to the Brain Games!');


    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, $userName!", $userName);

    line($description);

    $runRound = function (int $i) use ($generateData, $userName, &$runRound): void {
        if ($i >= MAX_ROUNDS_COUNT) {
            line("Congratulations, $userName!");
            return;
        }

        ['question' => $question, 'answer' => $correctAnswer] = $generateData();

        line("Question: $question");

        $answer = prompt('Your answer');

        if ($correctAnswer !== $answer) {
            line("'$answer' is the wrong answer ;(. The correct answer was '$correctAnswer'.");
            line("Let's try again, $userName!");
            return;
        }

        line('Correct!');

        $runRound($i + 1);
    };

    $runRound(0);
}
