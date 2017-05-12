<?php

require('../lib/class.mdb.php');
require('../lib/class.auth.php');
require('../lib/session_handler.php');
require('../lib/header.php');

if(empty($auth->id))
{
    header('Location: index.php');
}
if($auth->user_role_check() !== 'admin')
{
    header('Location: ../home.php');
}
?>
<html>
    <head>
        <title>Palīdzības sistēma | LLU</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <script type="text/JavaScript" src="../js/bootstrap.min.js"></script>
        <script type="text/JavaScript" src="../js/npm.js"></script>
    </head>
    <body>
            <?php show_admin_header($auth); ?>
    </body>
</html>
