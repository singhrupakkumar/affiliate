<section class="banner-sec">
    <div class="container">
        <div class="row">
            	<?= $this->Flash->render() ?>
            <div class="col-md-10">
                <div class="imgbox">
                    <img src="<?php echo $this->request->webroot; ?>images/website/banner2.jpg" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="shoplits"> 
                    <div class="list">
                        <ul class="list-group">
                            <li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/jabong.png" /></li>
                            <li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/myntra.png" /></li>
                            <li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/flipkart.png" /></li>
                            <li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/shopclues.png" /></li>
                            <li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/snapdeal.png" /></li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<section class="account">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-left">
                    <div class="profile">
                        <p>welcome</p>
                        <h1><?php echo $userdata->name; ?></h1>
                        <h3>membership since <?php echo $userdata->created; ?></h3>
                        <h2><a href="<?php echo $this->request->webroot; ?>users/edit"<i class="fa fa-pencil" aria-hidden="true"></i>Edit profile</a></h2>
                    </div>
                    <div class="cashback">
                        <p>lifetime cashback
                            <p>
                                <h5>$00.00</h5>
                                <a href="<?php echo $this->request->webroot; ?>users/referearn">
                                    <button type="button" class="btn btn-primary">Refer and earn $25</button>
                                </a>
                    </div>
                    <div class="profilelist">
                        <ul>
                            <?php if ($this->request->session()->read('sociallogin') != 1) { ?>
                                <li><a href="<?php echo $this->request->webroot; ?>users/changepassword">Change Password</a></li>
                                <?php } ?>
                                    <li><a href="#">favourite stores</a></li>
                                    <li><a href="#">cash back balance</a></li>
                                    <li><a href="#">big fat back history</a></li>
                                    <li><a href="<?php echo $this->request->webroot; ?>users/wallet">My wallet</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-right">
                    <div class="wallet-sec">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wallet">
                                    <h1>my wallet <span><a href="" data-toggle="modal" data-target="#cart">+ Add a new cart</a><span></h1>
                                </div>
                                <p>Please add your credit card</p>
                                <h1></h1>
                            </div>
                            
                            
                           <div class="col-md-12">
                                <div class="wallet">
                                    <h1>my wallet</h1>
                                    <span></span>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

</section>

<!---cart-->

<!-- Modal -->
<div id="my-cart">
    <div class="modal fade cart-pop " id="cart" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a new cart</h4>
                </div>
                <div class="modal-body">

                    <form method="post" id="cardinfo-form">
                        <div class="form-group">
                            <label>card number</label>
                            <input type="text" class="form-control" id="card_no" name="card_no" aria-describedby="emailHelp">

                        </div>

                        <div class="form-group">
                            
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Expiration Month</label>
                                          <select id="exp_month" name="exp_month" class="form-control">
                                              
                                            <?php
                                            for($i = 1; $i <= 12; $i++){
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                          </select>
                                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Expiration Year</label>
                                          <select name="exp_year" id="exp_year" class="form-control">
                                              
                                            <?php
                                            for($i = date("Y"); $i < date("Y")+20; $i++){
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                          </select>
                                       
                                    </div>
                                </div>

                            </div>
                            
                            
                            <label>billing address (limited to us only)</label>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" aria-describedby="emailHelp">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City" id="city" name="city" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="State" id="state" name="state" aria-describedby="emailHelp">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ZipCode" id="zip" name="zip" aria-describedby="emailHelp">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>phone number</label>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="phone number">
                            </div>
                            <div class="form-group">  
                              <button type="submit" class="btn btn-primary ">Add a new cart</button>
                            </div> 
                        </div>

                   </form>

                </div>
                <div class="modal-footer">
                    <p>By provinding your credit card, Ebates will store your credit card information as set forth in its Terms & Conditions and Privacy Policy</p>
                </div>
            </div>

        </div>
    </div>
</div>

 <script>

     var cardinfoform = jQuery("#cardinfo-form").validate({   
	errorClass: "my-error-class",
   	validClass: "my-valid-class", 
        rules: {
              card_no : { 
                required: true 
                  } 
                 ,exp_month: {  
                required: true 
                  },
               exp_year: {  
                required: true
                 },
               first_name: {  
                required: true
                 },
               last_name: {  
                required: true
                 },
		phone: { 
                 required: true,
                 digits: true
               }
               ,
               address: { 
                 required: true
               },
                city: { 
                 required: true
               },
               state: { 
                 required: true
               },
               zip: { 
                 required: true
               }
        },
        messages: {
          
            exp_month: {     
                    required: "This field is required!", 
                },
            exp_year:{
                  required: "This field is required!", 
            },
             first_name:{
                  required: "This field is required!", 
            },
            last_name:{ required: "This field is required!",},
            phone: {  
                    required: "This field is required!",  
                },
            card_no: {    
                    required: "This field is required!",  
                }
        }
    });
    
    $('#cardinfo-form').on('submit',function(){
        if(cardinfoform.form()){ 
        
        }else{ 
            return false;
        } 
        
    })
</script>