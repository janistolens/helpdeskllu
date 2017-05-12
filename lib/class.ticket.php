<?php

class Ticket {

	function Ticket($db) {
        $this->id = 0;
        $this->error = 0;
        $this->db = $db;
	}
    
    function send_ticket($desc, $room) {

		if (isset($_POST['description']) && isset($_POST['room'])) {
            $desc = $this->db->real_escape_string($desc);
	        $room = $this->db->real_escape_string($room);     
            $user_id = $this->db->real_escape_string($_SESSION['auth_id']);
	        if ($this->db->query("INSERT INTO `tickets` (`description`,`room`, `user_id`) VALUES ('$desc', '$room', '$user_id')")) {
            ?>
            <script>
                if (confirm('Problēma veiksmīgi iesniegta.')) {
                   // window.location.href = "new_ticket.php";
                } else {
                   // window.location.href = "new_ticket.php";
                }
            </script>
            <?php
	        } 
        }    
    }   

    function user_tickets(){
       $row = $this->db->get_results("SELECT * FROM `tickets` WHERE `user_id` = '" . intval($_SESSION['auth_id']) . "'");
       ?>
        <div class="col-sm-offset-1 col-sm-9">
        <h1>Problēmas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Apraksts</th>
                    <th>Telpa</th>
                </tr>
            </thead>
        <tbody>
       <?php
       foreach($row as $value){
            echo "<tr>";
            echo "<td>" . $value->description . "</td>";
            echo "<td>" . $value->room . "</td>";
            echo "</tr>";
        } 
        ?>
        </tbody>
        </table>
        </div>
        <?php         
    }
	
	  function ajax_call_room_id($room){
		$row = $this->db->get_results("SELECT * FROM `inventory` WHERE `user_id` = '$room'");
		   foreach($row as $value){
				echo "<option>".$value->inventory_number."</option>";
			} 
                
    }

    function all_tickets() {
        $ticket_row = $this->db->get_results("SELECT 
        `room`, `s_name`, `p_name`, `u_name`, `t_id`, `description`, `u_surname`
        FROM `tickets` 
        INNER JOIN `status` ON `status`.s_id = `tickets`.status_id
        INNER JOIN `priorities` ON `priorities`.p_id = `tickets`.priority_id
        INNER JOIN `users` ON `users`.id = `tickets`.user_id
        ORDER BY `tickets`.`t_id` DESC");
        ?>
        <div class="col-sm-offset-1 col-sm-9">
        <h1>Problēmas</h1>
        <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr><th>Apraksts</th><th>Telpa</th><th>Statuss</th><th>Prioritāte</th><th>Lietotājs</th></tr>
        </thead>
        <tbody data-link="row" class="rowlink">
        <?php
            foreach($ticket_row as $ticket){
            echo "<tr>";
            echo "<td><a style='text-decoration:none; color: black;' href='ticket.php?ticket_id=" . $ticket->t_id . "'>" . $ticket->description . "</td></a>";
            echo "<td>" . $ticket->room . "</td>";
            echo "<td>" . $ticket->s_name . "</td>";
            echo "<td>" . $ticket->p_name . "</td>";
            echo "<td>" . $ticket->u_name . " " . $ticket->u_surname . "</td>";
            echo "</tr>";
        } 
        ?>
        </tbody>
        </table>
        </div>
        <?php  
    }

        function single_ticket($id){
            $ticket = $this->db->get_row("SELECT 
            `t_id`, `description`, `room`, `user_id`, `status_id`,
            `priority_id`, `s_id`, `s_name`, `p_id`, `p_name`,
            `id`, `username`, `u_name`, `u_surname`, `created`, `t_created`,
            `accessed` FROM `tickets`
            INNER JOIN `status` ON `status`.s_id = `tickets`.status_id
            INNER JOIN `priorities` ON `priorities`.p_id = `tickets`.priority_id
            INNER JOIN `users` ON `users`.id = `tickets`.user_id
            WHERE `tickets`.t_id = $id ");
            ?>
        <div class="container">
            <div class="jumbotron">
                    
                 <h2>Problēmas apraksts</h2> 
                 <?php print_r($ticket); ?>
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
            
            <?php      
        }

        function sample_ticket() {
        $ticket_row = $this->db->get_results("SELECT `room` FROM `tickets` 
        INNER JOIN `status` ON `status`.s_id = `tickets`.status_id
        INNER JOIN `priorities` ON `priorities`.p_id = `tickets`.priority_id
        INNER JOIN `users` ON `users`.id = `tickets`.user_id
        ORDER BY `tickets`.`t_id` DESC");
        ?>
        <div class="col-sm-offset-1 col-sm-9">
        <h1>Problēmas</h1>
        <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr><th>Apraksts</th><th>Telpa</th><th>Statuss</th><th>Prioritāte</th><th>Lietotājs</th></tr>
        </thead>
        <tbody data-link="row" class="rowlink">
        <?php
            foreach($ticket_row as $ticket){
            echo "<tr>";
            echo "<td><a style='text-decoration:none; color: black;' href='?ticket_id=2" . $ticket->t_id . "'>" . $ticket->description . "</td></a>";
            echo "<td>" . $ticket->room . "</td>";
            echo "<td>" . $ticket->s_name . "</td>";
            echo "<td>" . $ticket->p_name . "</td>";
            echo "<td>" . $ticket->u_name . " " . $ticket->u_surname . "</td>";
            echo "</tr>";
        } 
        ?>
        </tbody>
        </table>
        </div>
        <?php  
    }
}   

