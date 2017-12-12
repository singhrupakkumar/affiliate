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
			<div class="col-md-6">
                                <h1 class="heading2"><?php if(isset($product->store->name)){ echo $product->store->name; }?></h1><br/>  
                                <p><?php if(isset($product->store->description)){ echo $product->store->description; }?></p>    
			</div>			
			<div class="col-md-6">	
                            
                            <div class="col-item">
                        <div class="photo brown">
                            <div class="text-wrapper">
                                <h2><?php if(isset($product['name'])){ echo $product['name'];} ?></h2> 
                            </div>
                            <div class="insideimg">
                                <figure>
                                   <img src="<?php if(isset($product->store->image)){ echo $this->request->webroot."images/stores/".$product->store->image;} ?>"/>
                                </figure>
                            </div>
                        </div>

                        <div class="info">
                            <div class="row">
                                <div class="price space col-md-12">
                                    <h2>Expires <?php echo $product['expired']; ?></h2>
                                  
                                    <h3><?php echo $product['description']; ?></h3> 

                                   <a href="<?php echo $product['url'];?>" target="_blank"><button type="button" class="btn btn-success">shop now</button></a>
                                </div>

                            </div>

                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
				  	
			</div>		
		</div>	
	</div>
</section>

