<?php 
$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
try{
    $conn= new PDO("mysql:host=localhost;dbname=alum",$username,$pass);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>