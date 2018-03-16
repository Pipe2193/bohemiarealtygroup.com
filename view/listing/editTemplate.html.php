<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
$listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
$listing_fee_op = listingTableClass::FEE_OP_LISTING;
$listing_custom_fee_op = listingTableClass::CUSTOM_FEE_OP_LISTING;
$listing_lease_start = listingTableClass::LEASE_TERM_START;
$listing_lease_end = listingTableClass::LEASE_TERM_END;
$listing_floor_number = listingTableClass::FLOOR_NUMBER_LISTING;
$listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
$listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
$listing_email_notification_status = listingTableClass::EMAIL_NOTIFICATION_STATUS;
$listing_description = listingTableClass::DESCRIPTION_LISTING;
$listing_notes = listingTableClass::NOTES_LISTING;
$listing_contact_first_name = listingTableClass::CONTACT_FIRST_NAME;
$listing_contact_middle_name = listingTableClass::CONTACT_MIDDLE_NAME;
$listing_contact_last_name = listingTableClass::CONTACT_LAST_NAME;
$listing_contact_phone_number = listingTableClass::CONTACT_PHONE_NUMBER;
$listing_contact_email_address = listingTableClass::CONTACT_EMAIL_ADDRESS;
$listing_contact_notes = listingTableClass::CONTACT_NOTES;
$listing_status = listingTableClass::STATUS;
/** LISTING FEATURES INSTANCES * */
$listing_features_floor_type_id = listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE;
$listing_features_outdoor_space_id = listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE;
$listing_features_layout_id = listingFeaturesTableClass::LAYOUT_ID_LAYOUT;
/* * LANDLORD INSTANCES * */
$landlord_hash = landlordTableClass::LANDLORD_HASH;
$landlord_id = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
/** BUILDINGS INSTANCES* */
$building_id = buildingTableClass::ID;
$building_address = buildingTableClass::ADDRESS;
/** LISTING SIZE INSTANCES * */
$listing_size_id = listingSizeTableClass::ID;
$listing_size_description = listingSizeTableClass::DESCRIPTION_LISTING_SIZE;
/** ACCESS INSTANCES * */
$access_id = accessTableClass::ID;
$access_description = accessTableClass::ACCESS_DESCRIPTION;
/** FLOOR TYPE INSTANCES * */
$floor_type_id = floorTypeTableClass::ID;
$floor_type_description = floorTypeTableClass::DESCRIPTION_FLOOR_TYPE;
/** OUTDOOR SPACE INSTANCES * */
$outdoor_space_id = outdoorSpaceTableClass::ID;
$outdoor_space_description = outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE;
/** LAYOUT INSTANCES * */
$layout_id = layoutTableClass::ID;
$layout_description = layoutTableClass::DESCRIPTION_LAYOUT;
/** LISTING FEATURES INSTANCES* */
$listing_feature_id_outdoor_space = listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE;
$listing_features_id_floor_type = listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE;
$listing_features_id_layout = listingFeaturesTableClass::LAYOUT_ID_LAYOUT;
/** LISTING AMENITIES INSTANCES * */
$listing_amenities_id = listingAmenitiesTableClass::ID;
$listing_amenities_id_amenities = listingAmenitiesTableClass::RENTAL_AMENITIES_ID_RENTAL_AMENITIES;
$listing_amenities_amenity_status = listingAmenitiesTableClass::RENTAL_AMENITY_STATUS;
/** RENTAL AMENITIES INSTANCES * */
$rental_amenities_id = rentalAmenitiesTableClass::ID;
$rental_amenities_description = rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Edit Listing <?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Edit Listing </br><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => listingTableClass::getListingHashById($objListing[0]->$listing_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back to Manage Listing</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                foreach ($objListing as $listing):
                                  ?>
                                <form id="editlisting" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "update", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))); ?>">


                                      <p><small>Fields marked with (*) are mandatory.</small></p>
                                      <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true); ?>"> Landlord</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" class="form-control" required>
                                                  <?php
                                                  foreach ($objLandlords as $landlord):
                                                    ?>
                                                    <?php if ($listing->$listing_landlord_id === $landlord->$landlord_id) { ?>
                                                      <option value="<?php echo $listing->$listing_landlord_id ?>" selected disabled >ACTIVE: <?php echo $landlord->$landlord_name; ?></option>
                                                    <?php } ?>
                                                    <?php
                                                  endforeach;
                                                  ?>
                                              </select>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control" required>
                                                  <option value="">Select Building</option>    
                                                  <?php
                                                  foreach ($objBuildings as $building):
                                                    ?>
                                                    <?php if ($listing->$listing_building_id === $building->$building_id) { ?>
                                                      <option value="<?php echo $listing->$listing_building_id ?>" selected disabled >ACTIVE: <?php echo $building->$building_address; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $building->$building_id ?>" ><?php echo $building->$building_address; ?></option>
                                                    <?php } ?>
                                                    <?php
                                                  endforeach;
                                                  ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Apt#/Unit #</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" <?php echo (!empty($listing->$listing_unit_number)) ? 'value="' . $listing->$listing_unit_number . '"' : ''; ?> placeholder="Enter Apt #/Unit #" required>
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Rent</label>
                                              <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" <?php echo (!empty($listing->$listing_rent)) ? 'value="' . $listing->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                              <label class="control-label col-md-2 col-sm-2 col-xs-12"> Beds</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                                  <option value="">Select Option </option>  
                                                  <?php foreach ($objListingSize as $size): ?>
                                                    <?php if ($listing->$listing_listing_size_id === $size->$listing_size_id) { ?>
                                                      <option value="<?php echo $listing->$listing_listing_size_id; ?>" selected>ACTIVE: <?php echo $size->$listing_size_description; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $size->$listing_size_id; ?>"><?php echo $size->$listing_size_description; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>">Baths</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" class="form-control" required>
                                                  <option value="">Select Option </option>
                                                  <option value="1" <?php echo ($listing->$listing_bath_size === "1") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "1") ? 'ACTIVE:' : ''; ?> 1 </option>
                                                  <option value="1.5" <?php echo ($listing->$listing_bath_size === "1.5") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "1.5") ? 'ACTIVE:' : ''; ?> 1.5</option>
                                                  <option value="2" <?php echo ($listing->$listing_bath_size === "2") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "2") ? 'ACTIVE:' : ''; ?> 2 </option>
                                                  <option value="2.5" <?php echo ($listing->$listing_bath_size === "2.5") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "2.5") ? 'ACTIVE:' : ''; ?> 2.5 </option>
                                                  <option value="3" <?php echo ($listing->$listing_bath_size === "3") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "3") ? 'ACTIVE:' : ''; ?> 3 </option>
                                                  <option value="3.5" <?php echo ($listing->$listing_bath_size === "3.5") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "3.5") ? 'ACTIVE:' : ''; ?> 3.5 </option>
                                                  <option value="4 Plus" <?php echo ($listing->$listing_bath_size === "4 Plus") ? 'selected' : ''; ?>><?php echo ($listing->$listing_bath_size === "4 Plus") ? 'ACTIVE:' : ''; ?> 4 Plus </option>
                                              </select>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>">OP</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" class="form-control" required>
                                                  <option value="">Select Option</option>  
                                                  <option value="None" <?php echo ($listing->$listing_fee_op === "None") ? 'selected' : ''; ?>> <?php echo ($listing->$listing_fee_op === "None") ? 'ACTIVE:' : ''; ?> None</option>
                                                  <option value="1/2 Month" <?php echo ($listing->$listing_fee_op === "1/2 Month") ? 'selected' : ''; ?>><?php echo ($listing->$listing_fee_op === "1/2 Month") ? 'ACTIVE:' : ''; ?>1/2 Month</option>  
                                                  <option value="1 Month" <?php echo ($listing->$listing_fee_op === "1 Month") ? 'selected' : ''; ?>><?php echo ($listing->$listing_fee_op === "1 Month") ? 'ACTIVE:' : ''; ?> 1 Month</option>  
                                                  <option value="75%" <?php echo ($listing->$listing_fee_op === "75%") ? 'selected' : ''; ?>> <?php echo ($listing->$listing_fee_op === "75%") ? 'ACTIVE:' : ''; ?> 75%</option>  
                                                  <option value="custom" <?php echo ($listing->$listing_fee_op === "custom") ? 'selected' : ''; ?>><?php echo ($listing->$listing_fee_op === "custom") ? 'ACTIVE:' : ''; ?> Custom</option>  
                                              </select>
                                          </div>
                                          <div id="custom_op" <?php echo ($listing->$listing_fee_op === "custom") ? 'style="display: block !important;"' : ''; ?> class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>">Custom OP</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" <?php echo (!empty($listing->$listing_custom_fee_op)) ? 'value="' . $listing->$listing_custom_fee_op . '"' : ''; ?> placeholder="Enter custom OP" >
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>">Status</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" class="form-control" required>
                                                  <option value="">Select Status </option>  
                                                  <option value="1" <?php echo ($listing->$listing_status === 1) ? 'selected' : ''; ?>><?php echo ($listing->$listing_status === 1) ? 'ACTIVE:' : ''; ?> Available </option>  
                                                  <option value="2" <?php echo ($listing->$listing_status === 2) ? 'selected' : ''; ?>><?php echo ($listing->$listing_status === 2) ? 'ACTIVE:' : ''; ?> Pending </option>  
                                                  <option value="3" <?php echo ($listing->$listing_status === 3) ? 'selected' : ''; ?>><?php echo ($listing->$listing_status === 3) ? 'ACTIVE:' : ''; ?> Unavailable </option> 
                                                  <option value="4" <?php echo ($listing->$listing_status === 4) ? 'selected' : ''; ?>><?php echo ($listing->$listing_status === 4) ? 'ACTIVE:' : ''; ?> Not Specified </option> 
                                              </select>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                              <div class="col-md-5 col-sm-5 col-xs-6 ">
                                                  <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>">Lease Term </label>
                                                  <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" <?php echo (!empty($listing->$listing_lease_start)) ? 'value="' . $listing->$listing_lease_start . '"' : ''; ?> maxlength="4">
                                              </div>
                                              <div class="col-md-5 col-sm-5 col-xs-6 ">
                                                  <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>">(months)</label>
                                                  <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" <?php echo (!empty($listing->$listing_lease_end)) ? 'value="' . $listing->$listing_lease_end . '"' : ''; ?> maxlength="4">
                                              </div>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label class="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>">Access</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" class="form-control" required>
                                                  <option value="">Select Access</option>  
                                                  <?php foreach ($objAccess as $access): ?>
                                                    <?php if ($listing->$listing_id_access === $access->$access_id) { ?>
                                                      <option value="<?php echo $listing->$listing_id_access; ?>" selected>ACTIVE: <?php echo $access->$access_description; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $access->$access_id ?>"><?php echo $access->$access_description; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                          <div id="lockbox_code" <?php echo ($listing->$listing_id_access === 1) ? 'style="display: block !important;"' : ''; ?> class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>">Lockbox Code</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" <?php echo (!empty($listing->$listing_lockbox_code)) ? 'value="' . $listing->$listing_lockbox_code . '"' : ''; ?>  placeholder="Enter lockbox code" >
                                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>"> Floor</label>
                                              <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>"  <?php echo (!empty($listing->$listing_floor_number)) ? 'value="' . $listing->$listing_floor_number . '"' : ''; ?> placeholder="Enter Floor" required>
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email To Agents?</label>
                                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                                  <option value="">Select Option</option>  
                                                  <option value="1" <?php echo ($listing->$listing_email_notification_status === 1) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> Yes</option>  
                                                  <option value="0" <?php echo ($listing->$listing_email_notification_status === 0) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> No</option>  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>"> Notes</label>
                                              <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" rows="5" placeholder="Take a note ..." ><?php echo (!empty($listing->$listing_notes)) ? $listing->$listing_notes : ''; ?></textarea>
                                              <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                      </div>

                                      <div class="panel panel-bohemia">
                                          <div class="panel-heading">
                                              <h3 class="panel-title"> listing Description</h3>
                                          </div>
                                          <div class="panel-body">
                                              <div class="form-group">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Description </label>
                                                      <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required ><?php echo (!empty($listing->$listing_description)) ? $listing->$listing_description : ''; ?></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>

                                      <div class="panel panel-bohemia">
                                          <div class="panel-heading">
                                              <h3 class="panel-title">Listing Features</h3>
                                          </div>
                                          <div class="panel-body">

                                              <div class="row form-group">
                                                  <p><small>Fields marked with (*) are mandatory.</small></p>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>">Floor Type</label>
                                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" class="form-control" required>
                                                          <option value="">Select Floor Type</option>  
                                                          <?php foreach ($objFloorType as $floorType): ?>
                                                            <?php if ($objListingFeatures[0]->$listing_features_floor_type_id === $floorType->$floor_type_id) { ?>
                                                              <option value="<?php echo $objListingFeatures[0]->$listing_features_floor_type_id; ?>" selected>ACTIVE: <?php echo $floorType->$floor_type_description; ?></option>
                                                            <?php } else { ?>      
                                                              <option value="<?php echo $floorType->$floor_type_id ?>"><?php echo $floorType->$floor_type_description; ?></option>
                                                            <?php } ?>  
                                                          <?php endforeach; ?>
                                                      </select>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>">Outdoor Space</label>
                                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" class="form-control" required>
                                                          <option value="">Select Outdoor Space </option>  
                                                          <?php foreach ($objOutdoorSpace as $outdoor_space): ?>
                                                            <?php if ($objListingFeatures[0]->$listing_features_outdoor_space_id === $outdoor_space->$outdoor_space_id) { ?>
                                                              <option value="<?php echo $objListingFeatures[0]->$listing_features_outdoor_space_id; ?>" selected>ACTIVE: <?php echo $outdoor_space->$outdoor_space_description; ?></option>
                                                            <?php } else { ?>    
                                                              <option value="<?php echo $outdoor_space->$outdoor_space_id ?>"><?php echo $outdoor_space->$outdoor_space_description; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="row form-group">
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>">Layout</label>
                                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>" class="form-control" required>
                                                          <option value="">Select Option</option>  
                                                          <?php foreach ($objLayout as $layout): ?>
                                                            <?php if ($objListingFeatures[0]->$listing_features_layout_id === $layout->$layout_id) { ?>
                                                              <option value="<?php echo $objListingFeatures[0]->$listing_features_layout_id; ?>" selected>ACTIVE: <?php echo $layout->$layout_description; ?></option>
                                                            <?php } else { ?>   
                                                              <option value="<?php echo $layout->$layout_id ?>"><?php echo $layout->$layout_description; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>

                                      <div class="panel panel-bohemia">
                                          <div class="panel-heading">
                                              <h3 class="panel-title"> Contact Information (if applicable)</h3>
                                          </div>
                                          <div class="panel-body">
                                              <div class="form-group">
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>"> First Name</label>
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" <?php echo (!empty($listing->$listing_contact_first_name)) ? 'value="' . $listing->$listing_contact_first_name . '"' : ''; ?> placeholder="Enter First Name (if applicable)" >
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>"> Middle Name</label>
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" <?php echo (!empty($listing->$listing_contact_middle_name)) ? 'value="' . $listing->$listing_contact_middle_name . '"' : ''; ?> placeholder="Enter Middle Name (if applicable)">
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>">Last Name</label>
                                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" <?php echo (!empty($listing->$listing_contact_last_name)) ? 'value="' . $listing->$listing_contact_last_name . '"' : ''; ?> placeholder="Enter Last Name (if applicable)" >
                                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                                  <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>"> Phone Number</label>
                                                      <input type="text" class="phone form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" <?php echo (!empty($listing->$listing_contact_phone_number)) ? 'value="' . $listing->$listing_contact_phone_number . '"' : ''; ?> placeholder="Enter Phone Number (if applicable)" >
                                                      <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>"> Email Address</label>
                                                      <input type="email" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" <?php echo (!empty($listing->$listing_contact_email_address)) ? 'value="' . $listing->$listing_contact_email_address . '"' : ''; ?> placeholder="Enter Email Address (if applicable)">
                                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>"> Contact Notes</label>
                                                      <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" rows="5" placeholder="Take a note (if applicable) ..." ><?php echo (!empty($listing->$listing_contact_notes)) ? $listing->$listing_contact_notes : ''; ?></textarea>
                                                      <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>

                                      <div class="panel panel-bohemia">
                                          <div class="panel-heading">
                                              <h3 class="panel-title">Listing Amenities</h3>
                                          </div>
                                          <div class="panel-body">

                                              <div class=" row form-group">
                                                  <?php
                                                  $i = 1;
                                                  $a = 0;
                                                  foreach ($objRentalAmenities as $amenity):
                                                    ?>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">
                                                            <div class="material-switch">
                                                                <input id="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$rental_amenities_id; ?>" type="checkbox" <?php if ($objListingAmenities[$a]->$listing_amenities_amenity_status === 1) { echo "checked"; } ?>/>
                                                                <label for="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                <span> <b><?php echo $amenity->$rental_amenities_description; ?></b> </span>
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
                                              <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => listingTableClass::getListingHashById($objListing[0]->$listing_id))); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Listing</button>
                                          </div>
                                      </div>

                                  </form>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {

                              CKEDITOR.replace('<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>', {
                                  customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
                              });
                              $('#editlisting').formValidation({
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

<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: ' Biuilding is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: ' Landlord is required'
                                              }

                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Unit # is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Rent Price is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: ' Bed # is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'bath # is required'
                                              }
                                          }
                                      },

