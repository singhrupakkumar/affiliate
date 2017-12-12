<section class="content-header">
    <h1>
    <?= __('Store') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Edit Store') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Store') ?> <strong>(ID: <?php echo $store->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($store, ['id' => 'store-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
              	<div class="form-group">

                <div class="form-group">
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name']); ?>
                </div>
                <div class="form-group">
                  <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
                </div>
     
                <div class="form-group">
                  <?php echo $this->Form->control('url', ['class' => 'form-control', 'label' =>'Store Url']); ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="status" class="form-control">
                    <option value="1" <?php if($store->status==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($store->status==0){ echo "selected"; }?>>Deactive</option>
        
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <?php echo $this->Form->control('image', ['id' => 'productPic', 'type' => 'file', 'class' => 'form-control', 'label' => false]); ?>
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