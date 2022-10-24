<?php require_once('header.php');
require_once('db.php');
?>

<link rel="stylesheet" href="boostrap.min.css" />
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Main row -->
        <div class="row">
        <div class="container box">
			<h1 align="center">Gestion des Chambres</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
				<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg"  >Ajouter</button>				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="20%">Nom Riad</th>
							<th width="10%">Numero Chambre</th>
                            <th width="15%">Nombre Place</th>
							<th width="15%">Categorie</th>
							
                            <th width="5%">Modifier</th>
							<th width="5%">Supprimer</th>
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
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Chambre</h4>
				</div>
				<div class="modal-body">
					
					<label>Enter Riad</label>

                    <select name="hotel" id="hotel" class="form-control">
                   
    <option disabled selected>-- Select Riad --</option>
    <?php
$db = mysqli_connect("localhost","root","rootroot","riad");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}        $records = mysqli_query($db, "SELECT * From hotel");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['libelle'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
					<br />
                    <label>Enter Categorie</label>

<select name="categorie" id="categorie" class="form-control">

<option disabled selected>-- Select Categorie --</option>
<?php
      $records = mysqli_query($db, "SELECT * From categorie");  // Use select query here 

while($data = mysqli_fetch_array($records))
{
echo "<option value='". $data['id'] ."'>" .$data['libelle'] ."</option>";  // displaying data in option menu
}	
?>  
</select>
<br />
                    <label>Enter Numero Chambre</label>
					<input type="text" name="number" id="number" class="form-control" />
					<br />
                    <label>Enter Nombre Place</label>
					<input type="text" name="nbr_place" id="nbr_place" class="form-control" />
					<br />
                
					<label>Select Hotel Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- ./wrapper -->




<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- #endregion -->
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add Chambre");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_chambre.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var firstName = $('#hotel').val();
		var lastName = $('#categorie').val();
        
		var lastName = $('#number').val();
        var firstName = $('#nbr_place').val();
		
		
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(firstName != '' && lastName != '')
		{
			$.ajax({
				url:"insert_chambre.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single_chambre.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#hotel').val(data.hotel);
				$('#categorie').val(data.categorie);
                $('#number').val(data.number);
				$('#nbr_place').val(data.nbr_place);
               
				$('.modal-title').text("Edit Hotel");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete_chambre.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>



 


 