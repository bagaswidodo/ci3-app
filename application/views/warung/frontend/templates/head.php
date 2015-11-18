<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Apliksi Warung</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"
     media="screen" title="no title" charset="utf-8">
     <style type="text/css">
     .tengah
      {
        position: absolute;
        width: 100%;
        left: 0;
        text-align: center;
        margin: auto;
      }
     </style>
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
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>


           <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('warung/backend'); ?>">Backend</a></li>
          </ul>

          <!-- button dropdown -->
          <div class="btn-group navbar-right">
                  <a href="#" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-chevron-down"></i> <span class="hidden-xs">Discover</span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
          </div>

          <!-- find search form -->
          <form class="navbar-form navbar-left" role="search">
             <div class="form-group">
               <input class="form-control" placeholder="Search" type="text">
             </div>
             <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
           </form>





        </div><!--/.nav-collapse -->
      </div>
    </nav>
