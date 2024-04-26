<?php
require_once 'config.php' ;
require_once 'dbController.php' ;
include('includes/head.php');
include('includes/nav.php');

$db = new dbController(HOST, USER,PASS, DB);
$sql = "select countryname, location, theme, description, image from country";
$record = $db->getOneRecord($sql);

if($record) {
echo "<section class= 'details'>";
echo "<h2>{$record['countryname']} </h2>";
echo "<p>{$record['location']}</p>";
echo "<p>{$record['theme']}</p>";
echo "<p>{$record['description']}</p>";
echo "<img src= '{$record['image']}' alt ='{$record['countryname']}'>";
echo "</section>";
}
else {
echo "<p class='error_msg'>No results</p>";
}
?>
