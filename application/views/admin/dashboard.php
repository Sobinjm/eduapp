
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
<div class="container">  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Updates
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Updates</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
			<div class="box box-danger">
				<div class="box-header with-border">
				  <!-- <h3 class="box-title">All Student Information</h3> -->
				</div>
				<div class="table_padding">
					<table id="admin_table" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
							<th>#</th>
								<th>Description</th>
								<th>Status</th>
								<th>Name</th>
								<th>Lesson/Slide</th>
								<th>Date/Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$slno=0;
									foreach($result as $notify) {
										$slno++;?>
								<tr>
								<td><?php echo $slno; ?></td>
									<td><?php echo $notify['user_type']; ?></td>
									<td><?php echo $notify['status']; ?></td>
									<td><?php echo $notify['name']; ?></td>
									<td><?php echo $notify['course']; ?></td>
									<td><?php echo date('d-m-Y|h:i:sa',strtotime($notify['created_at'])); ?></td>
									<td><!--<span class="badge bg-red">Reset</span>--><a href="<?php echo $notify['url']; ?>">View</a></td>
								</tr>
								<?php } ?>
						</tbody>
						<tfoot>
							<tr>
							<th>#</th>
								<th>Description</th>
								<th>Status</th>
								<th>Name</th>
								<th>Lesson/Slide</th>
								<th>Date/Time</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
