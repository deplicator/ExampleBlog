<?php 
include 'header.php';

if(isset($_GET['page'])) {
	$page = htmlentities(strip_tags($_GET['page']));
} else {
	$page = 'blog';
}
?>	
	<form method="post" action="inc/update.inc.php">
		<fieldset>
			<legend>New Entry Submission</legend>
			<label>Title
				<input type="text" name="title" maxlength="150">
			</label>
			<label>Entry
				<textarea name="entry" cols="45" rows="10"></textarea>
			</label>
			<input type="hidden" name="page" value="<?php echo $page; ?>" />
			<input type="submit" name="submit" value="Save Entry">
			<input type="submit" name="submit" value="Cancel">			
		</fieldset>
	</form>

<?php include 'footer.php';?>