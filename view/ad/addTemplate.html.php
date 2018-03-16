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
$listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
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
$listing_status = listingTableClass::STATUS;

/** BUILDING INSTANCES * */
$building_id_pets_policy = buildingTableClass::ID_PETS_POLICY;
$id_building_features = buildingTableClass::ID_BUILDING_FEATURES;

/* * LANDLORD INSTANCES * */
$landlord_hash = landlordTableClass::LANDLORD_HASH;
/** PETS POLICY INSTANCES * */
$pets_policy_id_pets_policy = petsPolicyTableClass::ID;
$pets_policy_description_pets_policy = petsPolicyTableClass::DESCRIPTION_PETS_CASE;
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

/** LISTING FEATURES INSTANCES* */
$listing_feature_id_outdoor_space = listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE;
$listing_features_id_floor_type = listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE;
$listing_features_id_layout = listingFeaturesTableClass::LAYOUT_ID_LAYOUT;
/** FLOOR TYPE INSTANCES * */
$floor_type_id = floorTypeTableClass::ID;
$floor_type_description = floorTypeTableClass::DESCRIPTION_FLOOR_TYPE;
/** LAYOUT INSTANCES * */
$layout_id = layoutTableClass::ID;
$layout_description = layoutTableClass::DESCRIPTION_LAYOUT;
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
                                <h2><i class="fa fa-bullhorn" aria-hidden="true"></i> Create Listing Ad for <?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-bullhorn" aria-hidden="true"></i> Create Listing Ad for </br><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">

                                        </div>
                                    </div>
                                </div>

                                <form id="create_listing_ad" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "create"); ?>">


                                    <p><small>Fields marked with (*) are mandatory.</small></p>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true); ?>"> Title</label>
                                            <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" placeholder="Enter Ad Title" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Rent</label>
                                            <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"  <?php echo (!empty($objListing[0]->$listing_rent)) ? 'value="' . $objListing[0]->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="list-group">
                                                <li class="list-group-item">
                                                    <p class="list-group-item-text"> Beds / Size: <b><button  class=" mdl-button mdl-js-button mdl-button--primary" type="button"> <?php echo listingSizeTableClass::getListingSizeByID($objListing[0]->$listing_size_id) ?></button></b> </p>
                                                </li>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                            <div class="list-group">
                                                <li class="list-group-item">
                                                    <div class="switch-guest-item">
                                                        <div class="material-switch">
                                                            <label for="nofee" class="label-bohemia"></label>
                                                            <span> <b>No Fee (OP) </b> </span>
                                                            <input id="nofee"  name="nofee" value="1" type="checkbox"/>

                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-bohemia">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Listings Ad Description</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Description </label>
                                                    <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Virtual Tour Link</label>
                                            <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" placeholder="Enter Apt #/Unit #" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>">Status</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" class="form-control" required>
                                                <option value="">Select Status </option>  
                                                <option value="1">Active </option>  
                                                <option value="0">Inactive </option>  
                                            </select>
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
                                                      <?php if ($objBuilding[0]->$building_id_pets_policy === $petspolicy->$pets_policy_id_pets_policy) { ?>
                                                        <option value="<?php echo $petspolicy->$pets_policy_id_pets_policy ?>" selected> ACTIVE: <?php echo $petspolicy->$pets_policy_description_pets_policy; ?></option>
                                                      <?php } else { ?>
                                                        <option value="<?php echo $petspolicy->$pets_policy_id_pets_policy ?>"><?php echo $petspolicy->$pets_policy_description_pets_policy; ?></option>
                                                      <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
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
                                                              <input id="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$amenities_id_amenities; ?>" type="checkbox" <?php
                                                              if ($objBuildingAmenities[$a]->$building_amenities_amenity_status === 1) {
                                                                echo "checked";
                                                              }
                                                              ?>/>
                                                              <label for="<?php echo amenitiesTableClass::getNameField(amenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
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

                                    <div class="panel panel-bohemia">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Apartment Features</h3>
                                        </div>
                                        <div class="panel-body">

                                            <div class="row form-group">
                                                <p><small>Fields marked with (*) are mandatory.</small></p>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                    <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>">Floor Type</label>
                                                    <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" class="form-control" required>
                                                        <option value="">Select Floor Type</option>  
                                                        <?php foreach ($objFloorType as $floorType): ?>
                                                          <?php if ($objListingFeatures[0]->$listing_features_id_floor_type === $floorType->$floor_type_id) { ?>
                                                            <option value="<?php echo $objListingFeatures[0]->$listing_features_id_floor_type ?>" selected> ACTIVE: <?php echo $floorType->$floor_type_description; ?></option>
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
                                                          <?php if ($objListingFeatures[0]->$listing_features_id_floor_type === $outdoor_space->$outdoor_space_id_outdoor_space) { ?>
                                                            <option value="<?php echo $objListingFeatures[0]->$listing_feature_id_outdoor_space ?>" selected> ACTIVE: <?php echo $outdoor_space->$outdoor_space_description_outdoor_space; ?></option>
                                                          <?php } else { ?>
                                                            <option value="<?php echo $outdoor_space->$outdoor_space_id_outdoor_space ?>"><?php echo $outdoor_space->$outdoor_space_description_outdoor_space; ?></option>
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
                                                          <?php if ($objListingFeatures[0]->$listing_features_id_floor_type === $layout->$layout_id) { ?>
                                                            <option value="<?php echo $objListingFeatures[0]->$listing_features_id_layout ?>" selected> ACTIVE: <?php echo $layout->$layout_description; ?></option>
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
                                            <h3 class="panel-title">Apartment Amenities</h3>
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
                                                              <input id="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$rental_amenities_id; ?>" type="checkbox" <?php
                                                              if ($objListingAmenities[$a]->$listing_amenities_amenity_status === 1) {
                                                                echo "checked";
                                                              }
                                                              ?>/>
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
                                        <p><small>You will be able to add photos after clicking "Go" button below.</small></p>
                                        <div class="text-center">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "account") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addListing"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Go</button>
                                        </div>
                                    </div>

                                </form>


                                <script>
                                  $(document).ready(function () {

                                      CKEDITOR.replace('<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>', {
                                          customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
                                      });
                                      $('#create_listing_ad').formValidation({
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

                                      var landlord_select = $("#<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>");
                                      landlord_select.change(function () {
                                          var idLandlord = landlord_select.val();
                                          var urlajax = url + 'listing/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('landlord_id_selected=' + idLandlord),
                                              success: function (data) {
                                                  $('#building_field').fadeOut(300);
                                                  $("#building_dropdown").show();
                                                  $("#building_dropdown").html(data);
                                              }
                                          });
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