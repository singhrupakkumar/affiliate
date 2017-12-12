<section class="content-header">
  
    <h1>
    User Payment Info   <?= $this->Html->link(__('User Payment Info'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
    <small></small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Card Information</li>
    </ol>
    
   
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        <?php echo $this->Flash->render(); ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
             <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Card No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Expired Month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Expired Year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('City') ?></th>
                <th scope="col"><?= $this->Paginator->sort('State') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($paymentinfos as $info): ?>
                    
                    
            <tr>
                <td><?= $this->Number->format($info->id) ?></td>
                <td><?= h($info->user->name) ?></td>
                <td><?= h($info->card_no) ?></td>
                <td><?= h($info->exp_month) ?></td>
                <td><?= h($info->exp_year) ?></td>
                <td><?= h($info->first_name) ?></td>
                <td><?= h($info->last_name) ?></td>
                <td><?= h($info->phone) ?></td>
                <td><?= h($info->address) ?></td>
                <td><?= h($info->city) ?></td>
                <td><?= h($info->state) ?></td>
                <td><?= h($info->zip) ?></td>
                <td><?= h($info->created) ?></td>
                <td class="actions">
                   <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $info->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    ) ?>  
                    <?= $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $info->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success btn-xs']
                    ) ?>
                  
                     
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id),'class' => 'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
                </tbody>
     
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>  
    </div>
</section>       