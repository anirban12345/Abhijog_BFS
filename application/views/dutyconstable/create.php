<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Duty Constable</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Duty Constable</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Create Duty Constable</li>                                   
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
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Welcome back  -->
                <!-- ============================================================== -->                
                <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card" id="myform">                                                
                        <form action="<?=base_url('DutyConstable/saveDutyConstable')?>" method="post"> 
                        <!-- CRSF -->
                        <?php 
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <!-- CRSF -->

                            <div class="card-body">
                                
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Designation</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="dc_designation" name="dc_designation" required>
                                            <option value="">Select</option>                                                         
                                            <option value="Constable">Constable</option>                                                                                                                                                 
                                        </select>   
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="dc_name" name="dc_name" value="<?=set_value('dc_name')?>" autocomplete="off" required/>                                                                                
                                        <?php echo form_error('dc_name'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Phone No</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone No" id="dc_phoneno" name="dc_phoneno" value="<?=set_value('dc_phoneno')?>"  autocomplete="off" required />                                                                                
                                        <?php echo form_error('dc_phoneno'); ?>
                                    </div>
                                    
                                </div>                         
                            </div>
                            <div class="card-footer">
                             <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>                        
                        </div>
                    </div>
                </div>
                
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        
<script>
    $('.select2').select2();
</script>

