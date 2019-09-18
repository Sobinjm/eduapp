<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>admdist/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
		<li class="<?php if($this->uri->segment(2) == 'dashboard'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/dashboard'; ?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <?php if($this->session->role == 0){ ?>
		<li class="<?php if($this->uri->segment(2) == 'staff'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/staff'; ?>">
            <i class="fa fa-user"></i><span>Admin</span>
          </a>
        </li>
		<?php } ?>
		<li class="<?php if($this->uri->segment(2) == 'faculty'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/faculty'; ?>">
            <i class="fa fa-group"></i><span>Faculty</span>
          </a>
        </li>
		
		<li class="<?php if($this->uri->segment(2) == 'student'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/student'; ?>">
            <i class="fa fa-graduation-cap"></i><span>Students</span>
          </a>
        </li>
		
        <li class="<?php if($this->uri->segment(2) == 'course'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/course'; ?>">
            <i class="fa fa-list"></i><span>All Courses</span>
          </a>
		  <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(3) == 'pending'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/pending'; ?>"><i class="fa fa-circle-o"></i> Pending List</a></li>
            <li class="<?php if($this->uri->segment(3) == 'draft'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/draft'; ?>"><i class="fa fa-circle-o"></i> Draft List</a></li>
            <li class="<?php if($this->uri->segment(3) == 'published'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/published'; ?>"><i class="fa fa-circle-o"></i> Published</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'lesson'){ echo 'active'; } ?>">
          <a href="<?php echo base_url().'admin/lesson'; ?>">
            <i class="fa fa-book"></i><span>Lessons</span>
          </a>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>