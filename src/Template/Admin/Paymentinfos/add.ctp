<section class="content-header">
    <?= $this->Flash->render() ?>
    <h1>
   <?= __('Add User Card') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Add User Card') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add User Card') ?></h3> 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($fav, ['id' => 'card-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group"> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Select User</label>
                  <select id="exp_month" name="user_id" class="form-control" required="required">
                     <option value="">Select User</option>                     
                        <?php
                        if(!empty($users)){
                        foreach($users as $user){
                                echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
                        }
                        }
                        ?>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Card No</label>
                  <?php echo $this->Form->control('card_no', ['class' => 'form-control', 'label' => false]); ?>
                </div> 
                 <div class="form-group">
                  <label for="exampleInputEmail1">Expiration Month</label>
                 <select id="exp_month" name="exp_month" class="form-control">
                                              
                                            <?php
                                            for($i = 1; $i <= 12; $i++){
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                  </select>
                </div> 
                
     
                <div class="form-group">
                    <label>Expiration Year</label>
                    <select name="exp_year" id="exp_year" class="form-control">

                      <?php
                      for($i = date("Y"); $i < date("Y")+20; $i++){
                              echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                      ?>
                    </select>

                </div>
                   <?php
                        echo $this->Form->control('first_name',['class'=>'form-control']);
                        echo $this->Form->control('last_name',['class'=>'form-control']);
                        echo $this->Form->control('address',['class'=>'form-control']);
                        echo $this->Form->control('city',['class'=>'form-control']);
                        echo $this->Form->control('state',['class'=>'form-control']);
                        echo $this->Form->control('zip',['class'=>'form-control']);
                        echo $this->Form->control('phone',['class'=>'form-control']);  
                    ?>    
   
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

