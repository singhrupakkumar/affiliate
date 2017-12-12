<section class="banner-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="imgbox">
                    <img src="<?php echo $this->request->webroot; ?>images/website/banner.jpg" />
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

<!--make this lucky slider-->
<div class="product_carousel slider1">
    <div class="container">
        <div class="head-sec">
            <h1 class="heading">Make This Your Lucky Day With 13% Cash Back </h1>
            <a href="<?php echo $this->request->webroot . "stores/shop"; ?>" class="btn btn-success stores">SEE ALL STORES</a>
        </div> 
        <div class="carousel_inn"> 
            <div class="regular slider">
                <?php
                    if($stores){
                    foreach ($stores as $d) {
                 ?>
                <div>
                      <a href="<?php echo $this->request->webroot . "stores/storeDetails/".$d->slug; ?>"> 
                    <div class="col-item">
                        <div class="photo">
                            <figure>

                                <img src="<?php echo $this->request->webroot . "images/stores/" . $d['image']; ?>" class="img-responsive" alt="a" />
                            </figure>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-12">
                                    <h2><?php echo $d->name; ?>
                                        Wash <?php echo $d->wash; ?>%</h2>
                                    <h1>  <?php echo $d->wash * 2; ?>% Cash Back</h1>

                                 
                                       <button type="button" class="btn btn-success">See All Coupons</button>
                                   
                                </div>

                            </div>

                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                     </a>      
                </div>
                    <?php
                    }

                    }
                    ?>
            </div> 
        </div>
    </div>
</div>

<section class="imglist">

    <div class="container">
        <div class="row">
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/kids.jpg"/></div>
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/20off.jpg"/></div>
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/70off.jpg"/></div>
        </div>
    </div>

</section>

<!--slick slider-->
<div class="product_carousel slider1">
    <div class="container">
        <div class="head-sec">
            <h1 class="heading">featured daily deals</h1>

        </div>
        <div class="carousel_inn">
            <div class="regular slider">
                
                <?php
                
                if($features){
                 $color = ['yellow','brown','pink','blue'];
                 $color_counter = 0;
                foreach ($features as $d) {  
                ?>
                <div>
                    <div class="col-item">
                        <div class="photo <?php  echo $color[$color_counter++];?>">
                            <div class="text-wrapper">
                                <h2><?php echo $d->name; ?></h2> 
                            </div>
                            <div class="insideimg">
                                <a href="<?php echo $this->request->webroot . "stores/storeDetails/".$d->store->slug; ?>">  
                                <figure>
                                   <img src="<?php echo $this->request->webroot."images/stores/".$d->store->image; ?>"/>
                                </figure>
                                </a>    
                            </div>
                        </div>

                        <div class="info">
                            <div class="row">
                                <div class="price space col-md-12">
                                    <h2>Expires <?php echo $d->expired; ?></h2>
                                    <h1> <?php echo $d->store->wash * 2; ?>% Cash Back</h1>
                                    <h3><?php echo $d->name; ?></h3>

                                   <a href="<?php echo $d->url; ?>"> <button type="button" class="btn btn-success">shop now</button></a>
                                </div>

                            </div>

                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                </div>
              <?php 
                }
                }
              ?>  
              
            </div>
        </div>
    </div>
</div>

<!--end slick slider-->

<!--slider three cash back store-->

<div class="product_carousel slider1">
    <div class="container">
        <div class="head-sec">
            <h1 class="heading">In Stores Cash Back Offers</h1>
            <a type="button" href="<?php echo $this->request->webroot;?>products/index" class="btn btn-success stores">SEE ALL OFFERS</a>
        </div>
        <div class="carousel_inn">
            <div class="regular slider">
                <?php 
                if($cashback_stores){
                foreach ($cashback_stores as $d) { ?> 
                <div>
                    <a href="<?php echo $this->request->webroot."stores/storeDetails/".$d->slug;?>">
                    <div class="col-item">
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-12">
                                    <div class="img_outer">
                                        <div class="storesimg">
                                           <img src="<?php echo $this->request->webroot."images/stores/".$d->image; ?>" class="img-responsive" alt="<?php echo $d->name; ?>" />
                                        </div>
                                    </div>
                                    <h2> See Details</h2>
                                    <h1><?php echo $d->wash * 2; ?>% In-Store Cash back</h1>
                                    <button type="button" class="btn btn-success">LINK OFFER</button> 
                                </div>

                            </div>

                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                     </a>
                </div>
                <?php } } ?>        

            </div>
        </div>
    </div>
</div>