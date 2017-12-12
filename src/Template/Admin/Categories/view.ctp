<section class="content-header">
    <h1>
    <?= __('Category') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Home') ?> </a></li>
        <li class="active"><?= __('View') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12"> 
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($category->name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
  
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?=  $this->Number->format($category->id) ?></td>
        </tr>
  
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
          <th><?= __('Image') ?></th>
          <td>
            <?php if($category->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/categories/<?php echo $category->image; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/categories/no-image.jpg" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td>
          <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'btn btn-info']) ?>     
          <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id),'class' => 'btn btn-danger']) ?>    
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
            
            
      
        <div class="col-xs-12"> 

        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= __('Related Categories') ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <?php if (!empty($category->child_categories)): ?>   
    <table class="table table-condensed">
        <thead>
             <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Created') ?></th> 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr> 
        </thead>    
      <tbody>
             <?php foreach ($category->child_categories as $childCategories): ?>
            <tr>
                <td><?= h($childCategories->id) ?></td>
                <td><?= h($category->name) ?></td> 
                <td><?= h($childCategories->name) ?></td>
                <td>
                <?php if($category->image != ''){ ?>
                <img src="<?php echo $this->request->webroot; ?>images/categories/<?php echo $childCategories->image; ?>" style="width: 190px; margin-bottom: 20px;
                " class="previewHolder"/>
                <?php }else{ ?>
                <img src="<?php echo $this->request->webroot; ?>images/categories/no-image.jpg" style="width: 190px; margin-bottom: 20px;
                " class="previewHolder"/>
                <?php } ?>
                </td>
                <td><?= h($childCategories->created) ?></td> 
                  <td class="actions">
                   <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $childCategories->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    ) ?>  
                    <?= $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $childCategories->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success btn-xs']
                    ) ?>
                  
                     
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $childCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategories->id),'class' => 'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>  
      </tbody>
    </table>
    <?php endif; ?>   
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>     
            
            
            
            
            
            
            
    </div>
</section>       