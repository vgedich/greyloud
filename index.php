<?php
function solution($A)
{
    $count = count($A);
    $left[0] = $A[0];

    for ($i = 1; $i < $count; $i++) {
        $left[$i] = max($left[$i - 1], $A[$i]);
    }

    $right[$count - 1] = $A[$count - 1];
    for ($i = $count - 2; $i >= 0; $i--) {
        $right[$i] = max($right[$i + 1], $A[$i]);
    }

    $max = 0;
    for ($i = 0; $i < $count; $i++) {
        $level = min($left[$i], $right[$i]) - $A[$i];
        if ($max < $level) {
            $max = $level;
        }
    }

    return $max;
}

echo solution([1, 3, 2, 1, 2, 1, 5, 3, 3, 4, 2]);