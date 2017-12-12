<section class="content-header">
    <h1>
    Static Pages
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Static Pages</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Static Pages</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($staticpage, ['id' => 'page-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <?php echo $this->Form->control('position', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <?php echo $this->Form->control('title', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <?php echo $this->Form->control('image', ['type' => 'file', 'label' => false]); ?>
                </div>
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
			image: {
				required: true,
				extension: "|jpg|jpeg|png",
			},
			content: "required"
		},
		messages: {
			title: "Please enter Title",
			image: {
				required: "Please Select Image First",
				extension: "Only jpg, jpeg and png formats are accepted"
			},
			content: "Please enter Content"	
		}
	});
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