<?php

// Add a new lesson to the DB!

// Quicktrim
$tPost = array();
foreach($_POST as $i => $postItem) {
	$tPost[$i] = trim($postItem);
}

$errors = array();

// Super-fast validation first
if(empty($tPost['webname'])) {
	$errors[] = 'Webname cannot be left blank.';
}
if(empty($tPost['name'])) {
	$errors[] = ('Name cannot be left blank.');
}
if(empty($tPost['section'])) {
	$errors[] = ('Section cannot be left blank.');
}
if(empty($tPost['order'])) {
	$errors[] = ('Order cannot be left blank.');
}
if(empty($tPost['content'])) {
	$errors[] = ('Content cannot be left blank.');
}
if(!preg_match('/^([0-9A-Za-z_-]+)$/', $tPost['webname'])) {
	$errors[] = ('Webname should only contain alphanumeric characters, underscores, and hyphens.');
}
if(!preg_match('/^([0-9]+)$/', $tPost['section'])) {
	$errors[] = ('Section must be a positive integer.');
}
if(!preg_match('/^([0-9]+)$/', $tPost['order'])) {
	$errors[] = ('Order must be a positive integer.');
}

// If there were any errors, print them out and abort the insert.
if($errors) {
	echo '<h1>You have issues!</h1>
	<ol>';
	foreach($errors as $error) {
		echo '<li>' . $error . '</li>';
	}
	echo '</ol>';
	die();
}

require('../includes/config.php');
$db = null;
try {
	$dsn = ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
	$db = new PDO($dsn, DB_USER, DB_PASS);
}
catch (PDOException $e)  {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
$db = 
$query = $db->prepare("INSERT INTO `lessons` (`webname`, `name`, `section`, `order`, `content`) VALUES (?, ?, ?, ?, ?)");
$query->bindParam(1, $tPost['webname'], PDO::PARAM_STR);
$query->bindParam(2, $tPost['name'], PDO::PARAM_STR);
$query->bindParam(3, $tPost['section'], PDO::PARAM_INT);
$query->bindParam(4, $tPost['order'], PDO::PARAM_INT);
$query->bindParam(5, $tPost['content'], PDO::PARAM_STR);
if($query->execute()) {
	echo 'Yay! The new content was added successfully! :)';
	echo '<hr/><a href="../admin/lessons/">Go add more!</a>';
} else {
	echo 'Aww :( THe new content failed to insert :(';
}



?>