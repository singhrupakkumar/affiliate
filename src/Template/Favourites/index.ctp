<section class="banner-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="imgbox">
                    <img src="<?php echo $this->request->webroot; ?>images/website/banner.jpg"/>
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
            <h1 class="heading">Make This Your Lucky Day With 13% Cash Back <a href="<?php echo $this->request->webroot . "stores/shop"; ?>"><button type="button" class="btn btn-success stores">SEE ALL STORES</button></a></h1>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel"> 
                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    <?php
                    $get_total = array_chunk((array) $stores, 4, true);
                    $store_counter = 0;
                    foreach ($get_total as $store) {
                     ?>

                        <div class="item <?php
                        if ($store_counter++ == 0) {
                            echo 'active';
                        }
                        ?>">
                            <div class="row">
                     <?php foreach ($store as $d) { ?>
                                    <div class="col-sm-3">  
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

                                                        <a href="<?php echo $this->request->webroot . "stores/shop"; ?>"><button type="button" class="btn btn-success">SEE ALL COUPONS</button></a>
                                                    </div>

                                                </div>

                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php } ?>
                            </div>
                        </div>
        <?php } ?> 
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>   
    </div>
</section>    

<section class="imglist">

    <div class="container">
        <div class="row">
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/kids.jpg"/></div>
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/20off.jpg"/></div>
            <div class="col-md-4"><img src="<?php echo $this->request->webroot; ?>images/website/70off.jpg"/></div>
        </div>
    </div>

</section>


<section class="slider1">
<div class="container">
<div class="row">
    <h1 class="heading">FEATURED DAILY DEALS</button></h1>
    <div id="carousel-example2" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            <?php
                $get_total = array_chunk((array) $features, 4, true);
                $features_counter = 0;
                
                $color = ['yellow','brown','pink','blue'];    
                foreach ($get_total as $feature) {
            ?>
                 <div class="item <?php
                        if ($features_counter++ == 0) {
                            echo 'active';
                        }
                        ?>">
                        <div class="row">
           <?php
           $color_counter = 0;
           foreach ($feature as $d) { ?>
                    <div class="col-sm-3">
                        <div class="col-item">
                            <div class="photo <?php echo $color[$color_counter++];?>">
                                <div class="text-wrapper">									
                                    <h2><?php echo $d->name; ?></h2>
                                   
                                </div>
                                <div class="insideimg">
                                    <figure>
                                        <img src="<?php echo $this->request->webroot."images/stores/".$d->store->image; ?>"/>
                                        <figure>
                                            </div>
                                            </div>

                                            <div class="info">
                                                <div class="row">
                                                    <div class="price space col-md-12">
                                                        <h2>Expires <?php echo $d->expired; ?></h2>
                                                        <h1>  <?php echo $d->store->wash * 2; ?>% Cash Back</h1> 
                                                        <h3><?php echo $d->name; ?></h3>

                                                        <button type="button" class="btn btn-success">SEE ALL COUPONS</button>
                                                    </div>

                                                </div>

                                                <div class="clearfix">
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                 <?php } ?>    
                                          
                                            </div>
                                            </div>
            
                <?php } ?>
                                           
                                            </div>
                                            <!-- Left and right controls -->
                                            <a class="left carousel-control" href="#carousel-example2" data-slide="prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example2" data-slide="next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
            </div>
            </div>   
            </div>
</section> 




        <!---slider three-->

<section class="slider1">
    <div class="container">
       <div class="row">
        <h1 class="heading">In Stores Cash Back Offers<button type="button" class="btn btn-success stores">SEE ALL OFFERS</button></h1>
        <div id="carousel-example3" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
              <?php
                $get_total = array_chunk((array) $cashback_stores, 4, true);
                $cash_counter = 0;
                foreach ($get_total as $store) {
            ?>
              <div class="item <?php
                        if ($cash_counter++ == 0) {
                            echo 'active';
                        }
                        ?>">
                        <div class="row">
           <?php foreach ($store as $d) { ?>
                    <div class="col-sm-3">
                        <div class="col-item">
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-12">
                                        <div class="storesimg">
                                            <img src="<?php echo $this->request->webroot."images/stores/".$d->image; ?>" class="img-responsive" alt="<?php echo $d->name; ?>" />
                                        </div>
                                        <h2><a href="<?php echo $this->request->webroot."stores/storeDetails/".$d->slug;?>"> See Details</a></h2>
                                        <h1><?php echo $d->wash * 2; ?>% In-Store Cash back</h1> 
                                        <button type="button" class="btn btn-success">LINK OFFER</button>
                                    </div>

                                </div>

                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
           <?php } ?>                

                </div>
            </div>
              <?php } ?>       
              
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#carousel-example3" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example3" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>   
    </div>
</section>

        <!-- three slider end-->