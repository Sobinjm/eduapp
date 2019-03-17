
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
        Course Management
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		<div class='row'>
		
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box box-danger">
				<div class="box-header with-border">
				  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<h3 class="box-title 5p_border"></h3>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#modal-default">Add Course</button>
				  </div> 	
				</div>
				<div class="table_padding">
					<?php 
						//print_r($result);	
					?>
					<div id="accordion">
						<?php $i = 1; foreach($result as $adm) { ?>
						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#" class="tab_a_pad" data-toggler="toggle" data-toggler-target="#course<?php echo $i; ?>a" data-toggler-collection="#accordion"><i class="fa fa-plus-circle"></i> 
										<?php 
											echo $adm['course_name'];
										?>
										</a>
										
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
										<?php 
										if($adm['publish_status'] == '0')
										{
											echo '<a class="btn btn-danger btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Pending</a>';
										}
										
										if($adm['publish_status'] == '1')
										{
											echo '<a class="btn btn-warning btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Draft</a>';
										}
										
										if($adm['publish_status'] == '2')
										{
											echo '<a class="btn btn-success btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Published</a>';
										}
										?>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>	
										<a class="lp_buttons lb_bg_one tab_a_pad pull-right view_courses" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>"><i class="fa fa-eye"></i> View Course</a>
									</div>
								</div>
							</div>
							<div class="js-toggler <?php if($i === 1){?> is-visible <?php } ?> tab_body_content" id="course<?php echo $i; ?>a">
								<table class="table table-striped">
									<tr>
										<th>Language</th>	
										<th>No. of lessons</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<tbody>
									<?php 
										$course_lang = json_decode($adm['course_lang']);
										if($course_lang->english == '1')
											{
												echo '<tr>
													  <td>English</td>
													  <td>-</td>
													  <td>-</td>
													  <td><a href="'.base_url().'admin/lesson/view/'.$this->crc_encrypt->encode($adm['id']).'/english" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View Lessons</a></td>
													</tr>';
											}
											
										if($course_lang->arabic == '1')
											{
												echo '<tr>
													  <td>Arabic</td>
													  <td>-</td>
													  <td>-</td>
													  <td><a href="'.base_url().'admin/lesson/view/'.$this->crc_encrypt->encode($adm['id']).'/arabic" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View Lessons</a></td>
													</tr>';
											}
											
										if($course_lang->urdu == '1')
											{
												echo '<tr>
													  <td>Urdu</td>
													  <td>-</td>
													  <td>-</td>
													  <td><a href="'.base_url().'admin/lesson/view/'.$this->crc_encrypt->encode($adm['id']).'/urdu" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View Lessons</a></td>
													</tr>';
											}
											
										if($course_lang->pashto == '1')
											{
												echo '<tr>
													  <td>Pashto</td>
													  <td>-</td>
													  <td>-</td>
													  <td><a href="'.base_url().'admin/lesson/view/'.$this->crc_encrypt->encode($adm['id']).'/pashto" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View Lessons</a></td>
													</tr>';
											}
											
										if($course_lang->malayalam == '1')
											{
												echo '<tr>
													  <td>Malayalam</td>
													  <td>-</td>
													  <td>-</td>
													  <td><a href="'.base_url().'admin/lesson/view/'.$this->crc_encrypt->encode($adm['id']).'/malayalam" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View Lessons</a></td>
													</tr>';
											}
									?>	
								  </tbody>
								</table>
							</div>
						</div>
						<?php $i++; } ?>
					</div>	
				</div>
			  </div>
		</div>
		</div>
	
		
		<div class="modal fade in" id="modal-default">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Course</h4>
              </div>
              <div class="modal-body">
				<form class="form-horizontal" enctype="multipart/form-data" id="add_course_form">
					<div class="form-group">
						<label for="course_name" class="col-sm-4 control-label">Course Name</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
						</div>
					</div>
					<div class="form-group">
						<label for="course_language" class="col-sm-4 control-label">Course Language</label>
						<div class="col-sm-8">
							<div class="form-group">
									<div class="col-sm-12 pull-right">
										<label class="mr-5">
										  <input type="checkbox" id="english" name="english" value="eng" class="minimal-red" checked> English
										</label>
										
										<label class="mr-5">
										  <input type="checkbox" id="arabic" name="arabic" value="arb" class="minimal-red"> Arabic
										</label>
									
										<label class="mr-5">
										  <input type="checkbox" id="urdu" name="urdu" value="urd" class="minimal-red"> Urdu
										</label>
									</div>
									<div class="col-sm-12 pull-right">
										<label class="mr-5">
										  <input type="checkbox" id="pashto" name="pashto" value="pas" class="minimal-red"> Pashto
										</label>
										
										<label class="mr-5">
										  <input type="checkbox" id="malayalam" name="malayalam" value="mal" class="minimal-red"> Malayalam
										</label>
									
									</div>
									
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="icon_file" class="col-sm-4 control-label">Icon Upload</label>
						<div class="col-sm-8">
							<input type="file" id="icon_file" name="icon_file">
							<small>Only jpg, jpeg, png and gif file types allowed.</small>
						</div>
					</div>
					<div class="form-group">
						<label for="brief_desc" class="col-sm-4 control-label">Brief Desc</label>
						<div class="col-sm-8">
							<textarea id="brief_desc" name="brief_desc" rows="10" style="width:100%">
							
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="no_lessons" class="col-sm-4 control-label">No. of Lessons</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="no_lessons" name="no_lessons" placeholder="No. of Lessons">
						</div>
					</div>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat btn-warning save_now" data-action="draft">Save as draft</button>
				<button type="button" class="btn btn-flat btn-success save_now" data-action="publish">Publish now</button>
				</form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		<div class="modal fade in" id="modal-edit">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Course</h4>
              </div>
              <form class="form-horizontal" enctype="multipart/form-data" id="edit_form">
			  <div class="modal-body">
					<div class="form-group">
						<label for="course_name" class="col-sm-4 control-label">Course Name</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="edit_course_name" name="edit_course_name" placeholder="Course Name">
						</div>
					</div>
					<div class="form-group">
						<label for="course_language" class="col-sm-4 control-label">Course Language</label>
						<div class="col-sm-8">
							<div class="form-group">
									<div class="col-sm-12 pull-right">
										<label class="mr-5">
										  <input type="checkbox" id="edit_english" name="edit_english" value="eng" class="minimal-red" checked> English
										</label>
										
										<label class="mr-5">
										  <input type="checkbox" id="edit_arabic" name="edit_arabic" value="arb" class="minimal-red"> Arabic
										</label>
									
										<label class="mr-5">
										  <input type="checkbox" id="edit_urdu" name="edit_urdu" value="urd" class="minimal-red"> Urdu
										</label>
									</div>
									<div class="col-sm-12 pull-right">
										<label class="mr-5">
										  <input type="checkbox" id="edit_pashto" name="edit_pashto" value="pas" class="minimal-red"> Pashto
										</label>
										
										<label class="mr-5">
										  <input type="checkbox" id="edit_malayalam" name="edit_malayalam" value="mal" class="minimal-red"> Malayalam
										</label>
									
									</div>
									
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="icon_file" class="col-sm-4 control-label">Icon Upload</label>
						<div class="col-sm-8">
							<input type="file" id="edit_icon_file" name="edit_icon_file">
							<small>Only jpg, jpeg, png and gif file types allowed.</small>
							<input type="hidden" id="hidden_edit_icon_file" name="hidden_edit_icon_file">
						</div>
					</div>
					<div class="form-group">
						<label for="brief_desc" class="col-sm-4 control-label">Brief Desc</label>
						<div class="col-sm-8">
							<textarea id="edit_brief_desc" name="edit_brief_desc" rows="10" style="width:100%">
							
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="no_lessons" class="col-sm-4 control-label">No. of Lessons</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="edit_no_lessons" name="edit_no_lessons" placeholder="No. of Lessons">
							<input type="hidden" name="edit_eid" id="edit_eid" />
						</div>
					</div>
				</div>
			  </form>	
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat btn-warning save_edit_now" data-action="edit_draft">Save as draft</button>
				<button type="button" class="btn btn-flat btn-success save_edit_now" data-action="edit_publish">Publish now</button>
			  </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		<div class="modal fade in" id="modal-view">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">View Course</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p class="loading-message"></p>
						</div>
					</div>
					<div class="row current_course">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
    </section>
    <!-- /.content -->
  </div>
