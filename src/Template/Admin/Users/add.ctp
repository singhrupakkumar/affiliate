<section class="content-header">
    <h1>
    Users
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($user, ['id' => 'user-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <?php echo $this->Form->select('role', [ 
                    'customer' => 'Customer',
                    'admin' => 'Admin'
                ],['class' => 'form-control']);
                ?>
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
                  <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <?php echo $this->Form->control('phone', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
                  <?php echo $this->Form->select('gender', [
                    'male' => 'Male',
                    'female' => 'Female'
                ],['class' => 'form-control']);
                ?>
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
                  <label for="exampleInputEmail1">Password</label>
                  <?php echo $this->Form->control('password1', ['label' => false, 'class' => 'form-control', 'type' => 'password']); ?>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <?php echo $this->Form->control('password', ['label' => false, 'class' => 'form-control', 'type' => 'password']); ?>
                </div>     
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
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true,
				digits: true
			},
			country: {
				required: true
			},
			gender: {
				required: true
			},
			dob: "required",
			password1: "required",
			password: {
				equalTo: "#password1"
			}
		},
		messages: {
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			email: "Please enter a valid email address",
			phone: "Please enter valid phone number",	
			country: "Please select country",
			gender: "Please select gender",
			dob: "Please fill this field",
			password1: "Password is required",
			password: {
				equalTo: "Password and confirm password should be same"
			}
		}
	});
});

$('#datepicker').datepicker({
  autoclose: true
})
</script>      

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script>