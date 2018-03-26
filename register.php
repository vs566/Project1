<?php


include (  "accountInfo.php"  );
include (  "functions.php"     ) ;
try
{
    $conn = new PDO("mysql:host=$hostname;dbname=vs566",
    $username, $password);
    echo "Connected successfully "."<br>"."<br>";

}
catch(PDOException $e)
{
    //echo "Connection failed: " . $e->getMessage();

    http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    echo "<br>";
}

//Code to obtain files from the HTML
$fname  =  $_GET[ "fname"  ];
$lname  =  $_GET[ "lname"  ];
$email  =  $_GET[ "email"  ];
$phone  =  $_GET[ "phone"  ];
$birthday  =  $_GET[ "birthday"  ];
$gender  =  $_GET[ "gender"  ];
$password  =  $_GET[ "password"  ];


//Code to check email and register account if it doesn't exist


checkReg($fname , $lname, $email, $phone, $birthday, $gender, $password);
register($fname , $lname, $email, $phone, $birthday, $gender, $password);


function http_error($message)
{
    header("Content-type: text/plain");
    die($message);
}














?>
