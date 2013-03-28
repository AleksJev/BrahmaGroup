<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 17:15
 * To change this template use File | Settings | File Templates.
 */
$id = $_GET['id'];
require_once('source.php');
if ($_SESSION['uid'] == '1') {
db_connect();
mysql_query("SET NAME utf8");
mysql_query("DELETE FROM category WHERE id=$id");
mysql_query("DELETE FROM category WHERE parent=$id");
mysql_close();
header("Location:/");
}else{
    exit;
    header("location:/");
}