</div>      
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>
	<script>
		var editor;
					
		$(document).ready(function() 
			{
				$('#admin_table').DataTable();
					/*
					ClassicEditor
					.create( document.querySelector( '#brief_desc' ), {
						toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
						heading: {
							options: [
								{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
								{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
								{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
							]
						}
					} )
					.catch( error => {
						console.log( error );
					} );
					*/
						
			});
	</script>
	 <?php 
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
	?>
	<script>
		$(document).ready(function() 
			{
				
				Toggler.Init();
				$('#admin_table').DataTable();
				
				$('INPUT[type="file"]').change(function () {
					var ext = this.value.match(/\.(.+)$/)[1];
					switch (ext) {
						case 'jpg':
						case 'jpeg':
						case 'png':
						case 'gif':
							$('#uploadButton').attr('disabled', false);
							break;
						default:
							swal('This is not an allowed file type.');
							this.value = '';
					}
				});
				
				$( ".save_now" ).click(function( event ) {
					  
					var publish_status 	= $(this).attr("data-action");
					var course_name 	= $('#course_name').val();
					var english 		= $('#english').val();
					var arabic 			= $('#arabic').val();
					var urdu 			= $('#urdu').val();
					var pashto 			= $('#pashto').val();
					var malayalam 		= $('#malayalam').val();
					var icon_file 		= $('#icon_file').val();
					var brief_desc 		= $('#brief_desc').val();
					var no_lessons 		= $('#no_lessons').val();
					var form 			= $('#add_course_form')[0];
					var data 			= new FormData(form);  
					
					if(course_name == '')
					{	
						swal('Course name should not be empty');
						$('#course_name').addClass("error");
						return false;
					}
					else 
					{
						$('#course_name').addClass("success");
					}
										
					if(no_lessons == '')
					{	
						swal('Please enter the number of lessons in this course.');
						$('#no_lessons').addClass("error");
						return false;
					}
					else 
					{
						$('#no_lessons').addClass("success");
					}
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					data.append("publish_status", publish_status);
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/course/add",
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
				
				
				$('.delete_now').click(function(){
					
					var delid = $(this).attr("data-id");
					Swal({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete Course!'
					}).then((result) => {
					  if (result.value) {
						
						$.post( "<?php echo base_url(); ?>admin/course/delete", { 
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
					$('#edit_eid').val(etid);
					$.post("<?php echo base_url(); ?>admin/course/getcourse", { 
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
										$('#edit_course_name').val(obj['0'].course_name);
										$('#hidden_edit_icon_file').val(obj['0'].icon_file);
										//$('#edit_brief_desc').data("wysihtml5").editor.setValue(obj['0'].course_desc);
										$('#edit_brief_desc').text(obj['0'].course_desc);
										
										/*
										ClassicEditor
										.create( document.querySelector( '#edit_brief_desc' ), {
											toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
											heading: {
												options: [
													{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
													{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
													{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
												]
											}
										} )
										.then( editor => {
											editor = editor;
											editor.data.set(obj['0'].course_desc);
											console.log( 'Editor was initialized', editor );
										} )
										.catch( error => {
											console.log( error );
										} );
										*/
										
										$('#edit_no_lessons').val(obj['0'].lesson_no);
										$('#modal-edit').modal('show');
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
				
				
				$('.save_edit_now').click(function(){
					
					var edit_eid 				= $('#edit_eid').val();
					var edit_publish_status 	= $(this).attr("data-action");
					var edit_course_name 		= $('#edit_course_name').val();
					var edit_english 			= $('#edit_english').val();
					var edit_arabic 			= $('#edit_arabic').val();
					var edit_urdu 				= $('#edit_urdu').val();
					var edit_pashto 			= $('#edit_pashto').val();
					var edit_malayalam 			= $('#edit_malayalam').val();
					var edit_icon_file 			= $('#edit_icon_file').val();
					var edit_brief_desc 		= $('#edit_brief_desc').val();
					var edit_no_lessons 		= $('#edit_no_lessons').val();
					var hidden_edit_icon_file 	= $('#hidden_edit_icon_file').val();
					var edit_form 				= $('#edit_form')[0];
					var data 					= new FormData(edit_form);  
					
					if(edit_course_name == '')
					{	
						swal('Course name should not be empty');
						$('#edit_course_name').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_course_name').addClass("success");
					}
										
					if(edit_no_lessons == '')
					{	
						swal('Please enter the number of lessons in this course.');
						$('#edit_no_lessons').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_no_lessons').addClass("success");
					}
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					data.append("edit_publish_status", edit_publish_status);
					data.append("no_file_upload", hidden_edit_icon_file);
					data.append("edit_id", edit_eid);
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/course/updatecourse",
									data: data,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									success: function (data) {
										console.log(data);
										if(data == 'Course updated successfully')
										{
											swal({title: "Message", text: data, type: 
											"info"}).then(function(){ 
											   location.reload();
											   });
										}
										else 
										{
											swal(data);
											return false;
										}											
										   
									},
									error: function (e) {
										
										swal(e.responseText);
										console.log("ERROR : ", e);

									}
								});					
							
					event.preventDefault();
				});
				
								
				$('.view_courses').on('click', function (e) {
					var view_id = $(this).attr("data-id");
					//$('.approve_course_main').data('id',view_id);
					$('.loading-message').show();
					$('.loading-message').text('Please wait while we load your course details...');
					$('.current_course').html('');
					
					$.post("<?php echo base_url(); ?>admin/course/getcoursebyid", { 
									id: view_id,
									<?=$csrf['name'];?>: '<?=$csrf['hash'];?>'
								}, function(data) 
									{
										var obj = jQuery.parseJSON(data);
										if(obj.status == 'success')
											{
												$('.loading-message').hide();
												$('.current_course').html(obj.html);
											}
										else 
											{
												swal({title: "Message", text: 'Sorry! We are not able to process student information concerned with this edit', type: 
												"info"}).then(function(){ 
												   location.reload();
												   }
												);	
											}											
									})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process student information concerned with this edit', type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
						});
				});
				
				
				
				/* Validation Email*/
				function validateEmail($email) {
					  var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					  return emailReg.test( $email );
					}
				
			});
			
			$(document).on("click", ".approve_course_main", function(event){
					//alert('Hello');
					var course_id = $(this).attr("data-id");
					Swal({
					  title: 'Are you sure?',
					  text: "You want to approve this course?",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, Approve Course!'
					}).then((result) => {
					  if (result.value) {
						
						$.post( "<?php echo base_url(); ?>admin/course/update_status", { 
									id: course_id,
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
						});
						
					  }
					}); 
			});
			
	</script>