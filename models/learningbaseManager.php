<?php
include_once('config.php');
include_once('bd.php');
include_once('learningbase.php');
include_once('constants.php');
include_once('util/helper.php');

class LearningBaseManager
{

    public function __construct()
    {

    }

    public function getAllNetworkLearningBaseItems($idNetwork)
    {
        $sql = Constants::$SQL_SELECT_NETWORK_LEARNING_BASE_ITEMS;
        $bdMan = new BdManager();
        $entetes = array("id", "input", "output");
        $dicoParam = array(
            "idNetwork" => $idNetwork
        );
        $res = $bdMan->executePreparedSelect($sql,$dicoParam, $entetes);
        $items = array();
        $item = null;
        for ($i = 0; $i < count($res); $i++) {
            $id = $res[$i]["id"];
            $input = $res[$i]["input"];
            $output = $res[$i]["output"];
            $item = new LearningBase($id, $input, $output, $idNetwork);
            $items[] = $item;
        }
        return $items;
    }

    public function getNetworkLearningBaseItem($idNetwork, $idItem)
    {
        $sql = Constants::$SQL_SELECT_NETWORK_LEARNING_BASE_ITEM;
        $dico = array (
            "idNetwork" => $idNetwork,
            "idItem" => $idItem
        );
        $bdMan = new BdManager();
        $entetes = array("id", "input", "output", "idNetwork");
        $res = $bdMan->executePreparedSelect($sql,$dico,$entetes);
        $item = null;

        if (count($res) > 0)
        {
            $id = $res[0]["id"];
            $input = $res[0]["input"];
            $output = $res[0]["output"];
            $idNetwork = $res[0]["idNetwork"];

            $item = new LearningBase($id, $input, $output, $idNetwork);
        }

        return $item;
    }

    public function updateLearningBaseItem($idNetwork, $idItem, $newItem)
    {
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_UPDATE_NETWORK_LEARNING_BASE_ITEM;
        $dicoParam = array(
            "input" => $newItem->input,
            "output" => $newItem->output,
            "idNetwork" => $newItem->idNetwork,
            "idItem" => $newItem->id,
        );
        $bdMan = new BdManager();
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }

    public function createNetworkLearningBaseItem($newItem)
    {
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_CREATE_NETWORK_LEARNING_BASE_ITEM ;

        $dicoParam = array(
            "input" => $newItem->input,
            "output" => $newItem->output,
            "idNetwork" => $newItem->idNetwork,
        );
        $bdMan = new BdManager();
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }

    public function deleteNetworkLearningBaseItem($idNetwork, $idItem){
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_DELETE_NETWORK_LEARNING_BASE_ITEM;
        $bdMan = new BdManager();
        $dicoParam = array(
            "idNetwork" => $idNetwork,
            "idItem" => $idItem
        );
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }
}

 ?>
