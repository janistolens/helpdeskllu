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
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/JavaScript" src="js/bootstrap.js"></script> 
		 <script type="text/JavaScript" src="js/npm.js"></script>
		 <script src="js/jquery.min.js"></script>
		 <script src="js/jquery.validate.min.js"></script>
	</head>
	<body>
	<?php 
	
		if($auth->id){
			
			if($auth->role==='admin')
			{
				show_admin_header($auth);
			}
			else {
				show_header($auth);
			}

			
			
			if(isset($_GET['new_ticket'])){
				
				include('new_ticket.php');
				
			}elseif(isset($_GET['my_tickets'])){
					
					$ticket->user_tickets();
			}else{
				
				//include('my_tickets.php');  // te atvērsies defautā lappa vari te likt kautkādu dašbordu
			}
			
		
		}else{
		?>
	
	
		<div class='row'>
			<div class='col-sm-5 col-sm-offset-4'>
				<h3>Tehniskās palīdzības sistēma | LLU</h3>
			</div>
		</div>
		
	
			<?php
				if($auth->error ==1) {
					echo '<div class="alert alert-danger" role="alert">';
					echo '<p><strong>!!!</strong> Nepareizs lietotājvārds un/vai parole</p>';
					echo '</div>';
				}
			?>
			
		<form class="form-horizontal" action="" method="post">
  			<div class="form-group">
    			<label class="col-sm-4 control-label">Lietotājvārds</label>
    				<div class="col-sm-4">
      					<input type="text" class="form-control" id="inputEmail3" placeholder="Lietotājvārds" name="username">
    				</div>
  			</div>
  			<div class="form-group">
    			<label  class="col-sm-4 control-label">Parole</label>
   					<div class="col-sm-4">
      					<input type="password" class="form-control" id="inputPassword3" placeholder="Parole" name="password">
    				</div>
  			</div>		
  			<div class="form-group">
    			<div class="col-sm-offset-4 col-sm-10">
     					<button type="submit" class="btn btn-default" value="login">Pieteikties</button>
   				</div>
 			 </div>
		</form>
		<?php
			}
		?>
		
	</body>
</html>
