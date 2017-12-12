<section class="banner-sec">
	<div class="container">
		<div class="row">
    	<?= $this->Flash->render() ?>

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


<section class="slider1 referafrnd">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="heading2">refer a friend , earn money</h1>
				<ul class="list">
					<li>Invite friends by email or with your personal link.</li>
					<li>Get $25 when one friend joins and shops. They'll get $10.</li>
					<li>You,ll also be entered to win $50,000! See Details</li>
					<li>Invite friends by email or with your personal link.</li>
					<li>Get $25 when one friend joins and shops. They'll get $10.</li>
					<li>You,ll also be entered to win $50,000! See Details</li>		
			   </ul>			
			</div>			
			<div class="col-md-6">		
				<div class="row">
					<h1 class="heading2">invite your friend by email</h1>
					<div class="col-md-12 pd">
					<div class="invite">
                                            <form  method="post">
						<div class="input-group">
                                                  <input type="text" class="form-control" name="email" placeholder="Email Addres" required/>
                                                  <input type="hidden" class="form-control" name="refer_link"  value="<?php echo $fullurl."users/invitecode/".$user['refer_code'] ?>"/>
						<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Send email</button>
						</span>
						</div><!-- /input-group -->
                                            </form>    
					</div>
					</div>				
				</div>			
				<div class="row">				
					<div class="col-md-12 pd">
					<div class="invite2">
					<h1 class="heading2">share your invite link</h1>
					<button type="button" class="btn btn-primary fb" id="share_button">share on facebook</button>
                                       
					<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=<?php echo $fullurl."users/invitecode/".$user['refer_code'] ?>&pubid=ra-42fed1e187bae420&title=Affiliate Shop&ct=1" target="_blank"><button type="button" class="btn btn-secondary twit">share on twitter</button></a> 
					</div>	
					</div>
				</div>		
			</div>		
		</div>	
	</div>
</section>
 <script type="text/javascript"> 
jQuery(document).ready(function(){
jQuery('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: 'Affiliate Shop Referral Code: <?php echo $user['refer_code'] ?>',
link: '<?php echo $fullurl."users/invitecode/".$user['refer_code'] ?>',
picture: 'https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png',
caption: 'Affiliate Shop',
description: 'Please use this referral code for thoag account registration and get benefits.',
message: ''
}); 
});  
});
</script>   

