<?php
declare(strict_types = 1);
include_once("config.php");
include_once("bd.php");

class LearningBase
{
    public $id;
    public $input;
    public $output;
    public $idNetwork;

    /**
     * LearningBase constructor.
     * @param $id
     * @param $input
     * @param $output
     * @param $idNetwork
     */
    public function __construct($id, $input, $output, $idNetwork)
    {
        $this->id = $id;
        $this->input = $input;
        $this->output = $output;
        $this->idNetwork = $idNetwork;
    }

}
?>
