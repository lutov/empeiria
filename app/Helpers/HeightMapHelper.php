<?php


namespace App\Helpers;


class HeightMapHelper
{
    public float $lowestPoint = 0.0;
    public float $highestPoint = 0.0;
    public float $heightDifference = 0.0;

    /**
     * HeightMapHelper constructor.
     * @param float $lowestPoint
     * @param float $highestPoint
     */
    public function __construct(float $lowestPoint = 0.0, float $highestPoint = 0.0)
    {
        $this->lowestPoint = $lowestPoint;
        $this->highestPoint = $highestPoint;
        $this->heightDifference = abs($this->lowestPoint - $this->highestPoint);
    }

    /**
     * @param int $percent
     * @return float|int
     */
    public function get(int $percent)
    {
        return $this->lowestPoint + (($this->heightDifference / 100) * $percent);
    }
}
