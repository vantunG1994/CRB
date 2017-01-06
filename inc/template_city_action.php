<?php

$id_company=$_POST["id_company"];
$company_location = esc_attr(get_post_meta( $id_company, 'company_location',true));
$wpjobus_company_address = get_post_meta( $id_company, 'wpjobus_company_address',true);
$wpjobus_company_email = get_post_meta( $id_company, 'wpjobus_company_email',true);
$wpjobus_company_phone = get_post_meta($id_company, 'wpjobus_company_phone',true);
$wpjobus_company_website = get_post_meta($id_company, 'wpjobus_company_website',true);
$wpjobus_company_publish_email = get_post_meta($id_company, 'wpjobus_company_publish_email',true);
$wpjobus_company_facebook = get_post_meta($id_company, 'wpjobus_company_facebook',true);
$wpjobus_company_linkedin = get_post_meta($id_company, 'wpjobus_company_linkedin',true);
$wpjobus_company_twitter = get_post_meta($id_company, 'wpjobus_company_twitter',true);
$wpjobus_company_googleplus = get_post_meta($id_company, 'wpjobus_company_googleplus',true);

$wpjobus_company_googleaddress = get_post_meta($id_company, 'wpjobus_company_googleaddress',true);
$wpjobus_company_longitude = get_post_meta($id_company, 'wpjobus_company_longitude',true);
$wpjobus_company_latitude = get_post_meta($id_company, 'wpjobus_company_latitude',true);
if($wpjobus_company_address=="")
{
$wpjobus_company_address=$company_location;
}





?>
<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Address:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" name="wpjobus_job_address" id="wpjobus_job_address" style="width: 100%; float: left;" value="<?php echo $wpjobus_company_address ?>" class="input-textarea" placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Phone number:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_job_phone" class='input-textarea' name='wpjobus_job_phone' style="width: 100%; float: left;" value='<?php echo  $wpjobus_company_phone;?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Website:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_job_website" class='input-textarea' name='wpjobus_job_website' style="width: 100%; float: left;" value='<?php  echo  $wpjobus_company_website; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Email:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_job_email" class='input-textarea' name='wpjobus_job_email' style="width: 100%; float: left;" value='<?php echo $wpjobus_company_email; ?>' placeholder="" />
									<span class="full" style="margin-bottom: 0;">
										<input type="checkbox" class='' name='wpjobus_job_publish_email' style="width: 10px; margin-right: 5px; float: left; margin-top: 7px;" value='publish_email' placeholder="" <?php if (!empty($wpjobus_job_publish_email)) { ?>checked<?php } ?>/><?php _e( 'Publish my email address', 'themesdojo' ); ?>
									</span>
								</span>

							</span>


</div>
<div class="one_half">

                                    <span class="full" >

                                        <span class="two_fifth first" style="margin-bottom: 0;">
                                            <h3><?php _e( 'Facebook:', 'themesdojo' ); ?></h3>
                                        </span>

                                        <span class="three_fifth" style="margin-bottom: 0;">
                                            <input type='text' id="wpjobus_job_facebook" class='input-textarea' name='wpjobus_job_facebook' style="width: 100%; float: left;" value='<?php echo  $wpjobus_company_facebook ; ?>' placeholder="" />
                                        </span>

                                    </span>

                                    <span class="full" >

                                        <span class="two_fifth first" style="margin-bottom: 0;">
                                            <h3><?php _e( 'LinkedIn:', 'themesdojo' ); ?></h3>
                                        </span>

                                        <span class="three_fifth" style="margin-bottom: 0;">
                                            <input type='text' id="wpjobus_job_linkedin" class='input-textarea' name='wpjobus_job_linkedin' style="width: 100%; float: left;" value='<?php  $wpjobus_company_linkedin; ?>' placeholder="" />
                                        </span>

                                    </span>

                                    <span class="full" >

                                        <span class="two_fifth first" style="margin-bottom: 0;">
                                            <h3><?php _e( 'Twitter:', 'themesdojo' ); ?></h3>
                                        </span>

                                        <span class="three_fifth" style="margin-bottom: 0;">
                                            <input type='text' id="wpjobus_job_twitter" class='input-textarea' name='wpjobus_job_twitter' style="width: 100%; float: left;" value='<?php  echo  $wpjobus_company_twitter; ?>' placeholder="" />
                                        </span>

                                    </span>

                                    <span class="full" >

                                        <span class="two_fifth first" style="margin-bottom: 0;">
                                            <h3><?php _e( 'Google+:', 'themesdojo' ); ?></h3>
                                        </span>

                                        <span class="three_fifth" style="margin-bottom: 0;">
                                            <input type='text' id="wpjobus_job_googleplus" class='input-textarea' name='wpjobus_job_googleplus' style="width: 100%; float: left;" value='<?php  echo $wpjobus_company_googleplus; ?>' placeholder="" />
                                        </span>

                                    </span>

