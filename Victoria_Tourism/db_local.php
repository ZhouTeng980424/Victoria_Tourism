<?php
ini_set('display_errors',0);//code to switch off error display
$host = 'talsprddb02.int.its.rmit.edu.au';
$user = 's3746884';
$pass = 'Zl971106.';
$db = 's3746884';
$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_errno) {
exit("Connection failed");
}
else {
echo 'Successfully connected to the database';
}
?>
