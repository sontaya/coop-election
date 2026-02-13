<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url()?>uploads/dusit.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SDU eVote</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <?php 

    if(isset($this->session->userdata['logged_admin'])){
      $level = $this->session->userdata['user_level'];

 ?>
    
      <nav class="mt-2">       

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             
         
          <li class="nav-header">ผู้ดูและระบบ</li>
           <?php if($level=='1'){?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/home');?>" class="nav-link <?php if($this->uri->segment(2)=="home"){echo ' active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> 
           <?php }?>
           <?php if($level=='3'){?>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_process');?>" class="nav-link <?php if($this->uri->segment(3)=="election_process"){echo ' active';}?>">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>ประกาศผลการเลือกตั้ง</p>
            </a>
          </li>   
           <?php }?>
           <?php if($level=='1'){?>      
          <li class="nav-item">
            <a href="<?php echo base_url('admin/candidate');?>" class="nav-link <?php if($this->uri->segment(2)=="candidate"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>ข้อมูลผู้สมัคร</p>
            </a>
          </li>
 <?php }?>
           <?php if($level=='4' || $level=='1'){?>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/lotto/lotto1');?>" class="nav-link <?php if($this->uri->segment(3)=="lotto1"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>จับรางวัล 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/lotto/lotto2');?>" class="nav-link <?php if($this->uri->segment(3)=="lotto2"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>จับรางวัล 2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/lotto/lotto3');?>" class="nav-link <?php if($this->uri->segment(3)=="lotto3"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>จับรางวัล 3</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/lotto/lotto4');?>" class="nav-link <?php if($this->uri->segment(3)=="lotto4"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>จับรางวัล 4</p>
            </a>
          </li>
   
           <?php }?>
           <?php if($level=='2' || $level=='1'){?>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/index');?>" class="nav-link <?php if($this->uri->segment(3)=="index"){echo ' active';}?>">
              <i class="nav-icon fas fa-table"></i>
              <p>รายงานผลการเลือกตั้ง</p>
            </a>
          </li>
        <?php } }?>
          
          <li class="nav-header">ช่วยเหลือ</li>
         
           <li class="nav-item">
            <a href="<?php echo base_url()?>admin/login/logout" class="nav-link">
              <i class="nav-icon fas fa-door-closed"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>