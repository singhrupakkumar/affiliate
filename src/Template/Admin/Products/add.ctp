<section class="content-header">
    <h1>
   <?= __('Product') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Add Product') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add Product') ?></h3> 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($product, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]); ?>
                </div> 
                  <?php echo $this->Form->control('off',['class' => 'form-control']);?>   
                  <?php echo $this->Form->control('store_id',['class' => 'form-control']);?>
                  <?php echo $this->Form->control('cat_id',['class' => 'form-control','label'=>'Category']);?>
                  <?php echo $this->Form->control('url',['class' => 'form-control']);?>  
                  <?php echo $this->Form->control('description',['class' => 'form-control']);?>   
                  <?php echo $this->Form->control('image',['class' => 'form-control','type'=>'file']);?>
                    
                 <div class="form-group">      
                   <?php echo $this->Form->control('expired', ['empty' => true],['class' => 'form-control']);?> 
                 </div>    

                <div class="form-group">
                 <label for="exampleInputEmail1">Status</label>
              <?php echo $this->Form->select('status', [
                     '1' => 'Active',
                    '0' => 'Deactive'
                ],['label' => 'Status','class' => 'form-control']);
                ?>  
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
})
</script>      

