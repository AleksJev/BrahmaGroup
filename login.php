<?php
session_start();
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */
$login = $_POST['login'];
$pass = $_POST['password'];/*

db_connect();
$sql = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$pass'");
$result = mysql_query($sql);
if (mysql_num_rows($result)) {
$_SESSION['login'] = "enter";
header('Location:/');
}else{
    echo 'LOGIN FAILED';
}
*/
if ($_GET['logout'] == 'exit') {
    session_start();
    session_destroy();
    if(count($_SESSION) == 0)
    {
        $_SESSION=array();
        session_destroy();
    }
    header("Location:/");
}

require_once 'source.php';

if(isset($_POST['enter']))
{
    $l = htmlspecialchars($_POST['login']);
    $p = $_POST['password'];
    db_connect();
    $in = mysql_query("SELECT * FROM users
                    WHERE login='$l'
                    AND password='$p'");
    $rec = mysql_num_rows($in);
    if($rec > 0)
    {
        $info = mysql_fetch_assoc($in);
        mysql_close();
        $_SESSION['log'] = 'true';
        $_SESSION['uid'] = $info['id'];
        $_SESSION['u_n'] = $info['name'];
        $_SESSION['u_s'] = $info['sname'];
        header("Location: /");
        echo 'YES';
    }
    else
    {
        mysql_close();
        echo 'Failed';
        //header("Location: /index.php?log=f");
    }
}
else
{
    echo 'Failed';
    //header("Location: /index.php?log=f");
}

