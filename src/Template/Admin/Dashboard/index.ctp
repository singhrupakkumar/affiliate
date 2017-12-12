<section class="content-header">
    <h1>
    Dashboard
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
	<div class="row">
    
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">All Users</span>
                    <span class="info-box-number"><?php echo count($users) - 1; ?><small></small></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-blind"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Clients</span>
                    <span class="info-box-number"><?php echo count($clients); ?></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bicycle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number"><?php echo count($products); ?></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-star"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reviews</span>
                    <span class="info-box-number"><?php // echo count($reviews); ?></span>
                </div>
            </div>
        </div>
    
    
    </div>
    
    <div class="row">
    	<div class="col-md-6">
              <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                	<h3 class="box-title">Latest Members</h3>
                </div>
                
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                    
                    	<?php foreach($members as $member){ ?>
                        <li>
                        	<?php if($member['image'] != ''){ ?>
                            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" style="height: 112px;">
                            <?php }else{ ?>
                            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" alt="User Image">
                            <?php } ?>
                            <a class="users-list-name" href="#"><?php echo ucwords($member['name']); ?></a>
                            <span class="users-list-date"><?php echo date('d M', strtotime($member['created'])); ?></span>
                        </li>
                    	<?php } ?>
                        
                    </ul>
                </div>
                
                <div class="box-footer text-center">
                <?php echo $this->Html->link('View All Users', ['controller' => 'users', 'action' => 'index'], ['class' => 'uppercase']); ?>
                </div>
            </div>
            <!--/.box -->
    	</div>
        <?php //echo "<pre>"; print_r($reviewslist); echo "</pre>"; ?>
        <!--div class="col-md-6">  
            <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Latest Reviews</h3>
            
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            </div>
           
            <div class="box-body">
            <ul class="products-list product-list-in-box">
            <?php //  foreach($reviewslist as $reviews){ ?>
            <li class="item">
            <div class="product-img">
            <?php // if($reviews['user']['image'] != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php // echo $reviews['user']['image']; ?>" alt="<?php //// echo $reviews['user']['name']; ?>">
            <?php //}else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" alt="User Image">
            <?php// } ?>
            </div>
            <div class="product-info">
            <a href="reviews/view/<?php echo $reviews['id'] ?>" class="product-title"><?php // echo $reviews['user']['name']; ?>
            
            <?php
//            if($reviews['rating'] <= 2){
//            echo '<span class="label label-danger pull-right">'.$reviews['rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
//            }elseif($reviews['rating'] > 2 && $reviews['rating'] < 4){
//            echo '<span class="label label-warning pull-right">'.$reviews['rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
//            }elseif($reviews['rating'] >= 4){
//            echo '<span class="label label-success pull-right">'.$reviews['rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
//            } ?>
            
			</a>
            <span class="product-description">
            <?php // echo substr($reviews['review'], 0, 38); ?>
            </span>
            </div>
            <?php // } ?>
            </li>
            </ul>
            </div>
   
            <div class="box-footer text-center">
            <?php echo $this->Html->link('View All Reviews', ['controller' => 'reviews', 'action' => 'index'], ['class' => 'uppercase']); ?>
            </div>
              
            </div>
        </div-->
    </div>
    
</section>