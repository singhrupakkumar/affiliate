<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';      
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?=  $this->Html->charset() ?>     
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $cakeDescription ?> Affiliate Shop</title> 
<link rel="icon" type="image/x-icon" href="<?php echo $this->request->webroot."images/website/favicon.ico";?>" />
<?= $this->Html->css( array('custom/bootstrap.min.css','custom/bootstrap-theme.min.css','custom/font-awesome.min.css','custom/slick.css','custom/slick-theme.css','custom/style.css') ) ?>
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/assets/html5shiv.min.js"></script>
<script type="text/javascript" src="js/assets/respond.min.js"></script>
<![endif]-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic,600italic,600"
          rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
 <?= $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery-ui.min.js')) ?>        
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>     
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>  
 <script src="https://apis.google.com/js/platform.js" async defer></script>    
    <style>    
	.message.success{
		background: #00b33c;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
	.message.error{
		background: #cc0000;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
        .my-error-class{
            color:red !important;
        }
        .my-valid-class{
          color:#49BA64 !important;  
        }
        .error{ color:#fff !important; }
        
        .sign-up .modal-body form .btn-center{
            width:100%;
            float:left;
            text-align: center;
        }
        .sign-up .modal-body form .btn-center button.join{
           float:none; 
        }
	</style> 
   
    <!-- Google Login -->
    <script>
        
    var startApp = function() {
        gapi.load('auth2', function() {
            auth2 = gapi.auth2.init({
                client_id: '1056683859225-mtkf5kaqku09aq5mfjoqubkp1h6b4mq2.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
            });
            attachSignin(document.getElementById('customBtn')); 
            attachSignin(document.getElementById('customBtn1'));   
        });
    };
    var googleUser = {};

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var profile = googleUser.getBasicProfile();
                var google_id = profile.getId();
                var full_name = profile.getName();
                var image = profile.getImageUrl();
                var g_email = profile.getEmail()
                var uid = '<?php echo $loggeduser["id"]; ?>';

                if (google_id != '' && uid == '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->request->webroot ?>users/gplogin",
                        data: {
                            id: profile.getId(),
                            name: profile.getName(),
                            first_name: profile.getGivenName(),
                            last_name: profile.getFamilyName(),
                            email: profile.getEmail(),
                            action: 'gplogin'
                        },
                        dataType: "json",
                        success: function(data) {
                           // console.log(data);
                           // return false;
                            if (data.isSuccess != 'true') {
                                alert(data.msg);
                            } else {
                                location.reload();
                            }

                        },
                        error: function() {}

                    });
                }
            },
            function(error) {
                //alert(JSON.stringify(error, undefined, 2));
            });
    }

    </script>  
   
    <!-- Google Login (End) --> 
   
 <script>
  $( function() {  
    $( "#dob" ).datepicker();
  } );
 </script>
</head>  
<body>
<main class="st-wrapper">
	
	<header class="header">
	<div class="top_header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">				
					<p>One Day Only! <span>13% Cash Back </span>Ends in 02:07:59<p>
				</div>
			</div>
		</div>
	</div><!-- End Here -->
	<div class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">					
				<!-- Brand and toggle get grouped for better mobile display -->				
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="<?php echo $this->request->webroot ?>stores/index">LOGO</a>			
				</div>
				<div class="col-md-6 col-sm-6"> 
                                    <form class="navbar-form" method="get" id="searchform" action="<?php echo $this->request->webroot; ?>products/search">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm s" id="s" name="search" autocomplete="off" placeholder="Search Coupons and Products">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"
                                                        <img src="<?php echo $this->request->webroot; ?>images/website/search.png"/>
                                                    </button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
       
                                    </form>
				</div>
				<div class="col-md-3 col-sm-3">			
					<ul class="nav navbar-nav navbar-right">
					   <?php if(!$loggeduser){ ?>
                                                <li class="active"><a href="#" data-toggle="modal" data-target="#signin">SIGN IN </a></li>
						<li class="active"><a href="#" data-toggle="modal" data-target="#signup"  >JOIN NOW </a>
                                            <?php }else{ ?>
                                                <li class="active"><a href="<?php echo $this->request->webroot ?>users/myaccount">My Account</a></li>
						<li class="active"><a href="<?php echo $this->request->webroot ?>users/logout">Logout</a>   
                                            <?php } ?> 
                                        </ul>            
				</div>   
			</div>
		</div>		
	</div>
	<div class="bottom-header">
		<div class="container">
		<div class="row">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown <?php  if($this->request->params['action'] == 'index' ) { echo "active"; }?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $this->request->webroot; ?>images/website/cart.png"/>ALL STORES <img class="arrow" src="<?php echo $this->request->webroot; ?>images/website/arrow1.png"/></a>
          <ul class="dropdown-menu storelist">
            <li><a href="<?php echo $this->request->webroot . "stores/shop"; ?>">Stores</a></li>
          </ul>
        </li>
      </ul>
    
      <ul class="nav navbar-nav navbar-left"> 
                        <li class="<?php  if($this->request->params['action'] == 'hotdeals' ) { echo "active"; }?>"><a href="<?php echo $this->request->webroot . "stores/hotdeals"; ?>">Hot Deals</a></li>
			<li class="<?php  if($this->request->params['action'] == 'topviewstore' ) { echo "active"; }?>"><a  href="<?php echo $this->request->webroot . "stores/topviewstore"; ?>">Top Viewed Stores</a></li>
			<li class="<?php  if($this->request->params['action'] == 'cashbackstore' ) { echo "active"; }?>"><a href="<?php echo $this->request->webroot . "stores/cashbackstore"; ?>">In-Store Cash Back</a></li>
			<li class="<?php  if($this->request->params['action'] == 'b2b' ) { echo "active"; }?>"><a href="#">B2B</a></li>
			<li class="<?php  if($this->request->params['action'] == 'shop' ) { echo "active"; }?>"><a href="<?php echo $this->request->webroot . "stores/shop"; ?>">Collections</a></li>
			<li class="<?php  if($this->request->params['action'] == 'referearn' ) { echo "active"; }?>"><a href="<?php echo $this->request->webroot . "users/referearn"; ?>">Refer and Earn</a></li>
			<li class="<?php  if($this->request->params['action'] == 'help' ) { echo "active"; }?>"><a href="#">Help</a></li>  
      </ul>
    </div><!-- /.navbar-collapse --> 	
		</div>
	</div>
	</div>
