<?php

function redirect($note, $url){
    echo $note;
    header("refresh: 2; url = $url");
    exit();
//This function displays a custom note, waits 2 seconds, then redirects to the custom url
}


function checkReg ($fname , $lname, $email, $phone, $birthday, $gender, $password){
    if ($fname == "" || $lname == "" || $email == "" || $phone == "" || $birthday == "" || $gender == "" || $password == "") redirect( "Missing field" , "index.html");
    // If any field is missing, tell user "Missing field" and redirect
}


function register ($fname , $lname, $email, $phone, $birthday, $gender, $password){
    $sql = "SELECT * from accounts WHERE email = '$email'";
    $results = mysql_query($sql); //Query the DB using the $cred line
    $r = mysql_fetch_array($results); //return data from the DB as an array called $r
    if ($r != NULL){ redirect ("This username (email) is already in use" , "index.html");} //If $r has any data in it(aka there is an entry w/ this email) then tell user the email is in use
    if ($r == NULL){
        $reg_cmd = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
        mysql_query($reg_cmd) or die(mysql_error());
        redirect ("You have successfully registered an account!" , "login.html");
        // If the email is not already in database, add a line to the table with the information. Redirect to login.html
    }

}



?>
