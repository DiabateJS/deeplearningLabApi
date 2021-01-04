<?php
  include_once('models/config.php');
  include_once('models/networkManager.php');
  include_once('models/learningConfigManager.php');
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  $operation = $_GET["operation"] ?? "";
  $type = $_GET["type"] ?? "";

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
            $idNetwork = $_POST["idNetwork"] ?? "";
            $label = $_POST["label"] ?? "";
            $neuronsParCouches = $_POST["neuronsParCouches"] ?? "";
            $tauxApprentissage = $_POST["tauxApprentissage"] ?? "";
            $typeReseau = $_POST["typeReseau"] ?? "";
            $fonctionTransfert = $_POST["fonctionTransfert"] ?? "";
            $newNetwork = new Project($idNetwork,$label,$neuronsParCouches,$tauxApprentissage,$fonctionTransfert, $typeReseau);
            echo json_encode($networkManager->updateNetwork($idNetwork, $newNetwork));
        }
        if ($type == "learning_config"){
            $id = $_POST["id"] ?? "";
            $baseItem = $_POST["baseItem"] ?? "";
            $learningRate = $_POST["learningRate"] ?? "";
            $learningAverage = $_POST["learningAverage"] ?? "";
            $ecartMoy = $_POST["ecartMoy"] ?? "";
            $newLearningConfig = new LearningConfig($id, $baseItem, $learningRate, $learningAverage, $ecartMoy);
            echo json_encode($learningConfigManager->updateLearnginConfig($id, $newLearningConfig));
        }
    }
    if ($operation == "create"){
        if ($type == "network"){
            $idNetwork = $_POST["idNetwork"] ?? "";
            $label = $_POST["label"] ?? "";
            $neuronsParCouches = $_POST["neuronsParCouches"] ?? "";
            $tauxApprentissage = $_POST["tauxApprentissage"] ?? "";
            $fonctionTransfert = $_POST["fonctionTransfert"] ?? "";
            $typeReseau = $_POST["typeReseau"] ?? "";
            $newNetwork = new Network($idNetwork,$label,$neuronsParCouches,$tauxApprentissage,$fonctionTransfert,$typeReseau);
            $projetManager = new ProjectManager();
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
