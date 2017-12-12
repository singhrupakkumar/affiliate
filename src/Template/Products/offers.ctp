<section class="banner-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="imgbox">
                    <img src="<?php echo $this->request->webroot; ?>images/website/banner1.jpg"/>
                </div>
            </div>
<!--             <div class="col-md-2">
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
            </div> -->

        </div>
    </div>

</section>  
<?php

// echo "<pre>";
// print_r($offers);
// echo "</pre>";


?>


<section class="offers ">
    <div class="container">
    <div class="row">
    <div class="col-md-4">
    <div class="offer-left">        
            <div class="offerbox">  
                <div class="logo">
                    <img src="<?php echo $this->request->webroot . "images/stores/" . $offers['image']; ?>"/>
                </div>
                <p>was 2.0%</p>
                <h3>40% CASH BACK</h3>
                <button type="button" class="btn btn-primary stores">shop now</button>
            </div>
                    
            
        </div>  
    </div>
        <div class="col-md-8">
        <div class="offer-right">
        <div class="first-sec">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="heading3">
                <h1><?php echo $offers['name']; ?> Coupons, Promo Codes & Cash Back </h1>
                    </div>
                </div>
            </div>

        <?php
        if( is_array($offers['products']) AND !empty($offers['products'])) {
           foreach ($offers['products'] as $shop) {
        ?>            
            
            <div class="row">
                <div class="col-md-12">
                <div class="department">
                <h2><?php echo $shop['name']; ?></h2>
                <!-- <h1>Lands' End Coupons, Promo Codes & Cash Back <small>Ex 2/12/2017</small></h1> -->
                <h1><?php echo $shop['description']; ?>
                    <small>Ex 2/12/2017</small>
                </h1>
                <h3>+ 40% cashback <span>code : <small><?php echo ($shop['coupon_code']) ? $shop['coupon_code'] : 'NA'; ?> </small></span>
                <a href="<?php echo $shop['url']; ?>" target="_blank">
                    <button type="button" class="btn btn-primary">shop now</button>
                </a>
                </h3>
                </div>
                </div>
            </div>
        <?php } ?>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="department">
                        <h2 style="text-align: center;">No offer found.</h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>  
    </div>
    </div>
             
                                

</section>



<?php if(1==2) { ?>

<section class="slider1">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="heading" style="text-align: center;align-content: center;width: 100%;">
<img src="<?php echo $this->request->webroot . "images/stores/" . $offers['image']; ?>" class="img-responsive" alt="<?php echo $offers['name']; ?>" style="height: 100px;width: 150px;text-align: center;margin-left: 33%;">
                <?php echo $offers['name']; ?></h1>
            </div>
            <div class="col-md-8">
                <h1 class="heading"><?php echo $offers['name']; ?> Coupons, Promo Codes & Cash Back</h1>


        <div class="row mr">
        <?php
            if( is_array($offers['products']) AND !empty($offers['products'])) {
           foreach ($offers['products'] as $shop) {
        ?>
            <div class="col-md-12">
                <div class="info">            
                    <div class="price ">
<!--                         <div class="storesimg">
                            <img src="<?php echo $this->request->webroot . "images/stores/" . $shop['image']; ?>" class="img-responsive" alt="a" />
                        </div> -->
                        <h2><a href="<?php echo $this->request->webroot."products/offers/".$shop->slug;?>">
                            <?php
                            echo $shop['name'];
                            echo "<br>";
                            echo $shop['description'];


                             ?>

                        </a></h2>
                        <!-- <h1><?php echo $shop->wash * 2; ?>% In-Store Cash back</h1> -->
                        <button type="button" class="btn btn-success">
                        <a href="<?php echo $this->request->webroot."products/offers/".$shop->slug;?>"></a>
                        Shop now
                        </button>
                    </div>                                                                             
                    <div class="clearfix"> </div>
                </div>                  
            </div>
           <?php } ?>
           <?php } else { ?>
            <div class="col-md-12">
                <div class="info">            
                    <div class="price ">
                        <!-- <h1><?php echo $shop->wash * 2; ?>% In-Store Cash back</h1> -->
                        <button type="button" class="btn btn-success">
                        <a href="<?php echo $this->request->webroot."products/offers/".$shop->slug;?>"></a>
                        Shop now
                        </button>
                    </div>                                                                             
                    <div class="clearfix"> </div>
                </div>                  
            </div>
           <?php } ?>
        </div> 






            </div>
        </div>
    </div>
</div>    
</section> <!--end-->
<?php } ?>





