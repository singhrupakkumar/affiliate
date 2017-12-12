<section class="content-header">
    <h1>
    <?= __('Store') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?> </a></li>
        <li class="active"><?= __('View') ?> </li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($store->name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
  
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($store->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?=  $this->Number->format($store->id) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Product Url') ?></th> 
            <td><?= h($store->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($store->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($store->created) ?></td>
        </tr>
    
        <tr>
          <th><?= __('Image') ?></th>
          <td>
            <?php if($store->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/stores/<?php echo $store->image; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/stores/no-image.jpg" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td>
          <?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id], ['class' => 'btn btn-info']) ?>     
          <?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id),'class' => 'btn btn-danger']) ?>    
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       