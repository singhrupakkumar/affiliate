<div class="home_v5">
    <section id="content-full" class="grid col-940 home_v1_v2_v3 home_v2 home_v4 atf mask">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-push-2 col-xs-12">
            <div class="home_v4-container clearfix">
              <div class="hp-white-box">
                <div class="left-container">
                  <div class="text-center">
                    <div><i class="fa fa-map-marker" aria-hidden="true"></i></div>

                    <h1 class="main-title white">Find the best personal<br>trainer in your area</h1>
                    <h2 class="sec-title h4 white">Book a trainer now to get your<br class="visible-xxs"> first session free</h2>
                  </div>
                  <div class="wrapper rounded6" id="templateContainer">
                    <div id="templateBody" class="bodyContent rounded6">
                      <div id="subscribeFormWelcome">
                      </div>

                        <div class="tlt_form tlt_form_register tlt_form_client_register">
                        <form id="tlt_client_register" name="tlt_client_register" method="get" action="<?php echo $this->request->webroot; ?>trainer" enctype="multipart/form-data">
                        <fieldset class="form-group">
                        <input class="form-control tlt_form_field" name="search" id="txtPlaces" type="text" placeholder="Enter your location" autofocus="">
                        <input type="hidden" id="latitude" name="latitude" class="form-control" />
                        <input type="hidden" id="longitude" name="longitude" class="form-control" />
                        </fieldset>
                        
                        <div class="text-center">
                        <button type="submit" class="btn btn-green btn-lg" id="tlt_client_register_fake_submit_v1" value="submit">Find My Trainer</button>
                        </div>
                      	</form>
                        </div>                    </div>
                  </div>
                </div>
              </div><!-- homepage trainer finder - end -->

              <!--<a href="javascript:void(0)" class="video-play tdn pp_trigger" data-pp_target="video-1">
                <div class="play green-bkg"></div>
                <span class="video-text"><strong>Watch our video</strong> to find out why people are using TopLocalTrainer</span>
              </a>-->

              <div class="hp-vc hidden">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZP2Z9glvglo?rel=0&amp;showinfo=0" allowfullscreen=""></iframe>
              </div><!-- homepage video container - end -->
            </div><!-- homepage top container - end -->
          </div>
        </div>
      </div>
    </section><!-- ATF SECTION - end -->


	<?php if(!empty($trainers)){ ?>

    <section class="lt lth section white-bkg">
       
      <div class="container">
        <h3 class="text-center t grey_colr">Latest trainers to join<br class="visible-xxs"> Patrainer</h3>
        <br>
        <div class="lt-items">
          <div id="hp-profiles-row" class="no-row">
              
          	<?php foreach($trainers as $trainer){ ?>
                                          
                     <div class="col-sm-2 col-xs-12 col-xxs-6">
                      <div class="lt-item">
                        <div class="lt-item-image mask mask_30">
                          <div class="lt-sq">
                            <div class="img-outer">
                              <div class="img-inner">
                                <?php if($trainer['image'] != ''){ ?>
                                <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/users/<?php echo $trainer['image']; ?>"width="150" height="150" alt="Tom Smith PT profile image"/>
                                <?php }else{ ?>
                                <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/users/noimage.png"width="150" height="150" alt="Tom Smith PT profile image"/>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                          <h4 class="lt-item-title"><?php echo ucwords($trainer['name']); ?></h4>
                        </div>
                        <ul class="list-with-sep">
                          <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $this->Html->link('View Trainer', ['controller' => 'trainer', 'action' => 'view', base64_encode('trainer'.$trainer['id'])]); ?>
                          </li>
                          <li>
                            <?php
                            $trainer['avg_rating'] = floor($trainer['avg_rating']);
                            for($j = 0; $j < $trainer['avg_rating']; $j++){ ?>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <?php }
                            $unrated = 5-$trainer['avg_rating'];
                            ?>
                            <?php for($i=0; $i<$unrated; $i++){ ?>
                            <i class="fa fa-star colr_str" aria-hidden="true"></i>
                            <?php } ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                    
                    <?php } ?>
                                </div>
        </div>
      </div>
    </section><!-- latest trainers horizontal - end -->
	<?php } ?>
    
    <section class="for-trainers grey-bkg">
        <?php foreach($homesections as $section){
            echo $section['content'];
        } ?>
    </section>
  
  </div>
  
  
<script>
google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
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


google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces2'));
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		$("#latitude1").val(latitude);
		$("#longitude1").val(longitude);
		
		
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

</script>  