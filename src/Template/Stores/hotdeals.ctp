<section class="banner-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="imgbox">
                    <img src="<?php echo $this->request->webroot; ?>images/website/banner1.jpg"/>
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


<section class="slider1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-sec">
                    <h1 class="heading">featured coupons and daily deals</h1>
                </div>
            </div>		
        </div>    

        <div class="row mr">
            <?php 
            if($hotdeals){
             $color_counter = 0;    
            $color = ['yellow','brown','pink','blue'];
            foreach($hotdeals as $deal ){ ?>
            <div class="col-md-3">
                <div class="photo <?php  echo $color[$color_counter++];?>"> 
                    <div class="text-wrapper">									
                        <h2>Up To</h2>
                        <h1>40.00% OFF</h1>
                    </div>
                    <div class="insideimg">
                        <figure>
                            <img src="<?php echo $this->request->webroot."images/stores/".$deal->store->image; ?>"/>
                        </figure>
                    </div>
                </div>								
                <div class="info">
                    <div class="row">
                        <div class="price space col-md-12">
                            <h2>Expires <?php echo $deal->expired; ?></h2>
                            <h1><?php echo $deal->store->wash * 2; ?>% Cash Back</h1>
                            <h3><?php echo $deal->name; ?></h3>											
                            <button type="button" class="btn btn-success">shop now</button>
                        </div>                                    
                    </div>                                 
                    <div class="clearfix"></div>
                </div>		 		
            </div>
            <?php }  } ?> 
		
        </div> 






    </div>
</div>    
</section> <!--end-->



<section class="slider1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-sec">
                    <h1 class="heading">monday coupons and promo codes</h1>
                    <button type="button" class="btn btn-success stores mr0">SEE COUPONS BY STORES</button>
                </div>
            </div>		
        </div>    

        <div class="row mr">
            
             <?php 
            if($monday){
            foreach($monday as $deal ){ ?>
            <div class="col-md-3">
                <div class="info">            
                    <div class="price ">
                        <div class="storesimg">
                            <img src="<?php echo $this->request->webroot."images/stores/".$deal->store->image; ?>" class="img-responsive" alt="<?php echo $deal->store->name; ?>" />
                        </div>
                        <h2><a href="<?php echo $this->request->webroot."stores/storeDetails/".$deal->store->slug;?>"> See Details</a></h2>
                        <h1><?php echo $deal->store->wash * 2; ?>% Cash Back</h1>
                        <button type="button" class="btn btn-success">shop now</button>
                    </div>                                                                             
                    <div class="clearfix"> </div>
                </div>			 		
            </div>
            <?php } } ?> 


        </div> 

    </div>
</div>      
</section> <!--end-->