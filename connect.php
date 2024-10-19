<?php 

$con = new mysqli('localhost', 'root', 'root', 'crud');

if ($con->connect_error) {
  die('Could not connect: ' . $con->connect_error);
} else {
  echo 'Connected successfully';
}


?>