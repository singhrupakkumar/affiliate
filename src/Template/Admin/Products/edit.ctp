<section class="content-header">
    <h1>
   <?= __('Product') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Edit Product') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Product') ?><strong>(ID: <?php echo $product->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($product, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
              	<div class="form-group">
  
                <div class="form-group">
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' =>'Name']); ?>
                </div>
                 <?php echo $this->Form->control('off',['class' => 'form-control']);?>   
                 <?php echo $this->Form->control('store_id',['class' => 'form-control']);?>
                 <?php echo $this->Form->control('cat_id',['class' => 'form-control','label'=>'Category']);?>
                <div class="form-group">
                  <?php echo $this->Form->control('url', ['class' => 'form-control', 'label' =>'Product Url']); ?>
                </div>   
        
                <div class="form-group">
                  <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
                </div>
                    
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="status" class="form-control">
                    <option value="1" <?php if($product->status==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($product->status==0){ echo "selected"; }?>>Deactive</option>
        
                  </select>
                </div>   
                 <div class="form-group">      
                   <?php echo $this->Form->control('expired', ['empty' => true],['class' => 'form-control']);?> 
                 </div>    
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <?php echo $this->Form->control('image', ['id' => 'productPic', 'type' => 'file', 'class' => 'form-control', 'label' => false]); ?>
                </div>   
                <img src="<?php echo $this->request->webroot; ?>images/products/<?php echo ($product->image != '') ? $product->image : 'no-image.jpg' ?>" class="previewHolder" style="width: 135px;"/>             
              </div>


              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 
<style type="text/css">

	.datetime ,select{
		width: auto; 
    border: none;
    border-radius: 0px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 7px 7px !important;
    color: #777 !important;
    font-size: 16px !important;
    box-shadow: none !important;
    margin: 0px;
	}
</style>
<script>

$('#datepicker').datepicker({
  autoclose: true
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

$("#productPic").change(function() {
  readURL(this);
});
</script>      