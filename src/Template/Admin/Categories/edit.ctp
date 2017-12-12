<section class="content-header">
    <h1>
   <?= __('Category') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Edit Category') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Category') ?><strong>(ID: <?php echo $category->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($category, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
              	<div class="form-group">
                <div class="form-group">
                  <?php echo $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => true,'class' => 'form-control']); ?>  
                </div>
                    
                <div class="form-group">
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' =>'Name']); ?>
                </div>
                    
                <div class="form-group">
                  <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <?php echo $this->Form->control('image', ['id' => 'categoryPic', 'type' => 'file', 'class' => 'form-control', 'label' => false]); ?>
                </div>   
                <img src="<?php echo $this->request->webroot; ?>images/categories/<?php echo ($category->image != '') ? $category->image : 'no-image.jpg' ?>" class="previewHolder" style="width: 135px;"/>             
              </div>


              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?> 
          </div>
        </div>
    </div>
</section> 

<script>
function readURL(input) { 
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#categoryPic").change(function() {
  readURL(this);
});
</script>      