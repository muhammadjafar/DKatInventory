<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/images/logo.png" />
    <title><?php echo isset($page_title)?$page_title:'D Kat Inventory';?></title>
    <link href="<?php echo base_url('/assets/vendors/fontawesome-5.1.1/css/all.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url(); ?>/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url(); ?>/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/assets/plugins/charts-c3/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <?= $this->session->flashdata('pesan')?> 
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <img src="<?php echo base_url(); ?>/assets/images/logo.png" class="header-brand-img" alt="tabler logo">
                D Kat Kategori
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo base_url('assets/images/person.png');?>)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Jane Pearson</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
            
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="analisis" class="nav-link <?php echo isset($_SESSION['menu'])=='analisis'?'active':'';?>"><i class="fa fa-chart-line"></i> Analisis</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('analisis');?>" class="nav-link"><i class="fe fe-box"></i> Rak</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>