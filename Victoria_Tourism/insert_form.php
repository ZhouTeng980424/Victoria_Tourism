<?php include "includes/head.php"; 
      include "includes/nav.php";
?>

<form method="post" action="insert.php" enctype="multipart/form-data">

<h3>Insert a new record:</h3>

<label>Country Name:</label>
<input type="text" name="countryname" />

<label>Description</label>
<textarea cols="50" rows="5" name="description"></textarea>

<label>Location:</label>
<input type="text" name="location" />

<label>Theme:</label>
<input type="text" name="theme" />

<label>Select an Image:</label>
<input type="file" name="image" />

<input type="submit" name="submit" value="Insert" />

</form>


<?php include "includes/footer.php"; ?>
