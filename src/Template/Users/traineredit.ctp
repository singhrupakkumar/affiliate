
<div class="loader" style="display:none;">
	<img src="<?php echo $this->request->webroot; ?>images/website/loading.gif" />
</div>

<div class="container">
	<div class="row">
     <?php
        if(is_object(json_decode($content))){
        	$content = get_object_vars(json_decode($content));
        }
        ?>
        
        <?php 
        $title = '';
        if(isset($_GET['view'])){
        if($_GET['view'] == 'specialities'){
        	$title = 'SPECIALISATIONS';
        }elseif($_GET['view'] == 'skills'){
        	$title = 'SKILLS AND QUALIFICATION';
        }elseif($_GET['view'] == 'offers'){
        	$title = 'COST / SPECIAL OFFERS';
        }elseif($_GET['view'] == 'locations'){
        	$title = 'LOCATIONS';
        } ?>
        
        <? } ?>
        
    <h2 class="skill_design"><?php echo $title; ?></h2>
    	<?= $this->Flash->render() ?>
        
        <?php //echo "<pre>"; print_r($galleries); echo "</pre>"; ?>
        
       
        
        <?php if(isset($_GET['view']) && $_GET['view'] != 'upload'){ ?>
    	<div class="col-md-8 col-md-offset-2">
        	<form action="" method="post" id="trainer-form">
            <!--<div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="content[title]" value="<?php echo $content['title']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="icon">Icon:</label>
                <input type="text" name="content[icon]" value="<?php echo $content['icon']; ?>" class="form-control">
            </div>-->
        	<div class="table-responsive">
                <table id="content" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                <td class="text-left">Content</td>
                <td></td>
                </tr>
                </thead>
                <tbody>
                
                    <?php $content_row = 0; ?>
                    <?php if(isset($content['data'])){ ?>
                    <?php foreach ($content['data'] as $con) { ?>
                    <tr id="content-row<?php echo $content_row; ?>">
                    <td class="text-left"><textarea name="content[data][<?php echo $content_row; ?>]" class="form-control" required="required"><?php echo $con; ?></textarea></td>
                    <td class="text-left"><button type="button" onclick="$('#content-row<?php echo $content_row; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                    </tr>
                    <?php $content_row++; ?>
                    <?php } ?>
                    <?php } ?>
                    
                </tbody>
                
                <tfoot>
                    <tr>
                    <td ></td>
                    <td class="text-left"><button type="button" onclick="addContent();" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                </tfoot>
                </table>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-default success_design" />
        	</form>        
        </div>
        <?php } ?>
        
        <?php if(isset($_GET['view']) && $_GET['view'] == 'upload'){ ?>
        
        
        	<div class="col-md-12">
            	<?php if(!empty($galleries)){ ?>
                <?php foreach($galleries as $gallery){ ?>
                <div class="col-md-3">
                <div class="covr_trner">
                	<?php if($gallery['type'] == 'image'){ ?>
                    <img src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" style="width:100%; height:169px;" />
                    <?php }elseif($gallery['type'] == 'video'){ ?>
                    <video style="width:100%; height:169px;" controls>
                    <source src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" type="<?php echo $gallery['format']; ?>">
                    </video>
                    <?php } ?>
                    <?php
                    //echo $this->Html->link('Delete',array('controller'=>'users','action'=>'removeGallery',base64_encode($gallery['id'])),array('confirm'=>'Are you sure you want to delete this file?'), array('class' => 'hello'));
          ?>
          
         
          			<?php //echo $this->Form->postLink(__('Delete'),['controller' => 'users', 'action' => 'removeGallery', base64_encode($gallery['id'])],['class' => 'btn btn-danger btn-sm'],['confirm' => __('Are you sure you want to delete this file?')]); ?>
                </div>
                 <a href="<?php echo $this->request->webroot; ?>users/removeGallery/<?php echo base64_encode($gallery['id']); ?>" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure you want to delete this file?')) { return true; } return false;">Delete</a>
                </div>
                 
                <?php } ?>
                <?php } ?>
            </div>
        
        </div>
        <div class="row">
        <div class="uplod_btm">
        	<div class="col-md-12">
            <div class="col-md-6">
            	<div class="form-group">
                    <label for="title">Upload Type:</label>
                    <div class="inputtype form-group">
                        
                        <label class="radio-inline"><input type="radio" name="optradio" value="image" checked="checked">Image</label>
                        <label class="radio-inline"><input type="radio" name="optradio" value="video">Video</label>
            		</div>
                </div>
                </div>
            
                <form action="<?php echo $this->request->webroot; ?>users/addGallery" method="post" id="image-form" enctype="multipart/form-data">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Select File:</label><br />
                    <input type="file" name="file" class="form-control">
                    <input type="hidden" name="type" id="type" value="image" />
                </div>
                </div>
                <input type="submit" name="submit" value="Upload" class=" btn-info pull-right login less_load" />
                </form>
                
                <form action="<?php echo $this->request->webroot; ?>users/addGallery" method="post" id="video-form" enctype="multipart/form-data" style="display:none;">
                <div class="form-group">
                    <label for="title">Select File:</label><br />
                    <input type="file" name="file" class="form-control" style="width: 50%;">
                    <input type="hidden" name="type" id="type" value="video" />
                </div>
                <input type="submit" name="submit" value="Upload" class="btn-info pull-right login less_load" />
                </form>
            </div>
        <?php } ?>
    </div>
</div>   
</div>

<?php if(isset($_GET['view']) && $_GET['view'] != 'upload'){ ?>
<script type="text/javascript"><!--

var content_row = <?php echo $content_row; ?>;
function addContent() {
	html  = '<tr id="content-row' + content_row + '">';
    html += '  <td class="text-left"><textarea name="content[data][' + content_row + ']" class="form-control" required="required"></textarea>';
	html += '  <td class="text-left"><button type="button" onclick="$(\'#content-row' + content_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';

	html += '</tr>';
	html += '</tr>';
	
	$('#content tbody').append(html);

	content_row++;
}
</script>
<?php } ?>

<script type="text/javascript"><!--
/*$().ready(function() {
	$("#trainer-form").validate({
		rules: {
			'content[title]': "required",
			'content[icon]': "required"
		},
		messages: {
			'content[title]': "Please enter title Here",
			'content[icon]': "Please enter icon Here"
		}
	});
});	
*/

$().ready(function() {
	$("#trainer-form").validate();
	
	$("#image-form").validate({
		rules: {
			file: {
				required: true,
				extension: "|jpg|jpeg|png",
			}
		},
		messages: {
			file: {
				required: "Please Select File First",
				extension: "Only jpg, jpeg and png formats are accepted"
			}
		},
		submitHandler: function(form) {
			$(".loader").css('display', 'block');
			form.submit();
		}		
	});
	
	$("#video-form").validate({
		rules: {
			file: {
				required: true,
				accept: "video/*",
			}
		},
		messages: {
			file: {
				required: "Please Select File First",
				accept: "Only videos are accepted"
			}
		},
		submitHandler: function(form) {
			$(".loader").css('display', 'block');
			form.submit();
		}	
	});
});	

$('.inputtype input').each(function(){
	$(this).click(function(){
		if($(this).val() == 'image'){
			$("#image-form").show();
			$("#video-form").hide();
		}else{
			$("#video-form").show();
			$("#image-form").hide();
		}
	}); 
});

//--></script>     