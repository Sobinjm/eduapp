
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
				// print_r($comments);
					if(!empty($result))
						{ 
							//print_r($result);
				?>
				<div class="box-header with-border">
					<div class="box-header with-border">
						
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<h3 class="box-title"><?php echo $result['0']['slide_title']; ?></h3>
				  </div>
					<?php if($this->session->userdata('role')!=0)
					{
						?>
					
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<button class="btn btn-block btn-danger btn-flat" data-placement="bottom" data-toggle="popover" id="slide_comment" data-container="body" data-placement="right" type="button" data-html="true">Add Comments</button>
					
  <div id="popover-content-slide_comment" class="hide">
	<div>
	
	</div>
		

      <form class="form-inline" name="comment_form" id="comment_form" role="form">
        <div class="form-group"> 
				<textarea cols='30' rows='8' name="comment_value" id="comment_value"  onkeyup="testCode(this)" placeholder="Enter the comment"></textarea>
				<input type="hidden" name="new_comment" id="new_comment" value="">
	<input type="hidden" name="slide_id" id="slide_id" value="<?php echo $slide_id; ?>">
	<input type="hidden" name="added_by" id="added_by" value="<?php echo $user_data; ?>">
          <input class="btn btn-success btn-xs" id="add_comment" type="button" value="Post Comment" /> 
        </div>
      </form>
			
    </div>

	
				  </div>
					<?php
						}
						?>
					</div>	
					<?php 
					// print_r($admin);
					// print_r($this->session->userdata('role'));
						// echo '<pre>';
						// print_r( $result['0']);
						// echo '</pre>';
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
						<div class="table_padding bordered_video_desc" <?php if (strpos($result['0']['slide_description'], 'dir="rtl"') != false) {    echo 'dir="rtl"';
} ?> >
							<?php echo $result['0']['slide_description']; ?>
						</div>
					<script>
						var options = {};
						// var player = videojs('my-player', options, function onPlayerReady() {
						//   videojs.log('Your player is ready!');
						// 	// In this context, `this` is the player that was created by Video.js.
						//   this.play();
						// 	// How about an event listener?
						//   this.on('ended', function() {
						// 	videojs.log('Awww...over so soon?!');
						//   });
						// });
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
			<button class="btn btn-block btn-danger btn-flat" data-toggle="collapse" data-target="#demo">Show comments</button>

<div id="demo" class="collapse">
<div class="box box-danger">
<?php

foreach($comments as $comment)
{
	// print_r($comment);
	// $raw_date = ‘2017-01-03 14:47:41’;
	$raw_time=strtotime($comment['updated_at']);

// list($date, $time) = explode(‘ ‘, $raw_date);
?>
<div class="box-header1 with-border">
				  <h5 class="box-title"><?php echo '<b>'.$comment['name'].'</b> at '.date("Y-m-d H:i A", $raw_time);;?></h5>
				</div>
				<div class="table_padding">
					<dl class="dl-horizontal">
						<p><?php echo $comment['comment']; ?></p>
						<?php
						if($comment['status']==0)
						{
						?>
						<button id="update_status" data-sid="<?php echo $this->crc_encrypt->encode($result['0']['id']); ?>" data-id="<?php echo $comment['id']; ?>" value="1">Done</button>
						<?php
						}
						else{
							?>

							<!-- <button >Done</button> -->
							<?php
						} ?>

					</dl>	
				
				</div>


<?php
}

?>
</div>
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
				$("[data-toggle=popover]").each(function(i, obj) {

$(this).popover({
  html: true,
  content: function() {
    var id = $(this).attr('id')
    return $('#popover-content-' + id).html();
  }
});

});
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
				$('#update_status').click(function()
				{
					var comment_id=$(this).attr('data-id');
					var sts=$(this).val();
					var s_id=$(this).attr('data-sid');
					// alert(comment_id);	
					var data= {id:comment_id,status:sts,slide_id:s_id};
					// data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					
					$.ajax({
									type: "GET",
									url: "<?php echo base_url(); ?>/admin/comment/update",
									data: data, 
									timeout: 600000,
									success: function (data) {
										console.log(data);
										swal({title: "Message", text: data, type: 
										"info"}).then(function(){ 
										   location.reload();
										   });
									},
									error: function (e) {
										
										swal(e.responseText);
										console.log("ERROR : ", e);
									}
								});					
					event.preventDefault();
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


/* comment part */






				
			});
			function testCode(e){
				console.log(e.value);
				var valw=e.value;
				document.getElementById('new_comment').value=valw;
			}
		
$(document).on('click','#add_comment',function(){
					// alert(document.getElementById('new_comment'));
					
					// document.getElementById('new_comment').value='asdfuags;bfuagsdbaskduaskjd';
					
					var comment			= document.getElementById('new_comment').value;
					// alert(comment);
					console.log(comment);
					var comment_form= $('#comment_form')[0];
					var data 					= new FormData(comment_form);  
					
				
					if(comment == '')
					{	
						swal('Slide comment should not be empty');
						$('#new_comment').addClass("error");
						return false;
					}
					else 
					{
						$('#new_comment').addClass("success");
					}
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/comment/add",
									data: data,
									processData: false,
									contentType: false,
									cache: false, 
									timeout: 600000,
									success: function (data) {
										console.log(data);
										swal({title: "Message", text: data, type: 
										"info"}).then(function(){ 
										   location.reload();
										   });
									},
									error: function (e) {
										
										swal(e.responseText);
										console.log("ERROR : ", e);
									}
								});					
					event.preventDefault();
				});
				

	</script>