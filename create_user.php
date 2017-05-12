<?php

//ieladejam vajadzīgos failus
require('lib/class.mdb.php');
require('lib/class.auth.php');
require('lib/session_handler.php');


if (isset($_POST['username']) && isset($_POST['password'])) {

	$login = $db->real_escape_string($_POST['username']);
	$passwd = $auth->pwd($_POST['password']);

	if ($db->query("INSERT INTO `users` (`username`,`password`,`created`) VALUES ('$login', '$passwd', NOW())")) {
		echo '<p>Lietotājs ' . htmlspecialchars($_POST['username']) . ' izveidots!</p>';
	}
}
?>

<form action="" method="post">

	login: <input type="text" name="username" /><br />
	pass: <input type="password" name="password" /><br />
	<input type="submit" value="izveidot" />

</form>


