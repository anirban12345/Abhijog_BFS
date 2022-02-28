
<div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Entry Refund Details</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Refund</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Entry Refund Details</li>
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

                    <div class="alert alert-success fa-3x text-center">Docket No: <?=$complain[0]->c_docket_no?></div>                           

                    <div class="table-responsive">
                                                <table id="file_export" class="table table-striped" >
                                                    <thead>
                                                        <tr class='bg-4798e8 text-white'>                                                                                                                        
                                                            <th>Name</th>                                                            
                                                            <th>Address</th>                                                            
                                                            <th>Mobile</th> 
                                                            <th>Date of Incident</th>
                                                            <th>Time of Incident</th>
                                                            <th>Status</th>        
                                                            <th>DO Name</th>                                                                                                 
                                                            <th>DC Name</th>
                                                            <th>Disposed</th> 
                                                            <th>Fraud Amt ( <i class="fas fa-rupee-sign"></i> )</th> 
                                                            <th>Refund Amt ( <i class="fas fa-rupee-sign"></i> )</th>                                                                                                                          
                                                            <th>Action</th>                                                                                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; foreach($complain as $r) { ?>                                                                   
                                                                <tr>
                                                                    <td><?=$r->c_name?></td>
                                                                    <td><?=$r->c_address?></td>
                                                                    <td><?=$r->c_mobile?></td>                                                                     
                                                                    <th><?=date('d-M-Y',strtotime($r->c_dateofincident))?></th> 
                                                                    <th><?=date('H:i',strtotime($r->c_timeofincident))?></th>             
                                                                    <th><?=$r->c_status?></th> 
                                                                    <th><?=$r->do_name?></th>                                                                                                
                                                                    <th><?=$r->dc_name?></th>                                                                                                
                                                                    <th><?=$r->c_disposed?></th> 
                                                                    <td><i class="fas fa-rupee-sign"></i> <?=$r->totalamt?> /=</td>  
                                                                    <td><i class="fas fa-rupee-sign"></i> <?=$r->refundamt?> /=</td>                                                                     
                                                                    <td>
                                                                    <?php if(in_array('updatemail',$user_permission)){ ?>
                                                                        <a role="button" href="<?=base_url('Complain/edit?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>                                                                    
                                                                    <?php } ?>                                                                                                                                        
                                                                    </td>
                                                                </tr>                                                                           
                                                            <?php } ?>     
                                                    </tbody>       
                                                </table>       
                            </div>

                                        <div class="table-responsive">
                                            <form action="<?=base_url('Complain/saveRefund')?>" method="post"> 
                                                <?php 
                                                    $csrf = array(
                                                    'name' => $this->security->get_csrf_token_name(),
                                                    'hash' => $this->security->get_csrf_hash()
                                                    );
                                                ?>
                                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

                                                <table id="file_export" class="table table-striped" >
                                                    <thead>
                                                        <tr class='bg-4798e8 text-white'>                                                                                                                        
                                                            <th>Name</th>                                                            
                                                            <th>IFSC</th>                                                            
                                                            <th>A/C No</th> 
                                                            <th>Card Type</th>
                                                            <th>Card No</th>
                                                            <th>Debited Amt ( <i class="fas fa-rupee-sign"></i> )</th>        
                                                            <th>Tran Ref</th>
                                                            <th>Date of Refund</th>
                                                            <th>Time of Refund</th>
                                                            <th>Refund Amt ( <i class="fas fa-rupee-sign"></i> )</th>
                                                            <th>Deficit Amt ( <i class="fas fa-rupee-sign"></i> )</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=0; foreach($bankdtls as $r) { $i++; ?>                                                                   
                                                                <tr>
                                                                    <td><?=$r->bd_name?></td>
                                                                    <td><?=$r->bd_ifsc?></td>
                                                                    <td><?=$r->bd_acno?></td>                                                                                                                                               
                                                                    <th><?=$r->bd_cardtype?></th> 
                                                                    <th><?=$r->bd_cardno?></th>                                                                                                
                                                                    <th><i class="fas fa-rupee-sign"></i> <?=$r->bd_amount?> /=</th>
                                                                    <td><?=$r->bd_transaction_ref?></td>  
                                                                    <td>
                                                                    <input type="hidden" id="bd_id" name="bd_id[]" value="<?=$r->bd_id?>">                                                                    
                                                                    <input type="hidden" id="bd_c_id" name="bd_c_id[]" value="<?=$r->bd_c_id?>">                                                                    
                                                                    <input type="text" class="form-control refund_date" placeholder="Enter Date of Refund" id="refund_date" name="bd_refund_date[]" value="<?php if(!empty($r->bd_refund_date)&&$r->bd_refund_date!=date('1970-01-01')){ echo date('d-M-Y',strtotime($r->bd_refund_date));}else{echo "";}?>">
                                                                    </td>  
                                                                    <td>
                                                                    <input type="text" class="form-control refund_time" placeholder="Enter Time of Refund" id="refund_time" name="bd_refund_time[]" value="<?php if(!empty($r->bd_refund_time)&&$r->bd_refund_time!=date('05:30:00')){ echo date('H:i',strtotime($r->bd_refund_time));}else{echo "";}?>">
                                                                    </td>                                                                     
                                                                    <td>
                                                                    <input type="hidden" class="form-control bd_amount" placeholder="Enter Refund Amt" id="bd_amount" name="bd_amount[]" value="<?=$r->bd_amount?>">                                                                    
                                                                    <input type="text" class="form-control refund_amt" placeholder="Enter Refund Amt" id="bd_refund_amt" name="bd_refund_amt[]" value="<?=$r->bd_refund_amt?>" autocomplete="off">                                                                    
                                                                    </td>  
                                                                    <td>
                                                                    <input type="text" class="form-control" placeholder="Enter Deficit Amt" id="bd_deficit_amt" name="bd_deficit_amt[]" value="<?=$r->bd_deficit_amt?>">                                                                    
                                                                    </td>  
                                                                </tr>                                                                           
                                                            <?php } ?>     
                                                    </tbody>                                                    
                                                </table>
                                                <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>                                                                                                        
                                            </form>      
                                        </div>  
                    </div>
                </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

<!--                            
1. Enquiry started / Endorsed to E.O
2. Contacted with Service Provider
3. Reply Awaited 
4. Reply Received
5. Further Action Taken
6. Enquiry Completed
-->

<script>
    $('.select2').select2();

        // MAterial Date picker    
        $('.refund_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
        });

        $('.refund_time').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        date:false,
        time: true,
        format: 'HH:mm',
        twelvehour: false
        });

       


        
</script>    
