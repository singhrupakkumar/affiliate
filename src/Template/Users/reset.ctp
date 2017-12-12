<style>
    .error{ color:red !important; }
</style>
<section class="banner-sec">
	

<section class="edit">
	<div class="container"> 
	<div class="row">
		
		<div class="col-md-6">
		<?= $this->Flash->render() ?>
                     <?= $this->Form->create('', ['type' => 'file', 'class' => 'form-horizontal','id' => 'reset-form']) ?>
                        <h1>Reset Password</h1>
                           <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password1" id="password1">
                          </div>
                          <div class="form-group">
                               <label for="password">Confirm Password:</label>
                               <input type="password" class="form-control" name="password">
                         </div>
                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary save-btn']); ?>  
                    <?= $this->Form->end() ?>
              </div>

		</div>
	
	</div>
								

</section>


</section>

<script>
$(document).ready(function() {
	$("#reset-form").validate({
		rules: {
			password1: {
				required: true,
				minlength: 8
			},

			password: {
				equalTo: "#password1"
			}
		},
		messages: {
			password1: {
				required: "Please Enter New password",
				minlength: "Please enter atleast 8 characters"
			},

			password: {
				equalTo: "Both Passwords do not match"
			}		
		}
	});
});
</script>