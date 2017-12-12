<section class="banner-sec">  
	

<section class="edit">
	<div class="container">
            
           <div class="row">
    	<?= $this->Flash->render() ?>
	</div>
	 <?= $this->Form->create($user, ['id' => 'user-form', 'enctype' => 'multipart/form-data']) ?>
		<h1>Edit profile</h1>

                <div class="row">
		<div class="col-md-6 ">
		<div class="form-group">
		<label for="exampleInputEmail1">First Name</label>
                <?php echo $this->Form->control('first_name', ['class' => 'form-control', 'label' => false]); ?>
		
		</div>
		</div>
		</div>
                
                <div class="row">
		<div class="col-md-6 ">
		<div class="form-group">
		<label for="exampleInputEmail1">Last Name</label>
                <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false]); ?>
		
		</div>
		</div>
		</div>

		<div class="row">	
		 <div class="form-group">
		 <div class="col-md-6 ">
		<label for="exampleInputPassword1">Email</label>
                <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false]); ?>
                 </div>	
		</div>
		</div>
                
                <div class="row">
                <div class="form-group">
                    <div class="col-md-6 ">
                  <label for="exampleInputEmail1">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="male" <?php if($user->gender=='male'){ echo "selected"; }?>>Male</option>
                    <option value="female" <?php if($user->gender=='female'){ echo "selected"; }?>>Female</option>
        
                  </select>
                  </div>
                </div>  
                  </div>   
                 <div class="row">
		 <div class="form-group">
                     <div class="col-md-6">  
                  <label for="exampleInputEmail1">Phone</label>
                  <?php echo $this->Form->control('phone', ['class' => 'form-control', 'label' => false]); ?>
                     </div>
                    </div> 
		</div> 
		 <div class="row">	
		  <div class="form-group">
		 <div class="col-md-6 ">
			<label for="exampleInputPassword1">Date of Birth</label> 
			<?php echo $this->Form->control('dob', ['class' => 'form-control', 'label' => false]); ?>
		</div>	
		</div>
		</div>
                
                 <div class="row">	
		  <div class="form-group">
		 <div class="col-md-6 ">
			<label for="exampleInputPassword1">State</label> 
			<?php echo $this->Form->control('state', ['class' => 'form-control', 'label' => false]); ?>
		</div>	
		</div>
		</div>
                
                <div class="row">	
		  <div class="form-group">
		 <div class="col-md-6 ">
			<label for="exampleInputPassword1">Zip</label> 
			<?php echo $this->Form->control('zip', ['class' => 'form-control', 'label' => false]); ?>
		</div>	
		</div>
		</div>
                <div class="row">	
		  <div class="form-group">
		 <div class="col-md-6 ">
                     <label for="exampleInputPassword1">Country</label> 
		 <select class="form-control form-select ajax-processed sel-country" id="edit-node-type" name="country" readonly="readonly">
                <option value="-1" selected="selected">Select Country</option>
                <?php if(!empty($countries)){ ?>
                <?php foreach($countries as $country){ ?>
                <?php if($user['country'] == $country['name']){ ?>
                <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                <?php }else{ ?>
                <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                </select>
		</div>	
		</div>
		</div>
                
               <div class="row">	
		<div class="form-group">
		<div class="col-md-6 ">
		<label for="exampleInputPassword1">Address</label>
		<?php echo $this->Form->control('address', ['class' => 'form-control', 'label' => false]); ?>
		</div>	
	       </div>
		</div>
		 

                <?= $this->Form->button(__('Save changes'), ['class' => 'btn btn-primary save-btn']) ?>

                 <?= $this->Form->end() ?>
 
  
		</div>
	
	</div>
								

</section>


</section>

<script>
   $(document).ready(function() {
	$("#user-form").validate({
		ignore: "",
		rules: {
			email: {
				required: true,
				email: true
			},
			first_name: {required:true},
			last_name: {required:true},
			dob: {required:true},
                        phone: {
                            required:true,
                            number:true,
                        },
                        zip: {
                            required:true,
                            number:true,
                        }
			country: {
				required: true
			},
			gender: "required",
			state: "required",
			zip: "required"
		},
		messages: {
                          first_name: {     
                                  required: "Please enter your first name", 
                                },      
			last_name: "Please enter your last name",
			dob: "Please select date of Birth",
			country: "Please select country",
			gender: "Please select gender",
                        email: "Please enter a valid email address",
			state: "Please enter state",
			zip: "Please enter zipcode"
		}
	});
}); 
</script>    