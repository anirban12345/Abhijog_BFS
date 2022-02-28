
<div class="page-wrapper">

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Petition Details</h4>
            <div class="d-flex align-items-center">

            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Petition</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Petition Details</li>
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
<?php        
$ps=array('Other','Jorabagan','BURTOLLA', 'AMHERST STREET','CHITPUR','TALA','SINTHEE','COSSIPORE','SHAYAMPUKUR','AMHERST STREET WOMEN','Burrabazar','Posta',
'JORASANKO','Girish Park','HARE STREET','BOWBAZAR','MUCHIPARA','TALTALA','New Market','TALTALA WOMEN','ENTALLY','MANICKTALA','ULTADANGA',
'BELIAGHATA','PHOOLBAGAN','NARKEL DANGA','TANGRA','ULTADANGA WOMEN','PARK STREET','SHAKESPEARE Sarani','BHOWANIPORE', 'TOLLYGUNGE', 'CHARU MARKET',
'NEW ALIPORE','CHETLA','Alipore','Hastings','Maidan','Kalighat','TOLLYGUNGE Women','North Port','SOUTH PORT','WEST PORT',
'WATGUNGE','Garden Reach','EKBALPUR','Nadial','Rajabagan','METIABRUZ','WATGUNGE Women','TOPSIA','BENIAPUKUR','GARIAHAT','LAKE', 'KARAYA',
'TILJALA','Ballygunge','Rabinda Sarabar','Karaya Women','NETAJI NAGAR','JADAVPUR','KASBA','REGENT PARK','BANSDRONI','PATULI','Garfa',
'PATULI Women','TARATALA','Parnasree','THAKURPUKUR','HARIDEVPUR','Sursuna','Behala','Behala Women','Panchasayar','Purba Jadavpur',
'Pragati Maidan','Anandapur','Kol. Leather Complex','Survey Park');
?>
-->
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card" id="myform">
            <?php foreach($petition as $r){?>
                <form action="<?=base_url('Petition/updatePetition?q='.urlencode($this->encrypt->encode($r->p_id)))?>" method="post"> 

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
                                        <label class="m-t-20">Petition Type</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="p_type" name="p_type">
                                                <option value="">Select</option>                                                        
                                                <option value="Written" <?php if($r->p_type=='Written'){echo 'selected';}?>>Written</option>                                                        
                                                <option value="eMail" <?php if($r->p_type=='eMail'){echo 'selected';}?>>eMail</option>                                                   
                                        </select>  
                                    </div>
                                    <div class="col-12 col-sm-6">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Reference No Of ABFS DD</label>
                                        <input type="text" class="form-control" placeholder="Enter Reference No Of ABFS DD" id="p_ref_no" name="p_ref_no" value="<?=$r->p_ref_no?>"  autocomplete="off">                                        
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Date" id="p_date" name="p_date" value="<?=date('d-M-Y',strtotime($r->p_date))?>"  autocomplete="off">                                                                                
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Name of the Petitioner</label>
                                        <input type="text" class="form-control" placeholder="Enter Name of the Petitioner" id="p_name" name="p_name" value="<?=$r->p_ref_no?>"  autocomplete="off">                                        
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Address of the Petitioner</label>
                                        <textarea class="form-control" placeholder="Enter Address of the Petitioner" id="p_address" name="p_address" rows="2" ><?=$r->p_address?></textarea>                                        
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Petitioner PS</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="p_ps" name="p_ps">
                                                <option value="">Select</option>
                                                <?php for($i=0;$i<count($ps);$i++){?>                                                        
                                                <option value="<?=$ps[$i]?>" <?php if($r->p_ps==$ps[$i]){echo 'selected';}?>><?=$ps[$i]?></option>                                                                                                        
                                                <?php }?>
                                        </select>  
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Petitioner Pincode</label>
                                        <input type="text" class="form-control" placeholder="Enter Petitioner Pincode" id="p_pincode" name="p_pincode" value="<?=$r->p_pincode?>"  autocomplete="off">
                                        
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Mobile No of the Petitioner</label>
                                        <input type="text" class="form-control" placeholder="Enter Mobile No of the Petitioner" id="p_mobile" name="p_mobile" value="<?=$r->p_mobile?>"  autocomplete="off">
                                        
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Emailid of the Petitioner</label>
                                        <input type="text" class="form-control" placeholder="Enter Emailid of the Petitioner" id="p_emailid" name="p_emailid" value="<?=$r->p_emailid?>"  autocomplete="off">
                                        
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Date From</label>
                                        <input type="text" class="form-control" placeholder="Enter Date From" id="p_datefrom" name="p_datefrom" value="<?php $r->p_datefrom==""?"":date('d-M-Y',strtotime($r->p_datefrom))?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Date To</label>
                                        <input type="text" class="form-control" placeholder="Enter Date To" id="p_dateto" name="p_dateto" value="<?php $r->p_dateto==""?"":date('d-M-Y',strtotime($r->p_dateto))?>"  autocomplete="off">                                        
                                        
                                    </div>
                                </div>
                                    <br />    
                                    <!--bank details-->
                                    <div id="dynamic_field3" style="width:100%;">                                     
                                    <?php $i=0;  foreach($bankdtls as $r1){$i++;?>
                                    <div id="pbankdtls<?=$i?>">
                                    <div class="row">
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank Name</label>
                                        <input type="hidden" class="form-control" placeholder="Enter Bank Name" id="bd_id" name="bd_id[]" value="<?=$r1->bd_id?>"  autocomplete="off">                                                                                
                                        <input type="text" class="form-control" placeholder="Enter Bank Name" id="bd_name" name="bd_name[]" value="<?=$r1->bd_name?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank IFSC</label>
                                        <input type="text" class="form-control" placeholder="Enter Bank IFSC" id="bd_ifsc" name="bd_ifsc[]" value="<?=$r1->bd_ifsc?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Bank A/C No</label>
                                        <input type="text" class="form-control" placeholder="Enter Bank A/C No" id="bd_acno" name="bd_acno[]" value="<?=$r1->bd_acno?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Card Type</label>
                                        <select class="form-control custom-select" style="width: 100%; height:36px;" id="bd_cardtype" name="bd_cardtype[]" autocomplete="off">
                                                <option value="">Select</option>                                                        
                                                <option value="Debit Card"<?php if($r1->bd_cardtype=='Debit Card'){echo 'selected';}?> >Debit Card</option>                                                                                                        
                                                <option value="Credit Card"<?php if($r1->bd_cardtype=='Credit Card'){echo 'selected';}?>>Credit Card</option>                                                                                                        
                                        </select>  
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Card No</label>
                                        <input type="text" class="form-control" placeholder="Enter Card No" id="bd_cardno" name="bd_cardno[]" value="<?=$r1->bd_cardno?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label class="m-t-20">Debited Amount ( <i class="fas fa-rupee-sign"></i> )</label>
                                        <input type="text" class="form-control" placeholder="Enter Debited Amount" id="bd_amount" name="bd_amount[]" value="<?=$r1->bd_amount?>"  autocomplete="off">                                        
                                        
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <label class="m-t-20">Transaction Reference</label>
                                        <input type="text" class="form-control" placeholder="Enter Transaction Reference" id="bd_transaction_ref" name="bd_transaction_ref[]" value="<?=$r1->bd_transaction_ref?>"  autocomplete="off">                                        
                                        
                                    </div>
                                    <div class="col-12 col-md-1">
                                    <label class="m-t-20">Remove</label>
                                    <button type="button" name="remove" id="pbankdtls<?=$i?>" class="btn btn-danger btn-sm btn_remove">Remove</button>
                                    </div>
                                    </div>                                     
                                    </div> 
                                    <?php } ?>  
                                    </div>   
                                    <br /> 
                                    <button type="button" name="addbank" id="addbank" class="btn waves-effect waves-light btn-success"><i class="fas fa-plus"></i> Add Bank Details</button>
                                   

                                    <!--bank details-->
                                    <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <label class="m-t-20">Nature of Offecnce Reported</label>
                                        <textarea class="form-control" placeholder="Enter Nature of Offecnce Reported" id="p_offence" name="p_offence" rows="8" ><?=$r->p_offence?></textarea>
                                       
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="m-t-20">Enquiry Officer</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="p_do_id" name="p_do_id" >
                                                        <option value="select">Select</option>
                                                        <?php foreach($do as $r1){ ?>
                                                        <option value="<?=$r1->do_id?>" <?php if($r1->do_id==$r->p_do_id){echo 'selected';}?>><?=$r1->do_designation.' '.$r1->do_name?></option>
                                                        <?php } ?>   
                                        </select>  
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Status</label>                                        
                                        <textarea class="form-control" placeholder="Enter Status" id="p_status" name="p_status" rows="8" ><?=$r->p_status?></textarea>                                       
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Disposed</label>    
                                        <br />
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="p_disposed" id="disposedYes" value="Yes"<?php if($r->p_disposed=='Yes'){echo 'checked';}?>>
                                        <label class="form-check-label" for="disposedYes">Yes</label>
                                        </div>                                      
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="p_disposed" id="disposedNo" value="No" <?php if($r->p_disposed=='No'){echo 'checked';}?>>
                                        <label class="form-check-label" for="disposedNo">No</label>
                                        </div>  
                                    </div>                                    

                                    <div class="col-12">
                                        <div id="disposestatus">
                                            <label class="m-t-20">Disposed Status</label>                                        
                                            <textarea class="form-control" placeholder="Enter Disposed Status" id="p_disposed_status" name="p_disposed_status" rows="8"><?=$r->p_disposed_status?></textarea>
                                        </div>
                                    </div>

                                </div> 
                                </div> 
                            
                            <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                            </div>
                        </form>
            <?php } ?>
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
$('#p_date').bootstrapMaterialDatePicker({ 
weekStart: 0, 
time: false,
format: 'DD-MMM-YYYY'
});  
$('#p_datefrom').bootstrapMaterialDatePicker({ 
weekStart: 0, 
time: false,
format: 'DD-MMM-YYYY'
});
$('#p_dateto').bootstrapMaterialDatePicker({ 
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
