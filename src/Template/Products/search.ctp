<section class="banner-sec">
    <div class="container">
        <div class="row">
            <?= $this->Flash->render() ?>

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
                    <h1 class="heading">Offers</h1>
                </div>
            </div>		
        </div>    

        <div class="row mr">
           <?php if(!empty($products)) {
                 $color = ['yellow','brown','pink','blue'];
                 $color_counter = 0;
               foreach($products as $product){
               ?> 
            <div class="col-md-3">
                <div class="photo <?php  echo $color[$color_counter++];?>"> 
                    <div class="text-wrapper">									
                        <h2><?php echo $product['name'];?></h2>
                    </div>
                    <div class="insideimg">
                        <figure>
                            <img src="<?php if($product['image']){ $img =$product['image']; }else{ $img =$product['Stores']['image'];} echo $img;?>" alt="<?php echo $product['name'];?>"/>
                        </figure>
                    </div>
                </div>								
                <div class="info">
                    <div class="row">
                        <div class="price space col-md-12">
                            <h2><?php echo $product['expired'];?></h2>
                            <!--h1>13.0% Cash Back</h1-->
                             <h3><?php if (strlen($product['description']) >20)
   $str = substr($product['description'], 0, 40) . '...';  echo $str;?></h3>											
                            <a href="<?php echo $product['url'];?>"><button type="button" class="btn btn-success">shop now</button></a>
                        </div>                                    
                    </div>                                 
                    <div class="clearfix"></div>
                </div>		 		
            </div>		
           <?php } } ?> 
        </div> 






    </div>
</div>    
</section> <!--end-->
