<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
    <title><?=$this->title?> | Registration</title>
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/libs/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/mystyle.css" rel="stylesheet" />    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.kalam    
{
    font-family: 'Kalam', cursive;
}
.auth-wrapper
{
    background:url(<?=base_url()?>assets/images/big/auth-bg3.jpg) no-repeat center center;
    background-size: cover;    
}
.auth-wrapper .auth-box
{
    margin:2.5% auto;
    max-width:600px;
}
@media only screen and (max-width: 600px) { 
    .auth-wrapper
    {
        background:url(<?=base_url()?>assets/images/big/auth-bg1.jpg) no-repeat center center;
    }    
}
</style>
<!--Sweetalert -->
<script src="<?=base_url()?>assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LedAVUeAAAAANzOWpghFYxK9L8DyqPLNsIVMykn"></script>
</head>
<body>
    <div class="main-wrapper">
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
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        

        <div class="container-fluid">
        <div class="card" id="myform">
                    <!-- row -->
                    <div class="row">
                    
                        <div class="col-12">                                                    
                            <form action="<?=base_url('Register/save')?>" method="post"> 

                            <!-- CRSF -->
                            <?php 
                            $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input class="form-control" type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <!-- CRSF -->

                                    <div class="row">

                                    <div class="col-12">
                                    <label class="m-t-20">Police Station</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="u_psid" name="u_psid">
                                                        <option value="select">Select</option>
                                                        <?php foreach($ps as $r1){ ?>
                                                        <option value="<?=$r1->ps_id?>"><?=$r1->ps_name?></option>
                                                        <?php } ?>   
                                        </select>  
                                    </div>

                                    <div class="col-12" id="isuserexist">
                                                                       
                                    </div>                                                            
                                        
                                        <div class="col-12">
                                            <label class="m-t-20">Email Id</label>
                                            <input type="text" class="form-control" placeholder="Enter Emailid" id="u_emailid" name="u_emailid" value="<?=set_value('u_emailid')?>"  autocomplete="off"/>                                                                                
                                            <?php echo form_error('u_emailid'); ?>
                                        </div>                                       
                                        <div class="col-12">
                                            <label class="m-t-20">Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Password" id="u_password1" name="u_password1" value="<?=set_value('u_password')?>" autocomplete="off" />                                                                                
                                            <?php echo form_error('u_password1'); ?>
                                        </div>
                                        <div class="col-12">
                                            <label class="m-t-20">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Password" id="u_password2" name="u_password2" value="<?=set_value('u_password')?>" autocomplete="off" />                                                                                
                                            <?php echo form_error('u_password2'); ?>
                                        </div> 
                                        <div class="col-12">                                            
                                        <div class="g-recaptcha m-t-20" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                                        </div> 
                                        <input type="hidden" id="token" name="token" class="form-control form-control-lg" />
                                        <div class="col-12 m-t-10">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                                        </div>
                                    </div>                         
                                   
                            </form>                        
                            
                        </div>
                    </div>

                    <!-- row-->                 
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>    
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->    
    <!--Select2 -->
    <script src="<?=base_url()?>assets/libs/select2/dist/js/select2.min.js"></script>
    
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    $('.select2').select2();
    
    grecaptcha.ready(function() {
        grecaptcha.execute('6LedAVUeAAAAANzOWpghFYxK9L8DyqPLNsIVMykn', {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;
        });
    });

    $(document).ready(function(){
			//alert('a');
			var ps_id;
				$('#u_psid').on('change',function(){
					ps_id = $(this).val();	
                    //token = $('#anirban_secure_token').val(); // CSRF hash						
					//alert(token);
					if(ps_id){
						$.ajax({
							type:'POST',
							url:'<?php echo base_url('Register/isExistUser'); ?>',
							data:{'ps_id':ps_id},
							success:function(data){
								//alert(data);		                                
                                $('#isuserexist').html(data);
							}
						});
					}else{
						$('#isuserexist').html('--');							
					}
				});
            });
    </script>
</body>
</html>


