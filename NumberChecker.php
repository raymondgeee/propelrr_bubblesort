<?php
class NumberChecker {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
        $this->bubbleSort();
    }

    private function bubbleSort() {
        $n = count($this->numbers);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($this->numbers[$j] > $this->numbers[$j + 1]) {
                    $temp = $this->numbers[$j];
                    $this->numbers[$j] = $this->numbers[$j + 1];
                    $this->numbers[$j + 1] = $temp;
                }
            }
        }
    }

    public function getMedian() {
        $n = count($this->numbers);
        if ($n % 2 == 0) {
            return ($this->numbers[$n/2 - 1] + $this->numbers[$n/2]) / 2;
        } else {
            return $this->numbers[floor($n/2)];
        }
    }

    public function getLargest() {
        return $this->numbers[count($this->numbers) - 1];
    }
}

class NumberResult {
    private $checker;

    public function __construct($numbers) {
        $this->checker = new NumberChecker($numbers);
    }

    public function report() {
        echo "Median: " . $this->checker->getMedian() . "\n";
        echo "Largest: " . $this->checker->getLargest() . "\n";
    }
}



$numbers = [5, 2, 9, 1, 5, 6];
$checkNum = new NumberResult($numbers);
$checkNum->report();