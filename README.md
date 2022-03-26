# BowlingInPHP
PHP Bowling Calculator

A long time ago, in a city far far away...I failed a coding interview in an epic way. I was asked to build a simple bowling calculator and I froze. It was humiliating but we have all done it. To this day, I still have nightmares about it. So, to ease my pain, I'm going to build a bowling calculator in every language I learn.

## What's going on?
This is quite simple. I have a games.json file that has some example score cards and the expected total. The script them loads these and runs tests against my scoring code.
The scoring code is using basic logic that calculates each frame's total, then a game total.
This game total is then compared to the expected total to verify the results

## Running
``` php bowling.php ```

## Output
```
Expected: 300
Score: 300
Success!

Expected: 145
Score: 145
Success!

Expected: 121
Score: 121
Success!
```
