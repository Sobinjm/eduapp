
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <style>
	.dl-horizontal dt {
		text-align: left;
	}	
  </style>
<div class="container">  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider Preview
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slide Preview</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="box box-danger">
				<?php 
					if(!empty($result))
						{ 
				?>
				<div class="box-header with-border">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $result['0']['slide_title']; ?></h3>
					</div>	
					<?php 
						//echo '<pre>';
						//print_r( $result['0']);
						//echo '</pre>';
					?>
					<div class="table_padding">
					</div>
						<div align="center" class="embed-responsive embed-responsive-16by9">
							<?php 
								if($result['0']['slide_mode'] == 'video' || $result['0']['slide_mode'] == 'audio' )
								{									
							?>
							<video id="my-player" class="video-js vjs-big-play-centered" data-setup='{"fluid": true}' controls preload="auto" poster="<?php echo base_url(); ?>front/images/elearnvid.png">
							  <source src="<?php echo base_url().$result['0']['slide_file']; ?>" type="video/mp4"></source>
							  <p class="vjs-no-js">
								To view this video please enable JavaScript, and consider upgrading to a
								web browser that
								<a href="https://videojs.com/html5-video-support/" target="_blank">
								  supports HTML5 video
								</a>
							  </p>
							</video>
							<?php
								} 
								else
								{
							?>		
								<img src="<?php echo base_url().$result['0']['slide_file']; ?>" class="img-responsive"/>
							<?php 		
								}
							?>
						</div>
						<div class="table_padding bordered_video_desc">
							<?php echo $result['0']['slide_description']; ?>
						</div>
					<script>
						var options = {};
						var player = videojs('my-player', options, function onPlayerReady() {
						  videojs.log('Your player is ready!');
							// In this context, `this` is the player that was created by Video.js.
						  this.play();
							// How about an event listener?
						  this.on('ended', function() {
							videojs.log('Awww...over so soon?!');
						  });
						});
					</script>	
				</div>
				<?php 
						}
						else
						{
							echo '<div class="box-header with-border"><h3 class="box-title">No slide found</h3></div>';
						}							
				?>				
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
			<div class="box box-danger">
				<?php 
					if(!empty($result))
						{ 
				?>
				<div class="box-header with-border">
				  <h3 class="box-title">Slider Information</h3>
				</div>
				<div class="table_padding">
					<dl class="dl-horizontal">
						<dt>Slide Title:</dt>
						<dd><?php echo $result['0']['slide_title']; ?></dd>
						<dt>Slide Mode:</dt>
						<dd><?php echo $result['0']['slide_mode']; ?></dd>
						<dt>Slide Duration:</dt>
						<dd><?php echo $result['0']['slide_duration']; ?></dd>
						<dt>Slide Order:</dt>
						<dd><?php echo $result['0']['slide_order']; ?></dd>
						<dt>Created By:</dt>
						<dd><?php echo $result['0']['name']; ?></dd>
						<dt>Created On:</dt>
						<dd><?php echo date('d-m-Y',strtotime($result['0']['created_on'])); ?></dd>
						
					</dl>	
				</div>
				<?php 
					}
				else
					{
						echo '<div class="box-header with-border"><h3 class="box-title">No slide found</h3></div>';
					}							
				?>
			</div>
		</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
</div>  
	
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
					
					$.post( "<?php echo base_url(); ?>admin/faculty/add", { 
								staff_name: staff_name, 
								staff_email: staff_email,
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
					  confirmButtonText: 'Yes, delete trainer!'
					}).then((result) => {
					  if (result.value) {
						
						$.post( "<?php echo base_url(); ?>admin/faculty/delete", { 
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
					$.post("<?php echo base_url(); ?>admin/faculty/getstaff", { 
									id: etid,
									<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"							
								}, function(data) {
									
									if(data == 'empty_id')
									{
										swal({title: "Message", text: 'Sorry! We are not able to process trainer information concerned with this edit', type: 
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
										$('#edit_contact').val(obj['0'].contact_number);
										$('#edit_modal').modal('show');
										$('.overlay').hide();
									}
						})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process trainer information concerned with this edit', type: 
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
					
					$.post("<?php echo base_url(); ?>admin/faculty/updatestaff", { 
									id: edit_eid,
									name: edit_name, 
									email: edit_email, 
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
							swal({title: "Message", text: 'Sorry! We are not able to process trainer information concerned with this edit', type: 
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