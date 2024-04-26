<?php
$title="Update Confirmation";
include('includes/head.php');
include('includes/nav.php');
require_once('config.php');
require_once('dbController.php');
$connection = new dbController(HOST,USER,PASS,DB);
foreach ($_POST as $key => $val) {
    $$key = trim($val);
}
$sql = "UPDATE country SET description=? WHERE countryid=?";
$description = $_POST['description'];
$countryid = $_POST['countryid'];
$countryname = $_POST['countryname'];
$update = $connection->updateRecord($sql,$description,$countryid);
echo "<div id='message'>";
if($update) {
    echo "<p>Record $countryname updated<p>";
} else {
    echo "<p>Record NOT updated<p>";
}
echo "<div>";
include('includes/footer.php');
?>