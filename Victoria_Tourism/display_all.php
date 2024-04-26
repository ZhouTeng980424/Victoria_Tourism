<?php
$title = "Home";
include('includes/head.php');
include('includes/nav.php');
require_once('config.php');
require_once('dbController.php');
$conn = new dbController(HOST,USER,PASS,DB);
$sql = "select countryname, location, theme, description, image from country";
$results = $conn->getAllRecords($sql);

if($results) {
foreach($results as $next) {
echo "<section class='display_all'>";
echo "<h2>*{$next['countryname']}</h2>";
echo "<img src='{$next['image']}' alt='{$next['countryname']}'>";
echo "<br>";
echo "<a href='details.php?countryname={$next['countryname']}'>Read More</a>";
echo "</section>";
}
}


include('includes/footer.php');
?>
