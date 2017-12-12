<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($loggeduser['image'] != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $loggeduser['image']; ?>" class="img-circle" />
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="img-circle" />
            <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $loggeduser['first_name'].' '.$loggeduser['last_name'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php if($this->request->params['controller'] == 'Dashboard' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Users' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/users">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Stores' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/stores">
            <i class="fa fa-shopping-bag"></i> <span>Stores</span>  
            <span class="pull-right-container">  
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Products' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/products">
            <i class="fa fa-product-hunt"></i> <span>Products</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Categories' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/categories">
            <i class="fa fa-tags"></i> <span>Category</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li class="<?php if($this->request->params['controller'] == 'Paymentinfos' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/paymentinfos">
            <i class="fa fa-credit-card"></i> <span>Payment Info</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($this->request->params['controller'] == 'Staticpages' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/staticpages">
            <i class="fa fa-file"></i> <span>Pages</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Settings' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/settings">
            <i class="fa fa-cog"></i> <span>Settings</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>