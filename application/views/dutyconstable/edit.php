<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edit Duty Constable</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Duty Constable</li>                                   
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
                    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    <?php foreach($dc as $r) {?>
                    <form action="<?=base_url('DutyConstable/updateDutyConstable?q='.urlencode($this->encrypt->encode($r->dc_id)))?>" method="post"> 
                        <!-- CRSF -->
                        <?php 
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <!-- CRSF -->

                            <div class="card-body table-responsive">                                
                                   
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Designation</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="dc_designation" name="dc_designation">
                                            <option value="select">Select</option>                                                         
                                            <option value="Constable" <?php if($r->dc_designation=='Constable'){ echo 'selected';}?>>Constable</option>                                                                                                                                                                                                     
                                        </select>   
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="dc_name" name="dc_name" value="<?=$r->dc_name?>" autocomplete="off" />                                                                                
                                        <?php echo form_error('dc_name'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Phone No</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone No" id="dc_phoneno" name="dc_phoneno" value="<?=$r->dc_phoneno?>"  autocomplete="off"/>                                                                                
                                        <?php echo form_error('dc_phoneno'); ?>
                                    </div>
                                </div>    
                            <?php } ?>
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary">Save</button>
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