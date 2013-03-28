<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 15:18
 * To change this template use File | Settings | File Templates.
 */
require_once('source.php');
require_once 'header.php';


$id = $_GET['id'];

db_connect();
mysql_query("SET NAMES utf8");
$parents = mysql_query("SELECT * FROM $table");
while ($row = mysql_fetch_array($parents))
{
    $categories[$row['id']] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'info' => $row['info'],
        'parent' => $row['parent']
    );
}
if($_GET['update'] == 'yes') {
    $result = mysql_query("SELECT * FROM $table WHERE id=$id");
    $res = mysql_fetch_assoc($result);?>
    <div class="change">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?=$res['id']?>">
            <label>Name: </label><input type="text" name="name" id="name" value="<?=$res['name']?>"><br>
            <label>Info: </label><input type="text" name="info" id="info" value="<?=$res['info']?>"><br>
            <label>Parent category: </label><select id="parent" name="parent">
                <option value=""></option>
                <?
                foreach ($categories as $v => $k){


                     if ($k['id'] == $res['parent']) {
                        echo "<option value=$k[id] selected>$k[name]</option>";
                    }else{
                        echo "<option value=$k[id]>$k[name]</option>";
                    }

                }?>


            </select><br>
            <input type="submit" class="button blue"  value="submit">
        </form>

        <a href="delete.php?id=<?=$id?>"><img src="/images/delete.png"></a>
    </div>
<?}

            if ( $_GET['update'] == 'add' ) {

                $sql = mysql_query("SELECT max(position) `max` FROM $table WHERE parent='$id'") or die(mysql_error());
                $row = mysql_fetch_array($sql) or die(mysql_error());
            ?>
    <div class="change">
         <form action="insert.php" method="post">
             <label>Name: </label><input type="text" name="name"><br>
             <label>Info: </label><input type="text" name="info"><br>
             <label>Parent category: </label>
             <select id="parent" name="parent">
                 <option value="0"></option>
                 <?
                 foreach ($categories as $v => $k){
                    if ($k['id'] == $id) {
                         echo "<option value=$k[id] selected>$k[name]</option>";
                    }else{
                     echo "<option value=$k[id]>$k[name]</option>";
                    }
                 }?>
             </select><br>
             <input type="hidden" name="position" value="<?=$row[0]+10?>">
             <input type="submit" class="button blue" value="submit">
         </form>
    </div>
<?
}
require_once'footer.php';