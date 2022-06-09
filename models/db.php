<?php

class DataBase
{







    //mysql -e "USE todolistdb; select*from todolist" --user=azure --password=6#vWHD_$ --port=49175 --bind-address=52.176.6.0

    public static function connect()
    {


        $connection = "'localhost','root','','restaurante'";

        $db = new mysqli("localhost", "root", "", "restaurante");
        $db->query("SET NAMES 'UTF-8'");

        return $db;
    }
}
