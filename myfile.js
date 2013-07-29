/**
 * Created with JetBrains PhpStorm.
 * User: PN
 * Date: 7/24/13
 * Time: 9:36 AM
 * To change this template use File | Settings | File Templates.
 */

function showEmail() {
    if (document.getElementById('addformemail').style.display = 'none') {
    document.getElementById('addformemail').style.display = 'block';
    document.getElementById('actionsemail').style.display = 'block';
    document.getElementById('email').style.display = 'block';
    document.getElementById('address').style.display = 'none';
    document.getElementById('sms').style.display = 'none';
    document.getElementById('actionsaddress').style.display = 'none';
    document.getElementById('actionssms').style.display = 'none';
    document.getElementById('errorPhone').style.display = 'none';
    document.getElementById('errorPerson').style.display = 'none';
    document.getElementById('errorEmail').style.display = 'inline';
        document.getElementById('msg').style.display = 'none';

    }
}

function showAddress() {
    if (document.getElementById('addformaddress').style.display = 'none') {
    document.getElementById('addformaddress').style.display = 'block';
    document.getElementById('actionsaddress').style.display = 'block';
    document.getElementById('address').style.display = 'block';
    document.getElementById('email').style.display = 'none';
    document.getElementById('sms').style.display = 'none';
    document.getElementById('actionssms').style.display = 'none';
    document.getElementById('actionsemail').style.display = 'none';
    document.getElementById('errorPhone').style.display = 'none';
    document.getElementById('errorEmail').style.display = 'none';
    document.getElementById('errorPerson').style.display = 'inline';
        document.getElementById('msg').style.display = 'none';
    }
}

function showSms() {
    if (document.getElementById('addformsms').style.display = 'none') {
    document.getElementById('addformsms').style.display = 'block';
    document.getElementById('actionssms').style.display = 'block';
    document.getElementById('sms').style.display = 'block';
    document.getElementById('email').style.display = 'none';
    document.getElementById('address').style.display = 'none';
    document.getElementById('actionsaddress').style.display = 'none';
    document.getElementById('actionsemail').style.display = 'none';
    document.getElementById('errorEmail').style.display = 'none';
    document.getElementById('errorPerson').style.display = 'none';
    document.getElementById('errorPhone').style.display = 'inline';
        document.getElementById('msg').style.display = 'none';
    }
}


function myAjax()
{
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(E) { xmlhttp = false; }
    }
    if (!xmlhttp && typeof XMLHttpRequest != "undefined") { xmlhttp = new XMLHttpRequest(); }

    return xmlhttp;
}

function Check(event)
{
    var msg = document.getElementById("errorEmail");
    var input = document.getElementById("verificacion");

    var value = input.value;
    var textAction = "Searching ...";
    /*alert(value);*/
    if(value == "")
        msg.innerHTML = "Invalid length";
    else
    {
        input.value = textAction;

        var ajax = myAjax();
        ajax.open("POST", "checkajaxrequest.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(event+"="+value);

        ajax.onreadystatechange = function()
        {
            if (ajax.readyState == 4)
            {
                input.value = value;
                msg.innerHTML = ajax.responseText;
                document.getElementById("mail").checked=true;

            }
        }
    }
}

function CheckPhone(event)
{
    var msg = document.getElementById("errorPhone");

    var input = document.getElementById("verificaphone");
    var value = input.value;
    var textAction = "Searching ...";
    /*alert(value);*/
    if(value == "")
        msg.innerHTML = "Invalid length";
    else
    {
        input.value = textAction;

        var ajax = myAjax();
        ajax.open("POST", "checkajaxrequest.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(event+"="+value);

        ajax.onreadystatechange = function()
        {
            if (ajax.readyState == 4)
            {
                input.value = value;
                msg.innerHTML = ajax.responseText;
                document.getElementById("phone").checked=true;
            }
        }
    }
}

function CheckName(event)
{
    var msg = document.getElementById("errorPerson");

    var input = document.getElementById("verificaname");
    var value = input.value;
    var textAction = "Searching ...";
    /*alert(value);*/
    if(value == "")
        msg.innerHTML = "Invalid length";
    else
    {
        input.value = textAction;

        var ajax = myAjax();
        ajax.open("POST", "checkajaxrequest.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(event+"="+value);

        ajax.onreadystatechange = function()
        {
            if (ajax.readyState == 4)
            {
                input.value = value;
                msg.innerHTML = ajax.responseText;
                document.getElementById("name").checked=true;
            }
        }
    }
}


