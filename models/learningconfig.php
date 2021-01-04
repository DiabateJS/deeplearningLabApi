<?php
declare(strict_types = 1);
include_once("config.php");
include_once("bd.php");

class LearningConfig
{
    public $id;
    public $baseItem;
    public $learningRate;
    public $learningAverage;
    public $ecartMoy;

    /**
     * LearningConfig constructor.
     * @param $id
     * @param $baseItem
     * @param $learningRate
     * @param $learningAverage
     * @param $ecartMoy
     */
    public function __construct($id, $baseItem, $learningRate, $learningAverage, $ecartMoy)
    {
        $this->id = $id;
        $this->baseItem = $baseItem;
        $this->learningRate = $learningRate;
        $this->learningAverage = $learningAverage;
        $this->ecartMoy = $ecartMoy;
    }

}
?>
