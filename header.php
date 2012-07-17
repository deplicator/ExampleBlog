<!DOCTYPE html>
<?php
require 'config.php';
include_once 'inc/functions.inc.php';
include_once 'inc/db.inc.php';
?>

<html>

    <head>
        <title><?php echo BLOGTITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/default.css" />
    </head>

    <body>
        <h1>Example Blog</h1>
        <nav>
            <a href="<?php echo URL; ?>/blog">Blog</a>
            <a href="<?php echo URL; ?>/about">About</a>
        </nav>