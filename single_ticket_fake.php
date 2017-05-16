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


//ja tiek padots post username un password, mēģinam ielogot lietotāju
if (isset($_POST['username']) && isset($_POST['password'])) {
	$auth->login($_POST['username'], $_POST['password']);
	//$auth->user_role_redirect();
}

//izlogošanās
if (isset($_GET['logout'])) {
	$auth->logout();
	header('Location: index.php');
	exit;
}
?>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/JavaScript" src="js/bootstrap.js"></script> 
		 <script type="text/JavaScript" src="js/npm.js"></script>
		 <script src="js/jquery.min.js"></script>
		 <script src="js/jquery.validate.min.js"></script>
	</head>
        <form class="form-horizontal"  action="index.php?new_ticket&ticket_sent" method="post" name="new_ticket">
  			<div class="form-group">
    			
    				<div class="col-sm-offset-3 col-sm-5">
						    <label for="inputDescription3">Problēmas apraksts:</label>
 						    <label class="form-control" rows="5" id="inputDescription3" name="description">Monitors izslēdzās, vairs neslēdzas iekšā</label>
    				</div>
  			</div>
				<div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Ierīces veids: </label>
      <label class="form-control" rows="5" id="inputDescription3" name="description">Monitors</label>
    				</div>
  			</div>		
			  				<div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Ierīce: </label>
<label class="form-control" rows="5" id="inputDescription3" name="description">SAMSUNG LC26F389FHUXEN (ITF_M2131099)</label>
    				</div>
  			</div>	
			  <div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Lietotājs: </label>
<a href="#"><label class="form-control" rows="5" id="inputDescription3" name="description">Jānis Tolēns</label>
    				</a></div>
  			</div>
			  			  <div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Programmatūra: </label>
<a href="#"><label class="form-control" rows="5" id="inputDescription3" name="description">Noklikšķiniet, lai apskatītu</label>
    				</a></div>
  			</div>		
  			<div class="form-group">
    			<div class="col-sm-offset-5 col-sm-5">
     					<button type="submit" class="btn btn-default" value="send_ticket">Nosūtīt</button>
   				</div>
 			 </div>
		</form>
<script src="js/form-validation.js"></script>
