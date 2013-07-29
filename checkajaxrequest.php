<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PN
 * Date: 7/24/13
 * Time: 9:54 AM
 * To change this template use File | Settings | File Templates.
 */

include 'connection.php';

if(isset($_POST["verificaname"]))
{
    $value = trim($_POST["verificaname"]);

    if(validateValueName($value))
    {
        connect();
        if(checkExistName($value)){
            echo "Costumer already exists in our database ...";
        }
        else{
            echo "Costumer available";
        }
        close();
    }
    else
        echo "Invalid costumer name";
}


if(isset($_POST["verificaphone"]))
{
    $value = trim($_POST["verificaphone"]);

    if(validateValuePhone($value))
    {
        connect();
        if(checkExistPhone($value)){
            echo "Phone number already exists in our database ...";
        }
        else{
            echo "Phone available";
        }
        close();
    }
    else
        echo "Invalid phone number";
}

if(isset($_POST["verificacion"]))
{
    $value = trim($_POST["verificacion"]);

    if(validateValue($value))
    {
        connect();
        if(checkExist($value)){
            echo "Email already exists in our database ...";
        }
        else{
            echo "Email available";
        }
        close();
    }
    else
        echo "Invalid mail address";
}

function validateValue($value)
{
    if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $value)) return TRUE;
    else return FALSE;
}

function validateValuePhone($value)
{
    if(eregi("^[0-9]{10}$", $value)) return TRUE;
    else return FALSE;
}

function validateValueName($value)
{
    if(eregi("[a-zA-Z]", $value)) return TRUE;
    else return FALSE;
}

function checkExist($email)
{
    $sql = mysql_query("SELECT email FROM emails WHERE emails.email ='$email'") or die(mysql_error());
    $row = mysql_fetch_row($sql);

    if(!empty($row)) {
        return TRUE;
    }
    else return FALSE;
}


function checkExistPhone($phone)
{
    $sql = mysql_query("SELECT phonenumber FROM phones WHERE phones.phonenumber ='$phone'") or die(mysql_error());
    $row = mysql_fetch_row($sql);

    if(!empty($row)) {
        return TRUE;
    }
    else return FALSE;
}

function checkExistName($name)
{
    $idcostumer = 0;
    $sql = mysql_query("SELECT idcostumer,name FROM costumer WHERE costumer.name ='$name'") or die(mysql_error());
    $row = mysql_fetch_row($sql);

    if(!empty($row)) {
        $idcostumer = $row[0];
        return TRUE;
    }
    else return FALSE;
}

