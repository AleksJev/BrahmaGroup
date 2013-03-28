<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 13:05
 * To change this template use File | Settings | File Templates.
 */
require_once 'source.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Brahma</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/slidemenu.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/slidemenu.js"></script>

</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo"><a href="/"> <span>Riga</span> Web Developer</a></div>
        <div class="login">
            <? if ($_SESSION['uid'] == '1') {?>
                <a href="login.php?logout=exit">Logout</a>
            <?}else{?>
                <form action="login.php" method="post">
                    <div>
                        <input type="text" name="login" id="login" placeholder="login"><br>
                        <input type="password" name="password" id="password" placeholder="password">
                    </div>
                    <input type="submit" class="button blue loginenter" value="Enter" name="enter">
                </form>
            <?}?>
        </div>
    </div>
    <nav>
        <div id="myslidemenu" class="jqueryslidemenu">
            <? require 'cat.php';?>
        </div>
    </nav>
    <div class="main">