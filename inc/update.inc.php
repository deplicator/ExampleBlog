<?php
if(	$_SERVER['REQUEST_METHOD'] == 'POST' && 
	$_POST['submit'] == 'Save Entry' &&
	!empty($_POST['title']) &&
	!empty($_POST['entry'])) {
	
	$title = $_POST['title'];
	$entry = $_POST['entry'];
	
	//Connect to database
	include_once 'db.inc.php';
	$db = new PDO(DB_INFO, DB_USER, DB_PASS);
	
	//Save entry into database
	$sql = "INSERT INTO entries (title, entry) VALUES (?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->execute(array($title, $entry));
	$stmt->closeCursor();
	
	//Ger ID of entry we just saved
	$id_obj = $db->query("SELECT LAST_INSERT_ID()");
	$id = $id_obj->fetch();
	$id_obj->closeCursor();
	
	//Send user to new entry
	header('Location: ../index.php?id=' . $id[0]);
	
} else {
	//you lose
	header('Location: ../admin.php');
	exit;
}