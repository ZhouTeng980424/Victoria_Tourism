<?php
$search = $_GET['search'];
require_once('config.php');
require_once('dbController.php');

$title = "Search";

include('includes/head.php');
include('includes/nav.php');

$db = new dbController(HOST,USER,PASS,DB);
$search = "%$search%";
$sql = "SELECT * FROM country WHERE description LIKE ?";
$results = $db->searchQuery($sql,$search);
echo "<div id='search'>";
if($results) {
foreach($results as $row) {
echo "<section class='details'>";
echo "<h2>{$row['countryname']}</h2>";
echo "<img src='{$row['image']}' alt='{$row['countryname']}'>";
echo "<p>{$row['location']}</p>";
echo "<p>{$row['theme']}</p>";
echo "<p>{$row['description']}</p>";
echo "</section>";
}
} else {
echo "<p>No results</p>";
}
echo "</div>";

include('includes/footer.php');
?>
