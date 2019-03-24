<!-- Main content -->
<section class="content">
		<div class='row'>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box box-danger">
				<div class="box-header with-border">
				  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<h3 class="box-title 5p_border">Language : <i></i></h3>
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
		<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>
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