<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from themedesigner.in/demo/adminbite/html/ltr/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jun 2020 17:13:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
    <title><?=$this->title?></title>
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    
    <!-- This page CSS -->
    <link href="<?=base_url()?>assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/libs/jquery-steps/steps.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/extra-libs/toastr/dist/build/toastr.min.css" rel="stylesheet">    
    <link href="<?=base_url()?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">    
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@600&display=swap" rel="stylesheet">
    <!-- Anirban CSS -->
    <link href="<?=base_url()?>assets/css/mystyle.css" rel="stylesheet">

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <!-- Theme settings -->
    <script src="<?=base_url()?>assets/js/app.init.js"></script>
    <script src="<?=base_url()?>assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url()?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/js/custom.min.js"></script>
    <!--Custom JavaScript -->    
    <script src="<?=base_url()?>assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <!--This page JavaScript -->
    <!-- This Page JS -->
    <script src="<?=base_url()?>assets/libs/moment/moment.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js"></script>    
    <!--c3 JavaScript -->
    <script src="<?=base_url()?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?=base_url()?>assets/extra-libs/c3/c3.min.js"></script>
    <script src="<?=base_url()?>assets/js/pages/dashboards/dashboard3.js"></script>

    <!--Toaster -->
    <script src="<?=base_url()?>assets/extra-libs/toastr/dist/build/toastr.min.js"></script>
    <!--Toaster 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    -->
     
     <script src="<?=base_url()?>assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
     <!--This datatable plugins-
     <script src="<?=base_url()?>assets/extra-libs/datatables.net/js/dataTables.bootstrap.min.js"></script>
    -->  

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

<!-- google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- google chart -->
<!-- This Page JS -->
<script src="<?=base_url()?>assets/libs/select2/dist/js/select2.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6LdHDqobAAAAABRZ0T1o-Ug1zR8vofJ-QYY1OxYJ"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
                <!--<div class="lds-pos"></div>
                <div class="lds-pos"></div>-->
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
        </div>            
    </div>
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">

        <!--
            <nav class="nav">
                <a href="<?=base_url('Dashboard')?>" class="nav__link waves-effect waves-light btn btn-orange btn-sm btn-flat btn-raised text-white font-weight-bold">
                    <i class="fas fa-home fa-x"></i>
                    <span class="nav__text">Dashboard</span>
                </a>
                <a href="<?=base_url('Cases')?>" class="nav__link waves-effect waves-light btn btn-info btn-sm btn-flat btn-raised text-white font-weight-bold">
                    <i class="fas fa-briefcase fa-x"></i>
                    <span class="nav__text">All Cases</span>
                </a>
                <a href="<?=base_url('Cases/special')?>" class="nav__link waves-effect waves-light btn btn-primary btn-sm btn-flat btn-raised text-white font-weight-bold">
                    <i class="fas fa-suitcase fa-x"></i>
                    <span class="nav__text">Special Cases</span>
                </a>
                <a href="<?=base_url('Users/myProfile')?>" class="nav__link waves-effect waves-light btn btn-danger btn-sm btn-flat btn-raised text-white font-weight-bold">
                    <i class="fas fa-user fa-x"></i>
                    <span class="nav__text">Profile</span>
                </a>                 
            </nav>
        -->
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header text-center">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="#">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?=base_url()?>assets/images/logo-icon.png" alt="homepage" class="img-fluid dark-logo"  width=50/>
                            <!-- Light Logo icon -->
                            <img src="<?=base_url()?>assets/images/logo-icon.png" alt="homepage" class="img-fluid light-logo"  width=50 />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text balooda2">
                            <?=$this->title?>
                            <!-- dark Logo text 
                            <img src="<?=base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             Light Logo text 
                            <img src="<?=base_url()?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>                            
                        </li>   
                        <li class="nav-item dropdown">
                            <a class="nav-link waves-effect waves-dark" onclick="goBack()">
                                <i class="sl-icon-arrow-left font-20"></i>
                            </<a>
                        </li>
                        <script>
                            function goBack() {
                            window.history.back();
                            }
                        </script>                         
                       

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="flag-icon flag-icon-us font-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-us"></i> English</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-fr"></i> French</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-es"></i> Spanish</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-de"></i> German</a>
                            </div>
                        </li>
                        -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?=base_url()?>assets/images/users/2.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?=base_url()?>assets/images/users/2.jpg" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?=$this->session->userdata('complainant_userdtls')[0]->uc_name?></h4>
                                        <p class=" m-b-0"><?=$this->session->userdata('complainant_userdtls')[0]->uc_mobileno?></p>
                                    </div>
                                </div>                                                                                               
                                <!--<div class="p-l-30 p-10">
                                    <a href="" class="btn btn-sm btn-success">My Profile</a>
                                </div>-->
                                <a class="dropdown-item" href="<?=base_url('Complainant/myProfile')?>">
                                    <i class="fa fa-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="<?=base_url('ComplainantLogin')?>">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>