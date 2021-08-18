<?php

require_once('Frame.php');
require_once('ScoreCard.php');

$perfectGame = [
    [10],
    [10],
    [10],
    [10],
    [10],
    [10],
    [10],
    [10],
    [10],
    [10, 10, 10],
];
testScores($perfectGame);

$spares = [
    [8, 2], // 15
    [5, 5], // 12
    [2, 8], // 11
    [1, 9], // 19
    [9, 1], // 13
    [3, 7], // 16
    [6, 4], // 14
    [4, 6], // 11
    [1,9],  // 19
    [9, 1, 5]   // 15
    // 146
];
testScores($spares);

$random = [
    [1, 4], // 5
    [2, 6], // 8
    [8, 0], // 8
    [9, 0], // 9
    [10],   // 13
    [1, 2], // 3
    [10],   // 28
    [10],   // 20
    [8, 2], // 15
    [5, 5, 2]   // 12
    // 121
];
testScores($random);

function testScores($throws) {
    $frames = [];
    foreach($throws as $throw) {
        $frames[] = new Frame($throw);
    }
    $card = new ScoreCard($frames);
    print("Score: " . $card->score . "\r\n");
}

?>