
<?php
	
	$this->load->model('admin/Mfaculty', 'mfaculty_model');
	$this->load->model('student/Mapi', 'mapi_model');
?>
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
	<div class="modal fade in" id="modal-edit-quiz">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal edit_quiz_form"  enctype="multipart/form-data" id="edit_quiz_form">
					
						
						
						<div class="row" id="edit_quiz_display_area">
							
							
					
					</div>
				</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" name="edit_quiz_submit" class="btn btn-flat btn-success">Submit</button>
			  </div>
			  </form>
            </div>
          </div>
      </div>
        






	<div class="modal fade in" id="modal-edit">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Course</h4>
              </div>
              <form class="form-horizontal" enctype="multipart/form-data" id="edit_form_c">
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
		
		
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
					// print_r($result);
						// print_r($course_result);	
					
					?>
					<div id="l_accordion">
						<?php $i = 1; $j=1; foreach($result as $adm) {  
							$course_name_d='';
								// print_r($adm['id']);
							// print_r($course_result[$adm['id']]);
							?>
						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#" class="tab_a_pad " data-toggler="toggle" data-toggler-target="#l_course<?php echo $j; ?>a" data-toggler-collection="#l_accordion"><i class="fa fa-plus-circle"></i> 
										<?php 
											echo $adm['course_name'];
											$course_name_d=$adm['course_name'];
										?>
										</a>
										
									</div>	
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">	
										<?php 
										$s='';
										if($adm['publish_status'] == '0')
										{
											echo '<a class="btn btn-danger btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Pending</a>';
											$s="Pending";
										}
										
										if($adm['publish_status'] == '1')
										{
											echo '<a class="btn btn-warning btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Draft</a>';
											$s="Draft";
										}
										
										if($adm['publish_status'] == '2')
										{
											echo '<a class="btn btn-success btn-xs btn-flat" style="color: #fff;margin-left: 15px;">Published</a>';
											$s="Published";
										}
										?>
									</div>	
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>	
										<a class="lp_buttons lb_bg_one tab_a_pad pull-right view_courses" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $this->crc_encrypt->encode($adm['id']); ?>"><i class="fa fa-eye"></i> View Course</a>
									</div>
								</div>
							</div>
							<div class="js-toggler <?php if($i === 1){?> is-visible <?php } ?> tab_body_content" id="l_course<?php echo $j; ?>a">
								<table class="table table-striped">
									<tr>
										<th>Language</th>	
										<th>No. of lessons</th>
										
										<th>Action</th>
									<!-- </tr>

									<a class="btn btn-xs bg-olive  edit_now" data-id="'. $this->crc_encrypt->encode($adm['id']).'" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
														<a class="btn btn-xs bg-olive  l-add_now" data-id="'. $this->crc_encrypt->encode($adm['id']).'" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Add</a>										
														<a class="lp_buttons lb_bg_one tab_a_pad " data-toggle="modal" data-target="#modal-view_lesson" <i class="fa fa-eye"></i> View Course</a> -->
									<tbody>
									<?php 
										$course_lang = json_decode($adm['course_lang']);
										
										if($course_lang->english == '1')
											{
													if(isset($course_result[$adm['id']]['english'][0]['updated_on']))
													{
														$udate=$course_result[$adm['id']]['english'][0]['updated_on'];
													}
													else{
														$udate=0;
													}
													if(isset($course_result[$adm['id']]['english'][0]['created_on']))
													{
														$cdate=$course_result[$adm['id']]['english'][0]['created_on'];
													}
													else{
														$cdate=0;
													}
												if($course_result[$adm['id']]['english']!='no_lesson')
												{
													
													$cnt=count($course_result[$adm['id']]['english']);
												}
												else{
													$cnt=0;
												}
												// print_r($course_result[$adm['id']]['english']);
												echo '<tr>
													  <td><a data-toggle="collapse" data-target="#'.$adm['id'].'_english" href="#!" class="pop-details" data-udt="'.date('d-m-Y|h:i:sa',strtotime($udate)).'" data-nolsn="'.$cnt.'" data-dt="'.date('d-m-Y|h:i:sa',strtotime($cdate)).'" data-language="English" data-course="'.$course_name_d.'" data-status="'.$s.'" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-plus-circle"></i>English</a></td>
													  <td>'.$cnt.'</td>
													  
														<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_english" href="#!" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View | Edit |</a>
														<button type="button" class="btn btn-xs bg-olive add_course" data-lang="english"  data-id="'.$this->crc_encrypt->encode($adm['id']).'" data-toggle="modal" data-target="#modal-default-new">Add</button>
														
									
									</td>
									</tr>
									<tr>
									<td colspan="3">
									<div class="collapse" id="'.$adm['id'].'_english">';
												?>

<div id="c_accordion<?php echo $adm['id'];?>">

						<?php $j++; if(!empty($course_result[$adm['id']]['english'][0]['id'])){  foreach($course_result[$adm['id']]['english'] as $adm_c) {  ?>

						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="tab_a_pad" data-toggle="collapse" data-target="#c_course<?php echo $adm_c['id'].$j; ?>a" ><i class="fa fa-plus-circle"></i> <?php echo $adm_c['lesson_name']; ?></a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
										<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz<?php echo $adm_c['id'].$j; ?>"><i class="fa fa-plus"></i> Quiz.</a>
										<a>Created By <?php $fname=$this->mfaculty_model->getStaff($course_result[$adm['id']]['english'][0]['created_by']);echo $fname[0]['name']; ?></a>
		

		






		<div class="modal fade in" id="modal-add-quiz<?php echo $adm_c['id'].$j; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal add_quiz_form" data-id="<?php echo $adm_c['id'].$j; ?>" enctype="multipart/form-data" id="add_quiz_form_<?php echo $adm_c['id'].$j; ?>">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
							<?php 
							// print_r($course_result[$adm['id']]['english'][0]);
							$list_lesson=$course_result[$adm['id']]['english'];
							// print_r($list_lesson);
							?>
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id_<?php echo $adm_c['id'].$j; ?>" >
								<?php foreach($list_lesson as $lsn_drop) { 
								?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
								<select class="form-control quiz_type" data-id="<?php echo $adm_c['id'].$j; ?>" name="quiz_type" id="quiz_type_<?php echo $adm_c['id'].$j; ?>" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area_<?php echo $adm_c['id'].$j; ?>">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false_<?php echo $adm_c['id'].$j; ?>">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question_<?php echo $adm_c['id'].$j; ?>" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer_<?php echo $adm_c['id'].$j; ?>" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>Right Answer Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="ra_question_<?php echo $adm_c['id'].$j; ?>" name="ra_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="no_lessons" class="col-sm-4 control-label">Attach Media to Quiz</label>
										<div class="col-sm-8">
											<div class="radio">
												<label>
													<input type="radio" name="ra_media" id="ra_media_one_<?php echo $adm_c['id'].$j; ?>" value="video" checked="">
													Video
												</label>
												<label>
													<input type="radio" name="ra_media" id="ra_media_two_<?php echo $adm_c['id'].$j; ?>" value="image" checked="">
													Image
												</label>
												<label>
													<input type="radio" name="ra_media" id="ra_three_<?php echo $adm_c['id'].$j; ?>" value="audio" checked="">
													Audio
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="icon_file" class="col-sm-4 control-label">Upload Media</label>
										<div class="col-sm-8">
											<input type="file" id="ra_file_<?php echo $adm_c['id'].$j; ?>" name="ra_file">
											<small>[Respective files corresponding to the media is to be uploaded.]</small>
											<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-7 control-label">Please type answer & select correct answer</label>
										<div class="col-sm-4"></div>
									</div>
									<div class="form-group">
										<label for="raa_answer" class="col-sm-4 control-label">"A" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="raa_answer_<?php echo $adm_c['id'].$j; ?>" name="raa_answer" placeholder="A Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="raa_correct_answer_<?php echo $adm_c['id'].$j; ?>" value="a" checked>
										</div>
									</div>
									<div class="form-group">
										<label for="rab_answer" class="col-sm-4 control-label">"B" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rab_answer_<?php echo $adm_c['id'].$j; ?>" name="rab_answer" placeholder="B Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rab_correct_answer_<?php echo $adm_c['id'].$j; ?>" value="b">
										</div>
									</div>
									<div class="form-group">
										<label for="rac_answer" class="col-sm-4 control-label">"C" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rac_answer_<?php echo $adm_c['id'].$j; ?>" name="rac_answer" placeholder="C Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rac_correct_answer_<?php echo $adm_c['id'].$j; ?>" value="c">
										</div>
									</div>
									<div class="form-group">
										<label for="rad_answer" class="col-sm-4 control-label">"D" Answer:</label>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="rad_answer_<?php echo $adm_c['id'].$j; ?>" name="rad_answer" placeholder="D Answer">
										</div>
										<div class="col-sm-2">
											<input type="radio" name="ra_correct_answer" id="rad_correct_answer_<?php echo $adm_c['id'].$j; ?>" value="d">
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 3-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
											<input type="textbox" class="form-control" id="dada_questiom_<?php echo $adm_c['id'].$j; ?>" name="dada_questiom" placeholder="Question A">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dada_answer_<?php echo $adm_c['id'].$j; ?>" name="dada_answer" placeholder="Matching Answer">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadb_questiom_<?php echo $adm_c['id'].$j; ?>" name="dadb_questiom" placeholder="Question B">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadb_answer_<?php echo $adm_c['id'].$j; ?>" name="dadb_answer" placeholder="Matching Answer">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadc_questiom_<?php echo $adm_c['id'].$j; ?>" name="dadc_questiom" placeholder="Question C">
										</div>
										<div class="col-sm-6">
											<input type="textbox" class="form-control" id="dadc_answer_<?php echo $adm_c['id'].$j; ?>" name="dadc_answer" placeholder="Matching Answer">
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 4-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
											<input type="textbox" class="form-control" id="reoa_answer_<?php echo $adm_c['id'].$j; ?>" name="reoa_answer" placeholder="A Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reob_answer" class="col-sm-4 control-label">"B" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reob_answer_<?php echo $adm_c['id'].$j; ?>" name="reob_answer" placeholder="B Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reoc_answer" class="col-sm-4 control-label">"C" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reoc_answer_<?php echo $adm_c['id'].$j; ?>" name="reoc_answer" placeholder="C Answer">
										</div>
									</div>
									<div class="form-group">
										<label for="reod_answer" class="col-sm-4 control-label">"D" Answer:</label>
										<div class="col-sm-8">
											<input type="textbox" class="form-control" id="reod_answer_<?php echo $adm_c['id'].$j; ?>" name="reod_answer" placeholder="D Answer">
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
									
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a href="#!" class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
									</div>
								</div>
							</div>
							<div class="collapse" id="c_course<?php echo $adm_c['id'].$j; ?>a">
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm_c['lessons']))
											{
												
												foreach($adm_c['lessons'] as $lsn)
													{
														// ;
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
										<td>
											<a href="#!" class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
												<i class="fa fa-fw fa-edit"></i> Edit
											</a>
										</td>
										<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td ><a class="lp_buttons lb_bg_two tab_a_pad "><i class="fa fa-circle"></i> 
								<?php if(!empty($adm_c['iscomment'])){echo 'Admin Comment';}  ; ?></a></td>
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
										if(!empty($adm_c['quiz']))
											{
												// print_r($adm_c['quiz']);
												foreach($adm_c['quiz'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['question']; ?></td>
										<td>
											<a href="#!" class="edit_quiz" data-id="<?php echo $this->crc_encrypt->encode($lsn['quiz_id']);?>" data-toggle="modal" data-target="#modal-edit-quiz" ><i class="fa fa-fw fa-edit"></i> Edit </a>
										</td>
										<td>
										
										<a target="blank" href="<?php echo base_url().'admin/quiz/preview_quiz/'.$this->crc_encrypt->encode($lsn['quiz_id']);?>"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td><a class="lp_buttons lb_bg_one tab_a_pad pull-right delete_quiz" data-id="<?php echo $this->crc_encrypt->encode($lsn['quiz_id']); ?>"><i class="fa fa-times"></i> Delete</a>
										</td>
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
						<?php $j++; }
											}
											else{
												echo "No data found";
											}
						?>
					</div>	
				

									</div>
									</td>
													</tr>

													<?php
											}
											
										if($course_lang->arabic == '1')
											{
												if(isset($course_result[$adm['id']]['arabic'][0]['updated_on']))
										{
											$udate=$course_result[$adm['id']]['arabic'][0]['updated_on'];
										}
										else{
											$udate=0;
										}
										if(isset($course_result[$adm['id']]['arabic'][0]['created_on']))
										{
											$cdate=$course_result[$adm['id']]['arabic'][0]['created_on'];
										}
										else{
											$cdate=0;
										}
												if($course_result[$adm['id']]['arabic']!='no_lesson')
												{
													$cnt=count($course_result[$adm['id']]['arabic']);
												}
												else{
													$cnt=0;
												}
												echo '<tr>
													  <td><a data-toggle="collapse" data-target="#'.$adm['id'].'_arabic" href="#!" class="pop-details"  data-udt="'.date('d-m-Y|h:i:sa',strtotime($udate)).'" data-nolsn="'.$cnt.'" data-dt="'.date('d-m-Y|h:i:sa',strtotime($cdate)).'" data-language="arabic" data-course="'.$course_name_d.'" data-status="'.$s.'" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-plus-circle"></i>Arabic</a></td>
													  <td>'.$cnt.'</td>
													  
														<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_arabic" href="#!" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View | Edit |</a>

														<button type="button" class="btn btn-xs bg-olive add_course" data-lang="arabic" data-id="'.$this->crc_encrypt->encode($adm['id']).'" data-toggle="modal" data-target="#modal-default-new">Add</button>
														
									
									</td>
									</tr>
									<tr>
									<td colspan="3">
									<div class="collapse" id="'.$adm['id'].'_arabic">';
												?>

<div id="c_accordion<?php echo $adm['id'];?>">

						<?php $j++; if(!empty($course_result[$adm['id']]['arabic'][0]['id'])){  foreach($course_result[$adm['id']]['arabic'] as $adm_c) {  ?>

						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="tab_a_pad" data-toggle="collapse" data-target="#c_course<?php echo $adm_c['id'].$j; ?>a" ><i class="fa fa-plus-circle"></i> <?php echo $adm_c['lesson_name']; ?></a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
										<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz<?php echo $adm_c['id'].$j; ?>"><i class="fa fa-plus"></i> Quiz.</a>
										<a>Created By <?php $fname=$this->mfaculty_model->getStaff($course_result[$adm['id']]['arabic'][0]['created_by']); echo $fname[0]['name']; ?></a>
		
		<div class="modal fade in" id="modal-add-quiz<?php echo $adm_c['id'].$j; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal add_quiz_form"  data-id="<?php echo $adm_c['id'].$j; ?>" enctype="multipart/form-data" id="add_quiz_form_<?php echo $adm_c['id'].$j; ?>">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
							<?php 
							// print_r($course_result[$adm['id']]['english'][0]);
							$list_lesson=$course_result[$adm['id']]['arabic'];
							// print_r($list_lesson);
							?>
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id_<?php echo $adm_c['id'].$j; ?>" >
								<?php foreach($list_lesson as $lsn_drop) { 
								?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
								<select class="form-control quiz_type" data-id="<?php echo $adm_c['id'].$j; ?>" name="quiz_type" id="quiz_type_<?php echo $adm_c['id'].$j; ?>" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false_<?php echo $adm_c['id'].$j; ?>">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question_<?php echo $adm_c['id'].$j; ?>" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer_<?php echo $adm_c['id'].$j; ?>" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
												<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
        </div>	</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a href="#!" class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
									</div>
								</div>
							</div>
							<div class="collapse" id="c_course<?php echo $adm_c['id'].$j; ?>a">
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm_c['lessons']))
											{
												foreach($adm_c['lessons'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
										<td>
											<a href="#!" class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
												<i class="fa fa-fw fa-edit"></i> Edit
											</a>
										</td>
										<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td ><a class="lp_buttons lb_bg_two tab_a_pad "><i class="fa fa-circle"></i> 
								<?php if(!empty($adm_c['iscomment'])){echo 'Admin Comment';}  ; ?></a></td>
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
										if(!empty($adm_c[0]['quiz']))
											{
												foreach($adm_c[0]['quiz'] as $lsn)
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
						<?php $j++; }
											}
											else{
												echo "No data found";
											}
						?>
					</div>	
				

									</div>
									</td>
													</tr>

													<?php
											}
											
										if($course_lang->urdu == '1')
											{
												if(isset($course_result[$adm['id']]['urdu'][0]['updated_on']))
										{
											$udate=$course_result[$adm['id']]['urdu'][0]['updated_on'];
										}
										else{
											$udate=0;
										}
										if(isset($course_result[$adm['id']]['urdu'][0]['created_on']))
										{
											$cdate=$course_result[$adm['id']]['urdu'][0]['created_on'];
										}
										else{
											$cdate=0;
										}
												if($course_result[$adm['id']]['urdu']!='no_lesson')
												{
													$cnt=count($course_result[$adm['id']]['urdu']);
												}
												else{
													$cnt=0;
												}
												echo '<tr>
												<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_urdu" href="#!" class="pop-details"  data-udt="'.date('d-m-Y|h:i:sa',strtotime($udate)).'" data-nolsn="'.$cnt.'" data-dt="'.date('d-m-Y|h:i:sa',strtotime($cdate)).'" data-language="English" data-course="'.$course_name_d.'" data-status="'.$s.'" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-plus-circle"></i>Urdu</a></td>
												<td>'.$cnt.'</td>
												
												<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_urdu" href="#!" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View | Edit |</a>
												<button type="button" class="btn btn-xs bg-olive add_course" data-lang="urdu"  data-id="'.$this->crc_encrypt->encode($adm['id']).'" data-toggle="modal" data-target="#modal-default-new">Add</button>
												
							
							</td>
							</tr>
							<tr>
							<td colspan="3">
							<div class="collapse" id="'.$adm['id'].'_urdu">';
										?>

<div id="c_accordion<?php echo $adm['id'];?>">

				<?php $j++; if(!empty($course_result[$adm['id']]['urdu'][0]['id'])){  foreach($course_result[$adm['id']]['urdu'] as $adm_c) {  ?>

				<div class="card mb-2">
					<div class="card-header tab_main_height">
						<div class="row padd_4e">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<a href="#!" class="tab_a_pad" data-toggle="collapse" data-target="#c_course<?php echo $adm_c['id'].$j; ?>a" ><i class="fa fa-plus-circle"></i> <?php echo $adm_c['lesson_name']; ?></a>
							</div>	
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
								<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz<?php echo $adm_c['id'].$j; ?>"><i class="fa fa-plus"></i> Quiz.</a>
									<a>Created By <?php $fname=$this->mfaculty_model->getStaff($course_result[$adm['id']]['urdu'][0]['created_by']); echo $fname[0]['name']; ?></a>
		
		<div class="modal fade in" id="modal-add-quiz<?php echo $adm_c['id'].$j; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal add_quiz_form"  data-id="<?php echo $adm_c['id'].$j; ?>" enctype="multipart/form-data" id="add_quiz_form_<?php echo $adm_c['id'].$j; ?>">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
							<?php 
							// print_r($course_result[$adm['id']]['english'][0]);
							$list_lesson=$course_result[$adm['id']]['urdu'];
							// print_r($list_lesson);
							?>
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id_<?php echo $adm_c['id'].$j; ?>" >
								<?php foreach($list_lesson as $lsn_drop) { 
								?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
							<select class="form-control quiz_type" data-id="<?php echo $adm_c['id'].$j; ?>" name="quiz_type" id="quiz_type_<?php echo $adm_c['id'].$j; ?>" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false_<?php echo $adm_c['id'].$j; ?>">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question_<?php echo $adm_c['id'].$j; ?>" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer_<?php echo $adm_c['id'].$j; ?>" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
												<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
        </div></div>	
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<a href="#!" class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>"><i class="fa fa-times"></i> Delete</a>
								<a href="#!" class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
							</div>
						</div>
					</div>
					<div class="collapse" id="c_course<?php echo $adm_c['id'].$j; ?>a">
						<table class="table table-striped">
							<tbody>
							<tr>
								<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
							</tr>	
							<?php 
								if(!empty($adm_c['lessons']))
									{
										foreach($adm_c['lessons'] as $lsn)
											{
												// $adm_c['iscomment']=$this->mcomment_model->getslidecommentcount($lsn['id']);

							?>
							<tr>
								<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
								<td>
									<a href="#!" class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
										<i class="fa fa-fw fa-edit"></i> Edit
									</a>
								</td>
								<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
								<td ><a class="lp_buttons lb_bg_two tab_a_pad "><i class="fa fa-circle"></i> 
								<?php if(!empty($adm_c['iscomment'])){echo 'Admin Comment';}  ; ?></a></td>
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
								if(!empty($adm_c[0]['quiz']))
									{
										foreach($adm_c[0]['quiz'] as $lsn)
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
				<?php $j++; }
									}
									else{
										echo "No data found";
									}
				?>
			</div>	
		

							</div>
							</td>
											</tr>

											<?php
											}
											// print_r($course_result[$adm['id']]);
										if($course_lang->pashto == '1')
											{
												if(isset($course_result[$adm['id']]['pashto'][0]['updated_on']))
												{
													$udate=$course_result[$adm['id']]['pashto'][0]['updated_on'];
												}
												else{
													$udate=0;
												}
												if(isset($course_result[$adm['id']]['pashto'][0]['created_on']))
												{
													$cdate=$course_result[$adm['id']]['pashto'][0]['created_on'];
												}
												else{
													$cdate=0;
												}
												if($course_result[$adm['id']]['pashto']!='no_lesson')
												{
													$cnt=count($course_result[$adm['id']]['pashto']);
												}
												else{
													$cnt=0;
												}
												echo '<tr>
													  <td><a data-toggle="collapse" data-target="#'.$adm['id'].'_pashto" href="#!"  class="pop-details"  data-udt="'.date('d-m-Y|h:i:sa',strtotime($udate)).'" data-nolsn="'.$cnt.'" data-dt="'.date('d-m-Y|h:i:sa',strtotime($cdate)).'" data-language="Pashto" data-course="'.$course_name_d.'" data-status="'.$s.'" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-plus-circle"></i>Pashto</a></td>
													  <td>'.$cnt.'</td>
													  
														<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_pashto" href="#!" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View | Edit |</a>
														<button type="button" class="btn btn-xs bg-olive add_course" data-lang="pashto"  data-id="'.$this->crc_encrypt->encode($adm['id']).'" data-toggle="modal" data-target="#modal-default-new">Add</button>
														
									
									</td>
									</tr>
									<tr>
									<td colspan="3">
									<div class="collapse" id="'.$adm['id'].'_pashto">';
												?>

<div id="c_accordion<?php echo $adm['id'];?>">

						<?php $j++; if(!empty($course_result[$adm['id']]['pashto'][0]['id'])){  foreach($course_result[$adm['id']]['pashto'] as $adm_c) {  ?>

						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="tab_a_pad" data-toggle="collapse" data-target="#c_course<?php echo $adm_c['id'].$j; ?>a" ><i class="fa fa-plus-circle"></i> <?php echo $adm_c['lesson_name']; ?></a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
										<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz<?php echo $adm_c['id'].$j; ?>"><i class="fa fa-plus"></i> Quiz.</a>
										<a> Created By <?php $fname=$this->mfaculty_model->getStaff($course_result[$adm['id']]['pashto'][0]['created_by']);echo $fname[0]['name']; ?></a>
		
		<div class="modal fade in" id="modal-add-quiz<?php echo $adm_c['id'].$j; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal add_quiz_form"  data-id="<?php echo $adm_c['id'].$j; ?>" enctype="multipart/form-data" id="add_quiz_form_<?php echo $adm_c['id'].$j; ?>">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
							<?php 
							// print_r($course_result[$adm['id']]['english'][0]);
							$list_lesson=$course_result[$adm['id']]['pashto'];
							// print_r($list_lesson);
							?>
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id_<?php echo $adm_c['id'].$j; ?>" >
								<?php foreach($list_lesson as $lsn_drop) { 
								?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
							<select class="form-control quiz_type" data-id="<?php echo $adm_c['id'].$j; ?>" name="quiz_type" id="quiz_type_<?php echo $adm_c['id'].$j; ?>" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false_<?php echo $adm_c['id'].$j; ?>">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question_<?php echo $adm_c['id'].$j; ?>" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer_<?php echo $adm_c['id'].$j; ?>" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
												<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
        </div></div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a href="#!" class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
									</div>
								</div>
							</div>
							<div class="collapse" id="c_course<?php echo $adm_c['id'].$j; ?>a">
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm_c['lessons']))
											{
												foreach($adm_c['lessons'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
										<td>
											<a href="#!" class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
												<i class="fa fa-fw fa-edit"></i> Edit
											</a>
										</td>
										<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td ><a class="lp_buttons lb_bg_two tab_a_pad "><i class="fa fa-circle"></i> 
								<?php if(!empty($adm_c['iscomment'])){echo 'Admin Comment';}  ; ; ?></a></td>
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
										if(!empty($adm_c[0]['quiz']))
											{
												foreach($adm_c[0]['quiz'] as $lsn)
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
						<?php $j++; }
											}
											else{
												echo "No data found";
											}
						?>
					</div>	
				

									</div>
									</td>
													</tr>

													<?php
											}
											
										if($course_lang->malayalam == '1')
											{
												if(isset($course_result[$adm['id']]['malayalam'][0]['updated_on']))
												{
													$udate=$course_result[$adm['id']]['malayalam'][0]['updated_on'];
												}
												else{
													$udate=0;
												}
												if(isset($course_result[$adm['id']]['malayalam'][0]['created_on']))
												{
													$cdate=$course_result[$adm['id']]['malayalam'][0]['created_on'];
												}
												else{
													$cdate=0;
												}
												if($course_result[$adm['id']]['malayalam']!='no_lesson')
												{
													$cnt=count($course_result[$adm['id']]['malayalam']);
												}
												else{
													$cnt=0;
												}
												echo '<tr>
													  <td><a data-toggle="collapse" data-target="#'.$adm['id'].'_malayalam" href="#!"  class="pop-details"  data-udt="'.date('d-m-Y|h:i:sa',strtotime($udate)).'" data-nolsn="'.$cnt.'" data-dt="'.date('d-m-Y|h:i:sa',strtotime($cdate)).'" data-language="malayalam" data-course="'.$course_name_d.'" data-status="'.$s.'" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-plus-circle"></i>Malayalam</a></td>
														<td>'.$cnt.'</td>
													  
														<td><a data-toggle="collapse" data-target="#'.$adm['id'].'_malayalam" href="#!" class="btn btn-xs bg-olive" data-id="'.$this->crc_encrypt->encode($adm['id']).'"><i class="fa fa-mail-forward"></i> View | Edit |</a>
														<button type="button" class="btn btn-xs bg-olive add_course" data-lang="malayalam"  data-id="'.$this->crc_encrypt->encode($adm['id']).'" data-toggle="modal" data-target="#modal-default-new">Add</button>														
									
									</td>
									</tr>
									<tr>
									<td colspan="3">
									<div class="collapse" id="'.$adm['id'].'_malayalam">';
								
												?>

<div id="c_accordion<?php echo $adm['id'];?>">

						<?php $j++; if(!empty($course_result[$adm['id']]['malayalam'][0]['id'])){  foreach($course_result[$adm['id']]['malayalam'] as $adm_c) {  ?>

						<div class="card mb-2">
							<div class="card-header tab_main_height">
								<div class="row padd_4e">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="tab_a_pad" data-toggle="collapse" data-target="#c_course<?php echo $adm_c['id'].$j; ?>a" ><i class="fa fa-plus-circle"></i> <?php echo $adm_c['lesson_name']; ?></a>
									</div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a class="lp_buttons lb_bg_one tab_a_pad lesson_slide" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-slide"><i class="fa fa-plus"></i> Slide.</a>
										<a class="lp_buttons lb_bg_two tab_a_pad lesson_quiz" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" data-toggle="modal" data-target="#modal-add-quiz<?php echo $adm_c['id'].$j; ?>"><i class="fa fa-plus"></i> Quiz.</a>
										<a>Created By <?php $fname=$this->mfaculty_model->getStaff($course_result[$adm['id']]['malayalam'][0]['created_by']);echo $fname[0]['name']; ?></a>
		
		<div class="modal fade in" id="modal-add-quiz<?php echo $adm_c['id'].$j; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Quiz</h4>
              </div>
				<div class="modal-body">
					<form class="form-horizontal add_quiz_form"  data-id="<?php echo $adm_c['id'].$j; ?>" enctype="multipart/form-data" id="add_quiz_form<?php echo $adm_c['id'].$j; ?>">
						<div class="form-group">
							<label for="quiz_lesson_id" class="col-sm-4 control-label">Select Lesson</label>
							<div class="col-sm-8">
							<?php 
							// print_r($course_result[$adm['id']]['english'][0]);
							$list_lesson=$course_result[$adm['id']]['malayalam'];
							// print_r($list_lesson);
							?>
								<select class="form-control" name="quiz_lesson_id" id="quiz_lesson_id_<?php echo $adm_c['id'].$j; ?>" >
								<?php foreach($list_lesson as $lsn_drop) { 
								?>
									<option value="<?php echo $lsn_drop['id']; ?>"><?php echo $lsn_drop['lesson_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="quiz_type" class="col-sm-4 control-label">Select Quiz Type</label>
							<div class="col-sm-8">
							<select class="form-control quiz_type" data-id="<?php echo $adm_c['id'].$j; ?>" name="quiz_type" id="quiz_type_<?php echo $adm_c['id'].$j; ?>" >
									<option value="true_or_false">True or False</option>
									<option value="right_answer">Right Answer</option>
									<option value="drag_and_drop">Drag and Drop</option>
									<option value="reorder">Reorder</option>
								</select>
							</div>
						</div>
						
						<div class="row" id="quiz_display_area">
							<!---------------Quiz type 1--------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="true_or_false_<?php echo $adm_c['id'].$j; ?>">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="quiz_question_<?php echo $adm_c['id'].$j; ?>" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<select class="form-control" name="trf_answer" id="trf_answer_<?php echo $adm_c['id'].$j; ?>" >
												<option value="true">True</option>
												<option value="false">False</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!---------------Quiz type 2-------------->
							<div class="col-lg-12 col-md-12 col-sm-12" id="right_answer_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
												<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="draganddrop_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
							<div class="col-lg-12 col-md-12 col-sm-12" id="reorder_quiz_<?php echo $adm_c['id'].$j; ?>" style="display:none;">
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
        </div></div>	
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<a href="#!" class="lp_buttons lb_bg_one tab_a_pad pull-right delete_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>"><i class="fa fa-times"></i> Delete</a>
										<a href="#!" class="lp_buttons lb_bg_two tab_a_pad pull-right edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($adm_c['id']); ?>" style="margin-right: 5px; margin-left: -9px;"><i class="fa fa-edit"></i> Edit</a>										
									</div>
								</div>
							</div>
							<div class="collapse" id="c_course<?php echo $adm_c['id'].$j; ?>a">
								<table class="table table-striped">
									<tbody>
									<tr>
										<td colspan="4"><u><h4><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Slides</h4></u></td>
									</tr>	
									<?php 
										if(!empty($adm_c['lessons']))
											{
												foreach($adm_c['lessons'] as $lsn)
													{
									?>
									<tr>
										<td><i class="fa fa-fw fa-file-text-o"></i> <?php echo $lsn['slide_title']; ?></td>
										<td>
											<a href="#!" class="lb_bg_two tab_a_pad"  data-toggle="modal" data-target="#slide_edit_now-new" data-id="<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" style="color:#000; cursor:pointer;">
												<i class="fa fa-fw fa-edit"></i> Edit
											</a>
										</td>
										<td><a href="<?php echo base_url(); ?>admin/lesson/preview/<?php echo $this->crc_encrypt->encode($lsn['id']); ?>" target="_blank" style="color:#000;"><i class="fa fa-fw fa-eye"></i> Preview</a></td>
										<td ><a class="lp_buttoif(!empty($adm_c['iscomment'])){echo 'Admin Comment';} ns lb_bg_two tab_a_pad "><i class="fa fa-circle"></i> 
								<?php if(!empty($adm_c['iscomment'])){echo 'Admin Comment';}  ; ?></a></td>
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
										if(!empty($adm_c[0]['quiz']))
											{
												foreach($adm_c[0]['quiz'] as $lsn)
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
						<?php $j++; }
											}
											else{
												echo "No data found";
											}
						?>
					</div>	
				

									</div>
									</td>
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
				</div>
			  </div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
			<div class="box box-danger">
				<?php 
					if(!empty($result))
						{ 
				?>
				<div class="box-header with-border">
				  <h3 class="box-title">Course Information</h3>
				</div>
				<div class="table_padding">
					<dl class="dl-horizontal">
						<!-- <dt>Main Course:</dt>
						<dd><span id="main_c"></span></dd>
						<dt>Language:</dt>
						<dd><span id="main_l"></span></dd>
						<br> -->
						<dt>Current Course:</dt>
						<dd><span id="current_c"></span></dd>
						<dt>Language:</dt>
						<dd><span id="current_l"></span></dd>
						<dt>No. of Lessons:</dt>
						<dd><span id="nol"></span></dd>
						<dt>Status:</dt>
						<dd><span id="current_s"></span></dd>
						<br>
						<dt>Date and Time</dt>
						<dd><span id="c_date"></span></dd>
						<dt>Course Creation: </dt>
						<dd></dd>
						<dt>Date:</dt>
						<dd><span id="cc_date"></span></dd>
						<dt>Time:</dt>
						<dd><span id="cc_time"></span></dd>
						<br>
						<dt>Last Update :</dt>
						<dd></dd>
						<dt>Date:</dt>
						<dd><span id="lt_date"></span></dd>
						<dt>Time:</dt>
						<dd><span id="lt_time"></span></dd>
						
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
							<!-- <input type="textbox" class="form-control" id="course_name" name="course_name" placeholder="Course Name"> -->
							<select id="course_name" name="course_name">
								<?php
								$token=$this->mapi_model->getToken();
							$courses=$this->mapi_model->getCourseList($token);
							$course_list=$courses;
							foreach($course_list as $course)
							{
								echo '<option value="'.$course->Id.'~'.$course->Name.'">'.$course->Name.'</option>';
							}
								?>
								<!-- <option>
								</option> -->
							</select>
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
						case 'mp4':
						case 'webm':
						case 'ogv':
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
				
				
				$('.delete_now-new').click(function(){
					
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
						
						$.post( "<?php echo base_url(); ?>admin/lesson/delete", { 
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

				$('.delete_quiz').click(function(){
					
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
						
						$.post( "<?php echo base_url(); ?>admin/quiz/delete", { 
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
				
				
//for lesson modal






				$('.edit_now').click(function(){
					
					var etid = $(this).attr("data-id");
					$('#edit_eid').val(etid);
					// alert($('#edit_eid').val());
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
										$(".edit_form_c").trigger("reset");
										console.log(data);
										var obj = JSON.parse(data);
										$('#edit_eid').val(etid);
										$('#edit_course_name').val(obj['0'].course_name);
										$('#hidden_edit_icon_file').val(obj['0'].icon_file);
										// $('.textarea, .wysihtml5-sandbox').append(obj['0'].course_desc);
										// $('#edit_brief_desc').data("wysihtml5").editor.setValue(obj['0'].course_desc);
										$('.wysihtml5-editor').html('<p>'+obj['0'].course_desc+'dsggfdgdfgdf</p>');
										console.log(obj['0'].course_desc);
										console.log($('.wysihtml5-editor').html());
										// $('.textarea', $('.wysihtml5-sandbox').contents()).append('Hello World!')
										// $('#edit_brief_desc', $('.wysihtml5-sandbox').contents()).append('sfsdfsdf'+obj['0'].course_desc)
										// $('#edit_brief_desc .wysihtml5-sandbox body').append('sfsdfsdf'+obj['0'].course_desc);
										
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
					var edit_form 				= $('#edit_form_c')[0];
					var data 					= new FormData(edit_form);  
					// alert();
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
			$(document).on("click", ".deapprove_course_main", function(event){
					//alert('Hello');
					var course_id = $(this).attr("data-id");
					Swal({
					  title: 'Are you sure?',
					  text: "You want to deapprove this course?",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, Deapprove Course!'
					}).then((result) => {
					  if (result.value) {
						
						$.post( "<?php echo base_url(); ?>admin/course/draft_status", { 
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


	
<div class="modal fade in" id="modal-default-new">
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
							<input type="hidden" name="course_id" id="course_id" >
							<input type="hidden" name="course_id" id="course_lang" >
						</div>
					</div>
					<div class="form-group">
						<label for="course_name" class="col-sm-4 control-label">Lesson Name</label>
						<div class="col-sm-8">
							<!-- <input type="textbox" class="form-control" id="lesson_name_new" name="lesson_name" placeholder="Lesson Name"> -->
							<select class="form-control" id="lesson_name_new" name="lesson_name">
								<?php
								$token=$this->mapi_model->getToken();
							$lessons=$this->mapi_model->getLessonList($token);
							$lesson_list=$lessons;
							foreach($lesson_list as $lesson)
							{
								echo '<option value="'.$lesson->Code.'~'.$lesson->Name.'">'.$lesson->Name.'</option>';
							}
								?>
								<!-- <option>
								</option> -->
							</select>
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
               <button type="button" class="btn btn-flat btn-success save_now-new" data-action="publish">Save Changes</button>
				</form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		<div class="modal fade in" id="modal-edit-new">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Lesson</h4>
              </div>
              <form class="form-horizontal" enctype="multipart/form-data" id="edit_form_l">
			  <div class="modal-body">
					<div class="form-group">
						<label for="no_lessons" class="col-sm-4 control-label">Lesson Order</label>
						<div class="col-sm-8">
							<input type="textbox" class="form-control" id="edit_no_lessons2" name="edit_no_lessons" placeholder="Lesson Order">
							<input type="hidden" name="edit_eid" id="edit_eid_l" />
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
                <button type="button" class="btn btn-flat btn-success save_edit_now-new" data-action="edit_publish">Save Changes</button>
			  </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<div class="modal fade in" id="modal-view-new">
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
										<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
									</div>	
									<!--
									<div class="col-sm-4">
										<i class="fa fa-plus-square font-17 plus_file cus_pointer"></i>
									</div>
									-->
									<div class="col-sm-4">
									<div class="loader" style="display:none"></div>
									</div>
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
		
		
		<div class="modal fade in" id="slide_edit_now-new">
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
										<img class="loader" src="<?php echo base_url(); ?>front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
										<input type="hidden" name="edit_file_orginal" id="edit_file_orginal" />
									</div>	
									<!--
									<div class="col-sm-4">
										<i class="fa fa-plus-square font-17 plus_file cus_pointer"></i>
									</div>
									-->
									<div class="loader" style="display:none"></div>
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


				$('.pop-details').click(function()
				{
					// alert();
					var course_name=$(this).attr('data-course');
					var status=$(this).attr('data-status');
					var lcount=$(this).attr('data-nolsn');
					var lang=$(this).attr('data-language');
					var update=$(this).attr('data-udt').split('|');
					var udate=update[0];
					var utime=update[1];
					var created=$(this).attr('data-dt').split('|');
					var cdate=created[0];
					var ctime=created[1];

					$('#cc_date').html(cdate);
					$('#cc_time').html(ctime)
					$('#lt_date').html(udate);
					$('#lt_time').html(utime)
					$('#current_c').html(course_name);
					$('#nol').html(lcount);
					$('#current_l').html(lang);
					$('#current_s').html(status);

				});
								
				$('.quiz_type').change(function(){
					var curr_select = $(this).val();
					var id=$(this).attr('data-id');
					if(curr_select == 'true_or_false')
					{
						$('#true_or_false_'+id).show();
						$('#right_answer_'+id).hide();
						$('#draganddrop_'+id).hide();
						$('#reorder_quiz_'+id).hide();
					}
					
					if(curr_select == 'right_answer')
					{
						$('#true_or_false_'+id).hide();
						$('#right_answer_'+id).show();
						$('#draganddrop_'+id).hide();
						$('#reorder_quiz_'+id).hide();
					}
					
					if(curr_select == 'drag_and_drop')
					{
						$('#true_or_false_'+id).hide();
						$('#right_answer_'+id).hide();
						$('#draganddrop_'+id).show();
						$('#reorder_quiz_'+id).hide();
					}
					
					if(curr_select == 'reorder')
					{
						$('#true_or_false_'+id).hide();
						$('#right_answer_'+id).hide();
						$('#draganddrop_'+id).hide();
						$('#reorder_quiz_'+id).show();
					}
				});
				$('.add_course').click(function()
				{
					var course_id=$(this).attr('data-id');
					$('#course_id').val(course_id);
					$('#course_lang').val($(this).attr('data-lang'));
// alert($('#course_id').val());
					// alert(course_id);
				});
				/* Quiz radio button checks*/
				$(".add_quiz_form").on("submit", function(e){
						e.preventDefault();
						$('.loader').show();
						var quiz_type 	= $('#quiz_type_'+id).val();
						
						var id=$(this).attr('data-id');
						var fid=$(this).attr('id');
						var form		= $('#add_quiz_form_'+id)[0];
						var data		= new FormData(form);
						// 		var formData = {
        		//     'quiz_lesson_id'              : $('input[id=quiz_lesson_id_'+id+']').val(),
        		//     'quiz_type'             : $('input[id=quiz_type_'+id+']').val()
        		// };  
						data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
						// formData.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
						if(quiz_type == 'true_or_false')
							{
								var quiz_question = $('#quiz_question_'+id).val();
								if(quiz_question == '')
									{
										swal('Please enter a valid quiz question.');
										$('#quiz_question_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#quiz_question_'+id).addClass("success");
									}									
							}
						
						if(quiz_type == 'right_answer')
							{
								var ra_question = $('#ra_question_'+id).val();
								var raa_answer 	= $('#raa_answer_'+id).val();
								var rab_answer 	= $('#rab_answer_'+id).val();
								var rac_answer 	= $('#rac_answer_'+id).val();
								var rad_answer 	= $('#rad_answer_'+id).val();
								
								if(ra_question == '')
									{
										swal('Please enter a valid right answer quiz question.');
										$('#ra_question_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#ra_question_'+id).addClass("success");
									}
									
								if(raa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#raa_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#raa_answer_'+id).addClass("success");
									}
									
								if(rab_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#rab_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#rab_answer_'+id).addClass("success");
									}
									
								if(rac_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#rac_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#rac_answer_'+id).addClass("success");
									}
									
								if(rad_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#rad_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#rad_answer_'+id).addClass("success");
									}
							}
						
						if(quiz_type == 'drag_and_drop')
							{
								var dada_questiom	= $('#dada_questiom_'+id).val();
								var dada_answer		= $('#dada_answer_'+id).val();
								var dadb_questiom 	= $('#dadb_questiom_'+id).val();
								var dadb_answer 	= $('#dadb_answer_'+id).val();
								var dadc_questiom 	= $('#dadc_questiom_'+id).val();
								var dadc_answer 	= $('#dadc_answer_'+id).val();
								
								if(dada_questiom == '')
									{
										swal('Please enter a valid question for option "A".');
										$('#dada_questiom_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dada_questiom_'+id).addClass("success");
									}
									
									
								if(dada_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#dada_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dada_answer_'+id).addClass("success");
									}
									
								if(dadb_questiom == '')
									{
										swal('Please enter a valid question for option "B".');
										$('#dadb_questiom_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dadb_questiom_'+id).addClass("success");
									}
									
									
								if(dadb_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#dadb_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dadb_answer_'+id).addClass("success");
									}
									
								if(dadc_questiom == '')
									{
										swal('Please enter a valid question for option "C".');
										$('#dadc_questiom_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dadc_questiom_'+id).addClass("success");
									}
									
									
								if(dadc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#dadc_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dadc_answer_'+id).addClass("success");
									}
									
									
									
							}
						
						if(quiz_type == 'reorder')
							{
								var reoa_answer = $('#reoa_answer_'+id).val();
								var reob_answer	= $('#reob_answer_'+id).val();
								var reoc_answer	= $('#reoc_answer_'+id).val();
								var reod_answer = $('#reod_answer_'+id).val();
								
								if(reoa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#reoa_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#reoa_answer_'+id).addClass("success");
									}
									
								if(reob_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#reob_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#reob_answer_'+id).addClass("success");
									}
									
								if(reoc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#reoc_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#reoc_answer_'+id).addClass("success");
									}
									
								if(reod_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#reod_answer_'+id).addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#reod_answer_'+id).addClass("success");
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
													$('.loader').hide();
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
													$('.loader').hide();
													
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
				// Toggler.Init();
				
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
				
				// $('#admin_table').DataTable();
				
				$('#modal-add-slide').on('show.bs.modal', function (e) {
					var invoker = $(e.relatedTarget);
					var lessonid = invoker.data('id');
					$('#lessonid').val(lessonid);
				});
				
				/* Edit slide information here */
				
				$('#slide_edit_now-new').on('show.bs.modal', function (e) {
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
					console.log(this.value);
					var ext = this.value.match(/\.(.+)$/)[1];
					console.log(ext+sel_media);
					// alert(ext);
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
							// alert(ext)
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
				
				
				
				
				
				
				$( ".save_now-new" ).click(function( event ) {
					  
					var lesson_name 	= $('#lesson_name').val();
					var no_lessons 		= $('#no_lessons').val();
				//	alert(no_lessons);
					var form 			= $('#add_lesson_form')[0];
					var data 			= new FormData(form);  
					var course_id=$('#course_id').val();
					var course_lang=$('#course_lang').val();
					//alert(course_id+'===='+course_lang);
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
					data.append("course_id", course_id);
					data.append("language", course_lang);
					// alert(JSON.stringify(data));
					console.log(data);
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
				
				
				$('.edit_now-new').click(function(){
					var etid = $(this).attr("data-id");
					$('#edit_eid_l').val(etid);
					// alert($('#edit_eid_l').val());
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
										console.log(obj['0'].lesson_order);
										$('#edit_no_lessons2').val(obj['0'].lesson_order);
										$('#modal-edit-new').modal('show');
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
				
				
				$('.save_edit_now-new').click(function(){
				
					var edit_eid 				= $('#edit_eid_l').val();
					var edit_lesson_name 		= $('#edit_lesson_name').val();
					var edit_icon_file 			= $('#edit_icon_file').val();
					var edit_no_lessons 		= $('#edit_no_lessons2').val();
					var hidden_edit_icon_file 	= $('#hidden_edit_icon_file').val();
					var edit_form 				= $('#edit_form_l')[0];
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
						$('#edit_no_lessons2').addClass("error");
						return false;
					}
					else 
					{
						$('#edit_no_lessons2').addClass("success");
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
											// alert(data);
										   });
									},
									error: function (e) {
										
										swal(e.responseText);
										console.log("ERROR : ", e);
									}
								});					
							
					event.preventDefault();
				});
				
				
				
				
				$('.lesson_slide').on('click', function (e) {
					var lesson_id = $(this).attr("data-id");
					$('#modal-add-quiz').show();
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
					$('.loader').show();
					if(slide_title == '')
					{	
						swal('Slide title should not be empty');
						$('#slide_title').addClass("error");
						$('.loader').hide();
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
						$('.loader').hide();
						return false;
					}
					
					
					
					if( document.getElementById("slide_media_file").files.length == 0 )
						{
							swal('Please select a file');
							$('#slide_media_file').addClass("error");
							$('.loader').hide();
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
										$('.loader').hide();
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
					$('.loader').show();
					if(edit_slideid == '')
					{	
						swal('Slide information concerned with this edit is not retrieved.');
						$('#edit_slide_title').addClass("error");
						$('.loader').hide();
						return false;
					}
					
					if(edit_slide_title == '')
					{	
						swal('Slide title should not be empty');
						$('#edit_slide_title').addClass("error");
						$('.loader').hide();
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
										// console.log(data);
										swal({title: "Message", text: data, type: 
										"info"}).then(function(){ 
										   location.reload();
										   });
									},
									error: function (e) {
										
										swal(e.responseText);
										$('.loader').hide();
										console.log("ERROR : ", e);
									}
								});					
					event.preventDefault();
				});
				
				$('.edit_quiz').click(function(){
					var etid = $(this).attr("data-id");
					$('#edit_quiz_id').val(etid);
					$.post("<?php echo base_url(); ?>admin/quiz/getquiz", { 
									id: etid,
									<?=$csrf['name'];?>: "<?=$csrf['hash'];?>"							
								}, function(data) {
									
									if(data == 'empty_id')
									{
										swal({title: "Message", text: 'Sorry! We are not able to process quiz information concerned with this edit', type: 
										"info"}).then(function(){ 
										   location.reload();
										   }
										);
									}
									else 
									{
										$(".edit_form").trigger("reset");
										console.log(data);
										// var obj = JSON.parse(data);
										$('#edit_quiz_display_area').html(data);
										
										$('#modal-edit-quiz').modal('show');
										$('.overlay').hide();
									}
						})
						.fail(function() {
							swal({title: "Message", text: 'Sorry! We are not able to process quiz information concerned with this edit', type: 
								"info"}).then(function(){ 
								  //  location.reload();
								   }
								);
						})
				});
				
				

				$(".edit_quiz_form").on("submit", function(e){
						e.preventDefault();
						$('.loader').show();
						var quiz_type 	= $('#edit_quiz_type').val();
						
						var id=$(this).attr('data-id');
						var fid=$(this).attr('id');
						var form		= $('#edit_quiz_form')[0];
						var data		= new FormData(form);
						// 		var formData = {
        		//     'quiz_lesson_id'              : $('input[id=quiz_lesson_id_'+id+']').val(),
        		//     'quiz_type'             : $('input[id=quiz_type_'+id+']').val()
        		// };  
						data.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
						// formData.append("<?=$csrf['name'];?>", "<?=$csrf['hash'];?>");
						if(quiz_type == 'true_or_false')
							{
								var quiz_question = $('#edit_quiz_question').val();
								if(quiz_question == '')
									{
										swal('Please enter a valid quiz question.');
										$('#edit_quiz_question').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_quiz_question').addClass("success");
									}									
							}
						
						if(quiz_type == 'right_answer')
							{
								var ra_question = $('#edit_ra_question').val();
								var raa_answer 	= $('#edit_raa_answer').val();
								var rab_answer 	= $('#edit_rab_answer').val();
								var rac_answer 	= $('#edit_rac_answer').val();
								var rad_answer 	= $('#edit_rad_answer').val();
								
								if(ra_question == '')
									{
										swal('Please enter a valid right answer quiz question.');
										$('#edit_ra_question').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_ra_question').addClass("success");
									}
									
								if(raa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#edit_raa_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_raa_answer').addClass("success");
									}
									
								if(rab_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#edit_rab_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_rab_answer').addClass("success");
									}
									
								if(rac_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#edit_rac_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_rac_answer').addClass("success");
									}
									
								if(rad_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#edit_rad_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_rad_answer').addClass("success");
									}
							}
						
						if(quiz_type == 'drag_and_drop')
							{
								var dada_questiom	= $('#edit_dada_questiom').val();
								var dada_answer		= $('#edit_dada_answer').val();
								var dadb_questiom 	= $('#edit_dadb_questiom').val();
								var dadb_answer 	= $('#edit_dadb_answer').val();
								var dadc_questiom 	= $('#edit_dadc_questiom').val();
								var dadc_answer 	= $('#edit_dadc_answer').val();
								
								if(dada_questiom == '')
									{
										swal('Please enter a valid question for option "A".');
										$('#edit_dada_questiom').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_dada_questiom').addClass("success");
									}
									
									
								if(dada_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#edit_dada_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dada_answer').addClass("success");
									}
									
								if(dadb_questiom == '')
									{
										swal('Please enter a valid question for option "B".');
										$('#edit_dadb_questiom').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_dadb_questiom').addClass("success");
									}
									
									
								if(dadb_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#edit_dadb_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_dadb_answer').addClass("success");
									}
									
								if(dadc_questiom == '')
									{
										swal('Please enter a valid question for option "C".');
										$('#edit_dadc_questiom').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#dadc_questiom').addClass("success");
									}
									
									
								if(dadc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#edit_dadc_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_dadc_answer').addClass("success");
									}
									
									
									
							}
						
						if(quiz_type == 'reorder')
							{
								var reoa_answer = $('#edit_reoa_answer').val();
								var reob_answer	= $('#edit_reob_answer').val();
								var reoc_answer	= $('#edit_reoc_answer').val();
								var reod_answer = $('#edit_reod_answer').val();
								
								if(reoa_answer == '')
									{
										swal('Please enter a valid answer for option "A".');
										$('#edit_reoa_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_reoa_answer').addClass("success");
									}
									
								if(reob_answer == '')
									{
										swal('Please enter a valid answer for option "B".');
										$('#edit_reob_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#reob_answer').addClass("success");
									}
									
								if(reoc_answer == '')
									{
										swal('Please enter a valid answer for option "C".');
										$('#edit_reoc_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_reoc_answer').addClass("success");
									}
									
								if(reod_answer == '')
									{
										swal('Please enter a valid answer for option "D".');
										$('#edit_reod_answer').addClass("error");
										$('.loader').hide();
										return false;
									}
								else 
									{
										$('#edit_reod_answer').addClass("success");
									}
							}
							
						$.ajax({
									type: "POST",
									enctype: 'multipart/form-data',
									url: "<?php echo base_url(); ?>admin/quiz/update_quiz",
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
													$('.loader').hide();
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
													console.log(e);
													$('.loader').hide();
													
												   //location.reload();
												   });
									}
								});					
							
						event.preventDefault();	
						
				 });
				
			

	</script>