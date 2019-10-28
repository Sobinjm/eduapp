
  <!-- =============================================== -->
  <?php $this->load->view('admin/header'); ?>
  <!-- Left side column. contains the sidebar -->
  <?php //$this->load->view('admin/main_sidebar'); ?>
  <!-- =============================================== -->

<style>
    .breadcrumb{
        display:none;
    }
    .hero{
        background-image:url('<?php echo base_url(); ?>admdist/dist/img/dbg.jpeg');
        min-height:250px;
        background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    }
      .cus_btn{
        width: 15%;
    font-weight: bold;
    margin-top: 20px;
    }
    .hero .header{
            font-size: 24px;
    font-weight: bold;
    }
    .small-box{
        border: 0;
      background-color: white;
      min-height: 175px;
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    justify-content: space-between;
    }
    .small-box>.small-box-footer{
        background-color: transparent;
        padding: 10px;
    }
    .small-box>.small-box-footer:hover {
    color: #fff;
    background: rgba(0,0,0,0);
}
.small-box>.inner .title{
    color:#ec7824 !important;
    font-weight:bold;
}
.small-box h3{
    z-index: 5;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.25);
    text-align: left;
}
.leftCon{
    background-color: white;
    padding: 10px;
}
.leftCon .title{
     color:#ec7824 !important;
    font-weight:bold;
}
</style>




<div class="container">
  <div class="content-wrapper">
	<section class="content-header">
      <h1 >
        Dashboard<br/>
        <small>data sumamry</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="hero">
        <div class="header">Welcome Back, </div>
        <!-- <button  class="btn btn-danger pull-right cus_btn">Lesson Panel</button> -->
    </section>

    <section class="content">
	  <div class="row">
	      <!-- <div class="col-lg-4 col-xs-12 leftCon">
	           <div>
	          <div class="title">Welcome to E-learning Trainer Panel</div>
	          <p>
	              <div><strong>Lorem ipsum dolor sit amet</strong></div>
	              consectetur adipiscing elit. Praesent cursus lectus bibendum, euismod odio posuere, bibendum purus. Donec sed leo sagittis felis fringilla bibendum et id nibh. Nam sodales, turpis vitae tincidunt laoreet, erat est euismod purus, non viverra ligula dui a mauris. Nulla vestibulum consectetur eros. Fusce ullamcorper facilisis .<br/><br/>
<div><strong>Lorem ipsum dolor sit amet</strong></div>
In vitae malesuada elit. Fusce magna ligula, malesuada sit amet sagittis id, lobortis ac est. Phasellus in fermentum turpis, at tempor risus. Aliquam ac dolor metus. Fusce nibh risus, tristique non ultrices ut, varius et augue. Quisque sagittis tellus et lectus maximus
	          </p>
	          <button type="button" class="btn btn-block btn-primary btn-flat" >  <i class="ion ion-ios-videocam"></i> Tutorial Video</button>
	            </div>
	      </div> -->
	      <div class="col-lg-12 col-xs-12">
	           <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-orangees">
            <div class="inner">
                	<p class="title">All courses</p>
			
			
            </div>
            <div class="icon">
                	
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/course" class="small-box-footer">
                <h3></h3>
                More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-orangees">
            <div class="inner">
             

              <p class="title">Draft</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/course/draft" class="small-box-footer">
                 <h3></h3>
                 More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-orangees">
            <div class="inner">
             

              <p class="title">Pending</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/course/pending" class="small-box-footer">
                 <h3></h3>
                 More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-orangees">
            <div class="inner">
             

              <p class="title">Notifications</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url(); ?>trainer/notification" class="small-box-footer">
                 <h3></h3>
                 More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	      </div>
       
      </div>
	  
		<div class="row">
		
		</div>
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>