<section class="content-header">
    <h1>
    Static Pages  <?= $this->Html->link(__('Add Static Page'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Static Pages</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($staticpages as $staticpage): ?>
                <tr>
                  <td><?php echo $staticpage['id']; ?></td>
                  <td><?php echo $staticpage['title']; ?></td>
                  <td>
                    <?php if($staticpage['image'] != ''){ ?>
                    <img src="<?php echo $this->request->webroot; ?>images/staticpages/<?php echo $staticpage['image']; ?>" style="width: 140px;" class="previewHolder"/>
                    <?php }else{ ?>
                    <img src="<?php echo $this->request->webroot; ?>images/staticpages/no_image.jpg" style="width: 140px;" class="previewHolder"/>
                    <?php } ?>
                  </td>
                  <td>
                    <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $staticpage['id']],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    ) ?>
                    <?= $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $staticpage['id']],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                    ) ?>
                    <a href="<?php echo $this->request->webroot; ?>admin/staticpages/delete/<?php echo $staticpage['id']; ?>" class="btn btn-danger" onclick="if (confirm('Are you sure you want to delete this file?')) { return true; } return false;"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>
    </div>
</section>       