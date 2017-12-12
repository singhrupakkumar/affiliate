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
                    <h1 class="heading"><?php echo count($cashback); ?> Stores</h1>		

                    <div class="filter_outer">  
                        <select class="form-control" id="filter">
                            <option>Select One</option>
                            <option>Select Two</option>
                            <option>Select Three</option>
                            <option>Select Four</option>
                            <option>Select Five</option>
                            <option>Select Six</option>		
                        </select>
                    </div>
                </div>
            </div>		
        </div>    

        <div class="row mr">  
            
            <?php if($cashback) {
               foreach($cashback as $store){
             ?>
            <div class="col-md-3">
                <div class="photo">
                    <figure>
                        <img src="<?php echo $this->request->webroot."images/stores/".$store['image']; ?>" class="img-responsive" alt="a" />
                    </figure>
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-12">
                            <h2>See Details</h2>
                            <h1> <?php echo $store->wash * 2; ?>% Cash Back</h1>										
                            <a href="<?php echo $this->request->webroot."stores/storeDetails/".$store['slug'];?>"><button type="button" class="btn btn-success">Get Deals</button></a>
                        </div>                                     
                    </div>                               
                    <div class="clearfix"></div>
                </div>			 		
            </div>
           <?php 
               }
            }
           ?> 

        </div> <!-- end one row-->


    </div>
</div>    
</section> <!--end-->  





