<section class="content-header">
    <h1>
    Users
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User <strong>(ID: <?php echo $user->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($user, ['id' => 'user-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
              	<div class="form-group">
                
                <?php if($user->role == 'admin'){ ?>
                <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <select name="role" class="form-control">
                    <option value="customer" <?php if($user->role=='customer'){ echo "selected"; }?>>Customer</option>
                    <option value="admin" <?php if($user->role=='admin'){ echo "selected"; }?>>Admin</option> 
        
                  </select>
                </div> 
                  
                  
                <?php } ?>
            
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <?php echo $this->Form->control('first_name', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'disabled' => 'disabled']); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <?php echo $this->Form->control('phone', ['class' => 'form-control', 'label' => false]); ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="male" <?php if($user->gender=='male'){ echo "selected"; }?>>Male</option>
                    <option value="female" <?php if($user->gender=='female'){ echo "selected"; }?>>Female</option>
        
                  </select>
                </div>  
                  
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Dob</label>
                  <?php echo $this->Form->control('dob', ['id' => 'datepicker', 'class' => 'form-control', 'label' => false]); ?>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  <select name="country" class="form-control">
                  	<option value="">Select Country</option>
                    <?php foreach($countries as $country){ ?>
                    <?php if($country['name'] == $user['country']){ ?>
                    <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <?php echo $this->Form->control('image', ['id' => 'profilePic', 'type' => 'file', 'class' => 'form-control', 'label' => false]); ?>
                </div>   
                <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user->image != '') ? $user->image : 'noimage.png' ?>" class="previewHolder" style="width: 135px;"/>             
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

<script>
$().ready(function() {
	$("#user-form").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			phone: {
				required: true,
				digits: true
			},
			country: {
				required: true
			},
			gender: {
				required: true
			}
		},
		messages: {
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			phone: "Please enter valid phone number",	
			country: "Please select country",
			gender: "Please select gender"
		}
	});
});

$('#datepicker').datepicker({
  autoclose: true
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#profilePic").change(function() {
  readURL(this);
});
</script>      