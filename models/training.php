<?php
declare(strict_types = 1);

class Training
{
    public $couches;
    public $outputs;
    public $output;
    public $labels;
    public $label;

    /**
     * Training constructor.
     * @param $couches
     * @param $outputs
     * @param $output
     * @param $labels
     * @param $label
     */
    public function __construct($couches, $outputs, $output, $labels, $label)
    {
        $this->couches = $couches;
        $this->outputs = $outputs;
        $this->output = $output;
        $this->labels = $labels;
        $this->label = $label;
    }


}
?>
