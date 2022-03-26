<?php

require_once('Frame.php');
require_once('ScoreCard.php');

// grab our scorecards that we'll use for testing all languages
$games = json_decode(file_get_contents('games.json'));

// submit each scorecard and test against the score we know it should have
foreach($games->scores as $game) {
    $frames = $game->frames;
    $score = $game->score;

    testScores($frames, $score);
}

// validate scores
function testScores($throws, $expected) {
    $frames = [];
    foreach($throws as $throw) {
        $frames[] = new Frame($throw);
    }
    $card = new ScoreCard($frames);

    print("Expected: " . $expected . "\n");
    print("Score: " . $card->score . "\n");
    if($expected == $card->score) {
        print("Success!\n\n");
    } else {
        print("Failed!\n\n");
    }
}

?>
