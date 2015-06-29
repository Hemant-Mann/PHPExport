<?php
require 'db.php';
$db = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($db->connect_error) {
	$error = $db->connect_error;
} else {
	$sql = 'SELECT * FROM products';
	$result = $db->query($sql);
	if ($db->error) {
		$error = $db->error;
	}
}
function getRow($result) {
	return $result->fetch_assoc();
}