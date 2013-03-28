<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 13:07
 * To change this template use File | Settings | File Templates.
 */
    function db_connect()
    {
        $host = "";
        $user ="";
        $pass="";
        $dbname="";

        if ($db = mysql_connect($host,$user,$pass))   // $db - resurs   @mysql_connect - proverjaet net li uze soedinenija.esli estj to perexodim k punktu mysql_select_db
        {
            mysql_select_db($dbname,$db);
            return $db;
        }
        else
        {
            return false;
        }
    }