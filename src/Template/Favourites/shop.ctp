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
                <h1 class="heading">Hangbags brand you will love</h1>
            </div>		
        </div>    
        <?php
        if($stores):
            $get_total = array_chunk((array) $stores, 4, true);
            foreach ($get_total as $store) {
         ?>
        <div class="row mr">
            <?php 
           foreach ($store as $shop):   
           ?> 
            <div class="col-md-3">
                <div class="info">            
                    <div class="price ">
                        <div class="storesimg">
                            <img src="<?php echo $this->request->webroot . "images/stores/" . $shop['image']; ?>" class="img-responsive" alt="a" />
                        </div>
                        <h2><a href="<?php echo $this->request->webroot."stores/storeDetails/".$shop->slug;?>"> See Details</a></h2>
                        <h1><?php echo $shop->wash * 2; ?>% In-Store Cash back</h1>
                        <button type="button" class="btn btn-success">LINK OFFER</button>
                    </div>                                                                             
                    <div class="clearfix"> </div>
                </div>			 		
            </div>
           <?php endforeach;
           ?> 

        </div> 

            <?php
            }
            endif;
           ?>

    </div>
</div>    
</section> <!--end-->





