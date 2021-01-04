<?php
include_once("constants.php");

class GlobalParams
{
    public static function getBdDico()
    {
        return array(
          "host" => Constants::$BD_HOST_NAME,
          "user" => Constants::$BD_USER_NAME,
          "password" => Constants::$BD_USER_PASSWORD,
          "bdname" => Constants::$BD_NAME
        );
    }
}


?>
