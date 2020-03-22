<?php
include_once 'dbh.php';
session_start();
if(!isset($_SESSION['email']))
	header("Location: login.html?Can't go back");
?>
