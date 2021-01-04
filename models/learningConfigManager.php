<?php
include_once('config.php');
include_once('bd.php');
include_once('learningconfig.php');
include_once('constants.php');
include_once('util/helper.php');

class LearningConfigManager
{

    public function __construct()
    {

    }

    public function getLearningConfig()
    {
        $sql = Constants::$SQL_SELECT_LEARNING_CONFIG;
        $bdMan = new BdManager();
        $entetes = array("id", "baseItem", "learningRate", "learningAverage","ecartMoy");
        $res = $bdMan->executeSelect($sql,$entetes);
        $learningConfig = null;

        if (count($res) > 0)
        {
            $id = $res[0]["id"];
            $baseItem = $res[0]["baseItem"];
            $learningRate = $res[0]["learningRate"];
            $learningAverage = $res[0]["learningAverage"];
            $ecartMoy = $res[0]["ecartMoy"];

            $learningConfig = new LearningConfig($id, $baseItem, $learningRate, $learningAverage, $ecartMoy);
        }

        return $learningConfig;
    }

    public function updateLearnginConfig($id, $newLearningConfig){
        $resultat = Helper::createResponseObject();
        $sql = Constants::$SQL_UPDATE_LEARNING_CONFIG;
        $dicoParam = array(
            "baseItem" => $newLearningConfig->baseItem,
            "learningRate" => $newLearningConfig->learningRate,
            "learningAverage" => $newLearningConfig->learningAverage,
            "ecartMoy" => $newLearningConfig->ecartMoy,
            "id" => $id
        );
        $bdMan = new BdManager();
        $bdMan->executePreparedQuery($sql, $dicoParam);
        $resultat["code"] = Constants::$SUCCES_CODE;
        return $resultat;
    }

}

 ?>
