<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $this->request->webroot; ?>admin/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($loggeduser['image'] != ''){ ?>
                <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $loggeduser['image']; ?>" class="user-image" />
                <?php }else{ ?>
                <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="user-image" />
                <?php } ?>
              <span class="hidden-xs"><?php echo $loggeduser['first_name'].' '.$loggeduser['last_name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              
              	<?php if($loggeduser['image'] != ''){ ?>
                <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $loggeduser['image']; ?>" class="img-circle" />
                <?php }else{ ?>
                <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="img-circle" />
                <?php } ?>

                <p>
                  <?php echo $loggeduser['first_name'].' '.$loggeduser['last_name'] ?>
                  <small>Member since <?php echo date('M. Y', strtotime($loggeduser['created'])); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <?php
                    echo $this->Html->link(
                        'Profile',
                        '/admin/users/view/'.$loggeduser['id'],
                        ['class' => 'btn btn-default btn-flat']
                    );
                    ?>
                </div>
                <div class="pull-right">
                	<?php
                    echo $this->Html->link(
                        'Sign out',
                        '/admin/users/logout',
                        ['class' => 'btn btn-default btn-flat']
                    );
                    ?>
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>