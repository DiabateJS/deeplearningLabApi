<?php
include_once('config.php');
include_once('bd.php');
include_once('network.php');
include_once('constants.php');
include_once('util/helper.php');

class NetworkManager
{

    public function __construct()
    {

    }

    public function getAllNetworks()
    {
        $sql = Constants::$SQL_SELECT_NETWORKS;
        $bdMan = new BdManager();
        $entetes = array("id", "label", "neuronsParCouches", "tauxApprentissage","fonctionTransfert","typeReseau");
        $res = $bdMan->executeSelect($sql, $entetes);
        $networks = array();
        $network = null;
        for ($i = 0; $i < count($res); $i++) {
            $id = $res[$i]["id"];
            $label = $res[$i]["label"];
            $neuronsParCouches = $res[$i]["neuronsParCouches"];
            $tauxApprentissage = $res[$i]["tauxApprentissage"];
            $fonctionTransfert = $res[$i]["fonctionTransfert"];
            $typeReseau = $res[$i]["typeReseau"];
            $network = new Network($id, $label, $typeReseau, $tauxApprentissage, $fonctionTransfert, $neuronsParCouches);
            $networks[] = $network;
        }
        return $networks;
    }

    public function getNetworkById($id)
    {
        $sql = Constants::$SQL_SELECT_NETWORK;
        $dico = array ("idNetwork" => $id);
        $bdMan = new BdManager();
        $entetes = array("id", "label", "neuronsParCouches", "tauxApprentissage","fonctionTransfert","typeReseau");
        $res = $bdMan->executePreparedSelect($sql,$dico,$entetes);
        $network = null;

        if (count($res) > 0)
        {
            $id = $res[0]["id"];
            $label = $res[0]["label"];
            $neuronsParCouches = $res[0]["neuronsParCouches"];
            $tauxApprentissage = $res[0]["tauxApprentissage"];
            $fonctionTransfert = $res[0]["fonctionTransfert"];
            $typeReseau = $res[0]["typeReseau"];

            $network = new Network($id, $label, $typeReseau, $tauxApprentissage, $fonctionTransfert, $neuronsParCouches);
        }

        return $network;
    }

    public function updateNetwork($idNetwork, $newNetwork)
    {
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_UPDATE_NETWORK;
        $dicoParam = array(
            "label" => $newNetwork->label,
            "neuronsParCouches" => $newNetwork->neuronsParCouches,
            "tauxApprentissage" => $newNetwork->tauxApprentissage,
            "fonctionTransfert" => $newNetwork->fonctionTransfert,
            "typeReseau" => $newNetwork->typeReseau,
            "idNetwork" => $idNetwork
        );
        $bdMan = new BdManager();
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }

    public function createNetwork($newNetwork)
    {
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_CREATE_NETWORK ;

        $dicoParam = array(
            "label" => $newNetwork->label,
            "neuronsParCouches" => $newNetwork->neuronsParCouches,
            "tauxApprentissage" => $newNetwork->tauxApprentissage,
            "fonctionTransfert" => $newNetwork->fonctionTransfert,
            "typeReseau" => $newNetwork->typeReseau
        );
        $bdMan = new BdManager();
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }

    public function deleteNetwork($id){
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_DELETE_NETWORK;
        $bdMan = new BdManager();
        $dicoParam = array(
            "idNetwork" => $id
        );
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$WARNING_CODE;
        return $resultat;
    }
}

 ?>
