<?php
$id = $_GET['id'];
$title = "Delete Confirmation";
include('includes/head.php');
include('includes/nav.php');
require_once('config.php');
require_once('dbController.php');
$db = new dbController(HOST,USER,PASS,DB);
$sql ="select * from country where countryid = $id";
$results = $db->getOneRecord($sql);
echo "<div class='details'>";
    echo "<h2>Are you sure you want to delete this record?</h2>";
    echo "<h3>{$results['countryname']}</h3>";
    echo "<p>{$results['description']}</p>";
    echo "<img src='{$results['image']}' alt=''>";
    echo "<p class='confirm'>";
        echo "<a href='modify.php'>Cancel</a>";
        echo "<a href='delete.php?id={$results['countryid']}&&image={$results['image']}'>Delete</a>";
        echo "</p>";
    echo '</div>';
include('includes/footer.php');
?>