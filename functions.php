<?php

function redirect($note, $url){
    echo $note;
    echo "<br> Need a new login? Register ";
    echo <<<HTML
<a href="index.html">here</a>
HTML;
    exit();
}


function checkReg ($fname , $lname, $email, $phone, $birthday, $gender, $password){
    if ($fname == "" || $lname == "" || $email == "" || $phone == "" || $birthday == "" || $gender == "" || $password == "") redirect( "Missing field" , "index.html");
    // If any field is missing, tell user "Missing field" and redirect
}


function register ($fname , $lname, $email, $phone, $birthday, $gender, $password){
    $sql = "SELECT * from accounts WHERE email = '$email'";
    $results = mysql_query($sql); //Query the DB using the $cred line
    $r = mysql_fetch_array($results); //return data from the DB as an array called $r
    if ($r != NULL){ redirect ("This username (email) is already in use" , "index.html");} //tells user if the email is already in use
    if ($r == NULL){
        $reg_cmd = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
        mysql_query($reg_cmd) or die(mysql_error());
        redirect ("Congratulations! ".$fname." ".$lname. " you have successfully registered an account!" , "login.html");
        // If the email is not already in database, add a line to the table with the information. Redirect to login.html
    }
}


function checkFields ($email, $password){
    if ($email == "" || $password == "")
        redirect( "Missing field" , "index.html");
    // If any field is missing, tell user "Missing field" and redirect
}


function login($email, $password){
    $login = "SELECT * FROM accounts WHERE email = '$email'  and password = '$password'";
    $login_q = mysql_query($login) or die('Error on checking Username and Password');
   if (mysql_num_rows($login_q) == 1){
        redirect( "You're logged in" , "index.html");
    }
    else {
        redirect( "Incorrect Login, please try again" , "login.html");
    }
}


?>