<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: ' OP is required'
                                              }

                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Status is required'
                                              }

                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Access is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>: {
                                          validators: {
                                              stringLength: {
                                                  max: <?php echo listingTableClass::LOCKBOX_LISTING_LENGTH ?>,
                                                  message: 'The lockbox code must be less than <?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING_LENGTH, true) ?> characters long'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Floor # is required'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'email notification status is required'
                                              }
                                          }
                                      },

<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'listing description is required'
                                              },
                                              stringLength: {
                                                  max: <?php echo listingTableClass::DESCRIPTION_LISTING_LENGTH ?>,
                                                  message: 'listing description must be less than <?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING_LENGTH, true) ?> characters long'
                                              }
                                          }
                                      },
<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Floor Type is required'
                                              }
                                          }
                                      },
<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Outdoor Space is required'
                                              }
                                          }
                                      },
<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'Layout is required'
                                              }
                                          }
                                      },

<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>: {
                                          validators: {
                                              stringLength: {
                                                  max: <?php echo listingTableClass::CONTACT_FIRST_NAME_LENGTH; ?>,
                                                  message: 'First name must be less than <?php echo listingTableClass::CONTACT_FIRST_NAME_LENGTH; ?> characters long'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true); ?>: {
                                          validators: {
                                              stringLength: {
                                                  max: <?php echo listingTableClass::CONTACT_MIDDLE_NAME_LENGTH; ?>,
                                                  message: ' Middle name must be less than <?php echo listingTableClass::CONTACT_MIDDLE_NAME_LENGTH; ?> characters long'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>: {
                                          validators: {
                                              stringLength: {
                                                  max: <?php echo listingTableClass::CONTACT_LAST_NAME_LENGTH; ?>,
                                                  message: 'Last name must be less than <?php echo listingTableClass::CONTACT_LAST_NAME_LENGTH; ?> characters long'
                                              }
                                          }
                                      },

<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true); ?>: {
                                          validators: {
                                              emailAddress: {
                                                  message: 'The value is not a valid email address'
                                              },
                                              regexp: {
                                                  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                                  message: 'The value is not a valid email address'
                                              },
                                              stringLength: {
                                                  max: <?php echo listingTableClass::CONTACT_EMAIL_ADDRESS_LENGTH; ?>,
                                                  message: 'Email address must be less than <?php echo listingTableClass::CONTACT_EMAIL_ADDRESS_LENGTH; ?> characters long'
                                              }
                                          }
                                      },
<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>: {
                                          validators: {
                                              stringLength: {
                                                  max: <?php echo listingTableClass::CONTACT_NOTES_LENGTH; ?>,
                                                  message: 'Contact notes must be less than <?php echo listingTableClass::CONTACT_NOTES_LENGTH; ?> characters long'
                                              }
                                          }
                                      }
                                  }

                              }).find('.phone').mask('(999)-999-9999').find('.zipcode_mask').mask('99999').find('.addon_zipcode_mask').mask('9999');

                              $("#custom_op").hide();

                              var op = $("#<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>");
                              op.change(function () {
                                  var id_op = op.val();
                                  if (id_op == 'custom') {
                                      $("#custom_op").show();
                                  } else {
                                      $("#custom_op").hide();
                                  }
                              });

                              $("#lockbox_code").hide();

                              var access = $("#<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>");
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