<?php
 define ('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/lunadaDBA/');  
 include_once "facade/country_facade.php";
 include_once "facade/state_facade.php";
 include_once "facade/costumer_facade.php";

 include 'connection.php';

 $countries = new country_facade();
 $resultcountries = $countries->findAll();

 $states = new state_facade();
 $resultstates = $states->findAll();

 $idcostumer = 0;

 if(isset($_POST['addemail'])){
  $email = $_POST['email'];
  if($_POST['actionemail'] == "add"){

      connect();
      $sql = mysql_query("INSERT INTO emails (email) VALUES ('$email')") or die(mysql_error());
      close();
      echo "<p id='msg' class='mensaje'>Mail added</p>";

  }
  else{
      if($email == ""){
          exit("Email are required");
      }
      else{
      connect();
      $sql = mysql_query("DELETE FROM emails WHERE email='$email'" ) or die(mysql_error());
      close();
      echo "<p id='msg' class='mensaje'>Mail deleted</p>";
      }
  }

 }

 if(isset($_POST['addaddress'])){
  if($_POST['actionaddress'] == "add"){
      if($_POST['name'] == "" || $_POST['lastname']== ""){
          exit("Name and Last Name are required");
      }
      else{
    $costumer = new costumer_facade();
    $costumer->insert($_POST['name'],$_POST['lastname'],$_POST['addresspri'],$_POST['addresssec'],$_POST['city'],
                        $_POST['zipcode'],$_POST['country'],$_POST['state']);
      echo "<p id='msg' class='mensaje'>Costumer added</p>";
      }
  }    
  else
  {
      $name = $_POST['name'];
      $lastname = $_POST['lastname'];
      if($name == "" || $lastname == ""){
          exit("Name and Last Name are required");
      }
      else{
      connect();
      $sql = mysql_query("SELECT idcostumer,name,lastname FROM costumer WHERE costumer.name ='$name' and costumer.lastname ='$lastname'") or die(mysql_error());
      $row = mysql_fetch_row($sql);
      close();
      $idcostumer = $row[0];

      connect();
      $sql = mysql_query("DELETE FROM costumer WHERE idcostumer = '$idcostumer'" ) or die(mysql_error());
      close();
      echo "<p id='msg' class='mensaje'>Costumer deleted</p>";
      }
  }
 }

 if(isset($_POST['addphone'])){
  $phone = $_POST['phone'];
  if($_POST['actionsms'] == "add"){
      connect();
      $sql = mysql_query("INSERT INTO phones (phonenumber) VALUES ('$phone')") or die(mysql_error());
      close();
      echo "<p id='msg' class='mensaje'>Phone added</p>";
  }
  else{
      if($phone == ""){
          exit("Phone number are required");
      }
      else{
      connect();
      $sql = mysql_query("DELETE FROM phones WHERE phonenumber='$phone'" ) or die(mysql_error());
      close();
      echo "<p id='msg' class='mensaje'>Phone deleted</p>";
  }
  }
 }

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Lunada DBA</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="myfile.js"></script>
</head>

<body>
<header>
    <center><em>Customer Database</em></center>
</header>

<div class="container">
<ul id="options">
	<li onclick="showEmail()"><a href="#">Email</a></li>
	<li onclick="showAddress()"><a href="#">Address</a></li>
	<li onclick="showSms()"><a href="#">SMS</a></li>
</ul>

<form id="addformemail" name="formemail" method="post">
<ul id="email">
  <h3><em>Add or Remove Email</em></h3>
	<li><label>Email:</label><input type="email" name="email" id="verificacion" onBlur="Check('verificacion')"></li>
</ul>
<ul id="actionsemail">
  <li><label>Action:</label>
    <ul>
      <li><input type="radio" name="actionemail" id="mail" value="add">Add<br></li>
      <li id="middleemail"><input type="radio" name="actionemail" value="remove">Remove</li>
      <li><input type="Submit" name="addemail" value="Submit"></li>
    </ul>
  </li>   
</ul>
    <center><div class="mensaje" id="errorEmail"></div></center>
</form>

<form id="addformaddress" name="formaddress" method="post" action="index.php">
<ul id="address">
  <h3><em>Add or Remove Address</em></h3>
	<li>
		<ul>
			<li><label>First Name:</label><input type="text" name="name" id="verificaname" onBlur="CheckName('verificaname')"/></li>
			<li><label>Last Name:</label><input type="text" name="lastname" id="verificalastname"/></li>
			<li><label>Address 1:</label><input type="text" name="addresspri" id="verificaaddresspri"/></li>
			<li><label>Address 2:</label><input type="text" name="addresssec" id="verificaaddresssec"/></li>
			<li><label>City:</label><input type="text" name="city" id="verificacity"/></li>
			<li><label>State:</label>
				<select name="state" id="verificastate">
					<option value="-1">Select</option>
        				<?php
  							for ($i = 0; $i < sizeof($resultstates); $i++) {
								echo "<option value='{$resultstates[$i]['idstate']}'>{$resultstates[$i]['state']}</option>";}   		
  		 				?>      		
    		    </select>
			</li>
			<li><label>Zip code:</label><input type="text" name="zipcode" id="verificazipcode"/></li>
			<li><label>Country:</label>
				<select name="country" id="verificacountry">
					<option value="-1">Select</option>
        				<?php
  							for ($i = 0; $i < sizeof($resultcountries); $i++) {
								echo "<option value='{$resultcountries[$i]['idcountry']}'>{$resultcountries[$i]['country']}</option>";
							}   		
  		 				?>      		
        		</select>
			</li>
		</ul>
	</li>	
</ul>

<ul id="actionsaddress">
  <li><label>Action:</label>
    <ul>
      <li><input type="radio" name="actionaddress" id="name" value="add">Add<br></li>
      <li id="middleaddress"><input type="radio" name="actionaddress" value="remove">Remove</li>
      <li><input type="Submit" name="addaddress" value="Submit"></li>
    </ul>
  </li>   
</ul>
    <center><div class="mensaje" id="errorPerson"></div></center>
</form>

<form id="addformsms" name="formsms" method="post" action="index.php">

<ul id="sms">
  <h3><em>Add or Remove SMS susbscriber</em></h3>
	<li><label>Phone Number:</label><input type="Phone" name="phone" id="verificaphone" onBlur="CheckPhone('verificaphone')"></li>
</ul>
<ul id="actionssms">
  <li><label>Action:</label>
    <ul>
      <li><input type="radio" name="actionsms" id="phone" value="add">Add<br></li>
      <li id="middlesms"><input type="radio" name="actionsms" value="remove">Remove</li>
      <li><input type="Submit" name="addphone" value="Submit"></li>
    </ul>
  </li>   
</ul>
    <center><div class="mensaje" id="errorPhone"></div></center>
</form>





</div>

</body>
</html>
