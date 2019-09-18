
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
        Lessons Management
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lessons Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class='row'>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box box-danger">
				<div class="box-header with-border">
				  <h3 class="box-title">Add new lesson</h3>
				</div>
				<form>
				  <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						  <label>Choose Course</label>
						  <select class="form-control">
							<option>Select a Course</option>
							<option>Course 1</option>
							<option>Course 2</option>
							<option>Course 3</option>
						  </select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						  <label>Lesson Name</label>
						  <input type="text" class="form-control" placeholder="Lesson Name">
						</div>
						<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						  <label>Lesson Duration</label>
						  <input type="text" class="form-control" placeholder="Lesson Duration">
						</div>
					</div>
				  </div>
				  <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" style="position: relative;">
								<label>Lesson Description</label>
								<textarea class="form-control" rows="3" placeholder="Enter ..." spellcheck="true" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s;"></textarea>
							</div>
						</div>
					</div>
				  </div>
				  <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" style="position: relative;">
								<label>Lesson Type</label>
								<select class="form-control">
									<option>Select a Type</option>
									<option>Video</option>
									<option>Image</option>
									<option>Audio</option>
								</select>
							</div>
						</div>
						
					</div>
				  </div>
				  <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label for="exampleInputFile">Upload File</label>
							<div class="row" style="border: 1px dotted #000; padding: 12px; margin-bottom: 5px;">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								  <input type="file" id="exampleInputFile">
								</div>  
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								  <button type="button" class="btn btn-block btn-success btn-xs" style="width:90px;"><i class="fa fa-plus"></i> Add more</button>
								</div> 
							</div>
							 <p class="help-block">Supported Formats: <br/>Imge formats:  jpg, jpeg, png.Video Formats: mp4, flv. Audio formats: mp3,wav,</p>
							</div>
						</div>
						
					</div>
				  </div>
				  
				  
				  <div class="box-footer">
					<button type="submit" class="btn btn-danger pull-right">Add Lessons</button>
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
	<script>
		$(document).ready(function() 
			{
				$('#admin_table').DataTable();
			});
	</script>