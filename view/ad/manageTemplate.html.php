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

/* * LANDLORD INSTANCES * */
$landlord_hash = landlordTableClass::LANDLORD_HASH;

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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Listing <?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage Listing </br><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_id))) . ', UNIT: ' . $objListing[0]->$listing_unit_number; ?></h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objListing[0]->$listing_landlord_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back to Manage Landlord</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alertbrg alert-dismissible" role="alert">
                                    <p>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Click on each panel to display more information.<br>
                                    </p>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    <b> Basic Info</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                                foreach ($objListing as $listing):
                                                  ?>
                                                  <div class="panel panel-success">
                                                      <div class="panel-body">
                                                          <div class="row">
                                                              <div class="btn-group  btn-group-sm pull-right">
                                                                  <div class="col-md-12 col-sm-12 col-xs-12">

                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "edit", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-edit" aria-hidden="true"></i> <b>Edit Listing</b></a>

                                                                      <?php if ($listing->$listing_status == "1") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                                                      <?php } elseif ($listing->$listing_status == "2") { ?>
                                                                        <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                                                      <?php } elseif ($listing->$listing_status == "3") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                                                      <?php } else { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                                      <?php } ?>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div><br>
                                                  <table id="listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Listing Information </td>
                                                          </tr>

                                                          <tr>
                                                              <td><b>LANDLORD</b></td>
                                                              <td><?php echo strtoupper(landlordTableClass::getLandlordNameById($listing->$listing_landlord_id)); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($listing->$listing_landlord_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING</b></td> 
                                                              <td><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>APT# / UNIT#</b></td> 
                                                              <td><?php echo $listing->$listing_unit_number; ?> </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>RENT</b></td> 
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $listing->$listing_rent; ?> USD</button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># BEDS</b></td>
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($listing->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># BATHS</b></td>
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $listing->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>OP 
                                                                      <div id="tt3" class="icon material-icons">error</div>
                                                                      <div class="mdl-tooltip" data-mdl-for="tt3">
                                                                          <strong>Owner Pays</strong>
                                                                      </div>
                                                                  </b>
                                                              </td>
                                                              <td>
                                                                  <?php if ($listing->$listing_fee_op == "custom") { ?>
                                                                    <b><?php echo $listing->$listing_fee_op ?>: </b> <?php echo $listing->$listing_custom_fee_op; ?>
                                                                    <?php
                                                                  } else {
                                                                    echo $listing->$listing_fee_op;
                                                                  }
                                                                  ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING STATUS</b></td>
                                                              <td>
                                                                  <?php if ($listing->$listing_status == "1") { ?>
                                                                    <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                                                  <?php } elseif ($listing->$listing_status == "2") { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                                                  <?php } elseif ($listing->$listing_status == "3") { ?>
                                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                                                  <?php } else { ?>
                                                                    <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LEASE TERMS (Months)</b></td>
                                                              <td>
                                                                  <?php if (!empty($listing->$listing_lease_start) && !empty($listing->$listing_lease_end)) { ?>
                                                                    <?php echo $listing->$listing_lease_start; ?> - <?php echo $listing->$listing_lease_end; ?> (Months)
                                                                  <?php } else { ?>
                                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> NO LEASE TERMS ASSIGNED</button>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ACCESS</b></td>
                                                              <td>
                                                                  <?php if ($listing->$listing_id_access === 1) { ?>
                                                                    <?php echo accessTableClass::getAccessName($listing->$listing_id_access); ?>-<b>Lockbox Code: </b>  <?php echo $listing->$listing_lockbox_code; ?>
                                                                    <?php
                                                                  } else {
                                                                    echo accessTableClass::getAccessName($listing->$listing_id_access);
                                                                  }
                                                                  ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>FLOOR</b></td>
                                                              <td><?php echo $listing->$listing_floor_number; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td>
                                                                  <?php if (empty($listing->$listing_notes)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                                                  <?php } else { ?>
                                                                    <?php echo $listing->$listing_notes; ?></td>
                                                              <?php } ?>
                                                          </tr>

                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifications </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>SEND NOTIFICATION EMAIL TO AGENTS?</b></td>
                                                              <td>
                                                                  <?php if ($listing->$listing_email_notification_status == '1') { ?>
                                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--primary">   <i class="fa fa-bell-o" aria-hidden="true"></i> YES </button>
                                                                  <?php } elseif ($listing->$listing_email_notification_status == '0') {
                                                                    ?>
                                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--danger">  <i class="fa fa-bell-slash-o" aria-hidden="true"></i> NO</button>
                                                                  <?php } ?>
                                                              </td>

                                                          </tr>


                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-phone" aria-hidden="true"></i> Contact Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b> NAME</b></td>
                                                              <td><?php echo $listing->$listing_contact_first_name; ?> <?php echo (empty($listing->$listing_contact_middle_name)) ? $listing->$listing_contact_middle_name : ''; ?> <?php echo $listing->$listing_contact_last_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>EMAIL ADDRESS</b></td>
                                                              <td>
                                                                  <?php if (empty($listing->$listing_contact_email_address)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Email Address Added</button>
                                                                  <?php } else { ?>
                                                                    <a href="mailto:<?php echo $listing->$listing_contact_email_address; ?>"> <i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $listing->$listing_contact_email_address; ?></a>
                                                                  <?php } ?>
                                                                  
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PHONE</b></td>
                                                              <td>
                                                                  <?php if (empty($listing->$listing_contact_phone_number)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Phone Number Added</button>
                                                                  <?php } else { ?>
                                                                    <a href="tel:<?php echo $listing->$listing_contact_phone_number; ?>"> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $listing->$listing_contact_phone_number; ?></a>
                                                                  <?php } ?>
                                                                  
                                                                  </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td>
                                                                  <?php if (empty($listing->$listing_contact_notes)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                                                  <?php } else { ?>
                                                                    <?php echo $listing->$listing_contact_notes; ?>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-plus-square" aria-hidden="true"></i> Listing Features  </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>OUTDOOR SPACE</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo outdoorSpaceTableClass::getOutdoorSpaceName($objListingFeatures[0]->$listing_feature_id_outdoor_space); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>FlOOR TYPE</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo floorTypeTableClass::getFloorTypeName($objListingFeatures[0]->$listing_features_id_floor_type); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LAYOUT</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo layoutTableClass::getLayoutName($objListingFeatures[0]->$listing_features_id_layout); ?></button></td>
                                                          </tr>
                                                          

                                                          <?php
                                                        endforeach;
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" class="table_title"> <i class="fa fa-building-o" aria-hidden="true"></i> Listing Amenities  </td>
                                                        </tr>

                                                        <?php if (empty($objListingAmenities)) { ?>
                                                      </tbody>
                                                  </table>


                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Listing Amenities found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "edit", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Edit Listing</b></a><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                } else {
                                                  ?>
                                                  <?php
                                                  $i = 0;
                                                  $group = 0;
                                                  foreach ($objRentalAmenities as $rental_amenity):
                                                    ?>
                                                    <?php if ($group == 0) { ?>
                                                  <tr class="hidden-xs">
                                                        <?php } ?>
                                                        <td>
                                                            <?php if ($objListingAmenities[$i]->$listing_amenities_amenity_status === 1) { ?>
                                                              <button type="button" class="mdl-button mdl-js-button mdl-button--primary">
                                                                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo rentalAmenitiesTableClass::getRentalAmenitiesName($rental_amenity->$rental_amenities_id); ?></b> 
                                                              </button>
                                                            <?php } else { ?>
                                                              <button type="button" class="mdl-button mdl-js-button">
                                                                  <i class="fa fa-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo rentalAmenitiesTableClass::getRentalAmenitiesName($rental_amenity->$rental_amenities_id); ?></b> 
                                                              </button>
                                                            <?php } ?> 
                                                        </td>
                                                        <?php
                                                        $group++;
                                                        if ($group == 2) {
                                                          ?>
                                                      </tr>

                                                      <?php
                                                      $group = 0;
                                                    }
                                                    $i++;
                                                  endforeach;
                                                  ?>
                                                      <?php
                                                  $i = 0;
                                                  $group = 0;
                                                  foreach ($objRentalAmenities as $rental_amenity):
                                                    ?>
                                                    <?php if ($group == 0) { ?>
                                                      <tr class="visible-xs">
                                                        <?php } ?>
                                                        <td colspan="2">
                                                            <?php if ($objListingAmenities[$i]->$listing_amenities_amenity_status === 1) { ?>
                                                              <button type="button" class="mdl-button mdl-js-button mdl-button--primary">
                                                                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo rentalAmenitiesTableClass::getRentalAmenitiesName($rental_amenity->$rental_amenities_id); ?></b> 
                                                              </button>
                                                            <?php } else { ?>
                                                              <button type="button" class="mdl-button mdl-js-button">
                                                                  <i class="fa fa-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo rentalAmenitiesTableClass::getRentalAmenitiesName($rental_amenity->$rental_amenities_id); ?></b> 
                                                              </button>
                                                            <?php } ?> 
                                                        </td>
                                                        <?php
                                                        $group++;
                                                        if ($group == 1) {
                                                          ?>
                                                      </tr>

                                                      <?php
                                                      $group = 0;
                                                    }
                                                    $i++;
                                                  endforeach;
                                                  ?>
                                                  </tbody>
                                                  </table>
                                                <?php } ?></br>
                                                <div class="page-title-bohemia">
                                                    <h4>  <i class="fa fa-bullhorn" aria-hidden="true"></i><b> Listing Description</b></h4>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <?php echo $objListing[0]->$listing_description; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    <b>Ads</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="btn-group  btn-group-sm pull-right">
                                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objListing[0]->$listing_landlord_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Assign</a>
                                       
                                                             <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objListing[0]->$listing_landlord_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Sindication Log</a>
                                       
                                                        </div>

                                                    </div>
                                                </div><br>

                                               

                                                <table id="listing_ads" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Web ID</th>
                                                            <th>Listing ID</th>
                                                            <th>Address</th>
                                                            <th>Channel Type</th>
                                                            <th>Assigned To</th>
                                                            <th>Created At</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($objListing)) { ?>

                                                      <div class="alert alert-info alert-dismissible" role = "alert">
                                                          <p class = "text-center">
                                                              <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Ads found. </b><button data-hash="<?php echo landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord); ?>" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_listing" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> Assign</b></button><br>
                                                          </p>
                                                      </div>
                                                      <?php
                                                    } else {
                                                      ?>
                                                      <?php
                                                      foreach ($objListing as $listing):
                                                        ?>
                                                        <tr> 
                                                            <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php  ?></button></td>
                                                            <td><button  class="mdl-button mdl-js-button mdl-button" type="button"><?php ?></button></td>
                                                            <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> </button></td>
                                                            <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php  ?></button></td>
                                                            <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> </button></td>
                                                            <td><?php ?></td>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Preview</a>
                                                                <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                                <button  disabled class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button" data-toggle="tooltip" data-placement="top" title="delete Listing <?php echo buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)); ?> , <?php echo $listing->$listing_unit_number; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                                            </td>
                                                        </tr>
                                                        <?php
                                                      endforeach;
                                                      ?>
                                                    <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Web ID</th>
                                                            <th>Listing ID</th>
                                                            <th>Address</th>
                                                            <th>Channel Type</th>
                                                            <th>Assigned To</th>
                                                            <th>Created At</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-muted font-13 m-b-30">
                                    Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                </p>


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