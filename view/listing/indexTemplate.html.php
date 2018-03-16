<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_listing_hash = listingTableClass::LISTING_HASH;
/* * LANDLORD INSTANCES* */
$landlordID = landlordTableClass::ID;
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
/** LAYOUT INSTANCES * */
$layout_id = layoutTableClass::ID;
$layout_description = layoutTableClass::DESCRIPTION_LAYOUT;
/**  RENTAL AMENITIES INSTANCES* */
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Add Listing </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Add Listing</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">

                                        </div>
                                    </div>
                                </div>

                                <form id="addlisting" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "create"); ?>">


                                    <p><small>Fields marked with (*) are mandatory.</small></p>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            
                                            <?php if(!empty($objLandlords)){ ?>
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true); ?>"> Landlord</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" class="form-control" required>
                                                <option value="">Select Landlord</option>  
                                                <?php
                                                foreach ($objLandlords as $landlord):
                                                  ?>
                                                  <option value="<?php echo $landlord->$landlordID ?>"><?php echo $landlord->$landlord_name; ?></option>
                                                  <?php
                                                endforeach;
                                                ?>
                                            </select>
                                            <?php }else {
                                              ?>
                                             <div class = "alert alert-info alert-dismissible" role = "alert">
                                                  <p class = "text-center">
                                                      <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Landlords found. </b><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "index") ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b>New Landlord</b></a><br>
                                                  </p>
                                              </div>
                                           <?php } ?>
                                        </div>
                                        <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <div id="building_field">
                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control" required>
                                                    <option value="">Select Landlord First</option>    
                                                </select>
                                            </div>
                                             <div id="building_dropdown"></div>
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Apt#/Unit #</label>
                                            <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" placeholder="Enter Apt #/Unit #" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Rent</label>
                                            <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" placeholder="Enter Rent" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>"> Beds</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                                <option value="">Select Option </option>  
                                                <?php foreach ($objListingSize as $size): ?>
                                                  <option value="<?php echo $size->$listing_size_id; ?>"><?php echo $size->$listing_size_description; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>">Baths</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" class="form-control" required>
                                                <option value="">Select Option </option>
                                                <option value="1"> 1 </option>
                                                <option value="1.5">1.5</option>
                                                <option value="2">2 </option>
                                                <option value="2.5">2.5 </option>
                                                <option value="3">3 </option>
                                                <option value="3.5">3.5 </option>
                                                <option value="4 Plus">4 Plus </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>">OP</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" class="form-control" required>
                                                <option value="">Select Option</option>  
                                                <option value="None">None</option>
                                                <option value="1/2 Month">1/2 Month</option>  
                                                <option value="1 Month">1 Month</option>  
                                                <option value="75%">75%</option>  
                                                <option value="custom">Custom</option>  
                                            </select>
                                        </div>
                                        <div id="custom_op" class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>">Custom OP</label>
                                            <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" placeholder="Enter custom OP" >
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>">Status</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" class="form-control" required>
                                                <option value="">Select Status </option>  
                                                <option value="1">Available </option>  
                                                <option value="2">Pending </option>  
                                                <option value="3">Unavailable </option>
                                                <option value="4">Not Specified </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <div class="col-md-5 col-sm-5 col-xs-6 ">
                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>">Lease Term </label>
                                                <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" maxlength="4">
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-6 ">
                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>">(months)</label>
                                                <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" maxlength="4">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>">Access</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" class="form-control" required>
                                                <option value="">Select Access</option>  
                                                <?php foreach ($objAccess as $access): ?>
                                                  <option value="<?php echo $access->$access_id ?>"><?php echo $access->$access_description; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div id="lockbox_code" class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>">Lockbox Code</label>
                                            <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" placeholder="Enter lockbox code" >
                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>"> Floor</label>
                                            <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>" placeholder="Enter Floor" required>
                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email To Agents?</label>
                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                                <option value="">Select Option</option>  
                                                <option value="1">Yes</option>  
                                                <option value="0">No</option>  
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>"> Notes</label>
                                            <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" rows="5" placeholder="Take a note ..." ></textarea>
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
                                                    <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required ></textarea>
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
                                                          <option value="<?php echo $floorType->$floor_type_id ?>"><?php echo $floorType->$floor_type_description; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>">Outdoor Space</label>
                                                    <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" class="form-control" required>
                                                        <option value="">Select Outdoor Space </option>  
                                                        <?php foreach ($objOutdoorSpace as $outdoor_space): ?>
                                                          <option value="<?php echo $outdoor_space->id_outdoor_space ?>"><?php echo $outdoor_space->description_outdoor_space; ?></option>
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
                                                          <option value="<?php echo $layout->$layout_id ?>"><?php echo $layout->$layout_description; ?></option>
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
                                                    <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" placeholder="Enter First Name (if applicable)" >
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>"> Middle Name</label>
                                                    <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" placeholder="Enter Middle Name (if applicable)">
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>">Last Name</label>
                                                    <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" placeholder="Enter Last Name (if applicable)" >
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>"> Phone Number</label>
                                                    <input type="text" class="phone form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" placeholder="Enter Phone Number (if applicable)" >
                                                    <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>"> Email Address</label>
                                                    <input type="email" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address (if applicable)">
                                                    <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>"> Contact Notes</label>
                                                    <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" rows="5" placeholder="Take a note (if applicable) ..." ></textarea>
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
                                                if (!empty($objRentalAmenities)) {
                                                  $i = 1;
                                                  foreach ($objRentalAmenities as $amenity):
                                                    ?>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">
                                                            <div class="material-switch">
                                                                <input id="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$rental_amenities_id; ?>" type="checkbox"/>
                                                                <label for="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                <span> <b><?php echo $amenity->$rental_amenities_description; ?></b> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $i++;
                                                  endforeach;
                                                }else {
                                                  ?>
                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: there are not listing amenities found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("rentalAmenities", "index") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Listing Amenities</b></a><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addListing"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Listing</button>
                                        </div>
                                    </div>

                                </form>


                                <script>
                                  $(document).ready(function () {

                                      CKEDITOR.replace('<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>', {
                                          customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
                                      });
                                      $('#addlisting').formValidation({
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