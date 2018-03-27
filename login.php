<?php
include (  "accountInfo.php"  );
include (  "functions.php"     ) ;
mysql_connect ( $hostname, $username, $password )
       or die ( "Unable to connect to MySQL database" ); //used to connect to Database

mysql_select_db( $project );  //select the DB

//Code to obtain files from the HTML

$email  =  $_GET[ "email"  ];

$password  =  $_GET[ "password"  ];


//Code to check email and register account if it doesn't exist


checkFields($email, $password);
login($email, $password);



?>
