<?php

class Frame {
    private $throws = [];
    private $status = 'normal';
    public $score = 0;

    /**
     * Compute the score of this frame
     *
     * @param array $throws
     */
    public function __construct(Array $throws)
    {
        $this->throws = $throws;

        $this->sum();
    }

    /**
     * Get the status: normal, spare, strike
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Return throws
     * @return array
     */
    public function getThrows()
    {
        return $this->throws;
    }

    /**
     * Check if is a strike
     * @return bool
     */
    public function isStrike()
    {
        return $this->status == 'strike';
    }

    /**
     * Check if is a spare
     * @return bool
     */
    public function isSpare()
    {
        return $this->status == 'spare';
    }

    /**
     * Get the sume of all throws
     */
    private function sum()
    {
        // check for strike
        if($this->throws[0] == 10) {
            $this->score = 10;
            $this->status = 'strike';
        } else {
            // make sure we only check 2 throws at first, even if more are provided
            $this->score = $this->throws[0] + $this->throws[1];

            if($this->score == 10) {
                $this->status = 'spare';
            }
        }

    }
}

?>