</header><!-- Header Section End Here -->

<section class="st-content">
 <?= $this->fetch('content') ?>    

</section>


<footer>
	<div class="top-footer">
	<div class="container">
		<div class="row">
			<div class="left">
			<div class="col-md-4">
			<div class="address">
				<h1>CONTACT INFORMATION</h1>
				<ul>
					<li><h2>Address</h2><P>123, Street Name, City, United States</p></li>
					<li><h2>Phone</h2><P>(123)456-789</p></li>
					<li><h2>Email</h2><P>mail@example.com</p></li>
					<li><h2>Working days/hours</h2><P>MON-SAT / 9>00 AM - 8:00 PM</p></li>
				<ul>
			</div>
			<ul class="socialmedia" >
				<li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
			</div>
			
			
			</div>
			
			<div class="right">
			<div class="col-md-8">
				<div class="row ">
					<div class="rightone">
					<div class="col-md-6">
						<h1>Be the first to know</h1>
						<p>Get all the latest information on Events, Sales and Offers.
						sign up for newsletter today.</p>
					</div>
					<div class="col-md-6">
					    <div class="message" style="text-align:center;font-weight: bold;color:#49BA64;"></div>   
                                             <form class="form-subs" method="post" id="subscribe">
						<div class="input-group">
                                                    <input id="email" type="email" name="email" class="form-control" placeholder="Email Address">
                                                    <span class="input-group-btn">
                                                    <button id="nwsltr" name="nwsltr" class="btn btn-default" type="button">Subscribe</button>
                                                    </span>

                                                 </div><!-- /input-group -->
                                            </form>  
					</div>
					</div>
				</div>
					
				<div class="row">
					<div class="col-md-6">
						<h1>My ACCOUNT</h1>
							<ul class="about">
								<li><a href="<?php echo $this->request->webroot . "staticpages/aboutus"; ?>">About Us </a></li>
								<li><a href="<?php echo $this->request->webroot . "staticpages/contact"; ?>">Contact Us</a></li>
								<li><a href="<?php echo $this->request->webroot . "users/myaccount"; ?>">My Account</a></li>
								<li><a href="<?php echo $this->request->webroot . "staticpages/term"; ?>">Terms and Conditions</a></li>
								<li><a href="<?php echo $this->request->webroot . "staticpages/privacy"; ?>">Privacy Policy</a></li>
								<li><a href="<?php echo $this->request->webroot . "staticpages/faq"; ?>">FAQ'S</a></li>
							<ul>
							
					</div>
					<div class="col-md-6">
						<h1>MAIN FEATURES</h1>
							<ul class="about" >
								<li><a href="">Feature One</a></li>
								<li><a href="">Feature Two</a></li>
								<li><a href="">Feature Three</a></li>
								<li><a href="">Feature Four</a></li>
								<li><a href="">Feature Five</a></li>
								<li><a href="">Feature Six</a></li>
							<ul>
					</div>
				
				
				</div>
			</div>
			</div>
			
		</div>
	</div>
	</div>
	
	<div class="bottom-footer">
	<div class="container">
		<div class="row">
			<p>Copyright &copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
		</div>
	</div>
	</div>



