<?php
include_once('config.php');
include_once('bd.php');
include_once('training.php');
include_once('constants.php');
include_once('util/helper.php');
include_once('networkManager.php');

class TrainingManager
{

    public function __construct()
    {

    }

    public function trainNetwork($idNetwork, $input)
    {
        $resultat = Helper::createResponseObject();
        $networkManager = new NetworkManager();
        $network = $networkManager->getNetworkById($idNetwork);
        $couches = explode(",",$network->neuronsParCouches);
        $labelsEntree = explode(",", $network->labelsNeuronsEntree);
        $labelsSortie = explode(",", $network->labelsNeuronsSortie);
        $inputs = explode(",", $input);
        $output = "";
        $label = "";
        $currentRand = 0.0;
       if (count($inputs) > 0){
           if (count($labelsEntree)  == count($inputs)){
               $outputs = [];
               $max = 0.0;
               $indexMax = 0;
               for ($i = 0 ; $i < count($labelsSortie) ; $i++){
                   $currentRand = rand(1,1000) / 1000;
                   $outputs[] = $currentRand;
                   if ($currentRand > $max){
                       $max = $currentRand;
                       $indexMax = $i;
                   }
               }
               $output = $max;
               $label = $labelsSortie[$indexMax];
               $training = new Training($couches,$outputs, $output, $labelsSortie, $label);
               return $training;
           }else{
               $resultat["code"] = Constants::$WARNING_CODE;
               $resultat["message"] = "Input ne contient pas le nombre de valeurs requises !";
               return $resultat;
           }
       }else{
           $resultat["code"] = Constants::$WARNING_CODE;
           $resultat["message"] = "Input est vide !";
           return $resultat;
       }
    }

}

 ?>
