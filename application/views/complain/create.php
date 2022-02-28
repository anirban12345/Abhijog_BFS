
<div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Entry Complaint Details</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Complaint</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Entry Complaint Details</li>
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
            <!--
            
            -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card" id="myform">
                    <form action="<?=base_url('Complain/saveComplain')?>" method="post"> 

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
                                <!-- <h4 class="card-title">Entry Mail Details</h4> -->
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complaint Type</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="c_type" name="c_type" >
                                                <option value="">Select</option>                                                        
                                                <option value="Physical Visit">Physical Visit</option>                                                                                                        
                                                <option value="Helpline">Helpline</option>                                                                                                        
                                                <option value="Online">Online</option>  
                                        </select>  
                                    </div>
                                    <div class="col-12 col-sm-6">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Docket No</label>
                                        <input type="text" class="form-control" placeholder="Enter Docket No" id="c_docket_no" name="c_docket_no" value="<?=set_value('c_docket_no')?>"  autocomplete="off">
                                        <?php echo form_error('c_docket_no'); ?>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Complainant Name" id="c_name" name="c_name" value="<?=set_value('c_name')?>"  autocomplete="off">
                                        <?php echo form_error('c_name'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant Address</label>
                                        <textarea class="form-control" placeholder="Enter Complainant Address" id="c_address" name="c_address" rows="2" ></textarea>
                                        <?php echo form_error('c_address'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant PS</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="c_ps" name="c_ps">
                                                <option value="">Select</option>
                                                <?php foreach($ps as $r){?>                                                        
                                                <option value="<?=$r->ps_id?>"><?=$r->ps_name?></option>                                                                                                        
                                                <?php }?>
                                        </select>  
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant Pincode</label>
                                        <input type="text" class="form-control" placeholder="Enter Complainant Pincode" id="c_pincode" name="c_pincode" value="<?=set_value('c_pincode')?>"  autocomplete="off">
                                        <?php echo form_error('c_pincode'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant Mobile</label>
                                        <input type="text" class="form-control" placeholder="Enter Complainant Mobile" id="c_mobile" name="c_mobile" value="<?=set_value('c_mobile')?>"  autocomplete="off">
                                        <?php echo form_error('c_mobile'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Complainant Emailid</label>
                                        <input type="text" class="form-control" placeholder="Enter Complainant Emailid" id="c_emailid" name="c_emailid" value="<?=set_value('c_emailid')?>"  autocomplete="off">
                                        <?php echo form_error('c_emailid'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Date Of Incident</label>
                                        <input type="text" class="form-control" placeholder="Enter Comaplain Date" id="c_dateofincident" name="c_dateofincident" value="<?=set_value('c_dateofincident')?>"  autocomplete="off">                                        
                                        <?php echo form_error('c_dateofincident'); ?>
                                    </div>
                                                            
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Time Of Incident</label>
                                        <input type="text" class="form-control" placeholder="Enter Comaplain Time" id="c_timeofincident" name="c_timeofincident" value="<?=set_value('c_timeofincident')?>"  autocomplete="off">                                        
                                        <?php echo form_error('c_timeofincident'); ?>
                                    </div>                                
                                    </div>                   
                                    <br /> 

                                    <!-- bd_name
                                        bd_ifsc
                                        bd_acno
                                        bd_cardtype
                                        bd_cardno
                                        bd_amount
                                    -->

                                    <!--bank details-->
                                    <div id="dynamic_field3" style="width:100%;"> 
                                    <div id="addbankdtls">
                                    <div class="row" id="bankdtlsrow">
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Bank Name" id="bd_name" name="bd_name[]" value="<?=set_value('bd_name')?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank IFSC</label>
                                        <input type="text" class="form-control" placeholder="Enter Bank IFSC" id="bd_ifsc" name="bd_ifsc[]" value="<?=set_value('bd_ifsc')?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank A/C No</label>
                                        <input type="text" class="form-control" placeholder="Enter Bank A/C No" id="bd_acno" name="bd_acno[]" value="<?=set_value('bd_acno')?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Card Type</label>
                                        <select class="form-control custom-select" style="width: 100%; height:36px;" id="bd_cardtype" name="bd_cardtype[]" autocomplete="off">
                                                <option value="">Select</option>                                                        
                                                <option value="Debit Card">Debit Card</option>                                                                                                        
                                                <option value="Credit Card">Credit Card</option>                                                                                                        
                                        </select>  
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Card No</label>
                                        <input type="text" class="form-control" placeholder="Enter Card No" id="bd_cardno" name="bd_cardno[]" value="<?=set_value('bd_cardno')?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label class="m-t-20">Debited Amount ( <i class="fas fa-rupee-sign"></i> )</label>
                                        <input type="text" class="form-control" placeholder="Enter Debited Amount" id="bd_amount" name="bd_amount[]" value="<?=set_value('bd_amount')?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Transaction Reference</label>
                                        <input type="text" class="form-control" placeholder="Enter Transaction Reference" id="bd_transaction_ref" name="bd_transaction_ref[]" value="<?=set_value('c_transaction_ref')?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-md-1">
                                    <label class="m-t-20">Remove</label>
                                    <button type="button" name="remove" id="addbankdtls" class="btn btn-danger btn-sm btn_remove">Remove</button>
                                    </div> 
                                    </div>   
                                    </div>   
                                    </div>   
                                    <br />
                                    <button type="button" name="addbank" id="addbank" class="btn waves-effect waves-light btn-success"><i class="fas fa-plus"></i> Add Bank Details</button>
                                    <!--
                                    <button type="button" name="addsamebank" id="addsamebank" class="btn waves-effect waves-light btn-warning"><i class="fas fa-plus"></i> Add Same Bank Details</button>
                                    -->
                                    <!--bank details-->

                                    <div class="row">                
                                    <div class="col-12 col-sm-6 text-danger fa-2x">
                                        <label class="m-t-20">Target No</label>
                                        <input type="text" class="form-control text-danger fa-2x" placeholder="Enter Target No" id="c_targetno" name="c_targetno" value="<?=set_value('c_targetno')?>"  autocomplete="off">                                        
                                        <?php echo form_error('c_targetno'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Duty Officer</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="c_do_id" name="c_do_id" required>
                                                        <option value="">Select</option>
                                                        <?php foreach($do as $r){ ?>
                                                        <option value="<?=$r->do_id?>"><?=$r->do_designation.' '.$r->do_name?></option>
                                                        <?php } ?>   
                                        </select>  
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Duty Constable</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="c_dc_id" name="c_dc_id" required>
                                                        <option value="">Select</option>
                                                        <?php foreach($dc as $r){ ?>
                                                        <option value="<?=$r->dc_id?>"><?=$r->dc_designation.' '.$r->dc_name?></option>
                                                        <?php } ?>   
                                        </select>  
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Status</label>                                        
                                        <textarea class="form-control" placeholder="Enter Status" id="c_status" name="c_status" rows="8" ></textarea>
                                    </div>

                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Disposed</label>    
                                        <br />
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="c_disposed" id="disposedYes" value="Yes">
                                        <label class="form-check-label" for="disposedYes">Yes</label>
                                        </div>                                      
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="c_disposed" id="disposedNo" value="No" checked>
                                        <label class="form-check-label" for="disposedNo">No</label>
                                        </div>  
                                    </div>
                                    <div class="col-12">
                                        <div id="disposestatus">
                                            <label class="m-t-20">Disposed Status</label>                                        
                                            <textarea class="form-control" placeholder="Enter Disposed Status" id="c_disposed_status" name="c_disposed_status" rows="8"></textarea>
                                        </div>
                                    </div>
                                    </div>         
                                    <br/>         
                                    <div class="row">
                                    <div class="col-12">
                                    <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mt_feedback"  name="mt_feedback" value="Yes">
                                                <label class="custom-control-label" for="mt_feedback">Feedback Given</label>
                                            </div>
                                    </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Feedback Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Feedaback Date" id="mt_feedbackdate" name="mt_feedbackdate" value="">                                                                    
                                    </div>

                                </div> 
                                </div> 
                            
                            <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>

                        </div>
                    </div>
                </div> 
                
            </div>


           
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->


<script>
    $('.select2').select2();

        // MAterial Date picker    
        $('#c_dateofincident').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
        });
        $('#c_feedbackdate').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
        });
        $('#c_timeofincident').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        date:false,
        time: true,
        format: 'HH:mm',
        twelvehour: false
        });


</script>    