</footer>


<!---sign in modal-->

<!-- Modal -->
  <div class="modal fade sign-in" id="signin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">LOG IN</h4>
        </div>
          
           <div class="alert-box1" style="display: none;"></div>
        <div class="modal-body">
		
                <form class="log" id="login-frm">
                    <div class="form-group"> 

                      <input type="email" class="form-control" id="exampleInputEmail1" name="username" autocomplete="off" aria-describedby="emailHelp" placeholder="Email Address">

                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" name="password" placeholder="Password"> 
                    </div>

                    <button type="button" class="btn btn-success login">Log in</button>

                    <div>
                        <div class="col-md-12">
                            <h2 class="line"><span>or connect with us</span></h2>
                        </div>

                    </div>

                </form>
         
        </div>
        <div class="modal-footer">  
		<form>
                    <button type="button" class="btn btn-primary fb omb_login mr1">Facebook</button>  
                    <button type="button" id="customBtn" class="btn btn-primary gle">google</button>
                    <script>startApp();</script> 
                    
		</form>
             <a style="color: #000" href="<?php echo $this->request->webroot; ?>users/forgot">Forgot Password?</a>   
        </div>
      </div>
      
    </div>
  </div>   
  
  
 <!---sign un modal-->
<!-- Modal -->
  <div class="modal fade sign-up" id="signup" role="dialog">
    <div class="modal-dialog"> 
     <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SIGN UP</h4>
        </div>
        <div class="modal-body">
		<form id="signup-frm" autocomplete="off"> 
		<div class="row">
                      <div class="alert-box" style="display: none;">
                     </div>
                    
			<div class="col-md-12">
			<div class="form-group"> 
			<input type="name" class="form-control" name='name' autocomplete="off" id="name" aria-describedby="emailHelp" placeholder="Name">
			</div>
			</div>
		
			<div class="col-md-6">
				<div class="form-group">
                                    <input type="email" class="form-control" name="email" autocomplete="off" id="email" aria-describedby="emailHelp" placeholder="Email Address">
				</div>
			</div>
			<div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phone" id="phone"  placeholder="Phone Number" required>
			    </div>
			</div>
		
		</div>		
		<div class="row">	
			<div class="col-md-6">	
				<label class="gender">Gender</label>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
                                            <input class="form-check-input" name="gender" type="radio" name="inlineRadioOptions" id="gender1" value="male" checked> 
						<span class="radio-new">Male</span>
					</label>
				</div>
			<div class="form-check form-check-inline">
				<label class="form-check-label">
						<input class="form-check-input" name="gender" type="radio" name="inlineRadioOptions" id="gender2" value="female"> 
						<span class="radio-new">Female</span>
				</label>
		</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">    
                                    <input type="text" class="form-control" id="dob" name="dob" autocomplete="off"  placeholder="Date Of Birth">
                                  
				</div>
			</div>
		
		</div>
		<div class="row">
			<div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" autocomplete="off" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
                            </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
                                <input type="password" class="form-control" autocomplete="off" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Confirm Password">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                            <div class="btn-center"> 
				<button type="button" class="btn btn-success join">JOIN NOW</button>
                            </div>
			</div>
		</div>
		
		<div>
		<div class="col-md-12">
				<h2 class="line"><span>or connect with us</span></h2>
                            
		</div>
		</div>
		</form>  
        </div>
        <div class="modal-footer">
		<form>
                <button type="button" class="btn btn-primary fb omb_login">Facebook</button>
		<button type="button" id="customBtn1" class="btn btn-primary gle">Google<span class="gplus">+</span></button>
                <script>startApp();</script> 
		</form>
            <a href="#" style="color: #000;text-align: center;" data-dismiss="modal" data-toggle="modal" data-target="#signin">Do you have an account? Sign In</a> 
        </div> 
      </div>
      
    </div>
  </div>
	
	
</main>  
  