</div>  
	<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Edit Student</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
			<form class="edit_form">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_name">Name</label>
					  <input type="textbox" class="form-control" id="edit_name" placeholder="Enter Name">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_email">Email address</label>
					  <input type="email" class="form-control" id="edit_email" placeholder="Enter Email">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_email">Student Id Number</label>
					  <input type="textbox" class="form-control" id="edit_student_id_no" placeholder="Enter Student Id">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_email">Emirates Id Number</label>
					  <input type="textbox" class="form-control" id="edit_emirates_id_no" placeholder="Enter Emirates Id">
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_contact">Contact</label>
					  <input type="textbox" class="form-control" id="edit_contact" placeholder="Enter Contact">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="edit_password">Change Password</label>
					  <input type="password" class="form-control" id="edit_password" placeholder="Enter Password">
					  <small>Leave blank if you want to continue with your earlier password</small>
					</div>
				</div>
			</form>
			</div>
			<div class="overlay">
              <i class="fa fa-refresh fa-spin"></i> Please Wait..
            </div>
		  </div>
		  <div class="modal-footer">
			<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
			<input type="hidden" name="edit_eid" id="edit_eid" />
			<button type="button" class="btn btn-success" id="submit_edit">Save changes</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
   		
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>
	 <?php 
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
	?>
	<script>
		$(document).ready(function() 
			{
				$('#admin_table').DataTable();
				
				$( "#add_form" ).submit(function( event ) {
					  
					var staff_name = $('#staff_name').val();
					var staff_email = $('#staff_email').val();
					var student_id_no = $('#student_id_no').val();
					var emirates_id_no = $('#emirates_id_no').val();
					var staff_cnumber = $('#staff_cnumber').val();
					var staff_password = $('#staff_password').val();
					  
					if(staff_name == '')
					{	
						swal('Name should not be empty');
						$('#staff_name').addClass("error");
						return false;
					}
					else 
					{
						$('#staff_name').addClass("success");
					}
					
					if(staff_email == '')
					{	
						swal('Email should not be empty');
						$('#staff_email').addClass("error");
						return false;
					}
					else 
					{
						if( !validateEmail(staff_email)) 
							{ 
								swal('Email address not in correct format.');
								$('#staff_email').addClass("error");
								return false;
							}
						else
							{
								$('#staff_email').addClass("success");
							}	
						
					}
					
					if(staff_cnumber == '')
					{	
						swal('Contact number should not be empty');
						$('#staff_cnumber').addClass("error");
						return false;
					}
					else 
					{
						$('#staff_cnumber').addClass("success");
					}
					
					if(staff_password == '')
					{	
						swal('Password should not be empty');
						$('#staff_password').addClass("error");
						return false;
					}
					else 
					{
						/*
						if($('#staff_password').length < 5)
						{
							swal('Password should be more than 4 alphanumeric characters.');
							$('#staff_password').addClass("error");
							return false;	
						}
						else 
						{*/
							$('#staff_password').addClass("success");
						/*
						}
						*/						
					}
					
					$.post( "<?php echo base_url(); ?>admin/student/add", { 
								staff_name: staff_name, 
								staff_email: staff_email,
								student_id_no: student_id_no,
								emirates_id_no: emirates_id_no,
								staff_cnumber: staff_cnumber,
								staff_password: staff_password,
								<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"								
							}, function(data) {
								
							$( "#add_form" ).trigger("reset");	
							swal({title: "Message", text: data, type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
							})
							.fail(function() {
								swal('Something went wrong. Please check whether you are connected to Internet.');
							})	
					event.preventDefault();
				});
				
				
				$('.delete_now').click(function(){
					
					var delid = $(this).attr("data-id");
					Swal({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete Student!'
					}).then((result) => {
					  if (result.value) {
						
						$.post( "<?php echo base_url(); ?>admin/student/delete", { 
									id: delid,
									<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"								
								}, function(data) {
							swal({title: "Message", text: data, type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
						})
						.fail(function() {
							swal('Something went wrong. Please check whether you are connected to Internet.');
						})
						
					  }
					})
					
					
				});
				
				
				$('.edit_now').click(function(){
					var etid = $(this).attr("data-id");
					$.post("<?php echo base_url(); ?>admin/student/getstaff", { 
									id: etid,
									<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"							
								}, function(data) {
									
									if(data == 'empty_id')
									{
										swal({title: "Message", text: 'Sorry! We are not able to process student information concerned with this edit', type: 
										"info"}).then(function(){ 
										   location.reload();
										   }
										);
									}
									else 
									{
										$(".edit_form").trigger("reset");
										var obj = JSON.parse(data);
										$('#edit_eid').val(etid);
										$('#edit_name').val(obj['0'].name);
										$('#edit_email').val(obj['0'].email);
										$('#edit_student_id_no').val(obj['0'].student_idno);
										$('#edit_emirates_id_no').val(obj['0'].emirates_idno);
										$('#edit_contact').val(obj['0'].contact_number);
										$('#edit_modal').modal('show');
										$('.overlay').hide();
									}
						})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process student information concerned with this edit', type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
						})
				});
				
				$('#submit_edit').click(function(){
					
					var edit_eid = $('#edit_eid').val();
					var edit_name = $('#edit_name').val();
					var edit_email = $('#edit_email').val();
					var edit_cnumber = $('#edit_contact').val();
					var edit_password = $('#edit_password').val();
					
					var edit_student_id_no = $('#edit_student_id_no').val();
					var edit_emirates_id_no = $('#edit_emirates_id_no').val();
					 
					if(edit_name == '')
					{	
						swal('Name should not be empty');
						$('#edit_name').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_name').addClass("success");
					}
					
					if(edit_email == '')
					{	
						swal('Email should not be empty');
						$('#edit_email').addClass("error");
						return false;
					}
					else 
					{
						if( !validateEmail(edit_email)) 
							{ 
								swal('Email address not in correct format.');
								$('#edit_email').addClass("error");
								return false;
							}
						else
							{
								$('#edit_email').addClass("success");
							}	
						
					}
					
					if(edit_cnumber == '')
					{	
						swal('Contact number should not be empty');
						$('#edit_cnumber').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_cnumber').addClass("success");
					}
					
					$.post("<?php echo base_url(); ?>admin/student/updatestaff", { 
									id: edit_eid,
									name: edit_name, 
									email: edit_email, 
									edit_student_id_no: edit_student_id_no, 
									edit_emirates_id_no: edit_emirates_id_no, 
									staff_number: edit_cnumber, 
									password: edit_password,
									<?=$csrf['name'];?>: '<?=$csrf['hash'];?>'
								}, function(data) {
									
										swal({title: "Message", text: data, type: 
										"info"}).then(function(){ 
										   location.reload();
										   }
										);
						})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process student information concerned with this edit', type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
						})
					
					
					
					
					
				});
				
				/* Validation Email*/
				function validateEmail($email) {
					  var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					  return emailReg.test( $email );
					}
				
			});
	</script>