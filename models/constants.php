<?php

class Constants {
    //DATABASE CONSTANTS
    public static $BD_NAME = "deeplearning";
    public static $BD_HOST_NAME = "localhost";
    public static $BD_USER_NAME = "root";
    public static $BD_USER_PASSWORD = "";


    public static $EMPTY_STRING = "";
    public static $SUCCES_CODE = "SUCCES";
    public static $WARNING_CODE = "WARNING";
    public static $ERROR_CODE = "ERROR";

    //SQL NETWORK
    public static $SQL_SELECT_NETWORKS = "select * from network";
    public static $SQL_SELECT_NETWORK = "select * from network where id = :idNetwork";
    public static $SQL_UPDATE_NETWORK = "update network set label = :label , neuronsParCouches = :neuronsParCouches , tauxApprentissage = :tauxApprentissage, fonctionTransfert = :fonctionTransfert, typeReseau = :typeReseau where id = :idNetwork";
    public static $SQL_CREATE_NETWORK = "insert into network (label, neuronParCouches, tauxApprentissage, fonctionTransfert, typeReseau) values (:label, :neuronParCouches, :tauxApprentissage, :fonctionTransfert, :typeReseau)";
    public static $SQL_DELETE_NETWORK = "delete from network where id = :idNetwork";

    //SQL LEARNING CONFIG
    public static $SQL_SELECT_LEARNING_CONFIG = "select *  from learningconfig";
    public static $SQL_UPDATE_LEARNING_CONFIG = "update from learningconfig set baseItem = :baseItem, learningRate = :learningRate, learningAverage = :learningAverage, ecartMoy = :ecartMoy where id = :id";

    //SQL STATISTIQUE
    public static $SQL_STATE_BY_USERS = "select u.fullname, t.etat, count(*) as tache from tache t, users u where t.idUser = u.id group by t.idUser, t.etat order by u.fullname";
    public static $SQL_TASKS_BY_PROJECT = "select p.libelle as projet, count(*) as tache from tache t, projet p where t.idProjet = p.id group by idProjet";
    public static $SQL_TASKS_BY_STATE = "select etat, count(*) as nbre from tache group by etat";
    public static $SQL_PROJECTS_BY_STATE = "select etat, count(*) as nbre from projet group by etat";
    public static $SQL_COUNT_TASKS = "select count(*) as nbre from tache";
    public static $SQL_COUNT_PROJECTS = "select count(*) as nbre from projet";
}

?>