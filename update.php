<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 16:31
 * To change this template use File | Settings | File Templates.
 */
$id =$_POST['id'];
$name =$_POST['name'];
$info =$_POST['info'];
$parent =$_POST['parent'];
require_once('source.php');
db_connect();
mysql_query("SET NAME utf8");
mysql_query("UPDATE category SET
                            name='$name',
                            info='$info',
                            parent='$parent'
                            WHERE id='$id'");
mysql_close();
header("Location:/");