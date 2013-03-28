<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aleksejs
 * Date: 27.03.13
 * Time: 13:05
 * To change this template use File | Settings | File Templates.
 */

require_once("source.php");

db_connect();
mysql_query("SET NAMES utf8");
$result = mysql_query("SELECT * FROM category WHERE visible='1' ORDER BY position");
while ($row = mysql_fetch_assoc($result))
{
    $categories[$row['id']] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'info' => $row['info'],
        'parent' => $row['parent']
    );
}
mysql_close();

function generate_menu($array, $parent = 0, $level = 0)
{
    $has_children = false;
    foreach($array as $key => $value)
    {
        if ($value['parent'] == $parent)
        {
            if ($has_children === false)
            {
                $has_children = true;
                if ($parent == 0) {
                    echo "\n<ul>";
                }else{
                    echo "\n<ul>";
                }

                $level++;
            }



            echo '<li><a href="">'.$value['name'].'</a>';

            generate_menu($array, $key, $level);
            echo "</li>\n";
        }
    }
    if ($has_children === true)
        echo "</ul>\n";
}
generate_menu($categories);

?>