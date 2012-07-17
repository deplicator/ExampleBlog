<?php

function retrieveEntries($db, $page, $url=null) {
	/*
	 * If an entry URL was supplied, load the associated entry.
	 */
	if(isset($url)) {
		$sql = "SELECT id, page, title, entry FROM entries WHERE url=? LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($url));
		
		//Saver returned entry array.
		$e = $stmt->fetch();
		
		//Set the fulldisp flag for single entry.
		$fulldisp = true;

	/* 
	 * If no entry URl provided, load all entry info for the page.
	 */
	} else {
		$sql = "SELECT id, page, title, entry, url FROM entries WHERE page=? ORDER BY created DESC";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($page));
		
		$e = null; //Declare variable to avoid errors.
		
		//Loop through returned results and store as an array.
		while($row = $stmt->fetch()) {
			$e[] = $row;
		}
		$fulldisp = false;
	}
	
	/*
	 * Default display message for when no entries are returned.
	 */
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

function makeUrl($title) {
    $patterns = array(
        '/\s+/', 
        '/(?!-)\W+/'
    );
    $replcements = array('-', '');
    return preg_replace($patterns, $replcements, strtolower($title));
}