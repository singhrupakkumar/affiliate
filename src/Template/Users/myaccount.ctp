<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
<section class="banner-sec">
	<div class="container">
		<div class="row"> 
			<div class="col-md-10">
				<div class="imgbox">
                                    <img src="<?php echo $this->request->webroot; ?>images/website/banner2.jpg"/>
				</div>
			</div>
			<div class="col-md-2">
			<div class="shoplits">
				<div class="list">
					<ul class="list-group">
						<li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/jabong.png"/></li>
						<li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/myntra.png"/></li>
						<li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/flipkart.png"/></li>
						<li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/shopclues.png"/></li>
						<li class="list-group-item"><img src="<?php echo $this->request->webroot; ?>images/website/snapdeal.png"/></li>
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
				<p>lifetime cashback<p>
				<h5>$00.00</h5>
				<a href="<?php echo $this->request->webroot; ?>users/referearn"><button type="button" class="btn btn-primary">Refer and earn $25</button></a> 
			</div>			
			<div class="profilelist">
			<ul>   
                        <?php 
                        if($this->request->session()->read('sociallogin') != 1) { ?>
                        <li><a href="<?php echo $this->request->webroot; ?>users/changepassword">Change Password</a></li>
                        <?php }  ?>
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
		<div class="first-sec">
		
		<div class="cashbox">
			<div class="row ">	
					<div class="col-md-12 heading">
					<h1>My Cash Back Account</h1>	
					</div>					
					<div class="col-md-4 ">
					<div class="innerbx">
						<h2>Cash Back Balance</h2>
						<small>00.00</small>
					</div>
					</div>
						<div class="col-md-8 ">
						<div class="innerbx1">
						<h2>Complete Your Profile</h2>
						<p>Add your address to your profile so we can send you your future Big Fat Checks.
						</p>
						<button type="button" class="btn btn-primary">Add your business</button>
					</div>
					</div>
				
				</div>
		</div>
				
				<div class="fav-store">
				
					<div class="row">
						<div class="col-md-12">
						<div class="storesbox">
							<h1>Favorite Stores</h1>
                                                          <div class="alert-box1" style="display: none;"> </div>   
							 <div class="input-group ui-widget">
                                                             
                                                             <input type="text" class="form-control add-store" storeid="" id="search" value="" placeholder="Add all your favourite stores" required/>
						<span class="input-group-btn">
						<button  class="btn btn-default" id="addfav" type="button">Add</button>
						</span>
						</div><!-- /input-group -->
						</div>
						</div>
						<div class="col-md-12 storebox2">
						<p>Add your favorites stores for easy shopping and personalized deals. When you see a , click it and the store will be added to your favorites here. Get started by searching above for the stores you already love.</p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
						
						</div>
						
					</div>
				
				</div>
				
				
				
				
				
				
				<div class="second-sec">
				 <h1 class="recommend">Recommended favourite stores</h1>
				<div class="row">
                                    
                                      <?php
                                        $get_total = array_chunk((array) $fav_store,3, true);
                                        foreach ($get_total as $storev) {

                                       ?>
					<div class="col-md-12  pdlr">
						<div class="productlist">
							<ul>
                                                            <?php foreach ($storev as $d) {  ?> 
                                                            
                                                            <li>
                                                                <i class="fa fa-heart active" aria-hidden="true"></i>
                                                                <img src="<?php echo $this->request->webroot . "images/stores/" . $d['store']['image']; ?>"/> 
                                                                <span> upto <?php  echo $d['store']['wash']*2; ?>%</span>
                                                            </li>
                                                            <?php } ?>
							</ul>
							
						</diV>  
					</div>
                                        <?php } ?>
     
				
				
					</div>
				
				</div>
			
		</div>	
	</div>
	</div>
       </div>  
     </div>             

</section> 
<script>
    $('#addfav').on("click", function () {
        if($('#search').val()==''){
            alert('Enter store name');
        }else{
        $.ajax({
            url: '<?php echo $this->request->webroot; ?>favourites/add',
            data:{store_id:$('#search').attr('storeid')},
            method: 'post',
            dataType: 'json',
           beforeSend: function(){ 
                var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                $('.alert-box1').html(info_html).css('display', 'block');
            },
            success: function(d){ 
                if (d.isSucess == 'false') {
                     $('.alert-box1').html(d.msg).css('display', 'block');   
                } else {
                    $('.alert-box1').html(d.msg).css('display', 'block');
                    window.location.reload();
                }
            }
        });
        } 
    });

    $("#search").autocomplete({
		minLength: 2,
		select: function(event, ui) {
                         $('#search').val(ui.item.label);
                         $('#search').attr('storeid',ui.item.id);
		},
		source: function (request, response) {
			$.ajax({
				url: '<?php echo $this->request->webroot; ?>stores/all',
				data: {
					search: request.term
				},
				dataType: "json",
				success: function(data) {
					response($.map(data, function(el, index) {
						return {
							value: el.name,
							name: el.name,
                                                        id: el.id,
							image: el.image
						};
					}));
				}
			});
		}
	}).data("ui-autocomplete")._renderItem = function (ul, item) {
                        return $("<li></li>")
			.data("item.autocomplete", item) 
			.append("<a><img width='40'/> " + item.name + "</a>")
			.appendTo(ul)
	};

   </script>
