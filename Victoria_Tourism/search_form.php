<?php
$title = "Search Form";
include('includes/head.php');
include('includes/nav.php');
?>

<form action="search.php" method="get" role="search"></form>
<input type="text" class="form-contol" placeholder="Search" name="search">
<button type="submit" class="btn btn-default">Search</button>

<?php
	include('includes/footer.php');
?>