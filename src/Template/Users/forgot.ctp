<section class="banner-sec">
	

<section class="edit">
	<div class="container">
	<div class="row">
		
		<div class="col-md-6">
		 
		<?= $this->Flash->render() ?>
                <?= $this->Form->create('', ['type' => 'file']) ?>
		<h1>Forgot Password</h1>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email id">
                  </div>
                  
                <?= $this->Form->button(__('Send'),['class'=>'btn btn-primary save-btn']); ?>
                <?= $this->Form->end() ?>
                </div>
  
		</div>
	
	</div>
								

</section>


</section>