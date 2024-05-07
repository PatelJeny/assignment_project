<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassWord = "";
$dbName="php_store";

// Create connection
$dbConn = new mysqli($dbHost, $dbUser, $dbPassWord,$dbName);

// Check connection
function executeQuery($sqlQuery){

  global $dbConn ;

  if ($dbConn->connect_error) {
    echo "Connection failed: " . $dbConn->connect_error;
    return false;
  }
  else{
    return $dbConn->query($sqlQuery);
  }
}

?>