<style>
    .error{ color:red !important; }
</style>
<section class="banner-sec">

    <section class="edit">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create('', ['type' => 'file', 'id' => 'change-from']) ?>
                        <h1>Change Password</h1>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Old Password</label>
                            <input type="password" placeholder="Enter Your Old Password" name="opassword" class="form-control" id="opassword" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your New Password" name="password1" id="password1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password">
                        </div>

                  
                    <?= $this->Form->button(__('Change Password'),['class'=>'btn btn-primary save-btn']); ?>
                    <?= $this->Form->end() ?>
                </div>

            </div>

        </div>


    </section>

</section>

       <script>
	$(document).ready(function() {
		$("#change-from").validate({
			rules: { 
				opassword: "required",
				password1: "required",
				password: {
					equalTo: "#password1"
				}
			},
			messages: {
				opassword: "Please enter your old password",
				password1: "Password is required",
				password: {
					equalTo: "Password and confirm password should be same"
				}		
			}
		});
	});
	</script>
