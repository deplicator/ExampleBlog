<?php
include 'header.php';
include_once 'inc/functions.inc.php';
include_once 'inc/db.inc.php';

//Open a database connection
$db = new PDO(DB_INFO, DB_USER, DB_PASS);

//Determine if entry ID was passed in URL
$id = (isset($_GET['id'])) ? (int) $_GET['id'] : null;

//Load enties
$e = retrieveEntries($db, $id);

//Get fulldisp flag
$fulldisp = array_pop($e);

//Sanatize entry data
$e = sanitizeData($e);

?>

<h1>Example Blog</h1>

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
		<a href="admin.php">Post New Entry</a>
	</p>
	
<?php }
?>

</div>




<?php include './footer.php'; ?>