</div>

<div class="full" >

                                    <span class="one_fifth first" style="margin-bottom: 0;">
                                        <h3><?php _e( 'Google Maps Address:', 'themesdojo' ); ?></h3>
                                    </span>

                                    <span class="four_fifth" style="margin-bottom: 0;">
                                        <input type='text' id="address" class='input-textarea' name='wpjobus_job_googleaddress' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo   $wpjobus_company_googleaddress; ?>' placeholder="" />
                                        <p class="help-block"><?php _e('Start typing an address and select from the dropdown.', 'themesdojo') ?></p>
                                    </span>

</div>

<div class="full" style="display: none;">

    <div id="map-canvas"></div>

    <style>

        #map-canvas {
            display: block;
            width: 100%;
            height: 470px;
            position: relative;
            margin-bottom: 10px;
        }

    </style>

    <script type="text/javascript">

        jQuery(document).ready(function($) {

            var geocoder;
            var map;
            var marker;

            var geocoder = new google.maps.Geocoder();

            function geocodePosition(pos) {
                geocoder.geocode({
                    latLng: pos
                }, function(responses) {
                    if (responses && responses.length > 0) {
                        updateMarkerAddress(responses[0].formatted_address);
                    } else {
                        updateMarkerAddress('Cannot determine address at this location.');
                    }
                });
            }

            function updateMarkerPosition(latLng) {
                jQuery('#latitude').val(latLng.lat());
                jQuery('#longitude').val(latLng.lng());
            }

            function updateMarkerAddress(str) {
                jQuery('#address').val(str);
            }

            function initialize() {

                var latlng = new google.maps.LatLng(<?php echo $wpjobus_company_latitude ; ?>, <?php echo  $wpjobus_company_longitude; ?>);
                var mapOptions = {
                    zoom: 16,
                    center: latlng
                }

                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                geocoder = new google.maps.Geocoder();

                marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    draggable: true
                });

                //Add dragging event listeners.
                google.maps.event.addListener(marker, 'dragstart', function() {
                    updateMarkerAddress('Dragging...');
                });

                google.maps.event.addListener(marker, 'drag', function() {
                    updateMarkerPosition(marker.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function() {
                    geocodePosition(marker.getPosition());
                });

            }

            google.maps.event.addDomListener(window, 'load', initialize);

            jQuery(document).ready(function() {

                initialize();

                jQuery(function() {
                    jQuery("#address").autocomplete({
                        //This bit uses the geocoder to fetch address values
                        source: function(request, response) {
                            geocoder.geocode( {'address': request.term }, function(results, status) {
                                response(jQuery.map(results, function(item) {
                                    return {
                                        label:  item.formatted_address,
                                        value: item.formatted_address,
                                        latitude: item.geometry.location.lat(),
                                        longitude: item.geometry.location.lng()
                                    }
                                }));
                            })
                        },
                        //This bit is executed upon selection of an address
                        select: function(event, ui) {
                            jQuery("#latitude").val(ui.item.latitude);
                            jQuery("#longitude").val(ui.item.longitude);

                            var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);

                            marker.setPosition(location);
                            map.setZoom(16);
                            map.setCenter(location);

                        }
                    });
                });

                //Add listener to marker for reverse geocoding
                google.maps.event.addListener(marker, 'drag', function() {
                    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                jQuery('#address').val(results[0].formatted_address);
                                jQuery('#latitude').val(marker.getPosition().lat());
                                jQuery('#longitude').val(marker.getPosition().lng());
                            }
                        }
                    });
                });

            });

        });

    </script>

</div>

<div class="full" style="display: none;">

    <div class="one_half first" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Latitude:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="latitude" name="wpjobus_job_latitude" value="<?php echo $wpjobus_job_latitude; ?>" class="input-textarea">
								</span>

    </div>

    <div class="one_half" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Longitude:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="longitude" name="wpjobus_job_longitude" value="<?php echo $wpjobus_job_longitude; ?>" class="input-textarea">
								</span>

    </div>

</div>

