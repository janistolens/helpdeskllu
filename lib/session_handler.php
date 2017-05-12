<?php 

session_start();

$db = new mdb('root', '', 'helpdesk_database', 'localhost');
$auth = new Auth($db);
if (isset($_GET['logout'])) {
	$auth->logout();
	header('Location: ../index.php');
	exit;
}
if (isset($_GET['ticket_id']))
{
	$ticket_id = $_GET['ticket_id'];
}
