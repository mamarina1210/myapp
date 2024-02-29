<?php

function connection(){
  $server = "localhost"; //The hostname pr IP address of the MYSQL server.
  $user = "root"; //depends on software
  $pass = "root"; //For MAMP users its "root"
  $db =  "receip"; //The name of MYSQL database.

  //create a connection
  $con = new mysqli($server, $user, $pass, $db);
  //$con holds the connection
  //$con - object
  //mysqli - class(contains different functions and variable inside)
  //mysl improved
  
  
  //Check the connection
  if($con->connect_error){
    //there is an error
    die("Connection failed: ".$con->connect_error);
    //die() will terminate the current script and diplay an error message
  } else {
    //If there is noo error, return to the connection object
    return $con;
  }
  // ->object operator(object is on the left)
  // connect_error contains the string value of the error

}
?>