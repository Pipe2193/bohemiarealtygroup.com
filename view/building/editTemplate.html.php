<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LANDLORD INSTANCES * */
$landlord_id = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
/** BUILDINGS INSTANCES* */
$building_id = buildingTableClass::ID;
$building_name = buildingTableClass::DESCRIPTION_BUILDING;
$building_address = buildingTableClass::ADDRESS;
$building_city = buildingTableClass::CITY;
$building_state_id = buildingTableClass::STATE_ID;
$building_zipcode = buildingTableClass::ZIPCODE;
$building_addon_codes_zipcode = buildingTableClass::ADDON_CODES_ZIPCODE;
$building_cross_address = buildingTableClass::CROSS_ADDRESS;
$building_status = buildingTableClass::STATUS;
$id_building_features = buildingTableClass::ID_BUILDING_FEATURES;
$id_landlord = buildingTableClass::ID_LANDLORD;
$id_neighborhood = buildingTableClass::ID_NEIGHBORHOOD;
$id_access = buildingTableClass::ID_ACCESS;
$lockbox_code = buildingTableClass::LOCKBOX_BUILDING;
$notes_building = buildingTableClass::NOTES_BUILDING;
$id_pets_policy = buildingTableClass::ID_PETS_POLICY;
$id_listing_policy = buildingTableClass::ID_LISTING_TYPE;
$id_super = buildingTableClass::ID_SUPER;
$building_hash = buildingTableClass::BUILDING_HASH;

