<?php require_once('header.php');?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script
        src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet"
        href="http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <link rel="stylesheet"
        href="http://code.jquery.com/ui/1.11.4/themes/flick/jquery-ui.css">
        <!-- Main row -->
        <div class="row">
        <div class="container box">
			<h1 align="center">Gestion des Reservations</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
				<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg"  >Ajouter</button>				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						
							<th width="20%">Nom Complet</th>
							<th width="10%">CIN</th>
                            <th width="10%">Telephone</th>
                            <th width="15%">Email</th>
                           
							<th width="15%">Nombre De Jours</th>
							
                       
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
		


    <!-- /.content -->
  </div>



  






  <!-- /.control-sidebar -->
</div>
<?php require_once('footer.php');?>





<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- #endregion -->
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_booking.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	
	

	

	
	
});
</script>



 


 