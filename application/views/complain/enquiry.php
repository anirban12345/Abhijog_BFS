
<div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Entry Enquiry Details</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Complain</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Entry Enquiry Details</li>
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

                                
						
					

                        <div class="card" id="myform">                      
                
                            <div class="card-body">
                            

                                <div class="row">
                                    <div class="col-12 col-sm-12">

                                            
                                            <form action="<?=base_url('Complain/saveEnquiry')?>" method="post"> 
                                            
                                                <?php 
                                                    $csrf = array(
                                                    'name' => $this->security->get_csrf_token_name(),
                                                    'hash' => $this->security->get_csrf_hash()
                                                    );
                                                ?>
                                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                                

                                                <input type="hidden" value=<?=$complain[0]->c_id?> name="cq_c_id" id="cq_c_id" />          

                                                <div id="dynamic_field" style="width:100%;">      
                                                    <?php $i=1;foreach($enquiry as $r){?>
                                                        <div id="a_enquiry<?=$i?>">
                                                            <div class="row">             
                                                            <div class="col-12 col-md-2">
                                                            <label class="m-t-20">Enquiry Date</label>
                                                            <input type="text" class="form-control cquiry_date" placeholder="Enter Enquiry Date" id="cq_date" name="cq_date[]" value="<?=date('d-M-Y',strtotime($r->cq_date))?>">
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                            <label class="m-t-20">Enquiry Time</label>
                                                            <input type="text" class="form-control cquiry_time" placeholder="Enter Enquiry Time" id="cq_time" name="cq_time[]" value="<?=date('H:i',strtotime($r->cq_time))?>">
                                                            </div>
                                                            <div class="col-12 col-md-7">
                                                            <label class="m-t-20">Enquiry Details</label>               
                                                            <textarea class="form-control" placeholder="Enter Enquiry Details" id="cq_enquiry" name="cq_enquiry[]" rows="3"><?=$r->cq_enquiry?></textarea>
                                                            </div>              
                                                            <div class="col-12 col-md-1">
                                                            <label class="m-t-20">Remove</label>
                                                            <button type="button" name="remove" id="a_enquiry<?=$i?>" class="btn btn-danger btn-sm btn_remove">Remove</button>
                                                            </div>                
                                                            </div>
                                                        </div>
                                                    <?php $i++;}?>                         
                                                </div>  

                                                <br/>
                                                <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>  
                                                <button type="button" name="addenquiry" id="addenquiry" class="btn waves-effect waves-light btn-success"><i class="fas fa-plus"></i> Add Enquiry</button>            

                                                <?php if(in_array('updatemail',$user_permission)){ ?>                                                                        
                                                    <a role="button" target="_blank" href="<?=base_url('Complain/printComplain?q='.urlencode($this->encrypt->encode($complain[0]->c_id)))?>" class="btn waves-effect waves-light btn-warning" title="Print Report"><i class="fas fa-print"></i> Print Report</a>
                                                <?php } ?>
                                                <?php if(in_array('updatemail',$user_permission)){ ?>                                                                        
                                                    <a role="button" href="<?=base_url('Complain/refund?q='.urlencode($this->encrypt->encode($complain[0]->c_id)))?>" class="btn waves-effect waves-light btn-primary float-right" title="Refund"><i class="fas fa-money-bill-alt"></i> Refund</a>
                                                <?php } ?>
                                                </form>

                                            
                                    </div>

                                </div>                         
                            </div>
                            

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
        $('#m_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
        });

        $('#m_time').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        date:false,
        time: true,
        format: 'HH:mm',
        twelvehour: false
        });


</script>    
