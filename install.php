<!DOCTYPE html>
<?php
if (!empty($_POST['title']) && !empty($_POST['path']) && !empty($_POST['dblocation'])
        && !empty($_POST['dbname']) && !empty($_POST['dbuser']) && !empty($_POST['dbpass'])) {

    $title = $_POST['title'];
    $path = $_POST['path'];
    $dblocation = $_POST['dblocation'];
    $dbname = $_POST['dbname'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    
$file = './new_config.php';
$contents = '
    <?php
    define(\'BLOGTITLE\'. \'.$title.\');
    define(\'URL\', \'.$path.\');
    define(\'DB_INFO\', \'mysql: host='.$dblocation.'; dbname='.$dbname.'\');
    define(\'DB_USER\', \''.$dbuser.'\');
    define(\'DB_PASS\', \''.$dbpass.'\');
'; 

file_put_contents($file, $contents);

return false;

}

?>

<html>
    <head>
        <title>Install Example Blog</title>
        <link rel="stylesheet" type="text/css" href="css/default.css" />
    </head>
    <body>
        <h1>Example Blog</h1>

        <form method="post">
            <fieldset>
                <legend>Setup Your Own Example Blog</legend>
                <p>Change the values in the text boxes to your own. Hover over 
                    labels for details.</p>
                <label><a title="Whatever you want the title to be.">Blog Title</a>
                    <input type="text" name="title" maxlength="150" value="Example Blog">
                </label>
                <label><a title="Location of root path to your blog, requires the http:// and no ending slash">URL</a>
                    <input type="text" name="path" maxlength="150" value="http://localhost/ExampleBlog">
                </label>
                <label><a title="Usually this is localhost, but if yours is different change it.">Database Location</a>
                    <input type="text" name="dblocation" maxlength="150" value="localhost">
                </label>
                <label><a title="The name of the table in the chosen database.">Database Table Name</a>
                    <input type="text" name="dblocation" maxlength="150" value="entries">
                </label>
                <label><a title="Root is okay if you are on a local server or playing around, but I didn't tell you to use it.">Database User</a>
                    <input type="text" name="dbuser" maxlength="150" value="root">
                </label>
                <label><a title="I hope you know it because I don't.">Database Password</a>
                    <input type="text" name="dbpass" maxlength="150">
                </label>
                <p>If everything succeeds delete this install.php file.</p>
                <input type="submit" name="submit" value="Install">
            </fieldset>
        </form>

    </body>
</html>


<!--
CREATE TABLE IF NOT EXISTS newauthor
( aut_id varchar(8), 
aut_name varchar(50),
country varchar(25),
home_city varchar(25) NULL );
-->