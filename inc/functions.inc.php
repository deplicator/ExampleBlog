<?php

function retrieveEntries($db, $page, $id=null) {
	if(isset($id)) {
		$sql = "SELECT title, entry FROM entries WHERE id=? LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($_GET['id']));

		$e = $stmt->fetch();

		$fulldisp = true;
		
	} else {
		$sql = "SELECT id, page, title, entry FROM entries WHERE page=? ORDER BY created DESC";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($page));
		
		$e = null; //declare variable to avoid errors
		
		while($row = $stmt->fetch()) {
			$e[] = $row;
		}
		
		$fulldisp = false;

	}
	
	if(!is_array($e)) {
		$fulldisp = true;
		$e = array('title' => 'No Entries yet', 'entry' => '<a href="admin.php?page=' . $page . '">Make one</a>');
	}
	
	array_push($e, $fulldisp);
	return $e;
}

function sanitizeData($data) {
	if(!is_array($data)) {
		return strip_tags($data, "<a>");
	} else {
		return array_map('sanitizeData', $data);
	}
}