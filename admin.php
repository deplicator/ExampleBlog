<!DOCTYPE html>
<html>
<head>
	<title>Example Blog</title>
	<link rel="stylesheet" href="./css/default.css" type="text/css" />
</head>

<body>
	<h1>Example Blog</h1>
	
	<form method="post" action="inc/update.inc.php">
		<fieldset>
			<legend>New Entry Submission</legend>
			<label>Title
				<input type="text" name="title" maxlength="150">
			</label>
			<label>Entry
				<textarea name="entry" cols="45" rows="10"></textarea>
			</label>
			<input type="submit" name="submit" value="Save Entry">
			<input type="submit" name="submit" value="Cancel">			
		</fieldset>
	</form>
</body>
</html>