/** STATES INSTANCES * */
$state_id_state = statesTableClass::ID;
$state_name_state = statesTableClass::STATE_NAME;
$state_accron_state = statesTableClass::ACCRON;
/** NEIGHBORHOOD INSTANCES * */
$neighborhood_id_neighborhood = neighborhoodTableClass::ID;
$neighborhood_description_neighborhood = neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD;
$neighborhood_borough_neighborhood = neighborhoodTableClass::BOROUGH_ID_BOROUGH;
/** ACCESS INSTANCES * */
$access_id_access = accessTableClass::ID;
$access_description_access = accessTableClass::ACCESS_DESCRIPTION;
/** PETS POLICY INSTANCES * */
$pets_policy_id_pets_policy = petsPolicyTableClass::ID;
$pets_policy_description_pets_policy = petsPolicyTableClass::DESCRIPTION_PETS_CASE;
/** LISTING TYPE INSTANCES * */
$listing_type_id_listing_type = listingTypeTableClass::ID;
$listing_type_description_listing_type = listingTypeTableClass::DESCRIPTION_LISTING_TYPE;
/** SUPER INSTANCES * */
$super_first_name = superTableClass::SUPER_FIRST_NAME;
$super_middle_name = superTableClass::SUPER_MIDDLE_NAME;
$super_last_name = superTableClass::SUPER_LAST_NAME;
$super_email_address = superTableClass::SUPER_EMAIL_ADDRESS;
$super_phone_number = superTableClass::SUPER_PHONE_NUMBER;
$super_notes = superTableClass::SUPER_NOTES;
/** BUILDING FEATURES INSTANCES* */
$building_feature_id_outdoor_space = buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE;
$building_features_id_age = buildingFeaturesTableClass::AGE_ID_AGE;
$building_features_id_doorman = buildingFeaturesTableClass::ID_DORMAN;
$building_features_id_building_type = buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE;
/** OUTDOOR SPACE INSTANCES * */
$outdoor_space_id_outdoor_space = outdoorSpaceTableClass::ID;
$outdoor_space_description_outdoor_space = outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE;
/** DOORMAN INSTANCES * */
$doorman_id_doorman = doormanTableClass::ID;
$doorman_description_doorman = doormanTableClass::DESCRIPTION_DOORMAN;
/** BUILDING TYPE INSTANCES * */
$building_type_id_building_type = buildingTypeTableClass::ID;
$building_type_description_building_type = buildingTypeTableClass::DESCRIPTION_BUILDING_TYPE;
$building_amenities_amenity_status = buildingAmenitiesTableClass::AMENITY_STATUS;
/** AGE INSTANCES * */
$age_id_age = ageTableClass::ID;
$age_description_age = ageTableClass::DESCRIPTION_AGE;
/** BUILDING AMENITIES INSTANCES * */
$building_amenities_id_building_amenities = buildingAmenitiesTableClass::ID;
$building_amenities_id_amenities_building_amenities = buildingAmenitiesTableClass::AMENITIES_ID_AMENITIES;
/** AMENITIES INSTANCES * */
$amenities_id_amenities = amenitiesTableClass::ID;
$amenities_description_amenities = amenitiesTableClass::DESCRIPTION_AMENITIES;
?>
<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">

                            <div class=" hidden-xs x_title">
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Edit Building (<?php echo strtoupper(buildingTableClass::getBuildingAddress(mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Edit Building </br>(<?php echo strtoupper(buildingTableClass::getBuildingAddress(mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                foreach ($objBuilding as $building):
                                  ?>
                                  <form id="editBuilding" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("building", "update", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>">
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
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true) ?>" <?php echo (!empty($building->$building_name)) ? 'value="' . $building->$building_name . '"' : ''; ?> placeholder="Enter building name" >
                                              <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>"> Landlord</label>

                                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true) ?>" class="form-control" required>
                                                  <?php
                                                  foreach ($objLandlords as $landlord):
                                                    ?>
                                                    <?php if ($building->$id_landlord === $landlord->$landlord_id) { ?>
                                                      <option value="<?php echo $building->$id_landlord ?>" selected>ACTIVE: <?php echo $landlord->$landlord_name; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $landlord->$landlord_id ?>" ><?php echo $landlord->$landlord_name; ?></option>
                                                    <?php } ?>
                                                    <?php
                                                  endforeach;
                                                  ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>"> Address</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDRESS, true) ?>"  onFocus="geolocate()" <?php echo (!empty($building->$building_address)) ? 'value="' . $building->$building_address . '"' : ''; ?>  placeholder="Enter Address (street # or P.O BOX)" >
                                              <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>"> Cross Address (if applicable)</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true) ?>" <?php echo (!empty($building->$building_cross_address)) ? 'value="' . $building->$building_cross_address . '"' : ''; ?> placeholder="Enter Cross Address (if Applicable)" >
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::CITY, true) ?>"> City </label>
                                              <input type="text" class="form-control has-feedback-left" id="locality" name="<?php echo buildingTableClass::getNameField(buildingTableClass::CITY, true) ?>" <?php echo (!empty($building->$building_city)) ? 'value="' . $building->$building_city . '"' : ''; ?>  placeholder="Enter City" >
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true) ?>"> State</label>

                                              <select id="" name="<?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true) ?>" class="form-control" required>
                                                  <option value="">Select State</option>  
                                                  <?php foreach ($objStates as $state): ?>
                                                    <?php if ($building->$building_state_id === $state->$state_id_state) { ?>
                                                      <option value="<?php echo $state->$state_id_state ?>" selected> ACTIVE: <?php echo $state->$state_accron_state . ' - ' . $state->$state_name_state; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $state->$state_id_state ?>"><?php echo $state->$state_accron_state . ' - ' . $state->$state_name_state; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>

                                          </div>

                                          <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true) ?>"> Zip Code (5 digits)</label>
                                              <input type="text" class=" form-control has-feedback-left zipcode_mask" id="postal_code" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true) ?>" maxlength="5" <?php echo (!empty($building->$building_zipcode)) ? 'value="' . $building->$building_zipcode . '"' : ''; ?> placeholder="Enter zip code (5 digits)"  >
                                              <span class="form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>"> Zip Code (4 digits)</label>
                                              <input type="text" class="form-control has-feedback-left addon_zipcode_mask" id="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true) ?>" maxlength="4" <?php echo (!empty($building->$building_addon_codes_zipcode)) ? 'value="' . $building->$building_addon_codes_zipcode . '"' : ''; ?> placeholder="Enter zip code (4 digits)" required>
                                              <span class="form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>"> Neighborhood</label>

                                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true) ?>" class="form-control" required>
                                                  <option value="">Select Neighborhood</option>   
                                                  <?php
                                                  foreach ($objNeighborhoods as $neighborhood):
                                                    ?>
                                                    <?php if ($building->$id_neighborhood === $neighborhood->$neighborhood_id_neighborhood) { ?>
                                                      <option value="<?php echo $neighborhood->$neighborhood_id_neighborhood ?>" selected> ACTIVE: <?php echo boroughTableClass::getBoroughName($neighborhood->$neighborhood_borough_neighborhood) . '-' . $neighborhood->$neighborhood_description_neighborhood; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $neighborhood->$neighborhood_id_neighborhood ?>" ><?php echo boroughTableClass::getBoroughName($neighborhood->$neighborhood_borough_neighborhood) . '-' . $neighborhood->$neighborhood_description_neighborhood; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>

                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>">Access</label>

                                              <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>" class="form-control" required>
                                                  <option value="">Select Access</option>  
                                                  <?php foreach ($objAccess as $access): ?>
                                                    <?php if ($building->$id_access === $access->$access_id_access) { ?>
                                                      <option value="<?php echo $access->$access_id_access ?>" selected>ACTIVE: <?php echo $access->$access_description_access; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $access->$access_id_access ?>"><?php echo $access->$access_description_access; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>

                                          </div>
                                          <div id="lockbox_code" style='<?php
                                          if ($building->$id_access == 1) {
                                            echo "display: block;'";
                                          } else {
                                            echo "display: none";
                                          }
                                          ?>' class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>"> Lockbox Code</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingBaseTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>" <?php echo (!empty($building->$lockbox_code)) ? 'value="' . $building->$lockbox_code . '"' : ''; ?> placeholder="Enter lockbox code" >
                                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>"> Notes</label>
                                              <textarea class="form-control has-feedback-left" id="" name="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>" rows="5" placeholder="Take a note ..." ><?php echo (!empty($building->$notes_building)) ? $building->$notes_building : ''; ?></textarea>
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
                                                      <?php foreach ($objPetsPolicy as $petspolicy): ?>
                                                        <?php if ($building->$id_pets_policy === $petspolicy->$pets_policy_id_pets_policy) { ?>
                                                          <option value="<?php echo $petspolicy->$pets_policy_id_pets_policy ?>" selected> ACTIVE: <?php echo $petspolicy->$pets_policy_description_pets_policy; ?></option>
                                                        <?php } else { ?>
                                                          <option value="<?php echo $petspolicy->$pets_policy_id_pets_policy ?>"><?php echo $petspolicy->$pets_policy_description_pets_policy; ?></option>
                                                        <?php } ?>
                                                      <?php endforeach; ?>
                                                  </select>

                                              </div>

                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>"> Listing Policy</label>

                                                  <select id="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true); ?>" class="form-control" required>
                                                      <option value="">Select Policy</option>  
                                                      <?php foreach ($objListingType as $listingType): ?>
                                                        <?php if ($building->$id_listing_policy === $listingType->$listing_type_id_listing_type) { ?>
                                                          <option value="<?php echo $listingType->$listing_type_id_listing_type ?>" selected>ACTIVE: <?php echo $listingType->$listing_type_description_listing_type; ?></option>
                                                        <?php } else { ?>
                                                          <option value="<?php echo $listingType->$listing_type_id_listing_type ?>"><?php echo $listingType->$listing_type_description_listing_type; ?></option>
                                                        <?php } ?>
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
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true) ?>" <?php echo (!empty($objSuper[0]->$super_first_name)) ? 'value="' . $objSuper[0]->$super_first_name . '"' : ''; ?> placeholder="Enter Super first name" >
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true); ?>"> Middle Name (if applicable)</label>
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true) ?>" <?php echo (!empty($objSuper[0]->$super_middle_name)) ? 'value="' . $objSuper[0]->$super_middle_name . '"' : ''; ?> placeholder="Enter super middle name (if applicable)">
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true); ?>"> Last Name(s)</label>
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true) ?>" <?php echo (!empty($objSuper[0]->$super_last_name)) ? 'value="' . $objSuper[0]->$super_last_name . '"' : ''; ?> placeholder="Enter super last name(s)" >
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true); ?>"> Email Address (if applicable)</label>
                                                      <input type="email" class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true) ?>" <?php echo (!empty($objSuper[0]->$super_email_address)) ? 'value="' . $objSuper[0]->$super_email_address . '"' : ''; ?> placeholder="Enter email address (if applicable)">
                                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                                  <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true); ?>"> Phone Number</label>
                                                      <input type="text" class="phone form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true) ?>" <?php echo (!empty($objSuper[0]->$super_phone_number)) ? 'value="' . $objSuper[0]->$super_phone_number . '"' : ''; ?> placeholder="Enter phone number" >
                                                      <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true); ?>"> Notes</label>
                                                      <textarea class="form-control has-feedback-left" id="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true) ?>" name="<?php echo superTableClass::getNameField(superTableClass::SUPER_NOTES, true) ?>" rows="5" placeholder="Take a note ..." ><?php echo (!empty($objSuper[0]->$super_notes)) ? $objSuper[0]->$super_notes : ''; ?></textarea>
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
                                                          <?php foreach ($objOutdoorSpace as $outdoor_space): ?>
                                                            <?php if ($objBuildingFeatures[0]->$building_feature_id_outdoor_space === $outdoor_space->$outdoor_space_id_outdoor_space) { ?>
                                                              <option value="<?php echo $objBuildingFeatures[0]->$building_feature_id_outdoor_space ?>" selected> ACTIVE: <?php echo $outdoor_space->$outdoor_space_description_outdoor_space; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $outdoor_space->$outdoor_space_id_outdoor_space ?>"><?php echo $outdoor_space->$outdoor_space_description_outdoor_space; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>"> Doorman</label>

                                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true); ?>" class="form-control" required>
                                                          <option value="">Select Option</option>  
                                                          <?php foreach ($objDoorman as $doorman): ?>
                                                            <?php if ($objBuildingFeatures[0]->$building_features_id_doorman === $doorman->$doorman_id_doorman) { ?>
                                                              <option value="<?php echo $objBuildingFeatures[0]->$building_features_id_doorman ?>" selected> ACTIVE: <?php echo $doorman->$doorman_description_doorman; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $doorman->$doorman_id_doorman ?>"><?php echo $doorman->$doorman_description_doorman; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>
                                              </div>
                                              <div class="row form-group">
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>"> Building Type</label>

                                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true); ?>" class="form-control" required>
                                                          <option value="">Select Type</option>  
                                                          <?php foreach ($objBuildingType as $buildingType): ?>
                                                            <?php if ($objBuildingFeatures[0]->$building_features_id_building_type === $buildingType->$building_type_id_building_type) { ?>
                                                              <option value="<?php echo $objBuildingFeatures[0]->$building_features_id_building_type ?>" selected> ACTIVE: <?php echo $buildingType->$building_type_description_building_type; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $buildingType->$building_type_id_building_type ?>"><?php echo $buildingType->$building_type_description_building_type; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>"> Age</label>

                                                      <select id="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>" name="<?php echo buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true); ?>" class="form-control" required>
                                                          <option value="">Select Option</option>  
                                                          <?php foreach ($objAge as $age): ?>
                                                            <?php if ($objBuildingFeatures[0]->$building_features_id_age === $age->$age_id_age) { ?>
                                                              <option value="<?php echo $objBuildingFeatures[0]->$building_features_id_age ?>" selected> ACTIVE: <?php echo $age->$age_description_age; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $age->$age_id_age ?>"><?php echo $age->$age_description_age; ?></option>
                                                            <?php } ?>

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
                                                  $i = 1;
                                                  $a = 0;
                                                  foreach ($objAmenities as $amenity):
                                                    ?>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">
                                                            <div class="material-switch">
                                                                <input id="<?php echo amenitiesTableClass::getNameField (amenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo amenitiesTableClass::getNameField (amenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$amenities_id_amenities; ?>" type="checkbox" <?php if ($objBuildingAmenities[$a]->$building_amenities_amenity_status === 1) { echo "checked"; } ?>/>
                                                                <label for="<?php echo amenitiesTableClass::getNameField (amenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                <span> <b><?php echo $amenity->$amenities_description_amenities; ?> </b> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $a++;
                                                    $i++;
                                                  endforeach;
                                                  ?>
                                              </div>

                                          </div>
                                      </div>

                                      <div class="ln_solid"></div>
                                      <div class="form-group">
                                          <div class="text-center">
                                              <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Building</button>
                                          </div>
                                      </div>

                                  </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {
                              $('#editBuilding').formValidation({
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
//                                              notEmpty: {
//                                                  message: 'The Address is required'
//                                              },
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

<?php echo buildingTableClass::getNameField(buildingTableClass::STATE_ID, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'The State is required'
                                              }
                                          }
                                      },

<?php echo buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true); ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The Zip code is required'
//                                              },
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

//                              $("#lockbox_code").hide();

                              var access = $("#<?php echo buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true) ?>");
                              access.change(function () {
                                  var id_access = access.val();
                                  if (id_access == 1) {
                                      $("#lockbox_code").show();
                                  } else {
                                      $("#lockbox_code").hide();
                                  }
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

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
<?php echo view::includePartial("partials/footer") ?>

</div>
</div>