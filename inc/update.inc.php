<?php
if(	$_SERVER['REQUEST_METHOD'] == 'POST' && 
	$_POST['submit'] == 'Save Entry' &&
	!empty($_POST['title']) &&
	!empty($_POST['entry'])) {
	
	include_once 'db.inc.php';
	$db = new PDO(DB_INFO, DB_USER, DB_PASS);
	
	echo "you win";
	
} else {
	header('Location: ../admin.php');
	exit;	
}