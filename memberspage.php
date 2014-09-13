<?php 

 // Connects to your Database 

 mysql_connect("68.178.143.80", "FWBHS", "Passwordfwb1@") or die(mysql_error()) ; 
 
 mysql_select_db("FWBHS") or die(mysql_error()) ; 

 
 //checks cookies to make sure they are logged in 

 if(isset($_COOKIE['ID_my_site'])) 

 { 

 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site']; 

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )) 	 

 		{ 

 

 //if the cookie has the wrong password, they are taken to the login page 

 		if ($pass != $info['password']) 

 			{ 			header("Location: /PHP-&-MySQL-Login/login.php"); 

 			} 

 

 //otherwise they are shown the admin area	 

 	else 

 			{ 

 			 echo "Admin Area<p>"; 

  //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM employees") or die(mysql_error()); 

//Puts it into an array 
while($info = mysql_fetch_array( $data )) 
{ 
//Outputs the image and other data 
Echo "<img src=http://htmltechs.com/images/".$info['photo'] ."> <br>"; 
Echo "<b>Name:</b> ".$info['name'] . "<br> "; 
Echo "<b>Email:</b> ".$info['email'] . " <br>"; 
Echo "<b>Phone:</b> ".$info['phone'] . " <hr>"; } 

 echo "<a href=/PHP-&-MySQL-Login/logout.php>Logout</a>"; 

 			} 

 		} 

 		} 

 else 

 

 //if the cookie does not exist, they are taken to the login screen 

 {			 

 header("Location: /PHP-&-MySQL-Login/login.php"); 

 } 

 ?> 
 
 