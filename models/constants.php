<?php

class Constants {
    //DATABASE CONSTANTS
    public static $BD_NAME = "djste1070339";
    public static $BD_HOST_NAME = "185.98.131.90";
    public static $BD_USER_NAME = "djste1070339";
    public static $BD_USER_PASSWORD = "da6ysjpqpp";


    public static $EMPTY_STRING = "";
    public static $SUCCES_CODE = "SUCCES";
    public static $WARNING_CODE = "WARNING";
    public static $ERROR_CODE = "ERROR";

    //SQL NETWORK
    public static $SQL_SELECT_NETWORKS = "select * from dl_network order by id";
    public static $SQL_SELECT_NETWORK = "select * from dl_network where id = :idNetwork";
    public static $SQL_UPDATE_NETWORK = "update dl_network set label = :label , neuronsParCouches = :neuronsParCouches , tauxApprentissage = :tauxApprentissage, fonctionTransfert = :fonctionTransfert, typeReseau = :typeReseau, labelsNeuronsEntree = :labelsNeuronsEntree, labelsNeuronsSortie = :labelsNeuronsSortie where id = :idNetwork";
    public static $SQL_CREATE_NETWORK = "insert into dl_network (label, neuronsParCouches, tauxApprentissage, fonctionTransfert, typeReseau, labelsNeuronsEntree, labelsNeuronsSortie) values (:label, :neuronsParCouches, :tauxApprentissage, :fonctionTransfert, :typeReseau, :labelsNeuronsEntree, :labelsNeuronsSortie)";
    public static $SQL_DELETE_NETWORK = "delete from dl_network where id = :idNetwork";

    //SQL LEARNING CONFIG
    public static $SQL_SELECT_LEARNING_CONFIG = "select *  from dl_learningconfig";
    public static $SQL_UPDATE_LEARNING_CONFIG = "update from dl_learningconfig set baseItem = :baseItem, learningRate = :learningRate, learningAverage = :learningAverage, ecartMoy = :ecartMoy where id = :id";

    //SQL LEARNING BASE ITEMS
    public static $SQL_SELECT_NETWORK_LEARNING_BASE_ITEMS = "select * from dl_baseentrainement where idNetwork = :idNetwork";
    public static $SQL_SELECT_NETWORK_LEARNING_BASE_ITEM = "select * from dl_baseentrainement where idNetwork = :idNetwork and id = :idItem";
    public static $SQL_UPDATE_NETWORK_LEARNING_BASE_ITEM = "update dl_baseentrainement set input = :input, output = :output where idNetwork = :idNetwork and id = :idItem";
    public static $SQL_CREATE_NETWORK_LEARNING_BASE_ITEM = "insert into dl_baseentrainement (input, output, idNetwork) values (:input, :output, :idNetwork)";
    public static $SQL_DELETE_NETWORK_LEARNING_BASE_ITEM = "delete from dl_baseentrainement where id = :idItem";

    //SQL STATISTIQUE
    public static $SQL_STATE_BY_USERS = "select u.fullname, t.etat, count(*) as tache from tache t, users u where t.idUser = u.id group by t.idUser, t.etat order by u.fullname";
    public static $SQL_TASKS_BY_PROJECT = "select p.libelle as projet, count(*) as tache from tache t, projet p where t.idProjet = p.id group by idProjet";
    public static $SQL_TASKS_BY_STATE = "select etat, count(*) as nbre from tache group by etat";
    public static $SQL_PROJECTS_BY_STATE = "select etat, count(*) as nbre from projet group by etat";
    public static $SQL_COUNT_TASKS = "select count(*) as nbre from tache";
    public static $SQL_COUNT_PROJECTS = "select count(*) as nbre from projet";
}

?>