<script type="text/javascript">

        function valid_email_address(email)
        {
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            return pattern.test(email);
        }

        jQuery('#nwsltr').on("click", function ($) {    
            if (!valid_email_address(jQuery("#email").val()))
            {
                jQuery(".message").html('Please make sure you enter a valid email address.');
            }
            else
            {

                jQuery(".message").html("<span style='color:green;'>Almost done, please check your email address to confirmation.</span>");
                jQuery.ajax({
                    url: '<?php echo $this->request->webroot ;?>users/newsletter', 
                    data: jQuery('#subscribe').serialize(),
                    type: 'POST',
                    success: function (msg) {
                        if (msg == "success")
                        {
                            jQuery("#email").val("");
                            jQuery(".message").html('<span style="color:green;">You have successfully subscribed to our mailing list.</span>');

                        }
                        else
                        {
                            jQuery(".message").html('<span style="color:green;">Please make sure you enter a valid email address.</span>');
                        }
                    }
                });
            }
            return false;
        });
        
    </script> 
    
     <!-- Login Modal (END) -->
    
    <script>

     var editaddressform = $("#signup-frm").validate({   
	errorClass: "my-error-class",
   	validClass: "my-valid-class", 
        rules: {
              dob : { 
                required: true 
                  } 
                 ,name: {  
                required: true 
                  },
               email: {  
                required: true,
                email:true
                 },
               password: {  
                required: true
                 },
               password1: {  
                required: true
                 },
		phone: { 
                 required: true,
      digits: true
               }
        },
        messages: {
          
            name: {     
                    required: "This field is required!", 
                },
            email:{
                  required: "This field is required!", 
            },
             password:{
                  required: "This field is required!", 
            },
            password1:{ required: "This field is required!",},
            phone: {  
                    required: "This field is required!",  
                },
            dob: {    
                    required: "This field is required!",  
                }
        }
    });

    $("#signup-frm button").click(function() {
        if(editaddressform.form()){  
        $.ajax({
            url: '<?php echo $this->request->webroot ?>users/signup',
            data: $('#signup-frm').serialize(),
            method: 'post',
            dataType: 'json',
            beforeSend: function(){ 
                var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                $('.alert-box').html(info_html).css('display', 'block');
            },
            success: function (response) {

                if(response.isSucess == 'true'){
                    $('.alert-box').html(response.msg).css('display', 'block');
                     location.reload();
                }else{
                    $('.alert-box').html(response.msg).css('display', 'block');   
                }
                
            }
        });
        
        
        }else{ 
        return false;
        }
    })

    $('#login-frm button').on("click", function () {

        $.ajax({
            url: '<?php echo $this->request->webroot; ?>users/login',
            data: $('#login-frm').serialize(),
            method: 'post',
            dataType: 'json',
           beforeSend: function(){ 
                var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                $('.alert-box1').html(info_html).css('display', 'block');
            },
            success: function(d){ 
                
                if (d.response.isSucess == 'false') {
                     $('.alert-box1').html(d.response.msg).css('display', 'block');   
                } else {
                    $('.alert-box1').html(d.response.msg).css('display', 'block'); 
                        location.reload();
                }
            }
        });
    });
    
    
    jQuery("#s").autocomplete({
		minLength: 2,
		select: function(event, ui) {
			jQuery("#s").val(ui.item.label);
			jQuery("#searchform").submit();
		},
		source: function (request, response) {
			jQuery.ajax({
				url: 'https://rupak.crystalbiltech.com/affiliate/products/searchjson',
				data: {
					term: request.term
				},
				dataType: "json",
				success: function(data) {
					response(jQuery.map(data, function(el, index) {
						return {
							value: el.name,
							name: el.name,
							image: el.image
						};
					}));
				}
			});
		}
	}).data("ui-autocomplete")._renderItem = function (ul, item) {
		return jQuery("<li></li>")
			.data("item.autocomplete", item) 
			.append("<a><img width='40' src='https://rupak.crystalbiltech.com/affiliate/images/products/" + item.image + "' /> " + item.name + "</a>")
			.appendTo(ul)
	};
	</script> 
        
        <!---Start-Facebook Login-->
    <script type="text/javascript">

        function testAPI() {
            FB.api('/me?fields=id,email,name,birthday,locale,age_range,gender,first_name,last_name,picture', function(response) {  
                data = {
                    myid : response,
                    action:'fblogin'
                }
                $.ajax({
                    url: '<?php echo $this->request->webroot ?>users/fblogin',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    beforeSend: function(){  
                        var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                        $('.alert-box1').html(info_html).css('display', 'block');
                    },
                    success: function(resdata){
                        //console.log(resdata);
                        //window.location.href = resdata.link;

                        if(resdata.isSuccess != 'true'){
                            alert(resdata.msg);
                        }else{
                            location.reload();
                        }
                    }
                });

            });

        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                testAPI();
            } else {
                console.log('Please log ') ;
            }
        }

        $(document).ready(function(){
            window.fbAsyncInit = function() {  
                FB.init({
                    appId      : '148786209078292',
                    cookie     : true,  
                    xfbml      : true, 
                    version    : 'v2.10' 
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            $(function() {
                $('.omb_login').on('click', function (e) {
                    e.preventDefault();
                    FB.login(function(response) {
                        checkLoginState();
                    }, {scope: 'email'});
                });
            });
        })
    </script> 
    <!--End-Facebook Login-->       
    
<script type="text/javascript" src="<?php echo $this->request->webroot;?>js/slick.min.js"></script>
<!-- Custom Js Include Here -->
<script type="text/javascript" src="<?php echo $this->request->webroot;?>js/custom.js"></script>   
</body>
</html>     