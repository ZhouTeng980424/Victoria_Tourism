<?php 
include 'includes/head.php'; 
include 'includes/nav.php'; 
require_once 'config.php' ;
require_once 'dbController.php' ;

$db = new dbController(HOST,USER,PASS,DB);

$name = $_POST['countryname'];
$location = $_POST['location'];
$theme =  $_POST['theme'];
$description = $_POST['description'];
$image = 'images/'.$_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];
$error = $_FILES['image']['error'];

$sql = "insert into country (countryname,description,location,theme,image)
	        values ('$name','$description','$location','$theme','$image')";


// if($db->insertQuery($sql,$countryname,$location,$theme,$description, $image))
// {echo '<p>New record successfully inserted into the database.</p>';
	// $db->uploadImage($temp,$image);
// }
// else{
    // echo '<p>Record not inserted into the database.</p>';
// }
if ($db->executeQuery($sql)) {
		echo '<p>New record successfully inserted into the database.</p>';
		$db->uploadImage($temp, $image); }
		else {
		echo '<p>Record not inserted into the database.</p>'; }


include 'includes/footer.php'; ?>
