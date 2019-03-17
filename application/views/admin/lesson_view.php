
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
 <div class="container">   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
		<div class='row'>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box box-danger">
				<div class="box-header with-border">
				  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<h3 class="box-title 5p_border">Language : <i><?php echo ucfirst($this->uri->segment(5)); ?></i></h3>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#modal-default">Add Lessons</button>
				  </div> 	
				</div>
				<div class="table_padding">
					<?php 
						/*
						echo '<pre>';
						print_r($result);
						echo '</pre>';
						*/
						
						if($result == 'no_lesson')
						{
							echo 'No lesson found';
						}
						else
						{	
					?>
					<div id="accordion">
						<?php $i = 1; foreach($result as $adm) { ?>
						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#" class="tab_a_pad" data-toggler="toggle" data-toggler-target="#lesson<?php echo $i; ?>a" data-toggler-collection="#accordion"><i class="fa fa-plus-circle"></i> <?php echo $adm['lesson_name']; ?></a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
										<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz"><i class="fa fa-plus"></i> Quiz.</a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
									</div>
								</div>
							</div>
							<div class="js-toggler <?php if($i === 1){?> is-visible <?php } ?> tab_body_content" id="lesson<?php echo $i; ?>a">
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm['lessons']))
											{
												foreach($adm['lessons'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
										<td>
											<a class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
												<i class="fa fa-fw fa-edit"></i> Edit
											</a>
										</td>
										<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td><i class="fa fa-fw fa-clock-o"></i> <?php echo $lsn['slide_duration']; ?></td>
									</tr>
									<?php 
													}
											}
										else
											{
									?>
									<tr>
									  <td colspan="3">No slides added.</td>
									</tr>
									<?php 
											} 
									?>
									</tbody>
								</table>
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Quiz</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm['quiz']))
											{
												foreach($adm['quiz'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['question']; ?></td>
										<td>
											<i class="fa fa-fw fa-edit"></i> Edit
										</td>
										<td><i class="fa fa-fw fa-eye"></i> Preview</td>
										<td></td>
									</tr>
									<?php 
													}
											}
										else
											{
									?>
									<tr>
									  <td colspan="3">No quiz added.</td>
									</tr>
									<?php 
											} 
									?>
									</tbody>
								</table>
								
								
							</div>
						</div>
						<?php $i++; } ?>
					</div>	
					<?php 
						}
					?>	
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
                <h4 class="modal-title">Add Lesson</h4>
              </div>
              <div class="modal-body">
				<form class="form-horizontal" enctype="multipart/form-data" id="add_lesson_form">
					
					<div class="form-group">
						<label for="no_lessons" class="col-sm-4 control-label">Lesson Order.</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="no_lessons" name="no_lessons" placeholder="Lesson Order">
						</div>
					</div>
					<div class="form-group">
						<label for="course_name" class="col-sm-4 control-label">Lesson Name</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="lesson_name" name="lesson_name" placeholder="Lesson Name">
						</div>
					</div>
					<div class="form-group">
						<label for="icon_file" class="col-sm-4 control-label">Icon Upload</label>
						<div class="col-sm-8">
							<input type="file" id="icon_file" name="icon_file">
							<small>Only jpg, jpeg, png and gif file types allowed.</small>
						</div>
					</div>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-flat btn-success save_now" data-action="publish">Save Changes</button>
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
                <h4 class="modal-title">Edit Lesson</h4>
              </div>
              <form class="form-horizontal" enctype="multipart/form-data" id="edit_form">
			  <div class="modal-body">
					<div class="form-group">
						<label for="no_lessons" class="col-sm-4 control-label">Lesson Order</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="edit_no_lessons" name="edit_no_lessons" placeholder="Lesson Order">
							<input type="hidden" name="edit_eid" id="edit_eid" />
						</div>
					</div>
					<div class="form-group">
						<label for="edit_lesson_name" class="col-sm-4 control-label">Lesson Name</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="edit_lesson_name" name="edit_lesson_name" placeholder="Lesson Name">
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
				</div>
			  </form>	
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat btn-success save_edit_now" data-action="edit_publish">Save Changes</button>
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
		
		
		
		<div class="modal fade in" id="modal-add-slide">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Slide</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal" enctype="multipart/form-data" id="add_slide_form">
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Slide Title</label>
							<div class="col-sm-8">
								<input type="hidden" name="lessonid" id="lessonid" />
 								<input type="textbox" class="form-control" id="slide_title" name="slide_title" placeholder="Slide Title">
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Select Media</label>
							<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="select_media" id="select_media_one" value="video" checked="">
										Video
									</label>
									<label>
										<input type="radio" name="select_media" id="select_media_two" value="image" checked="">
										Image
									</label>
									<label>
										<input type="radio" name="select_media" id="select_media_three" value="audio" checked="">
										Audio
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Media File</label>
							<div class="col-sm-8 repeat_main">
								<div class="row repeat_upload p-2">
									<div class="col-sm-8">
										<input type="file" id="slide_media_file" name="slide_upload"> 
									</div>	
									<!--
									<div class="col-sm-4">
										<i class="fa fa-plus-square font-17 plus_file cus_pointer"></i>
									</div>
									-->
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Slide Description</label>
							<div class="col-sm-8">
								<textarea class="textarea" id="slide_description" name="slide_description" placeholder="Place some text here"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Slide Duration</label>
							<div class="col-sm-8">
								<input type="textbox" class="form-control" id="slide_duration" name="slide_duration" placeholder="Slide Duration">
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Slide Order</label>
							<div class="col-sm-8">
								<input type="textbox" class="form-control" id="slide_order" name="slide_order" placeholder="Slide Order" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							</div>
						</div>
						
					</form>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-flat btn-success slide_save_now" data-action="publish">Submit</button>
			  </div>
            </div>
          </div>
        </div>
		
		
		<div class="modal fade in" id="slide_edit_now">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Slide</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal" enctype="multipart/form-data" id="edit_slide_form">
						<div class="form-group">
							<label for="edit_slide_title" class="col-sm-4 control-label">Slide Title</label>
							<div class="col-sm-8">
								<input type="hidden" name="edit_slideid" id="edit_slideid" />
 								<input type="textbox" class="form-control" id="edit_slide_title" name="edit_slide_title" placeholder="Slide Title">
							</div>
						</div>
						<div class="form-group">
							<label for="no_lessons" class="col-sm-4 control-label">Select Media</label>
							<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="edit_select_media" id="edit_select_media_one" value="video" checked="">
										Video
									</label>
									<label>
										<input type="radio" name="edit_select_media" id="edit_select_media_two" value="image" checked="">
										Image
									</label>
									<label>
										<input type="radio" name="edit_select_media" id="edit_select_media_three" value="audio" checked="">
										Audio
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_slide_media_file" class="col-sm-4 control-label">Media File</label>
							<div class="col-sm-8 repeat_main">
								<div class="row repeat_upload p-2">
									<div class="col-sm-8">
										<input type="file" id="edit_slide_media_file" name="edit_slide_upload"> 
										<p>[Leave blank if you dont want to change existing file.]</p>
										<input type="hidden" name="edit_file_orginal" id="edit_file_orginal" />
									</div>	
									<!--
									<div class="col-sm-4">
										<i class="fa fa-plus-square font-17 plus_file cus_pointer"></i>
									</div>
									-->
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label for="edit_slide_description" class="col-sm-4 control-label">Slide Description</label>
							<div class="col-sm-8">
								<textarea class="textarea" id="edit_slide_description" name="edit_slide_description" placeholder="Place some text here"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
							</div>
						</div>
						<div class="form-group">
							<label for="edit_slide_duration" class="col-sm-4 control-label">Slide Duration</label>
							<div class="col-sm-8">
								<input type="textbox" class="form-control" id="edit_slide_duration" name="edit_slide_duration" placeholder="Slide Duration">
							</div>
						</div>
						<div class="form-group">
							<label for="edit_slide_order" class="col-sm-4 control-label">Slide Order</label>
							<div class="col-sm-8">
								<input type="textbox" class="form-control" id="edit_slide_order" name="edit_slide_order" placeholder="Slide Order" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							</div>
						</div>
						
					</form>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-flat btn-success edit_slide_save_now" data-action="publish">Submit</button>
			  </div>
            </div>
          </div>
        </div>
		
		
		<div class="modal fade in" id="modal-add-quiz">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal" enctype="multipart/form-data" id="add_quiz_form">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id" >
								<?php foreach($result as $lsn_drop) { ?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
								<select class="form-control" name="quiz_type" id="quiz_type" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer" style="display:none;">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>Right Answer Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="ra_question" name="ra_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="no_lessons" class="col-sm-4 control-label">Attach Media to Quiz</label>
										<div class="col-sm-8">
											<div class="radio">
												<label>
													<input type="radio" name="ra_media" id="ra_media_one" value="video" checked="">
													Video
												</label>
												<label>
													<input type="radio" name="ra_media" id="ra_media_two" value="image" checked="">
													Image
												</label>
												<label>
													<input type="radio" name="ra_media" id="ra_three" value="audio" checked="">
													Audio
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="icon_file" class="col-sm-4 control-label">Upload Media</label>
										<div class="col-sm-8">
											<input type="file" id="ra_file" name="ra_file">
											<small>[Respective files corresponding to the media is to be uploaded.]</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-7 control-label">Please type answer & select correct answer</label>
										<div class="col-sm-4"></div>
									</div>
									<div class="form-group">
										<label for="raa_answer" class="col-sm-4 control-label">"A" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="raa_answer" name="raa_answer" placeholder="A Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="raa_correct_answer" value="a" checked>
										</div>
									</div>
									<div class="form-group">
										<label for="rab_answer" class="col-sm-4 control-label">"B" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rab_answer" name="rab_answer" placeholder="B Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rab_correct_answer" value="b">
										</div>
									</div>
									<div class="form-group">
										<label for="rac_answer" class="col-sm-4 control-label">"C" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rac_answer" name="rac_answer" placeholder="C Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rac_correct_answer" value="c">
										</div>
									</div>
									<div class="form-group">
										<label for="rad_answer" class="col-sm-4 control-label">"D" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rad_answer" name="rad_answer" placeholder="D Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rad_correct_answer" value="d">
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 3-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop" style="display:none;">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>Drag & Drop Quiz</u></h4>
									</div>
									
									<div class="form-group">
										<label class="col-sm-7 control-label" style="text-align: left;">Please type the sentences in part</label>
										<div class="col-sm-4"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dada_questiom" name="dada_questiom" placeholder="Question A">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dada_answer" name="dada_answer" placeholder="Matching Answer">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadb_questiom" name="dadb_questiom" placeholder="Question B">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadb_answer" name="dadb_answer" placeholder="Matching Answer">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadc_questiom" name="dadc_questiom" placeholder="Question C">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadc_answer" name="dadc_answer" placeholder="Matching Answer">
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 4-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz" style="display:none;">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>Reorder Quiz</u></h4>
									</div>
									<div class="form-group">
										<label class="col-sm-12 control-label"  style="text-align: left;">Please type the required content into the boxes for reorder</label>
										<label class="col-sm-12 control-label"  style="text-align: left;">Please write the right order as per the following</label>
									</div>
									<div class="form-group">
										<label for="reoa_answer" class="col-sm-4 control-label">"A" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reoa_answer" name="reoa_answer" placeholder="A Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reob_answer" class="col-sm-4 control-label">"B" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reob_answer" name="reob_answer" placeholder="B Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reoc_answer" class="col-sm-4 control-label">"C" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reoc_answer" name="reoc_answer" placeholder="C Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reod_answer" class="col-sm-4 control-label">"D" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reod_answer" name="reod_answer" placeholder="D Answer">
										</div>
									</div>
								</div>
							</div>
					
					</div>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" name="quiz_submit" class="btn btn-flat btn-success">Submit</button>
			  </div>
			  </form>
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
				$('#brief_desc, #edit_brief_desc').wysihtml5({
								  toolbar: {
									"font-styles": false,
									"emphasis": true,
									"lists": false,
									"html": false,
									"link": false,
									"image": false,
									"color": false,
									"blockquote": true
								  }
								});
								
				$('#quiz_type').change(function(){
					var curr_select = $('#quiz_type').val();
					if(curr_select == 'true_or_false')
					{
						$('#true_or_false').show();
						$('#right_answer').hide();
						$('#draganddrop').hide();
						$('#reorder_quiz').hide();
					}
					
					if(curr_select == 'right_answer')
					{
						$('#true_or_false').hide();
						$('#right_answer').show();
						$('#draganddrop').hide();
						$('#reorder_quiz').hide();
					}
					
					if(curr_select == 'drag_and_drop')
					{
						$('#true_or_false').hide();
						$('#right_answer').hide();
						$('#draganddrop').show();
						$('#reorder_quiz').hide();
					}
					
					if(curr_select == 'reorder')
					{
						$('#true_or_false').hide();
						$('#right_answer').hide();
						$('#draganddrop').hide();
						$('#reorder_quiz').show();
					}
				});
				
				/* Quiz radio button checks*/
				$("#add_quiz_form").on("submit", function(e){
						e.preventDefault();
						var quiz_type 	= $('#quiz_type').val();
						var form		= $('#add_quiz_form')[0];
						var data		= new FormData(form);  
						data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
						if(quiz_type == 'true_or_false')
							{
								var quiz_question = $('#quiz_question').val();
								if(quiz_question == '')
									{
										swal('Please enter a valid quiz question.');
										$('#quiz_question').addClass("error");
										return false;
									}
								else 
									{
										$('#quiz_question').addClass("success");
									}									
							}
						
						if(quiz_type == 'right_answer')
							{
								var ra_question = $('#ra_question').val();
								var raa_answer 	= $('#raa_answer').val();
								var rab_answer 	= $('#rab_answer').val();
								var rac_answer 	= $('#rac_answer').val();
								var rad_answer 	= $('#rad_answer').val();
								
								if(ra_question == '')
									{
										swal('Please enter a valid right answer quiz question.');
										$('#ra_question').addClass("error");
										return false;
									}
								else 
									{
										$('#ra_question').addClass("success");
									}
									
								if(raa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#raa_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#raa_answer').addClass("success");
									}
									
								if(rab_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#rab_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#rab_answer').addClass("success");
									}
									
								if(rac_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#rac_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#rac_answer').addClass("success");
									}
									
								if(rad_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#rad_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#rad_answer').addClass("success");
									}
							}
						
						if(quiz_type == 'drag_and_drop')
							{
								var dada_questiom	= $('#dada_questiom').val();
								var dada_answer		= $('#dada_answer').val();
								var dadb_questiom 	= $('#dadb_questiom').val();
								var dadb_answer 	= $('#dadb_answer').val();
								var dadc_questiom 	= $('#dadc_questiom').val();
								var dadc_answer 	= $('#dadc_answer').val();
								
								if(dada_questiom == '')
									{
										swal('Please enter a valid question for option "A".');
										$('#dada_questiom').addClass("error");
										return false;
									}
								else 
									{
										$('#dada_questiom').addClass("success");
									}
									
									
								if(dada_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#dada_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#dada_answer').addClass("success");
									}
									
								if(dadb_questiom == '')
									{
										swal('Please enter a valid question for option "B".');
										$('#dadb_questiom').addClass("error");
										return false;
									}
								else 
									{
										$('#dadb_questiom').addClass("success");
									}
									
									
								if(dadb_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#dadb_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#dadb_answer').addClass("success");
									}
									
								if(dadc_questiom == '')
									{
										swal('Please enter a valid question for option "C".');
										$('#dadc_questiom').addClass("error");
										return false;
									}
								else 
									{
										$('#dadc_questiom').addClass("success");
									}
									
									
								if(dadc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#dadc_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#dadc_answer').addClass("success");
									}
									
									
									
							}
						
						if(quiz_type == 'reorder')
							{
								var reoa_answer = $('#reoa_answer').val();
								var reob_answer	= $('#reob_answer').val();
								var reoc_answer	= $('#reoc_answer').val();
								var reod_answer = $('#reod_answer').val();
								
								if(reoa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#reoa_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#reoa_answer').addClass("success");
									}
									
								if(reob_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#reob_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#reob_answer').addClass("success");
									}
									
								if(reoc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#reoc_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#reoc_answer').addClass("success");
									}
									
								if(reod_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#reod_answer').addClass("error");
										return false;
									}
								else 
									{
										$('#reod_answer').addClass("success");
									}
							}
							
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/quiz/add",
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
	<script>
		$(document).ready(function() 
			{
				Toggler.Init();
				
				/*
				$('.textarea').wysihtml5({
					  toolbar: {
						"font-styles": false,
						"emphasis": true,
						"lists": false,
						"html": false,
						"link": false,
						"image": false,
						"color": false,
						"blockquote": false
					  }
					});		
				*/
				
				$('#admin_table').DataTable();
				
				$('#modal-add-slide').on('show.bs.modal', function (e) {
					var invoker = $(e.relatedTarget);
					var lessonid = invoker.data('id');
					$('#lessonid').val(lessonid);
				});
				
				/* Edit slide information here */
				
				$('#slide_edit_now').on('show.bs.modal', function (e) {
					var invoker = $(e.relatedTarget);
					var lessonid = invoker.data('id');
					//alert(lessonid);
					if(lessonid == null || lessonid == '')
						{
							swal('Sorry, Information concerned with this slide is not fetched.');
						}
					else 
						{
							$.post("<?php echo base_url(); ?>admin/slide/getslides", { 
											id: lessonid,
											<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"							
										}, function(data) {
											
											if(data == 'empty_id')
											{
												swal({title: "Message", text: 'Sorry! We are not able to process slide information concerned with this edit', type: 
												"info"}).then(function(){ 
												   location.reload();
												   }
												);
											}
											else 
											{
												$(".edit_slide_form").trigger("reset");
												var obj = JSON.parse(data);
												console.log(obj);
												$('#edit_slideid').val(lessonid);
												$('#edit_slide_title').val(obj['0'].slide_title);
												$("input[name=edit_select_media][value=" + obj['0'].slide_mode + "]").prop('checked', 'checked');
												$('#edit_file_orginal').val(obj['0'].slide_file);
												$('#edit_slide_duration').val(obj['0'].slide_duration);
												$('#edit_slide_description, .wysihtml5-editor').html(obj['0'].slide_description);
												$('#edit_slide_order').val(obj['0'].slide_order);
											}
								})
								.fail(function() {
									swal({title: "Message", text: 'Sorry! We are not able to process lesson information concerned with this edit', type: 
										"info"}).then(function(){ 
										   location.reload();
										   }
										);
								})
						}						
				});
				
				
				
				$('#edit_icon_file, #icon_file').change(function () {
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
				
				$("input[name='select_media']").change(function(){
					$("#slide_media_file").val(null);
				});
				
				$("input[name='edit_select_media']").change(function(){
					$("#edit_slide_media_file").val(null);
				});
				
				
				
				$('#slide_media_file').change(function () {
					
					var sel_media = $("input[name='select_media']:checked").val();
					var ext = this.value.match(/\.(.+)$/)[1];
					if(sel_media == 'image')
						{
							switch (ext) 
								{
									case 'jpg':
									case 'jpeg':
									case 'png':
									case 'gif':
										$("input[name='select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}	
					else if(sel_media == 'video')
						{
							switch (ext) 
								{
									case 'mp4':
									case 'webm':
									case 'ogv':
										$("input[name='select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}
					else if(sel_media == 'audio')
						{
							switch (ext) 
								{
									case 'mp3':
									case 'wav':
										$("input[name='select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}	
				});
				
				
				$('#edit_slide_media_file').change(function () {
					
					var sel_media = $("input[name='edit_select_media']:checked").val();
					var ext = this.value.match(/\.(.+)$/)[1];
					if(sel_media == 'image')
						{
							switch (ext) 
								{
									case 'jpg':
									case 'jpeg':
									case 'png':
									case 'gif':
										$("input[name='edit_select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}	
					else if(sel_media == 'video')
						{
							switch (ext) 
								{
									case 'mp4':
									case 'webm':
									case 'ogv':
										$("input[name='edit_select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}
					else if(sel_media == 'audio')
						{
							switch (ext) 
								{
									case 'mp3':
									case 'wav':
										$("input[name='edit_select_media']").attr('disabled', false);
										break;
									default:
										swal('This is not an allowed file type.');
										this.value = '';
								}
						}	
				});
				
				
				
				
				
				
				$( ".save_now" ).click(function( event ) {
					  
					var lesson_name 	= $('#lesson_name').val();
					var no_lessons 		= $('#no_lessons').val();
					var form 			= $('#add_lesson_form')[0];
					var data 			= new FormData(form);  
					
					if(lesson_name == '')
					{	
						swal('Lesson name should not be empty');
						$('#lesson_name').addClass("error");
						return false;
					}
					else 
					{
						$('#lesson_name').addClass("success");
					}
					
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					data.append("course_id", '<?php echo $this->uri->segment(4); ?>');
					data.append("language", '<?php echo $this->uri->segment(5); ?>');
					
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/lesson/add",
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
					$.post("<?php echo base_url(); ?>admin/lesson/getlesson", { 
									id: etid,
									<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"							
								}, function(data) {
									
									if(data == 'empty_id')
									{
										swal({title: "Message", text: 'Sorry! We are not able to process lesson information concerned with this edit', type: 
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
										$('#edit_lesson_name').val(obj['0'].lesson_name);
										$('#hidden_edit_icon_file').val(obj['0'].icon_file);
										$('#edit_no_lessons').val(obj['0'].lesson_order);
										$('#modal-edit').modal('show');
										$('.overlay').hide();
									}
						})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process lesson information concerned with this edit', type: 
								"info"}).then(function(){ 
								   location.reload();
								   }
								);
						})
				});
				
				
				$('.save_edit_now').click(function(){
					
					var edit_eid 				= $('#edit_eid').val();
					var edit_lesson_name 		= $('#edit_lesson_name').val();
					var edit_icon_file 			= $('#edit_icon_file').val();
					var edit_no_lessons 		= $('#edit_no_lessons').val();
					var hidden_edit_icon_file 	= $('#hidden_edit_icon_file').val();
					var edit_form 				= $('#edit_form')[0];
					var data 					= new FormData(edit_form);  
					
					if(edit_lesson_name == '')
					{	
						swal('Lesson name should not be empty');
						$('#edit_lesson_name').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_lesson_name').addClass("success");
					}
										
					if(edit_no_lessons == '')
					{	
						swal('Please enter the lesson order.');
						$('#edit_no_lessons').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_no_lessons').addClass("success");
					}
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					data.append("no_file_upload", hidden_edit_icon_file);
					data.append("edit_id", edit_eid);
					
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/lesson/updatelesson",
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
								
				$('.view_courses').on('click', function (e) {
					var view_id = $(this).attr("data-id");
					//$('.approve_course_main').data('id',view_id);
					$('.loading-message').show();
					$('.loading-message').text('Please wait while we load your lesson details...');
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
				
				
				/*
				$('.lesson_slide').on('click', function (e) {
					var lesson_id = $(this).attr("data-id");
					$('#modal-add-quiz').show();
				});
				
				*/
				
				
				
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
					  confirmButtonText: 'Yes, Approve Lesson!'
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
			
			var i = 1;
			
			$(document).on("click", ".plus_file", function(event){
				var insert_html = '<div class="row p-2 '+i+'"><div class="col-sm-8"><input type="file" id="media_file" name="slide_upload[]"></div><div class="col-sm-4"><i class="fa fa-plus-square font-17 plus_file cus_pointer"></i>&nbsp;&nbsp;<i class="fa fa-times-circle font-17 plus_delete cus_pointer" data-id="'+i+'"></i></div></div>';
				$(insert_html).insertAfter( ".repeat_upload" );
				i += 1;
			});
			
			$(document).on("click", ".plus_delete", function(event){
				var ele_sec = $(this).attr("data-id")
				$("."+ele_sec).remove();
			});
			
			$('.slide_save_now').click(function(){
					
					var slide_title 			= $('#slide_title').val();
					var lessonid 				= $('#lessonid').val();
					var slide_media_file 		= $('#slide_media_file').val();
					var add_slide_form			= $('#add_slide_form')[0];
					var data 					= new FormData(add_slide_form);  
					
					if(slide_title == '')
					{	
						swal('Slide title should not be empty');
						$('#slide_title').addClass("error");
						return false;
					}
					else 
					{
						$('#slide_title').addClass("success");
					}
					
					if(lessonid == '')
					{	
						swal('Lesson concerned with this slide is not found.');
						$('#lessonid').addClass("error");
						return false;
					}
					
					
					
					if( document.getElementById("slide_media_file").files.length == 0 )
						{
							swal('Please select a file');
							$('#slide_media_file').addClass("error");
							return false;
						}
					else 
						{
							$('#slide_media_file').addClass("success");
						}						
					
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/slide/addslide",
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
				
				
				$('.edit_slide_save_now').click(function(){
					
					var edit_slideid			= $('#edit_slideid').val();
					var edit_slide_title		= $('#edit_slide_title').val();
					var edit_select_media 		= $('#edit_select_media').val();
					var edit_slide_form			= $('#edit_slide_form')[0];
					var data 					= new FormData(edit_slide_form);  
					
					if(edit_slideid == '')
					{	
						swal('Slide information concerned with this edit is not retrieved.');
						$('#edit_slide_title').addClass("error");
						return false;
					}
					
					if(edit_slide_title == '')
					{	
						swal('Slide title should not be empty');
						$('#edit_slide_title').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_slide_title').addClass("success");
					}
					
					data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
					
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/slide/editslide",
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
	
	