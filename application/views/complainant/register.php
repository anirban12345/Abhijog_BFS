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
    <link href="<?=base_url()?>assets/extra-libs/toastr/dist/build/toastr.min.css" rel="stylesheet">    
    <link href="<?=base_url()?>assets/css/mystyle.css" rel="stylesheet" />    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@600&display=swap" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>  
    
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->    
    <!--Select2 -->
    <script src="<?=base_url()?>assets/libs/select2/dist/js/select2.min.js"></script>
<!--Toaster -->
<script src="<?=base_url()?>assets/extra-libs/toastr/dist/build/toastr.min.js"></script>
<!--Toaster -->  
<style>
.kalam    
{
    font-family: 'Kalam', cursive;
}
.balooda2
{
    font-family: 'Baloo Da 2', cursive;
    /*font-family: 'Verdana';*/

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

body,input[type="text"],input[type="password"],button
{
    font-size:15px;
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
<script src="https://www.google.com/recaptcha/api.js?render=6LdHDqobAAAAABRZ0T1o-Ug1zR8vofJ-QYY1OxYJ"></script>
</head>
<body>

<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('template/message');?>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?=base_url()?>assets/images/big/auth-bg.jpg);">
            <div class="auth-box">
                <div>
                    <div class="logo">
                    <span class="db"><img src="<?=base_url()?>assets/images/logo-icon.png" alt="logo" width=100 class="img-fluid animate__animated animate__zoomIn" /></span>
                        <br />

                        <h1 class="font-medium m-b-30 animate__animated animate__slideInUp balooda2" style="font-size:40px;"><?=$this->title?></h1>    
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" action="<?php echo base_url('Complainant/save')?>" method="post">
                            <!-- CRSF -->
                            <?php 
                                $csrf = array(
                                        'name' => $this->security->get_csrf_token_name(),
                                        'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <!-- CRSF -->
                                <input type="hidden" id="token" name="token" class="form-control form-control-lg" />     
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                        <input class="form-control form-control-lg" type="text" id="c_name" name="c_name" required  autocomplete="off"  placeholder="Please Enter Your Name" value="<?=set_value('c_targetno')?>">
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                        <input class="form-control form-control-lg" type="text" id="c_emailid" name="c_emailid" required  autocomplete="off" placeholder="Please Enter Your Emailid" value="<?=set_value('c_targetno')?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="ti-mobile"></i></span>
                                        </div>        
                                            <input class="form-control form-control-lg" type="text" id="c_mobileno"name="c_mobileno" required  autocomplete="off" placeholder="Please Enter Mobile No" value="<?=set_value('c_targetno')?>">                                        
                                </div>
                                </div>
                                </div> 

                            <div class="input-group mb-3">
                                        <button class="btn btn-sm btn-success" id="btnotp" name="btnotp" type="button">Send OTP</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<div class="text-center text-primary" id="otpmsg"></div>
                            </div>  
                            
                                        
                            
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-shield"></i></span>
                                    </div>
                                        <input class="form-control form-control-lg" type="text" id="c_otp" name="c_otp" required  autocomplete="off" placeholder="Please Enter Your OTP">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-pin"></i></span>
                                    </div>
                                        <input class="form-control form-control-lg" type="password" id="c_password" name="c_password" required  autocomplete="off" placeholder="Please Enter Password">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-pin"></i></span>
                                    </div>
                                        <input class="form-control form-control-lg" type="password" id="c_confirm_password" name="c_confirm_password" required  autocomplete="off" placeholder="Please Confirm Password">
                            </div>               
                            </div> 
                            </div> 
                                
                            <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-10">
                                        <button class="btn btn-block btn-md btn-primary" type="submit ">SIGN UP</button>
                            </div>
                            </div>
                            <div class="form-group m-b-0 m-t-0">
                                    <div class="col-sm-12 text-center">
                                        Already have an account? <a href="<?=base_url('ComplainantLogin')?>" class="text-info m-l-5 "><b>Sign In</b></a>
                            </div>       
                            </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
   
    
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    $('.select2').select2();
    
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdHDqobAAAAABRZ0T1o-Ug1zR8vofJ-QYY1OxYJ', {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;
        });
    });

    $(document).ready(function(){
			//alert('a');
			var mobile;
				$('#btnotp').on('click',function(){
					mobile = $('#c_mobileno').val();
                    //token = $('#anirban_secure_token').val(); // CSRF hash						
					//alert(mobile);
					if(mobile){
						$.ajax({
							type:'POST',
							url:'<?php echo base_url('Complainant/sendOTP'); ?>',
							data:{'mobile':mobile},
							success:function(data){
                                var obj = JSON.parse(data);
								//alert(obj.message);	
                                $('#otpmsg').html(obj.message);							        	                                
                                $('#btnotp').html("Resend OTP");
							}
						});
					}else{
                        //$('#otpmsg').html('text');	
						alert('Please Enter Your Mobile No.')							
					}
				});
            });
    </script>
</body>
</html>


