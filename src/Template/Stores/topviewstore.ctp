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
		<h1 class="heading">top viewed store</h1>		
		
<!-- 		<div class="dropdown">
		<button class="btn btn-success stores sortby" type="button" data-toggle="dropdown">sort by
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
		<li><a href="#">HTML</a></li>
		<li><a href="#">CSS</a></li>
		<li><a href="#">JavaScript</a></li>
		</ul>
  </div> 
  <div class="filter_outer">  
	  <select class="form-control" id="filter">
		<option>Select One</option>
		<option>Select Two</option>
		<option>Select Three</option>
		<option>Select Four</option>
		<option>Select Five</option>
		<option>Select Six</option>		
	  </select>
  </div> -->
	</div>
	</div>		
    </div>    
         <?php
                    $get_total = array_chunk((array) $stores, 4, true);
                    foreach ($get_total as $store) {
          ?>   
	<div class="row mr">
             <?php foreach ($store as $d) { ?> 
		<div class="col-md-3">
			  <div class="photo">
					<figure>
						<img src="<?php echo $this->request->webroot . "images/stores/" . $d['image']; ?>" class="img-responsive" alt="<?php echo $d->name; ?>" />
					</figure>
              </div>
               <div class="info">
                    <div class="row">
                        <div class="price col-md-12">
                            <h2>See Details</h2>
                            <h1><?php echo $d->wash * 2; ?>% Cash Back</h1>										
			<button type="button" class="btn btn-success">Get Deals</button>
                        </div>                                     
                    </div>                               
                   <div class="clearfix"></div>
             </div>			 		
		</div>
            <?php } ?>

			
    </div> <!-- end one row-->
<?php } ?>
                 
     </div>
</div>    
</section> <!--end-->




