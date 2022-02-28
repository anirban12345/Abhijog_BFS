<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Dashboard</a>
                                    </li>                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <?php $this->load->view('template/message');?>	
            <div class="container-fluid">

            <div class="row" id="welcome">

                    
                    <div class="col-lg-12 col-sm-3">
                        <div class="card  bg-light no-card-border">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <img src="<?=base_url()?>assets/images/users/2.jpg" alt="user" width="60" class="rounded-circle" />
                                    </div>
                                    <div>
                                        <h3 class="m-b-0">Welcome <?=$this->session->userdata('userdtls')[0]->u_title?></h3>
                                        <span><?=date("l jS \of F Y h:i:s A")?></span>
                                    </div>
                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Welcome back  -->
                <!-- ============================================================== -->
               
                <div class="row">
                <div class="col-12 col-sm-6">
                        <div class="card bg-secondary text-white">
                            <a href="<?=base_url('DutyOfficer')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-user fa-3x"></i>
                                        <div class="m-l-15 m-t-10">                                            
                                            <h4 class="font-medium m-b-0">Duty Officers</h4>
                                            <h5><?=count($do)?></h5>                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card bg-secondary text-white">
                            <a href="<?=base_url('DutyConstable')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-user fa-3x"></i>
                                        <div class="m-l-15 m-t-10">                                            
                                            <h4 class="font-medium m-b-0">Duty Constable</h4>
                                            <h5><?=count($dc)?></h5>                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <hr />    

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card bg-primary text-white">
                            <a href="<?=base_url('Complain')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-inbox fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Complain Received</h4>
                                            <h5><?=count($complain)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    

                    

                    <div class="col-12 col-sm-3">
                        <div class="card bg-warning text-white">
                            <a href="<?=base_url('Complain/todaysComplain')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Today's Complain</h4>
                                            <h5><?=count($todays)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-3">
                        <div class="card bg-success text-white">
                            <a href="<?=base_url('Complain/yesterdaysComplain')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Yesterday's Complain</h4>
                                            <h5><?=count($yesterday)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="card bg-primary text-white">
                            <a href="<?=base_url('Complain/disposedComplain')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Disposed</h4>
                                            <h5><?=count($disposed)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="card bg-danger text-white">
                            <a href="<?=base_url('Complain/pendingComplain')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Pending</h4>
                                            <h5><?=count($pending)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php if(in_array('createusers',$user_permission)){ ?>
                    <div class="col-12 col-sm-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <a href="JavaScript: void(0);"><i class="text-white fas fa-user fa-3x"></i></a>
                                        <div class="m-l-15 m-t-10">
                                            <h4 class="font-medium m-b-0">Users</h4>
                                            <h5><?=$users?></h5>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?> 

<!-- -->
<?php if(in_array('user',$user_permission)){ ?>
<div class="row" id="curve_chart" style="width: 100%; height:500px;"></div>
<div class="row" id="curve_chart2" style="width: 100%; height:500px;"></div>
<?php } ?>
<!-- -->

                </div>

                <hr />    

                <div class="row">
               
                    <div class="col-12 col-sm-12">
                        <div class="card bg-primary text-white">
                            <a href="<?=base_url('Petition')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-inbox fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Petition Received</h4>
                                            <h5><?=count($petition)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-3">
                        <div class="card bg-warning text-white">
                            <a href="<?=base_url('Petition/todaysPetition')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Today's Petition</h4>
                                            <h5><?=count($todaysP)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-3">
                        <div class="card bg-success text-white">
                            <a href="<?=base_url('Petition/yesterdaysPetition')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Yesterday's Petition</h4>
                                            <h5><?=count($yesterdayP)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="card bg-primary text-white">
                            <a href="<?=base_url('Petition/disposedPetition')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Disposed</h4>
                                            <h5><?=count($disposedP)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="card bg-danger text-white">
                            <a href="<?=base_url('Petition/pendingPetition')?>" class="text-white">                            
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <i class="text-white fas fa-envelope fa-3x"></i>
                                        <div class="m-l-15 m-t-10">
                                            
                                            <h4 class="font-medium m-b-0">Pending</h4>
                                            <h5><?=count($pendingP)?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

<!-- -->
<?php if(in_array('user',$user_permission)){ ?>
<div class="row" id="curve_chart" style="width: 100%; height:500px;"></div>
<div class="row" id="curve_chart2" style="width: 100%; height:500px;"></div>
<?php } ?>
<!-- -->

                </div>
  
</div>

         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        <script>
   

        // MAterial Date picker    
        $('#m_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMMM-YYYY'
        });     


</script>    