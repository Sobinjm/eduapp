
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
      Comment Summary
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Comment Summary</li>
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
							<th>Slide Name</th>
							<th>Created By</th>
							<th>Task</th>
							<th>Status</th>
							<th>Creade on</th>
							<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
                            $slno=0;
                            // print_r($comments);
									foreach($comments as $comment) {
                                        if($comment['status']==0)
						                {
                                            $cmt_status="Pending";
                                        }
                                        else{
                                            $cmt_status="Completed";
                                        } 
										$slno++;?>
								<tr>
								<td><?php echo $slno; ?></td>
									<td><?php echo $result['0']['slide_title']; ?></td>
									<td><?php echo $comment['name']; ?></td>
									<td><?php echo $comment['comment']; ?></td>
									<td><?php echo $cmt_status; ?></td>
									<td><?php echo date('d-m-Y|h:i:sa',strtotime($comment['updated_at'])); ?></td>
									<td><a href="<?php echo base_url().'admin/lesson/preview/'.$url; ?>">View</a></td>
									
									
								</tr>
								<?php } ?>
						</tbody>
						<tfoot>
							<tr>
							<th>#</th>
								<th>Slide Name</th>
								<th>Created By</th>
								<th>Task</th>
								<th>Status</th>
								<th>Creade on</th>
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
	
   		
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>
	 <?php 
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
	?>
	