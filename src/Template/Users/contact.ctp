<div class="page" id="page-161">
      <section id="content-full" class="col-940">
        <div class="page-header">
          <div class="container">
            <h1 class="page-title mb0 white">Contact Us</h1>
          </div>
        </div>
      </section>
      <section class="wrapper-full section grey-bkg">
        <div class="container">
          <div class="contain">
            <div class="row">
            	
                <?= $this->Flash->render() ?>
            
              <div class="col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 col-xs-12 col-xs-push-0">
                <div role="form" class="wpcf7" id="wpcf7-f160-p161-o1" lang="en-US" dir="ltr">
                  <div class="screen-reader-response"></div>
                  <form action="" method="post" class="wpcf7-form" id="contact-form" novalidate>
                    <div class="form-group"> <span class="wpcf7-form-control-wrap your-name">
                      <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Name (required)">
                      </span> </div>
                    <div class="form-group"> <span class="wpcf7-form-control-wrap your-email">
                      <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Your Email (required)">
                      </span> </div>
                    <div class="form-group"> <span class="wpcf7-form-control-wrap your-subject">
                      <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Subject (required)">
                      </span> </div>
                    <div class="form-group"> <span class="wpcf7-form-control-wrap your-message">
                      <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Message (required)"></textarea>
                      </span> </div>
                    <div class="form-group">
                      <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit btn btn-green btn-wide">
                      <span class="ajax-loader"></span> </div>
                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                  </form>
                </div>
                <!--<p></p>
                <p>Alternatively you can write to us at:<br>
                  Top Local Trainer<br>
                  8 Joan Crescent<br>
                  London<br>
                  SE9 5RS<br>
                  Or call 0208 859 1609 </p>-->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
<script>
$().ready(function() {
	$("#contact-form").validate({
		rules: {
			name: "required",
			subject: "required",
			message: "required",
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			name: "Please enter your name",
			subject: "Please enter subject",
			email: "Please enter a valid email address",
			message: "Please enter your message"
		}
	});
});

</script>    