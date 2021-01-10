<?php
declare(strict_types = 1);
include_once("config.php");
include_once("bd.php");

class Network
{
    public $id;
    public $label;
    public $typeReseau;
    public $tauxApprentissage;
    public $fonctionTransfert;
    public $neuronsParCouches;
    public $labelsNeuronsEntree;
    public $labelsNeuronsSortie;

    /**
     * Network constructor.
     * @param $id
     * @param $label
     * @param $typeReseau
     * @param $tauxApprentissage
     * @param $fonctionTransfert
     * @param $neuronsParCouches
     * @param $labelsNeuronsEntree
     * @param $labelsNeuronsSortie
     */
    public function __construct($id, $label, $typeReseau, $tauxApprentissage, $fonctionTransfert, $neuronsParCouches, $labelsNeuronsEntree, $labelsNeuronsSortie)
    {
        $this->id = $id;
        $this->label = $label;
        $this->typeReseau = $typeReseau;
        $this->tauxApprentissage = $tauxApprentissage;
        $this->fonctionTransfert = $fonctionTransfert;
        $this->neuronsParCouches = $neuronsParCouches;
        $this->labelsNeuronsEntree = $labelsNeuronsEntree;
        $this->labelsNeuronsSortie = $labelsNeuronsSortie;
    }


}
?>
