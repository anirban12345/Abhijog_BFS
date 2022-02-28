
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
                                                            <th>Name</th>                                                            
                                                            <th>Address</th>                                                            
                                                            <th>Mobile</th> 
                                                            <th>Date of Incident</th>
                                                            <th>Time of Incident</th>
                                                            <th>Target No</th>
                                                            <th>Status</th>                                                                    
                                                            <th width="120">Action</th>                                                                                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; foreach($complain as $r) { ?>                                                                   
                                                                <tr>
                                                                    <td><?=$i++?></td>                                                                    
                                                                    <td><?=$r->uc_name?></td>
                                                                    <td><?=$r->uc_address?></td>
                                                                    <td><?=$r->uc_mobile?></td>                                                                     
                                                                    <td><?php if($r->uc_dateofincident==""|| $r->uc_dateofincident=="1970-01-01") echo ""; else echo date('d-M-Y',strtotime($r->uc_dateofincident));?></td>        
                                                                    <td><?=date('H:i',strtotime($r->uc_timeofincident))?></td>                                                                            
                                                                    <td class="text-danger"><?=$r->uc_targetno?></td> 
                                                                    <td><?=$r->uc_status_complainant?></td>                                                                     
                                                                    <td>
                                                                        <a role="button" href="<?=base_url('Complain/acceptComplain?q='.urlencode($this->encrypt->encode($r->uc_id)))?>" class="btn waves-effect waves-light btn-warning btn-sm" title="Accept Complain"><i class="fas fa-check"></i></a>                                                                                                                                            
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

