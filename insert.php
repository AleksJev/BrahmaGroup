<?php
require_once 'source.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 18:51
 * To change this template use File | Settings | File Templates.
 */
if ($_SESSION['uid'] == '1') {
    $position = $_POST['position'];
    $id =$_POST['id'];
    $name =$_POST['name'];
    $info =$_POST['info'];
    $parent =$_POST['parent'];

    db_connect();
    $sq = mysql_query("SELECT max(position) FROM $table WHERE parent='$parent'");
    $r = mysql_fetch_array($sq);
    $pos = $r[0]+10;
    $sql = mysql_query("INSERT INTO $table (`name`, `info`, `parent`, `position`) VALUES ('$name', '$info','$parent','$pos')");
    header("Location:/");
    //echo 'name: ',$name.' info:'.$info.' pos: '.$position.' parent: '.$parent;
}else{
    exit;
}