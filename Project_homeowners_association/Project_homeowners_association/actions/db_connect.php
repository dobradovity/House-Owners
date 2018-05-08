<?php

 

$localhost = "localhost";

$username = "root";

$password = "root";

$dbname = "Project_homeowners_association";

 

// create connection

$connect = new mysqli($localhost, $username, $password, $dbname);

 

// check connection

if($connect->connect_error) {

    die("connection failed: " . $connect->connect_error);

} else {

    // echo "Successfully Connected";

}

 

?>