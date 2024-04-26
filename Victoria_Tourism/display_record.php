<?php
require_once 'config.php' ;
require_once 'dbController.php' ;
$db= new dbController(HOST,USER,PASS,DB);
$sql= "select * from country" ;
$records= $conn->getOneRecord($sql);
echo "<h2>{$records['countryname']}</h2>";
echo "<p>{$records['description']}</p>";
echo "<img src='{$records['image']}' alt='{$records['location']}'>";
?>
