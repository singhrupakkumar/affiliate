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


<section class="slider1 referafrnd">  
	<div class="container">
		<div class="row">
			<div class="col-md-3">
                                <div class="col-item">
                                  <div class="photo">
                                      <figure>

                                          <img src="<?php echo $this->request->webroot . "images/stores/" . $stores['image']; ?>" class="img-responsive" alt="a" />
                                      </figure>
                                  </div>
                                  <div class="info">
                                      <div class="row">
                                          <div class="price col-md-12">
                                              <h2><?php echo $stores->name; ?>
                                                  Wash <?php echo $stores->wash; ?>%</h2>
                                              <h1>  <?php echo $stores->wash * 2; ?>% Cash Back</h1>
                                          </div>

                                      </div>

                                      <div class="clearfix">
                                      </div>
                                  </div>
                              </div>
			</div>			
			<div class="col-md-9">	
                                 <?php if(!empty($stores['products'])) {
                                  $color = ['yellow','brown','pink','blue'];
                                  $color_counter = 0;
                                foreach($stores['products'] as $product){
                                   if($color_counter ==4){
                                     $color_counter = 0;  
                                   } 
                                ?> 
                             <div class="col-md-4">
                                 <div class="photo <?php  echo $color[$color_counter++];?>"> 
                                     <div class="text-wrapper">									
                                         <h2><?php echo $product['name'];?></h2>
                                     </div>
                                     <div class="insideimg">
                                         <figure>
                                             <img src="<?php if($product['image']){ $img =$product['image']; }else{ $img =$stores['image'];} echo $img;?>" alt="<?php echo $product['name'];?>"/>
                                         </figure>
                                     </div>
                                 </div>								
                                 <div class="info">
                                     <div class="row">
                                         <div class="price space col-md-12">
                                             <h2><?php echo $product['expired'];?></h2>
                                             <!--h1>13.0% Cash Back</h1-->
                                              <h2><a href="<?php  echo $this->request->webroot."products/view/".$product['slug'];?>"> See Details</a></h2>
                                             <h3><?php if (strlen($product['description']) >20)
                    $str = substr($product['description'], 0, 40) . '...';  if(isset($str)){ echo $str;}?></h3>											
                                             <a href="<?php echo $product['url'];?>" target="_blank"><button type="button" class="btn btn-success">shop now</button></a>
                                         </div>                                    
                                     </div>                                 
                                     <div class="clearfix"></div>
                                 </div>		 		
                             </div>		
                            <?php } } ?> 
				  	
			</div>		
		</div>	
	</div>
</section>

  