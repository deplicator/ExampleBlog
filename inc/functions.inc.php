<?php

function retrieveEntries($db, $id=null) {
	if(isset($id)) {
		$sql = "SELECT title, entry FROM entries WHERE id=? LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($_GET['id']));

		$e = $stmt->fetch();

		$fulldisp = true;
		
	} else {
		$sql = "SELECT id, title FROM entries ORDER BY created DESC";
		foreach($db->query($sql) as $row) {
			$e[] = array('id' => $row['id'], 'title' => $row['title']);
		}
		
		$fulldisp = false;
		
		if(!is_array($e)) {
			$fulldisplay = true;
			$e = array('title' => 'No Entries', 'entry' => '<a href="/admin.php">Post an Entry!</a>');
		}
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