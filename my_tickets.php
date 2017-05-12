<?php

require('lib/class.mdb.php');
require('lib/class.ticket.php');
require('lib/class.auth.php');
require('lib/session_handler.php');
require('lib/helpdesk_db_handler.php');
require('lib/header.php');

if(isset($_GET['ticket_sent'])){
    $ticket->send_ticket($_POST['description'], $_POST['room'], $_SESSION['auth_id']);
}

?>
<html>
    <head>
        <title>Palīdzības sistēma | LLU</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script type="text/JavaScript" src="js/bootstrap.min.js"></script>
        <script type="text/JavaScript" src="js/npm.js"></script>
    </head>
    <body>
        <?php show_header($auth); ?>
        <?php $ticket->user_tickets();?>
    </body>
</html>
