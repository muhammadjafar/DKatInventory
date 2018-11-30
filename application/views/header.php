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
    
    <script src="<?php echo site_url(); ?>/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '<?php echo site_url(); ?>'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo site_url(); ?>/assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo site_url(); ?>/assets/js/dashboard.js"></script>
    
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo site_url(); ?>/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo site_url(); ?>/assets/plugins/charts-c3/plugin.js"></script>
    <script src="<?php echo site_url(); ?>/assets/plugins/input-mask/plugin.js"></script>
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
                D Kat Inventory
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <div>
                        <strong>Pasta Gigi Pepsodent</strong> 
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <div>
                        <strong>Kecap Bango</strong> 
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <div>
                        <strong>HITMAT FLORAL 18+6 MAT</strong> 
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo site_url('Site/notif_stok')?>" class="dropdown-item text-center text-muted-dark">Lihat Semua</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo base_url('assets/images/person.png');?>)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php if (isset($_SESSION['us_sess']) == 1) { echo $_SESSION['nm_sess']; } ?></span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">
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
              <!-- <div class="col-lg-3 ml-auto">
                <a href="#">Stok <i class="badge badge-danger">4</i></a>
              </div> -->
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?php echo site_url()?>" class="nav-link"><i class="fa fa-home"></i> Beranda</a>
                  </li>
				  <li class="nav-item">
                    <a href="<?php echo site_url('analisis'); ?>" class="nav-link <?php echo isset($_SESSION['menu'])&&$_SESSION['menu']=='analisis'?'active':'';?>"><i class="fa fa-chart-line"></i> Analisis</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('gudang'); ?>" class="nav-link <?php echo isset($_SESSION['menu'])&&$_SESSION['menu']=='gudang'?'active':'';?>"><i class="fe fe-home"></i> Rak</a>
                  </li>
				  <li class="nav-item">
                    <a href="<?php echo site_url('Site/chart'); ?>" class="nav-link"><i class="fe fe-home"></i> Laporan</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>