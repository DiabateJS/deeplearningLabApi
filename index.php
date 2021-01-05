<?php
  include_once('models/config.php');
  include_once('models/networkManager.php');
  include_once('models/learningConfigManager.php');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: *');
  header('Content-Type: application/json');

  $operation = $_GET["operation"] ?? "";
  $type = $_GET["type"] ?? "";
  $data = json_decode(file_get_contents("php://input"));

  $networkManager = new NetworkManager();
  $learningConfigManager = new LearningConfigManager();

  if ($operation == "enum"){
      if ($type == "networks"){
          echo json_encode($networkManager->getAllNetworks());
      }
      if ($type == "network"){
          $idNetwork = $_GET["idNetwork"] ?? "";
          echo json_encode($networkManager->getNetworkById($idNetwork));
      }
      if ($type == "learning_config"){
          echo json_encode($learningConfigManager->getLearningConfig());
      }
  }
  if ($operation == "auth"){
      $login = $_POST["login"] ?? "";
      $pwd = $_POST["password"] ?? "";
  }
    if ($operation == "update"){
        if ($type == "network"){
            $idNetwork = $data->idNetwork ?? "";
            $label = $data->label ?? "";
            $neuronsParCouches = $data->neuronsParCouches ?? "";
            $tauxApprentissage = $data->tauxApprentissage ?? "";
            $typeReseau = $data->typeReseau ?? "";
            $fonctionTransfert = $data->fonctionTransfert ?? "";
            $newNetwork = new Network($idNetwork, $label, $typeReseau, $tauxApprentissage, $fonctionTransfert, $neuronsParCouches);
            echo json_encode($networkManager->updateNetwork($idNetwork, $newNetwork));
        }
        if ($type == "learning_config"){
            $id = $data->id ?? "";
            $baseItem = $data->baseItem ?? "";
            $learningRate = $data->learningRate ?? "";
            $learningAverage = $data->learningAverage ?? "";
            $ecartMoy = $data->ecartMoy ?? "";
            $newLearningConfig = new LearningConfig($id, $baseItem, $learningRate, $learningAverage, $ecartMoy);
            echo json_encode($learningConfigManager->updateLearnginConfig($id, $newLearningConfig));
        }
    }
    if ($operation == "create"){
        if ($type == "network"){
            $idNetwork = $data->idNetwork ?? "";
            $label = $data->label ?? "";
            $neuronsParCouches = $data->neuronsParCouches ?? "";
            $tauxApprentissage = $data->tauxApprentissage ?? "";
            $fonctionTransfert = $data->fonctionTransfert ?? "";
            $typeReseau = $data->typeReseau ?? "";
            $newNetwork = new Network($idNetwork, $label, $typeReseau, $tauxApprentissage, $fonctionTransfert, $neuronsParCouches);
            echo json_encode($networkManager->createNetwork($newNetwork));
        }
    }
    if ($operation == "delete"){
        if ($type == "network"){
            $id = $_GET["id"] ?? "";
            echo json_encode($networkManager->deleteNetwork($id));
        }
    }


?>
