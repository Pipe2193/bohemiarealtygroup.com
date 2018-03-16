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
      /**
       * ADD BUILDING
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['addBuilding'])) {
          $landlord_hash = request::getInstance()->getPost("addBuilding");
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Add Building<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addBuilding" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("building", "create"); ?>">
                      <input type="hidden" id="street_number" name="street_number">
                      <input type="hidden" id="route" name="route">
                      <input type="hidden" id="country" name="country">
                      <input type="hidden" id="administrative_area_level_2" name="administrative_area_level_2">
                      <input type="hidden" id="lat" name="lat">
                      <input type="hidden" id="long" name="long">


                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>"> Building Name</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>" placeholder="Enter building name" >
                              <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>"> Landlord</label>

                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>" class="form-control" required>
                                  <?php
                                  foreach ($this->getLandlordByHash($landlord_hash) as $landlord):
                                    ?>
                                    <option value="<?php echo $landlord->id_landlord ?>" selected><?php echo $landlord->description_landlord; ?></option>
                                    <?php
                                  endforeach;
                                  ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>"> Address</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>"  onFocus="geolocate()" placeholder="Enter Address (street # or P.O BOX)" required>
                              <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>"> Cross Address (if applicable)</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>" placeholder="Enter Cross Address (if Applicable)" >
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::CITY, true) ?>"> City </label>
                              <input type="text" class="form-control has-feedback-left" id="locality" name="<?php echo buildingTableClass::getNameField(buildingTableClass::CITY, true) ?>" placeholder="Enter City" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true) ?>"> State</label>

                              <select id="" name="<?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true) ?>" class="form-control" required>
                                  <option value="">Select State</option>  
                                  <?php foreach ($this->getStates() as $state): ?>
                                    <option value="<?php echo $state->state_id ?>"><?php echo $state->accron . ' - ' . $state->state_name; ?></option>
                                  <?php endforeach; ?>
                              </select>

                          </div>

                          <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true) ?>"> Zip Code (5 digits)</label>
                              <input type="text" class=" form-control has-feedback-left zipcode_mask" id="postal_code" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true) ?>" placeholder="Enter zip code (5 digits)" maxlength="5" required>
                              <span class="form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>"> Zip Code (4 digits)</label>
                              <input type="text" class="form-control has-feedback-left addon_zipcode_mask" id="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>" maxlength="4" placeholder="Enter zip code (4 digits)" required>
                              <span class="form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>"> Neighborhood</label>

                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>" class="form-control" required>
                                  <option value="">Select Neighborhood</option>   
                                  <?php
                                  foreach ($this->getNeighborhoods() as $neighborhood):
                                    ?>
                                    <option value="<?php echo $neighborhood->id_neighborhood ?>" ><?php echo boroughTableClass::getBoroughName($neighborhood->borough_id_borough) . '-' . $neighborhood->description_neighborhood; ?></option>
                                  <?php endforeach; ?>
                              </select>

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>">Access</label>

                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>" class="form-control" required>
                                  <option value="">Select Access</option>  
                                  <?php foreach ($this->getAccess() as $access): ?>
                                    <option value="<?php echo $access->id_access ?>"><?php echo $access->access_description; ?></option>
                                  <?php endforeach; ?>
                              </select>

                          </div>
                          <div id="lockbox_code" class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>"> Lockbox Code</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingBaseTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>" placeholder="Enter lockbox code" >
                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                          </div>

                      </div>
                      <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>"> Notes</label>
                              <textarea class="form-control has-feedback-left" id="" name="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>" rows="5" placeholder="Take a note ..." ></textarea>
                              <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                          </div>

                      </div>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> Building Policy</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_PETS_POLICY, true); ?>"> Pets Policy</label>

                                  <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_PETS_POLICY, true); ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_PETS_POLICY, true); ?>" class="form-control" required>
                                      <option value="">Select Policy</option>  
                                      <?php foreach ($this->getPetsPolicy() as $petspolicy): ?>
                                        <option value="<?php echo $petspolicy->id_pets_case ?>"><?php echo $petspolicy->description_pets_case; ?></option>
                                      <?php endforeach; ?>
                                  </select>

                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>"> Listing Policy</label>

                                  <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>" class="form-control" required>
                                      <option value="">Select Policy</option>  
                                      <?php foreach ($this->getListingType() as $listingType): ?>
                                        <option value="<?php echo $listingType->id_listing_type ?>"><?php echo $listingType->description_listing_type; ?></option>
                                      <?php endforeach; ?>
                                  </select>

                              </div>
                          </div>
                      </div><br>
                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> Super Information</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true); ?>"> First Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true) ?>" placeholder="Enter Super first name" required>
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true); ?>"> Middle Name (if applicable)</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true) ?>" placeholder="Enter super middle name (if applicable)">
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true); ?>"> Last Name(s)</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true) ?>" placeholder="Enter super last name(s)" required>
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true); ?>"> Email Address (if applicable)</label>
                                      <input type="email" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true) ?>" placeholder="Enter email address (if applicable)">
                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true); ?>"> Phone Number</label>
                                      <input type="text" class="phone form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true) ?>" placeholder="Enter phone number" required>
                                      <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true); ?>"> Notes</label>
                                      <textarea class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true) ?>" rows="5" placeholder="Take a note ..." ></textarea>
                                      <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">Building Features</h3>
                          </div>
                          <div class="panel-body">

                              <div class="row form-group">
                                  <p><small>Fields marked with (*) are mandatory.</small></p>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>"> Outdoor Space</label>

                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" class="form-control" required>
                                          <option value="">Select Outdoor Space </option>  
                                          <?php foreach ($this->getOutdoorSpace() as $outdoor_space): ?>
                                            <option value="<?php echo $outdoor_space->id_outdoor_space ?>"><?php echo $outdoor_space->description_outdoor_space; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>"> Doorman</label>

                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>  
                                          <?php foreach ($this->getDoorman() as $doorman): ?>
                                            <option value="<?php echo $doorman->id_doorman ?>"><?php echo $doorman->description_doorman; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>"> Building Type</label>

                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>" class="form-control" required>
                                          <option value="">Select Type</option>  
                                          <?php foreach ($this->getBuildingType() as $buildingType): ?>
                                            <option value="<?php echo $buildingType->id_building_type ?>"><?php echo $buildingType->description_building_type; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>"> Age</label>

                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>  
                                          <?php foreach ($this->getAge() as $age): ?>
                                            <option value="<?php echo $age->id_age ?>"><?php echo $age->description_age; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">Building Amenities</h3>
                          </div>
                          <div class="panel-body">

                              <div class=" row form-group">
                                  <?php
                                  $amenities = $this->getAmenities();
                                  $i = 1;
                                  foreach ($amenities as $amenity):
                                    ?>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
                                        <div class="switch-guest-item">
                                            <div class="material-switch">
                                                <input id="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->id_amenities; ?>" type="checkbox"/>
                                                <label for="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                <span> <b><?php echo $amenity->description_amenities; ?></b> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                  endforeach;
                                  ?>
                              </div>

                          </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addBuilding"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Building</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addBuilding').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {

          <?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo buildingTableClass::DESCRIPTION_BUILDING_LENTH ?>,
                                    message: 'The Building name must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Landlord is required'
                                }

                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Address is required'
                                },
                                stringLength: {
                                    max: <?php echo buildingTableClass::ADDRESS_LENTH ?>,
                                    message: 'The  Address must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo buildingTableClass::CROSS_ADDRESS_LENTH ?>,
                                    message: 'The  Cross Address must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::CITY, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The City is required'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The State is required'
                                }
                            }
                        },

          <?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Zip code is required'
                                },
                                stringLength: {
                                    max: <?php echo buildingTableClass::ZIPCODE_LENTH ?>,
                                    message: 'The  Zip code must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Addon zip code is required'
                                },
                                stringLength: {
                                    max: <?php echo buildingTableClass::ADDON_CODES_ZIPCODE_LENTH ?>,
                                    message: 'The  Addon zip code must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Neighborhood is required'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Access is required'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo buildingTableClass::LOCKBOX_BUILDING_LENGTH ?>,
                                    message: 'The lockbox code must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING_LENGTH, true) ?> characters long'
                                }
                            }
                        },

          <?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo buildingTableClass::NOTES_BUILDING_LENGTH ?>,
                                    message: 'The notes must be less than <?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING_LENGTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ID_PETS_POLICY, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Policy is required'
                                }
                            }
                        },
          <?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Policy is required'
                                }
                            }
                        },
          <?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The first name is required'
                                },
                                stringLength: {
                                    max: <?php echo superTableClass::SUPER_FIRST_NAME_LENGTH; ?>,
                                    message: 'The super first name must be less than <?php echo superTableClass::SUPER_FIRST_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true); ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo superTableClass::SUPER_MIDDLE_NAME_LENGTH; ?>,
                                    message: 'The super middle name must be less than <?php echo superTableClass::SUPER_MIDDLE_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The last name is required'
                                },
                                stringLength: {
                                    max: <?php echo superTableClass::SUPER_LAST_NAME_LENGTH; ?>,
                                    message: 'The super last name must be less than <?php echo superTableClass::SUPER_LAST_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },

          <?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true); ?>: {
                            validators: {
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                },
                                stringLength: {
                                    max: <?php echo superTableClass::SUPER_EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo superTableClass::SUPER_EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo superTableClass::SUPER_NOTES_LENGTH; ?>,
                                    message: 'The notes must be less than <?php echo superTableClass::SUPER_NOTES_LENGTH; ?> characters long'
                                }
                            }
                        },

          <?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The phone number is required'
                                }
                            }
                        },

          <?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The outdoor space is required'
                                }
                            }
                        },
          <?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The doorman is required'
                                }
                            }
                        },
          <?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The building type is required'
                                }
                            }
                        },
          <?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The age is required'
                                }
                            }
                        }
                    }

                }).find('.phone').mask('(999)-999-9999').find('.zipcode_mask').mask('99999').find('.addon_zipcode_mask').mask('9999');

                $("#lockbox_code").hide();

                var access = $("#<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>");
                access.change(function () {
                    var id_access = access.val();
                    if (id_access == 1) {
                        $("#lockbox_code").show();
                    } else {
                        $("#lockbox_code").hide();
                    }
                });

                //button close adduser user function
                var btnClose_addBuilding = $(".btnClose_addBuilding");
                $(btnClose_addBuilding).on('click', function () {
                    $("#addBuilding_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#collapse2').offset().top}, 'slow');
                });
            });

          </script>

          <!--          <div id="map" style="height: 300px" ></div>-->
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
                        /** @type {!HTMLInputElement} */(document.getElementById('<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>')),
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

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['manage_listings'])) {
          $id_building = $_GET['manage_listings'];

          /**
           * Listing info
           */
          $listing_fields = array(
              listingTableClass::ID,
              listingTableClass::RENT_LISTING,
              listingTableClass::UNIT_NUMBER_LISTING,
              listingTableClass::BATH_SIZE_LISTING,
              listingTableClass::FEE_OP_LISTING,
              listingTableClass::CUSTOM_FEE_OP_LISTING,
              listingTableClass::LEASE_TERM_START,
              listingTableClass::LEASE_TERM_END,
              listingTableClass::ACCESS_ID_ACCESS,
              listingTableClass::NOTES_LISTING,
              listingTableClass::DESCRIPTION_LISTING,
              listingTableClass::CONTACT_FIRST_NAME,
              listingTableClass::CONTACT_MIDDLE_NAME,
              listingTableClass::CONTACT_LAST_NAME,
              listingTableClass::CONTACT_EMAIL_ADDRESS,
              listingTableClass::CONTACT_PHONE_NUMBER,
              listingTableClass::CONTACT_NOTES,
              listingTableClass::STATUS,
              listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
              listingTableClass::BUILDING_ID_BUILDING,
              listingTableClass::LANDLORD_ID_LANDLORD,
              listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
              listingTableClass::LISTING_HASH,
              listingTableClass::CREATED_AT,
              listingTableClass::UPDATED_AT,
              listingTableClass::SYNC_ID_SYNC
          );


          if (request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {

            if (request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Available") {
              $status = 1;
            } elseif (request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Unavailable") {
              $status = 3;
            } elseif (request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Pending") {
              $status = 3;
            }

            $where_listing_filter = array(
                listingTableClass::BUILDING_ID_BUILDING => $id_building,
                listingTableClass::STATUS => $status
            );
            $order_by_listing_filter = array(
                listingTableClass::ID
            );

            $objListings = listingTableClass::getAll($listing_fields, true, $order_by_listing_filter, 'DESC', null, null, $where_listing_filter);
          } else {

            $where_listing = array(
                listingTableClass::BUILDING_ID_BUILDING => $id_building
            );
            $order_by_listing = array(
                listingTableClass::ID
            );

            $objListings = listingTableClass::getAll($listing_fields, true, $order_by_listing, 'DESC', null, null, $where_listing);
          }




          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_rent = listingTableClass::RENT_LISTING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_status = listingTableClass::STATUS;
          $listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
          $listing_listing_hash = listingTableClass::LISTING_HASH;
          $listing_updated_at = listingTableClass::UPDATED_AT;
          $listing_sync_id = listingTableClass::SYNC_ID_SYNC;

          foreach ($objListings as $listing) {


            $listing_sync_source_id = syncTableClass::getSyncSource($listing->$listing_sync_id);
            if ($listing_sync_source_id == 2) {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($listing->$listing_landlord_id);
              if ($landlord_listing_type_ll == 4) {
                $listing_id_field = '<div class="label label-info"> N </div><div class="label" style="background-color: #ffd6d5;"> OLA </div> <button class="mdl-button mdl-js-button"  type="button"> ' . $listing->$listing_id . ' </button>';
              } else {
                $listing_id_field = '<div class="label label-info"> N </div><button class="mdl-button mdl-js-button"  type="button"> ' . $listing->$listing_id . ' </button>';
              }
            } else {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($listing->$listing_landlord_id);

              if ($landlord_listing_type_ll == 4) {
                $listing_id_field = '<div class="label" style="background-color: #ffd6d5;"> OLA </div>  <button class="mdl-button mdl-js-button"  type="button"> ' . $listing->$listing_id . ' </button>';
              } else {
                $listing_id_field = ' <button class="mdl-button mdl-js-button"  type="button"> ' . $listing->$listing_id . ' </button>';
              }
            }
            
            $listing_neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($listing->$listing_building_id)) . ' </button>';
            $listing_building_address_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)) . ', Unit: ' . $listing->$listing_unit_number . ' </button>';
            $listing_unit_number_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $listing->$listing_unit_number . '</button>';
            $listing_rent_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $listing->$listing_rent . ' USD </button>';
            $listing_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . listingSizeTableClass::getListingSizeByID($listing->$listing_size_id) . ' </button>';
            $listing_bath_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $listing->$listing_bath_size . ' </button>';
            $listing_landlord_field = '<button  class="mdl-button mdl-js-button " type="button"> ' . landlordTableClass::getLandlordNameById($listing->$listing_landlord_id) . ' </button>';

            if ($listing->$listing_status == "1") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
            } elseif ($listing->$listing_status == "2") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
            } elseif ($listing->$listing_status == "3") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
            } else {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS </button>';
            }



            if (!empty($listing->$listing_updated_at)) {
              $listing_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $listing->$listing_updated_at . ' </button>';
            } else {
              $listing_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> No Updates </button>';
            }

            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing->$listing_listing_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
            $actions .= '<button  disabled class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Listing ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)) . ', ' . $listing->$listing_unit_number . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $listing_id_field;
            $subdata[] = $listing_neighborhood_field;
            $subdata[] = $listing_building_address_field;
            $subdata[] = $listing_unit_number_field;
            $subdata[] = $listing_rent_field;
            $subdata[] = $listing_size_field;
            $subdata[] = $listing_bath_size_field;
            $subdata[] = $listing_landlord_field;
            $subdata[] = $listing_status_field;
            $subdata[] = $listing_updated_at_field;
            $subdata[] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }


          $json_data = array(
              "draw" => intval(request::getInstance()->getGet('draw')),
              "recordsTotal" => intval(count($objListings)),
              "recordsFiltered" => intval(count($objListings)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getCredencials() {
    $credencials = array(
        credencialTableClass::ID,
        credencialTableClass::NOMBRE,
        credencialTableClass::CREATED_AT,
        credencialTableClass::UPDATED_AT,
        credencialTableClass::DELETED_AT,
    );
    $credencialOrderBy = array(
        credencialTableClass::ID
    );
    $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
    return $objCredencials;
  }

  public function getPetsPolicy() {
    $fields_pets_policy = array(
        petsPolicyTableClass::ID,
        petsPolicyTableClass::DESCRIPTION_PETS_CASE,
        petsPolicyTableClass::CREATED_AT,
        petsPolicyTableClass::UPDATED_AT,
        petsPolicyTableClass::DELETED_AT,
    );
    $OrderBy_pets_policy = array(
        petsPolicyTableClass::ID
    );
    $objPetsPolicy = petsPolicyTableClass::getAll($fields_pets_policy, true, $OrderBy_pets_policy, 'ASC');
    return $objPetsPolicy;
  }

  public static function getUsersProfiles() {

    $fields_profile = array(
        profileTableClass::FIRST_NAME,
        profileTableClass::MIDDLE_NAME,
        profileTableClass::LAST_NAME,
        profileTableClass::USUARIO_ID
    );
    $OrderBy_profile = array(
        profileTableClass::USUARIO_ID
    );
    $objProfiles = profileTableClass::getAll($fields_profile, true, $OrderBy_profile, 'ASC');


    return $objProfiles;
  }

  public function getListingType() {

    $fields_listing_type = array(
        listingTypeTableClass::ID,
        listingTypeTableClass::DESCRIPTION_LISTING_TYPE,
    );
    $OrderBy_listing_type = array(
        listingTypeTableClass::ID
    );
    $objListingType = listingTypeTableClass::getAll($fields_listing_type, true, $OrderBy_listing_type, 'ASC');
    return $objListingType;
  }

  public function getStates() {

    $fields_states = array(
        statesTableClass::ID,
        statesTableClass::STATE_NAME,
        statesTableClass::ACCRON
    );
    $OrderBy_states = array(
        statesTableClass::ID
    );
    $objStates = statesTableClass::getAll($fields_states, true, $OrderBy_states, 'ASC');
    return $objStates;
  }

  public function getLandlordByHash($hash) {

    $fields_landlord = array(
        landlordTableClass::ID,
        landlordTableClass::DESCRIPTION_LANDLORD,
        landlordTableClass::LANDLORD_HASH
    );
    $landlord_where = array(
        landlordTableClass::LANDLORD_HASH => $hash
    );
    $objLandlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $landlord_where);
    return $objLandlord;
  }

  public function getAccess() {

    $fields_access = array(
        accessTableClass::ID,
        accessTableClass::ACCESS_DESCRIPTION
    );
    $OrderBy_access = array(
        accessTableClass::ID
    );
    $objAccesses = accessTableClass::getAll($fields_access, true, $OrderBy_access, 'ASC');
    return $objAccesses;
  }

  public function getOutdoorSpace() {

    $fields_outdoor_space = array(
        outdoorSpaceTableClass::ID,
        outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE
    );
    $OrderBy_outdoor_space = array(
        outdoorSpaceTableClass::ID
    );
    $objOutdoorSpace = outdoorSpaceTableClass::getAll($fields_outdoor_space, true, $OrderBy_outdoor_space, 'ASC');
    return $objOutdoorSpace;
  }

  public function getDoorman() {

    $fields_doorman = array(
        doormanTableClass::ID,
        doormanTableClass::DESCRIPTION_DOORMAN
    );
    $OrderBy_doorman = array(
        doormanTableClass::ID
    );
    $objDoorman = doormanTableClass::getAll($fields_doorman, true, $OrderBy_doorman, 'ASC');
    return $objDoorman;
  }

  public function getBuildingType() {

    $fields_building_type = array(
        buildingTypeTableClass::ID,
        buildingTypeTableClass::DESCRIPTION_BUILDING_TYPE
    );
    $OrderBy_building_type = array(
        buildingTypeTableClass::ID
    );
    $objBuildingType = buildingTypeTableClass::getAll($fields_building_type, true, $OrderBy_building_type, 'ASC');
    return $objBuildingType;
  }

  public function getAge() {

    $fields_age = array(
        ageTableClass::ID,
        ageTableClass::DESCRIPTION_AGE
    );
    $OrderBy_age = array(
        ageTableClass::ID
    );
    $objAge = ageTableClass::getAll($fields_age, true, $OrderBy_age, 'ASC');
    return $objAge;
  }

  public static function getAmenities() {

    $fields_amenities = array(
        amenitiesTableClass::ID,
        amenitiesTableClass::DESCRIPTION_AMENITIES
    );
    $OrderBy_amenities = array(
        amenitiesTableClass::ID
    );
    $objAmenities = amenitiesTableClass::getAll($fields_amenities, true, $OrderBy_amenities, 'ASC');
    return $objAmenities;
  }

  public static function getNeighborhoods() {

    $fields_neighborhood = array(
        neighborhoodTableClass::ID,
        neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD,
        neighborhoodTableClass::BOROUGH_ID_BOROUGH
    );
    $OrderBy_neighborhood = array(
        neighborhoodTableClass::ID
    );
    $objNeighborhood = neighborhoodTableClass::getAll($fields_neighborhood, true, $OrderBy_neighborhood, 'ASC');
    return $objNeighborhood;
  }

}
