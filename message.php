<?php require_once('headers.php');?>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Main row -->
        <div class="row">
        <div class="container box">
			<h1 align="center">Gestion des Messages</h1>
			<br />
			<div class="table-responsive">
				<br />
				<br><br>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							
							<th width="20%">Nom Complet</th>
							<th width="10%">Email</th>
                            <th width="15%">Subject</th>
							<th width="15%">Message</th>
							
						</tr>
					</thead>

                    <tbody>

                    <?php  $db = mysqli_connect("localhost","root","rootroot","riad");


if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
} 
$records = mysqli_query($db, "select * from message");  // Use select query here 

while($data = mysqli_fetch_array($records))
{
?>
						<tr>
							
							<td ><?php echo $data['name'];?></td>
							<td ><?php echo $data['email'];?></td>
                            <td ><?php echo $data['subject'];?></td>
							<td ><?php echo $data['message'];?></td>
							
						</tr>
<?php }?>

                  
					</tbody>
				</table>
				
			</div>
		</div>
		


    <!-- /.content -->
  </div>



  






  <!-- /.control-sidebar -->
</div>
<?php require_once('footer.php');?>
