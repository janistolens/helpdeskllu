<?php

require('../lib/class.mdb.php');
require('../lib/class.ticket.php');
require('../lib/class.auth.php');
require('../lib/session_handler.php');
require('../lib/helpdesk_db_handler.php');
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
            
        <?php //$ticket->single_ticket($ticket_id); ?>
        <div class="container">
            <div class="jumbotron">
                    
                 <h2>Problēmas apraksts</h2> 

                        <form class="form-horizontal">
                                <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">Disabled</label>
                                <div class="col-sm-10">
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
                                </div>
                                </div>
                        </form>
            </div>
        </div>
    </body>
</html>