<?php
/**
* @var \App\View\AppView $this
*/
?>

<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo $this->request->webroot; ?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo $this->request->webroot; ?>users/add">Register</a></li>
  </ul>
  <div class="row">
    <section class="st-content">
      <div class="st-create">
        <div class="container">
          <div class="row">
          	<?= $this->Flash->render() ?>
            <div class="title-box">
              <h2 class="title-under gap_account">CREATE ACCOUNT</h2>
            </div>
            <div class="col-md-6 col-md-offset-3">
        
              <div class="account" id="bblogin" style="display: block;">
              <?= $this->Form->create($user, ['type' => 'file', 'class' => 'form-horizontal', 'id' => 'trainer-form']) ?>
              
              	<?php echo $this->Form->control('first_name', [
                    'templates' => [
                        'inputContainer' => '<div class="form-group custom_form">{{content}}<i class="fa fa-user" aria-hidden="true"></i></div>'
                    ],
                    'label' => false,
                    'class' => 'form-control user_field set_left',
                    'placeholder' => 'First Name'
                ]); ?>
              
              
              	<?php echo $this->Form->control('last_name', [
                    'templates' => [
                        'inputContainer' => '<div class="form-group custom_form">{{content}}<i class="fa fa-user" aria-hidden="true"></i></div>'
                    ],
                    'label' => false,
                    'class' => 'form-control user_field set_left',
                    'placeholder' => 'Last Name'
                ]); ?>
                
                <div class="form-group custom_form <?= ($this->Form->isFieldError('email'))? 'has-error': '' ; ?>">
                <input name="email" class="form-control user_field set_left" placeholder="Email" type="text" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
                <i class="fa fa-envelope small_icon" aria-hidden="true"></i>
                <?php echo $this->Form->error('email', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                </div>
                
                <?php echo $this->Form->control('phone', [
                    'templates' => [
                        'inputContainer' => '<div class="form-group custom_form">{{content}}<i class="fa fa-phone" aria-hidden="true"></i></div>'
                    ],
                    'label' => false,
                    'class' => 'form-control user_field set_left',
                    'placeholder' => 'Phone'
                ]); ?>
               
                <div class="form-group custom_form <?= ($this->Form->isFieldError('password1'))? 'has-error': '' ; ?>">
                <input name="password1" class="form-control user_field set_left" placeholder="Password" id="password1" type="password">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <?php echo $this->Form->error('password1', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                </div>
                
                <div class="form-group custom_form <?= ($this->Form->isFieldError('password'))? 'has-error': '' ; ?>">
                <input name="password" class="form-control user_field set_left" placeholder="Confirm Password" id="password2" type="password">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <?php echo $this->Form->error('password', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                </div>
              
              	<input type="hidden" name="role" id="role" value="trainer" />
                
                
                <!-- New Fields -->
                <div id="trainer-fields">
                <div class="form-group custom_form">
                <input name="address" class="form-control user_field set_left" placeholder="Enter Address" id="address" type="text">
                <input type="hidden" id="latitude" name="latitude" class="form-control" />
                <input type="hidden" id="longitude" name="longitude" class="form-control" />
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
                </div>
                
           
                
                <div class="form-group custom_form">
                <input name="state" class="form-control user_field set_left" placeholder="Enter State" type="text">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
                </div>
                
                <div class="form-group custom_form">
                <input name="zip" class="form-control user_field set_left" placeholder="Enter Zip Code" type="text">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
                </div>
   

              	</div>
              	<!-- New Fields (END) -->
              
                    <?= $this->Form->button(__('CONTINUE'),['class'=>'btn btn-default pull-right login', 'style' => 'width:auto;']); ?>
                  <!--<button type="submit" class="btn btn-info pull-right login" style="width:auto;" name="buyer_button">CONTINUE</button>-->
                  <p class="bottom_p">Already have an account? <a href="#" data-toggle="modal" data-target="#signin" data-dismiss="modal">Login here</a></p>
                <?= $this->Form->end() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<script>
$('.roleusr1 label').each(function(){
	$(this).click(function(){
		if($(this).data('title') == 'buyer'){
			$("#role").val("tainer");
			$("#trainer-fields").find(':input').prop('disabled', false);
			$("#trainer-fields").show();
			/*$('#bblogin').show();
			$('#sslogin').hide();*/
		}else{
			$("#role").val("client");
			
			$("#trainer-fields").find(':input').prop('disabled', true);
			$("#trainer-fields").hide();
			/*$('#bblogin').hide();
			$('#sslogin').show();*/
		}
	}); 
});



$().ready(function() {
	$("#trainer-form").validate({
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
			password1: "required",
			password: {
				equalTo: "#password1"
			},
			address: "required",
			country: {
				required: true
			},
			latitude: {
				required: true
			},
			state: "required",
			zip: "required",
			training_types: "required",
			experience: "required"
		},
		messages: {
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			email: "Please enter a valid email address",
			phone: "Please enter valid phone number",
			password1: "Password is required",
			password: {
				equalTo: "Password and confirm password should be same"
			},
			country: "Please select country",
			state: "Please enter state",
			zip: "Please enter zipcode",
			training_types: "Please enter training types",
			experience: "Please enter your experiences"
		}
	});
});

$("input[name='address']").keyup(function(){

	var value = $(this).val();

	if(value.length == '0'){
		$("input[name='latitude']").val('');
	}
});

google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('address'));
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		$("#latitude").val(latitude);
		$("#longitude").val(longitude);
		
		
		console.log(place.address_components);
		
		for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
                var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
            }
        }
		
	});
});

$(".sel-country").change(function(){
	$('input[name="address"]').val('');
	$('input[name="latitude"]').val('');
	$('input[name="longitude"]').val('');
});
</script>
