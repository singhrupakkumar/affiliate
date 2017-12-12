<section class="help-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="helpbox">
					<h1><?php if($term->title){ echo $term->title; }?></h1>
				
				</div>
			</div>
			
			
		</div>
	</div>

</section>


<section class="help-sec2">
<div class="container">

	<div class="row">
		<div class="help-content">
                     <?php if($term->content){ echo $term->content; }?>
		</div>
	</div><!-- end one row-->
        
   
</section> 
