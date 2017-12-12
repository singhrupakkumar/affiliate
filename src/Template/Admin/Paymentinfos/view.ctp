<section class="content-header">
    <h1>
    Users
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($payinfo->user->name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payinfo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Card Number') ?></th>
            <td><?= $this->Number->format($payinfo->card_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration Month') ?></th>
            <td><?= h($payinfo->exp_month) ?></td>
        </tr>
        
         <tr>
            <th><?= __('Expiration Month') ?></th>
            <td><?= h($payinfo->exp_month) ?></td>
        </tr>
        <tr>
          <th><?= __('First Name') ?></th>
          <td><?= h($payinfo->first_name) ?></td>
        </tr>
        <tr>
          <th><?= __('Last Name') ?></th>
          <td><?= h($payinfo->last_name) ?></td>
        </tr>
        <tr>
          <th><?= __('Address') ?></th>
          <td><?= h($payinfo->address) ?></td>
        </tr>
        <tr>
          <th><?= __('Phone') ?></th>
          <td><?= h($payinfo->phone) ?></td>
        </tr>
        <tr>
          <th><?= __('City') ?></th>
          <td><?= h($payinfo->city) ?></td>
        </tr>
        <tr>
          <th><?= __('State') ?></th>
          <td><?= h($payinfo->state) ?></td>
        </tr>
        <tr>
          <th><?= __('Zip') ?></th>
          <td><?= h($payinfo->zip) ?></td>
        </tr>
      
       
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       