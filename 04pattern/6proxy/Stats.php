<?php

class Stats
{
    private $cache;
    private StatCalculator $calculator;

    public function __construct(
        StatCalculator $calculator
    ) {
        $this->calculator = $calculator;
    }

    public function getData()
    {
        if (!$this->cache) {
            $this->cache = $this->calculator->heavyCalculMethod();
        }

        return $this->cache;
    }
}
