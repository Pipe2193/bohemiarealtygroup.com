<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {
      if (request::getInstance()->isMethod("POST")) {
        if (request::getInstance()->hasPost("addEvent")) {
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">1. Event Details<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addEvent" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("hiring", "create"); ?>">
                      <input type="hidden" id="street_number" name="street_number">
                      <input type="hidden" id="route" name="route">
                      <input type="hidden" id="country" name="country">
                      <input type="hidden" id="administrative_area_level_2" name="administrative_area_level_2">
                      <input type="hidden" id="lat" name="lat">
                      <input type="hidden" id="long" name="long">
                      <input type="hidden" id="locality" name="locality">
                      <input type="hidden" id="postal_code" name="postal_code">


                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_NAME, true) ?>"> Event Name</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_NAME, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_NAME, true) ?>" placeholder="Enter Event Name" autofocus >
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_ADDRESS, true) ?>"> Location</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_ADDRESS, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_ADDRESS, true) ?>" onFocus="geolocate()" placeholder="Enter Event Location " >
                              <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> 2. Event Description</h3>
                          </div>
                          <div class="panel-body">
                              <div class="form-group">
                                  <p><small>Fields marked with (*) are mandatory.</small></p>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::DATE_INI, true); ?>"> Start Date</label>
                                      <input type="date" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::DATE_INI, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::DATE_INI, true) ?>" required>
                                      <span class="fa fa-calendar-o  form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_INI, true); ?>"> Start Time</label>
                                      <input type="time" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_INI, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_INI, true) ?>" required>
                                      <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::DATE_END, true); ?>"> End Date</label>
                                      <input type="date" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::DATE_END, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::DATE_END, true) ?>" required>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_END, true); ?>"> End Time</label>
                                      <input type="time" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_END, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_TIME_END, true) ?>" required>
                                      <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_DESCRIPTION, true); ?>"> Description</label>
                                      <textarea class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_DESCRIPTION, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_DESCRIPTION, true) ?>" placeholder="Describe your event ..." ></textarea>
                                      
                                  </div>
                              </div>
                          </div>
                      </div><br>
                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">3. Additional Information</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_INI, true); ?>"> Start Publish Date</label>
                                      <input type="date" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_INI, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_INI, true) ?>" required>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_END, true); ?>"> End Publish Date</label>
                                      <input type="date" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_END, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_END, true) ?>" required>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_FEE, true); ?>"> Fee</label>
                                      <input type="number" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_FEE, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::EVENT_FEE, true) ?>" value="0" required>
                                      <span class="form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="check"> Include Facebook, Twitter and Instagram Links </label>
                                      <input  type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()">
                                  </div>
                              </div>
                              <div id="content" style="display: none;">
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo eventTableClass::getNameField(eventTableClass::FACEBOOK_LINK, true); ?>"> Facebook</label>
                                          <input type="text" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::FACEBOOK_LINK, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::FACEBOOK_LINK, true) ?>" value="" placeholder="Enter Facebook Link (if applicable)">
                                          <span class="fa fa-facebook-square form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo eventTableClass::getNameField(eventTableClass::TWITTER_LINK, true); ?>"> Twitter</label>
                                          <input type="text" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::TWITTER_LINK, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::TWITTER_LINK, true) ?>" value="" placeholder="Enter Twitter Link (if applicable)">
                                          <span class="fa fa-twitter-square form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo eventTableClass::getNameField(eventTableClass::INSTAGRAM_LINK, true); ?>"> Instagram</label>
                                          <input type="text" class="form-control has-feedback-left" id="<?php echo eventTableClass::getNameField(eventTableClass::INSTAGRAM_LINK, true) ?>" name="<?php echo eventTableClass::getNameField(eventTableClass::INSTAGRAM_LINK, true) ?>" value="" placeholder="Enter Instagram Link (if applicable)">
                                          <span class="fa fa-instagram form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <a  href="<?php echo routing::getInstance()->getUrlWeb("hiring", "event") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger "><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Create Event</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
          <script type="text/javascript">
            function showContent() {
                element = document.getElementById("content");
                check = document.getElementById("check");
                if (check.checked) {
                    element.style.display = 'block';
                } else {
                    element.style.display = 'none';
                }
            }

            $(document).ready(function () {

                CKEDITOR.replace('<?php echo eventTableClass::getNameField(eventTableClass::EVENT_DESCRIPTION, true) ?>', {
                    customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
                });
            });


          </script>
          <!--                                <div id="map" style="height: 300px" ></div>-->
          <script>
            //            $(document).ready(function () {
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            var placeSearch, autocomplete;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                //                neighborhood: 'long_name',
                locality: 'long_name',
                //                sublocality_level_1: 'long_name',
                //                                administrative_area_level_1: 'short_name',
                administrative_area_level_2: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initAutocomplete() {
                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('<?php echo eventTableClass::getNameField(eventTableClass::EVENT_ADDRESS, true) ?>')),
                        {types: ['address']});

                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);
                //                autocomplete.addListener('place_changed', initMap);
            }

            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();

                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }

                }

                var latitud = place.geometry.location.lat();
                document.getElementById('lat').value = latitud;
                var longitud = place.geometry.location.lng();
                document.getElementById('long').value = longitud;

            }

            //            var map;
            //            function initMap() {
            //                var lattitude = parseFloat($('#lat').val());
            //                var longitude = parseFloat($('#long').val());
            //
            //                map = new google.maps.Map(document.getElementById('map'), {
            //                    center: {lat: lattitude, lng: longitude},
            //                    zoom: 15,
            //                    mapTypeControl: false
            //                });
            //
            //                var marker = new google.maps.Marker({
            //                    position: {lat: lattitude, lng: longitude},
            //                    map: map
            //                });
            //            }

            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                        });
                        autocomplete.setBounds(circle.getBounds());
                    });
                }
            }
            //            });
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo mvc\config\myConfigClass::getGoogleMapsAPI(); ?>&libraries=places&language=<?php echo mvc\config\configClass::getDefaultCulture(); ?>&callback=initAutocomplete"
          async defer></script>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
