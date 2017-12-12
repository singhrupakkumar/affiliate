<?php 
if(!empty($page)){ ?>

<div class="page">
	<section id="content-full" class="col-940">
		<div class="page-header">
			<div class="container">
				<h1 class="page-title mb0 white"><?php echo $page->title; ?></h1>
			</div>
		</div>
	</section>
	<?php echo $page->content; ?>
</div>    
<?php } ?>