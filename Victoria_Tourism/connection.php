<?php
require_once 'config.php';
require_once 'dbController.php';
require_once('insert.php');

$db = new dbController(HOST,USER,PASS,DB);
//$db->dbConnect(HOST,USER,PASS,DB);
?>