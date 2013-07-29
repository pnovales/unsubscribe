<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PN
 * Date: 7/24/13
 * Time: 10:27 AM
 * To change this template use File | Settings | File Templates.
 */

function connect()
{
    mysql_connect("localhost", "root", "");
    mysql_select_db("datasample");
}

function close()
{
    mysql_close();
}
