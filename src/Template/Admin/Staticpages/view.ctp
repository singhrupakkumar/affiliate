<section class="content-header">
    <h1>
    Static Page
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">$staticpage->title</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($staticpage->title) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($staticpage->id) ?></td>
        </tr>
        <tr>
          <th><?= __('Title') ?></th>
          <td><?= h($staticpage->title) ?></td>
        </tr>
        <tr>
          <th><?= __('Image') ?></th>
          <td>
            <?php if($staticpage->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/staticpages/<?php echo $staticpage->image; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/staticpages/no_image.jpg" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <th><?= __('Content') ?></th>
          <td><?= html_entity_decode($staticpage->content, ENT_QUOTES, "UTF-8"); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       