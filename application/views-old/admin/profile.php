
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
<div class="container">  
  <div class="content-wrapper">
    
	<section class="content white_bg"> 
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<div class="box box-danger" style="background-color: #ec7824; border: #ec7824; color: #fff;">
					<div class="box-header with-border">
						<h3 class="box-title" style="color: #fff;"><i class="fa fa-fw fa-chevron-left"></i> Student Profile</h3>
					</div>
				</div>
				<h3 class="h3class">Student Information:</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-user"></i> Full Name</b>
					<p><?php echo $result[0]['name']; ?></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-pencil-square-o"></i> Registration and Date</b>
					<p><?php echo date('d F Y h:m A',strtotime($result[0]['created_time'])); ?></p>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 10px;">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-file-o"></i> Student Id No</b>
					<p><?php echo $result[0]['student_idno']; ?></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-share-square-o"></i> Last Login Date and Time</b>
					<p>-</p>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 10px;">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-newspaper-o"></i> Emirates Id No</b>
					<p><?php echo $result[0]['emirates_idno']; ?></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<div class="col-lg-12 col-md-12 col-sm-12 black_bottom">
					<b class="profile_sub_title"><i class="fa fa-fw fa-line-chart"></i> Status</b>
					<p>Active</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<h3 class="h3class">Student Course:</h3>
			</div>
		</div>
		<?php 
			
			// echo '<pre>';
			// print_r($result);
			// print_r($courses);
			// print_r($mylessons);
			// echo '</pre>';
			
			if(!empty($courses) && count($courses) > 0)
			{	
		?>
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">	
				<div class="pull-right">
					<img src="<?php echo base_url(); ?><?php echo $courses[0]['icon_file']; ?>" alt="<?php echo  $courses[0]['course_name']; ?>" style="height: 45px;">
				</div>
			</div>	
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">	
				<div class="pull-left">
					<b style="font-size: 17px;"><?php echo  $courses[0]['course_name']; ?></b><br>
					TRAINING COURSE
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<h4 class="h3class">Course Attending Log</h4>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<table class="table table-striped">
					<tbody>
						<tr>
							<th>Course</th>
							<th>Lesson</th>
							<th>Status</th>
							<th>Date</th>
							<th>Time</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?php foreach($mylessons as $mls) {?>
						<tr>
							<td><?php echo $courses[0]['course_name'] .'- ['.ucfirst($mls['language']).']'; ?></td>
							<td><?php echo $mls['lesson_name']; ?></td>
							<td><i class="fa fa-fw fa-circle" style="color:#6fbe44;"></i> Completed</td>
							<td>08-03-2019</td>
							<td>09:56 AM</td>
							<td><!--<span class="badge bg-red">Reset</span>-->--</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php 
			}
			else 
			{
		?>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<div class="pull-left">
					<h3>No course assigned to this user.</h3>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<div class="pull-right">
					<button type="button" class="btn btn-block btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#assign_course">Assign Course</button>
				</div>
			</div>
		</div>
		<?php 
			}
		?>	
		
		</section>
	</div>
</div>  
	
	
	<div class="modal fade" id="assign_course" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		<form class="assign_course_form" id="assign_course_form" method="POST">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Assign Course</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="form-group">
						<label for="edit_name">Course Name</label>
						<select class="form-control" name="course_name" id="course_name">
							<?php 
							if(empty($lessons) && count($lessons) < 1) 
								{
							?>
								<option value="0">No Lessons Found</option>
							<?php 	
								}
							else 
								{
									foreach($lessons as $les)
									{
							?>
								<option value="<?php echo $les['id']; ?>"><?php echo $les['course_name']; ?></option>
							<?php 
									}
								}
							?>
						</select>
						</div>
						<div class="form-group">
						<label for="edit_name">Select Language</label>
						<select class="form-control" name="course_lang" id="course_lang">
								<option value="arab">Arab</option>
								<option value="english">English</option>
								<option value="malayalam">Malayalam</option>
								
						
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="start_date">Start Date</label>
					  <input type="textbox" class="form-control" id="start_date" name="start_date"  placeholder="Start Date">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
					  <label for="end_date">End Date</label>
					  <input type="textbox" class="form-control" id="end_date" name="end_date"  placeholder="End Date">
					</div>
				</div>
			</div>
			<div class="overlay">
              <!--<i class="fa fa-refresh fa-spin"></i> Please Wait..-->
            </div>
		  </div>
		  <div class="modal-footer">
			<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
			<input type="hidden" name="edit_eid" id="edit_eid" />
			<button type="submit" class="btn btn-success" id="submit_edit">Save changes</button>
		  </div>
		  </form>
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
	 <script type="text/javascript">
            $(function () {
                $('#start_date, #end_date').datetimepicker({
												locale: 'ru'
											});
            });
			
			$(document).ready(function(){
				
				/* Assign courses */
				$("#assign_course_form").on("submit", function(e){
					e.preventDefault();
					var course_name = $('#course_name').val();
					var start_date	= $('#start_date').val();
					var end_date	= $('#end_date').val();
					var form		= $('#assign_course_form')[0];
					var data		= new FormData(form);  
					data.append("studentid", "<?php echo $this->crc_encrypt->encode($result[0]['id']); ?>");
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					
					if(course_name == '' || course_name == '0')
						{
							swal('You should assign a valid course. Please add a course first if the options are empty.');
							$('#course_name').addClass("error");
							return false;
						}
					else 
						{
							$('#course_name').addClass("success");
						}
					
					if(start_date == '')
						{
							swal('Start date should not be empty.');
							$('#start_date').addClass("error");
							return false;
						}
					else 
						{
							$('#start_date').addClass("success");
						}
					
					if(end_date == '')
						{
							swal('End date should not be empty.');
							$('#end_date').addClass("error");
							return false;
						}
					else 
						{
							$('#end_date').addClass("success");
						}
					
					
					$.ajax({
						type: "POST",
						enctype: 'multipart/form-data',
						url: "<?php echo base_url(); ?>admin/student/assign",
						data: data,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 600000,
						success: function (data) {
								var response = jQuery.parseJSON(data);
								if(response.type == 'error')
									{
										swal({title: "Message", text: response.message, type: 
											"info"}).then(function(){ 
										//location.reload();
										});
									}
								else 
									{
										swal({title: "Message", text: response.message, type: 
											"info"}).then(function(){ 
									   location.reload();
								   });
								}											
							},
							error: function (e) {
									swal({title: "Message", text: 'Something went wrong. Please try again later!', type: 
										"info"}).then(function(){ 
								   //location.reload();
								   });
								}
							});					
							
					event.preventDefault();	
				});
				
			});
        </script>