<?php
$id = $_GET['id'];
require_once('config.php');
require_once('dbController.php');
$title = "Update Form";
include('includes/head.php');
include('includes/nav.php');
$db = new dbController(HOST,USER,PASS,DB);
$sql ="select * from country where countryid = $id";
$row = $db->getOneRecord($sql);
?>
<form class="main-form" method="post" action="update.php">
    <h3>Update country details: <?php echo $row['countryname'] ?> </h3>
    <input type="hidden" name="countryid" value="<?php echo $row['countryid'] ?>" />
    <input type="hidden" name="countryname" value="<?php echo $row['countryname'] ?>" />
    <label>Description</label>
    <textarea cols="50" rows="5" name="description"><?php echo $row['description'] ?> </textarea>
    <input type="submit" name="submit" value="Update" />
</form>
<?php
include "includes/footer.php";
?>