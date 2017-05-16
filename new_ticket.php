
        <form class="form-horizontal"  action="index.php?new_ticket&ticket_sent" method="post" name="new_ticket">
  			<div class="form-group">
    			
    				<div class="col-sm-offset-3 col-sm-5">
						    <label for="inputDescription3">Problēmas apraksts:</label>
 						    <textarea class="form-control" rows="5" id="inputDescription3" name="description"></textarea>
    				</div>
  			</div>
  			<div class="form-group">
    			
   					<div class="col-sm-offset-3 col-sm-5">
      					<label  class="control-label">Kabinets</label>
                        <input type="text" class="form-control" id="inputRoom3" placeholder="Kabinets" name="room">
    				</div>
  			</div>
				<div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Izvēlieties ierīces veidu: </label>
      <select class="form-control" id="sel1" name="inv_type">
	  	<option value=''>Ierīču veidi</option>
		<script>
		jQuery('#inputRoom3').on('input', function() {
			$.ajax({
			type : 'POST',
  			url: 'lib/new_ticket_ajax_php/call_inventory_type.php',
			dataType : 'html',
  			data: {
      		room : $('#inputRoom3').val()
  			},
			beforeSend : function() {
				$("#sel1").html("<option value=''>Ierīču veidi</option>");
			},
  			success : function(data) {
			$("#sel1").append("Your input: "+data)
		}
		});
		});
		</script>
      </select>
    				</div>
  			</div>		
			  				<div class="form-group">
   					<div class="col-sm-offset-3 col-sm-5">
      <label for="sel1">Izvēlieties ierīci: </label>
      <select class="form-control" id="sel2" name="inventory">
	  	<option value=''>Kabinetā esošās ierīces:</option>
        <option>TEST MONITOR 37 1 (Inventāra numurs)</option>
        <option>TEST MONITOR 37 2 (Inventāra numurs)</option>
      </select>
    				</div>
  			</div>	
  			<div class="form-group">
    			<div class="col-sm-offset-5 col-sm-5">
     					<button type="submit" class="btn btn-default" value="send_ticket">Nosūtīt</button>
   				</div>
 			 </div>
		</form>
<script src="js/form-validation.js"></script>
