<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Apliksi Warung</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"
     media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
  </head>
  <body>

      <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Warung APP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">


          <?php if ( $this->session->userdata('logged_in')!="") { ?>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('warung/backend'); ?>" class="active">Dashboard</a></li>
            <li><a href="<?php echo base_url('warung/warung'); ?>">Data Warung</a></li>
            <li><a href="<?php echo base_url('warung/tipe'); ?>">Tipe Warung</a></li>
          </ul>

           <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 <?php echo  ucfirst($this->session->userdata('nama')); ?> <span class="caret"></span></a>
               <ul class="dropdown-menu">
                 <li><a href="#">Ganti Password</a></li>
                 <li role="separator" class="divider"></li>
                 <li><i class="fa fa-cog"></i><a href="<?php echo base_url('warung/auth/logout'); ?>">Logout</a></li>
               </ul>
             </li>
          </ul>
        <?php }else{ ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('warung/frontend'); ?>" class="active">Frontend</a></li>
          </ul>
        <?php }  ?>



        </div><!--/.nav-collapse -->
      </div>
    </nav>
