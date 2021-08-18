<?php

class ScoreCard {

    /**
     * @var array Frames
     */
    private $frames = [];
    /**
     * @var int Score
     */
    public $score = 0;

    /**
     * Take in all frames for a scorecard
     * @param $frames
     */
    public function __construct($frames)
    {
        $this->frames = $frames;

        $this->compute();
    }

    /**
     * Compute the total score of all frames
     */
    public function compute()
    {
        foreach($this->frames as $x => $frame) {
            // strike = frame score + next two throws
            if($frame->isStrike()) {
                // if last frame
                if($x == 9) {
                    $this->score += $frame->score + $frame->getThrows()[1] + (isset($frame->getThrows()[2]) ? $frame->getThrows()[2] : 0);
                    // not last frame
                } else {
                    $throws = $this->frames[$x + 1]->getThrows();
                    $this->score += $frame->score + $throws[0];
                    if(isset($throws[1])) {
                        $this->score += $throws[1];
                    } else {
                        $this->score += $this->frames[$x + 2]->getThrows()[0];
                    }
                }
                // Spare = frame score + next throw
            } else if($frame->isSpare()) {
                // if last frame
                if($x == 9) {
                    $this->score += $frame->score + $frame->getThrows()[2];
                    // if not last frame
                } else {
                    $throws = $this->frames[$x + 1]->getThrows();
                    $this->score += $frame->score + $throws[0];
                }
                // just add frame score
            } else {
                $this->score += $frame->score;
            }
        }
    }
}

?>