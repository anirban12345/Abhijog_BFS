
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">All Complains</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">All Complains</li>
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
                <!-- ============================================================== -->
                <!-- Welcome back  -->
                <!-- ============================================================== -->
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="table">
                            <div class="card-body" id="table-body">
                            <div class="table-responsive">
                                                <table id="file_export" class="table table-striped" >
                                                    <thead>
                                                        <tr class='bg-4798e8 text-white'>
                                                            <th width='20'>Sl No.</th>
                                                            <th>Docket No</th>
                                                            <th>Name</th>                                                            
                                                            <th>Address</th>                                                            
                                                            <th>Mobile</th> 
                                                            <th>Date of Incident</th>
                                                            <th>Time of Incident</th>
                                                            <th>Target No</th>
                                                            <th>Status</th>        
                                                            <th>DO Name</th>
                                                            <th>DC Name</th>                                                                                 
                                                            <th>Disposed</th> 
                                                            <th>Fraud Amt ( <i class="fas fa-rupee-sign"></i> )</th> 
                                                            <th>Refund Amt ( <i class="fas fa-rupee-sign"></i> )</th> 
                                                            <th width="120">Action</th>                                                                                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; foreach($complain as $r) { ?>                                                                   
                                                                <tr>
                                                                    <td><?=$i++?></td>
                                                                    <td><?=$r->c_docket_no?></td>
                                                                    <td><?=$r->c_name?></td>
                                                                    <td><?=$r->c_address?></td>
                                                                    <td><?=$r->c_mobile?></td>                                                                     
                                                                    <td><?php if($r->c_dateofincident==""|| $r->c_dateofincident=="1970-01-01") echo ""; else echo date('d-M-Y',strtotime($r->c_dateofincident));?></td>        
                                                                    <td><?=date('H:i',strtotime($r->c_timeofincident))?></td>                                                                            
                                                                    <td class="text-danger"><?=$r->c_targetno?></td> 
                                                                    <td><?=$r->c_status?></td> 
                                                                    <td><?=$r->do_name?></td>                                                                                                
                                                                    <td><?=$r->dc_name?></td>                                                                                                
                                                                    <td><?=$r->c_disposed?></td> 
                                                                    <td><i class="fas fa-rupee-sign"></i> <?=$r->totalamt?> /=</td>  
                                                                    <td><i class="fas fa-rupee-sign"></i> <?=$r->refundamt?> /=</td>  
                                                                    <td>
                                                                    <?php if(in_array('updatemail',$user_permission)){ ?>
                                                                        <a role="button" href="<?=base_url('Complain/edit?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>                                                                    
                                                                    <?php } ?>                                                                    
                                                                    <?php if(in_array('updatemail',$user_permission)){ ?>
                                                                        <a role="button" href="<?=base_url('Complain/enquiry?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-danger btn-sm" title="Enquiry"><i class="fas fa-search"></i></a>                                                                    
                                                                    <?php } ?>                                                                    
                                                                    <?php if(in_array('deletemail',$user_permission)){ ?>                                                                      
                                                                        <a role="button" href="<?=base_url('Complain/deleteComplain?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-danger btn-sm" title="Delete"><i class="fas fa-times"></i></a>
                                                                    <?php } ?>
                                                                    <?php if(in_array('updatemail',$user_permission)){ ?>                                                                        
                                                                            <a role="button" target="_blank" href="<?=base_url('Complain/printComplain?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-primary btn-sm" title="Print"><i class="fas fa-print"></i></a>
                                                                    <?php } ?>
                                                                    <?php if(in_array('updatemail',$user_permission)){ ?>                                                                        
                                                                            <a role="button" href="<?=base_url('Complain/refund?q='.urlencode($this->encrypt->encode($r->c_id)))?>" class="btn waves-effect waves-light btn-success btn-sm" title="Refund"><i class="fas fa-money-bill-alt"></i></a>
                                                                    <?php } ?>
                                                                    </td>
                                                                </tr>                                                                           
                                                            <?php } ?>     
                                                    </tbody>       
                                                </table>       
                            </div>                            
                            </div>
                        </div>
                </div>
                
            </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<script>
$('#file_export').DataTable({   
    dom: 'Bfrtip',
    paging:true, 
    pageLength: 50,      
    buttons: [
            { 
				extend: 'pdf', 
				text:'<i class="fa fa-file-pdf"></i> Pdf',
                className: 'btn btn-danger btn-sm btn-flat btn-raised',
                orientation: 'landscape',
                pageSize: 'LEGAL'				
			},
            { 
				extend: 'excel', 
				text:'<i class="far fa-file-excel"></i> Excel',
				className: 'btn btn-success btn-sm btn-flat btn-raised'				
			}
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },
    scrollY:false,
    responsive: true    
});

$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

/*
ajax: {
			type:'GET',
		    url: '<?=base_url('Mail/getMail')?>',								
	      }

order: [[ 1, "desc" ]],

scrollY:"350px",
    scrollX:true,
    scrollCollapse: true,
    fixedColumns: true,
*/
</script>

