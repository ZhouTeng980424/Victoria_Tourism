<?php
$title = "Modify";
include('includes/head.php');
include('includes/nav.php');
require_once('config.php');
require_once('dbController.php');
//$id = $_POST['countryid'];
$conn = new dbController(HOST,USER,PASS,DB);
$sql = "select countryid, countryname, location, theme, description, image from country";
$results = $conn->getAllRecords($sql);
?>
<table border="1">
<tr>
    <th>Country ID</th>
	<th>Country Name</th>
	<th>Location</th>
	<th>Theme</th>
	<th>Description</th>
	<th>Image</th>
    <th colspan="2">Make Changes</th>
</tr>

<?php
foreach($results as $row) {
echo "<tr>";
echo "<td>{$row['countryid']} </td>";
echo "<td> {$row['countryname']} </td>";
echo "<td> {$row['location']} </td>";
echo "<td> {$row['theme']}</td>";
echo "<td> {$row['description']} </td>";
echo "<td><img src='{$row['image']}' alt='{$row['countryname']}'></td>";
echo "<td ><a href='update_form.php?id={$row['countryid']}'>Update</a></td>";
echo "<td ><a href='delete_confirm.php?id={$row['countryid']}&&image={$row['image']}'>Delete</a></td>";
echo "</tr>";
}
echo"</table>";
include('includes/footer.php');
?>
