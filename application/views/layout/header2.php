<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SDU Election 2022">
    <meta name="author" content="paphawin panyasai">
    <meta name="generator" content="">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>uploads/favicon.ico">

    <title>Coop eVote</title>

        <!-- FAVICONS-->
    <link rel="shortcut icon" href="<?php echo base_url();?>uploads/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url();?>uploads/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url();?>uploads/img/favicon-16x16.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url();?>uploads/img/android-chrome-192x192.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url();?>uploads/img/android-chrome-512x512.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/style.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/front/jquery-3.3.1.min.js"></script>    
    <!-- Custom styles for this template -->
     <style>
    
        #bnav li.nav-item {
         border-right: 2px solid #f8f8f8;
         border-top: 2px solid #f8f8f8;
         border-bottom: 2px solid #f8f8f8;
         
        }   
        #bnav li.nav-item:first-child {
  border-left: 3px solid #f8f8f8;
 
}  
.bg-custom-2 {
background-image: linear-gradient(180deg, #5ab5f7 0%, #0073c6 100%);/*5ab5f7*/
}
    </style>
    <script>
        var baseurl='<?php echo base_url();?>';
    </script>

</head>
<body>
<?php
$query = $this->db->query("SELECT * FROM sitesettings");
$row = $query->row();
if (isset($row))
{
    $sdate = $row->start_time;
    $edate = $row->end_time;
}
if (check_on_date($sdate,$edate)){
    $disable = true;     
}else{
    $disable = false;    
}
?>

<!--Desktop Menu-->
<nav class="navbar navbar-expand-md navbar-custom bg-custom fixed-top"> 

    <a class="navbar-brand" href="#">
      <!--  <img src="<?php echo base_url();?>uploads/sducoop.jpg" height="50px" alt=""> -->
    </a>
<!--    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <?php //if(!isset($this->session->userdata['logged_in'])){ ?>
         <!--   <li class="nav-item d-none d-md-none d-lg-block active">
                <a class="nav-link" href="<?php echo base_url();?>">หน้าแรก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-none d-md-none d-lg-block">
              <a class="nav-link" href="<?php echo site_url('election_check');?>">ตรวจสอบรายชื่อผู้มีสิทธิ์ลงคะแนน</a>
            
            </li> -->
            <?php //}?>

        </ul>

      
    </div>
</nav>
<!--Mobile Menu--><!-- Bottom Navbar -->
<nav class="navbar bg-custom-2 navbar-expand fixed-bottom d-lg-none d-xl-none p-0">
    <ul class="navbar-nav nav-justified w-100"  id="bnav">
        <li class="nav-item">
            <a href="<?php echo base_url();?>" class="nav-link text-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg>
                <span class="small d-block">หน้าแรก</span>
            </a>
        </li>
       
         

        <?php if(isset($this->session->userdata['logged_in'])){ ?>
           <li class="nav-item">
            <a href="<?php echo base_url();?>login/signout" class="nav-link text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg>
                <span class="small d-block">ออกจากระบบ</span>
            </a>
        </li>
       
        <?php }else{ ?>
 <li class="nav-item">
            <a href="<?php echo site_url('election_check');?>" class="nav-link text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                  <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                  <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span class="small d-block">ตรวจสอบสิทธิ์</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('vote');?>" class="nav-link text-center <?php echo ($disable==false ? "disabled":"");?>">
               <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="small d-block">คลิกลงคะแนน</span>
            </a>
        </li>
        <?php }?>

       <!--  <li class="nav-item">
            <a href="#" class="nav-link text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
</svg>
                <span class="small d-block">ออกจากระบบ</span>
            </a>
        </li> -->

     <!--   <li class="nav-item dropup">
            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg>
                <span class="small d-block">Profile</span>
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Notification</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">ออกจากระบบ</a>
            </div>
        </li> -->
    </ul>
</nav>
