<section class="content-header">
    <h1>
    Static Pages
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Static Pages</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Static Pages</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($staticpage, ['id' => 'page-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <?php echo $this->Form->control('title', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <?php echo $this->Form->control('image', ['type' => 'file', 'label' => false, 'id' => 'profilePic']); ?>
                </div>
                <?php if($staticpage['image'] != ''){ ?>
                <img src="<?php echo $this->request->webroot; ?>images/staticpages/<?php echo $staticpage['image']; ?>" style="width: 190px; margin-bottom: 20px;
" class="previewHolder"/>
                <?php }else{ ?>
                <img src="<?php echo $this->request->webroot; ?>images/staticpages/no_image.jpg" style="width: 190px; margin-bottom: 20px;
" class="previewHolder"/>
                <?php } ?>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Content</label>
                  <?php echo $this->Form->control('content', ['class' => 'form-control', 'label' => false, 'contenteditable' => false]); ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 

<script>
$().ready(function() {
	$("#page-form").validate({
		rules: {
			title: "required",
			content: "required"
		},
		messages: {
			title: "Please enter Title",
			content: "Please enter Content"	
		}
	});
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#profilePic").change(function() {
  readURL(this);
});
</script>      

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script>