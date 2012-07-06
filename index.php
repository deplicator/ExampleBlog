<?php
include 'header.php';
include_once 'inc/functions.inc.php';
include_once 'inc/db.inc.php';

//Open a database connection
try {
	$db = new PDO(DB_INFO, DB_USER, DB_PASS);
	
	/*
	 * Figure out what page is being requested (defaut is blog)
	 * Perform basic sanitazation on the variable as well
	 */
	if(isset($_GET['page'])) {
		$page = htmlentities(strip_tags($_GET['page']));
	} else {
		$page = 'blog';
	}
	

//Determine if entry ID was passed in URL
$id = (isset($_GET['id'])) ? (int) $_GET['id'] : null;

//Load enties
$e = retrieveEntries($db, $page, $id);

//Get fulldisp flag
$fulldisp = array_pop($e);

//Sanatize entry data
$e = sanitizeData($e);

?>

<div id="entries">
<?php 
if($fulldisp===true) { ?>

<h2><?php echo $e['title']; ?></h2>
<p><?php echo $e['entry']; ?>
<p class="backlink">
	<a href="./">Back to list of entries.</a>
</p>

<?php } //end if statement

else {
	foreach($e as $entry) { ?>
	
		<p>
			<a href="?id=<?php echo $entry['id']; ?>">
				<?php echo $entry['title']; ?>
			</a>
		</p>

<?php
	} ?>
	<p class="backlink">
		<a href="admin.php?page=<?php echo $page; ?>">Post New Entry</a>
	</p>
	
<?php }

} catch(Exception $e) {
	echo $e->getMessage();
}
?>

</div>




<?php include './footer.php'; ?>