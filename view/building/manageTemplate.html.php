<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

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
$building_sync_id = buildingTableClass::SYNC_ID_SYNC;
/** SUPER INSTANCES * */
$super_email_address = superTableClass::SUPER_EMAIL_ADDRESS;
$super_phone_number = superTableClass::SUPER_PHONE_NUMBER;
$super_notes = superTableClass::SUPER_NOTES;
/** BUILDING FEATURES INSTANCES* */
$building_feature_id_outdoor_space = buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE;
$building_features_id_age = buildingFeaturesTableClass::AGE_ID_AGE;
$building_features_id_doorman = buildingFeaturesTableClass::ID_DORMAN;
$building_features_id_building_type = buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE;
/** BUILDING AMENITIES INSTANCES * */
$building_amenities_id = buildingAmenitiesTableClass::ID;
$building_amenities_id_amenities = buildingAmenitiesTableClass::AMENITIES_ID_AMENITIES;
$building_amenities_amenity_status = buildingAmenitiesTableClass::AMENITY_STATUS;
/** AMENITIES INSTANCES * */
$amenities_id = amenitiesTableClass::ID;
$amenities_description = amenitiesTableClass::DESCRIPTION_AMENITIES;
/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
$listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
$listing_status = listingTableClass::STATUS;
$listing_listing_hash = listingTableClass::LISTING_HASH;
$listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
/* * LANDLORD INSTANCES * */
$landlord_hash = landlordTableClass::LANDLORD_HASH;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Building (<?php echo strtoupper(buildingTableClass::getBuildingAddress(mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage Building </br>(<?php echo strtoupper(buildingTableClass::getBuildingAddress(mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back to Manage Landlord</a>
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
                                                foreach ($objBuilding as $building):
                                                  ?>
                                                  <div class="panel panel-success">
                                                      <div class="panel-body">
                                                          <div class="row">
                                                              <div class="btn-group  btn-group-sm pull-right">
                                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                                      <?php
                                                                      $building_sync_source_id = syncTableClass::getSyncSource($building->$building_sync_id);
                                                                      if ($building_sync_source_id == "2") {
                                                                        ?>
                                                                        <button class="mdl-button mdl-js-button mdl-button--info"  type="button"> <i class="fa fa-spinner fa-spin" aria-hidden="true"></i> <B>SYNCED FROM :</b> NESTIO </button>
                                                                      <?php } ?>

                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("neighborhood", "index") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> <b>Manage Neighborhoods</b></a>
                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("building", "edit", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-edit" aria-hidden="true"></i> <b>Edit Building</b></a>

                                                                      <?php if ($building->$building_status == "1") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> ACTIVE</button>
                                                                      <?php } elseif ($building->$building_status == "0") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> INACTIVE</button>
                                                                      <?php } else { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                                      <?php } ?>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div><br>
                                                  <table id="building" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Building Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING NAME</b></td>
                                                              <td><?php
                                                                  if (empty($building->$building_name)) {
                                                                    ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  NO NAME SET</button> <a href="<?php echo routing::getInstance()->getUrlWeb("building", "edit", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Edit Building</b></a>
                                                                    <?php
                                                                  } else {
                                                                    echo strtoupper($building->$building_name);
                                                                  }
                                                                  ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LANDLORD</b></td>
                                                              <td><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord))); ?>"  ><?php echo strtoupper(landlordTableClass::getLandlordNameById($building->$id_landlord)); ?></a> <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ADDRESS</b></td> 
                                                              <td><?php echo $building->$building_address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CROSS ADDRESS</b></td> 
                                                              <td><?php echo $building->$building_cross_address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CITY</b></td>
                                                              <td><?php echo $building->$building_city; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>STATE</b></td>
                                                              <td><?php echo statesTableClass::getStateName($building->$building_state_id); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ZIPCODE (5 digits)</b></td>
                                                              <td><?php echo $building->$building_zipcode; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ZIPCODE (4 digits)</b></td>
                                                              <td><?php echo $building->$building_addon_codes_zipcode; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NEIGHBORHHOOD</b></td>
                                                              <td><?php echo neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("neighborhood", "index") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> <b>Manage</b></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ACCESS</b></td>
                                                              <td>
                                                                  <?php if ($building->$id_access === 1) { ?>
                                                                    <?php echo accessTableClass::getAccessName($building->$id_access); ?>-<b>Lockbox Code: </b>  <?php echo $building->$lockbox_code; ?>
                                                                    <?php
                                                                  } else {
                                                                    echo accessTableClass::getAccessName($building->$id_access);
                                                                  }
                                                                  ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td>
                                                                  <?php if (empty($building->$notes_building)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                                                  <?php } else { ?>
                                                                    <?php echo $building->$notes_building; ?></td>
                                                              <?php } ?>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-file-text-o"></i> Building Policy </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PETS POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo petsPolicyTableClass::getPetsPolicyName($building->$id_pets_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo listingTypeTableClass::getListingTypeName($building->$id_listing_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-phone" aria-hidden="true"></i> Super Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b> NAME</b></td>
                                                              <td><?php echo superTableClass::getSuperName($building->$id_super); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>EMAIL ADDRESS</b></td>
                                                              <td><a href="mailto:<?php echo $objSuper[0]->$super_email_address; ?>"><?php echo $objSuper[0]->$super_email_address; ?></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PHONE</b></td>
                                                              <td><a href="tel:<?php echo $objSuper[0]->$super_phone_number; ?>"><?php echo $objSuper[0]->$super_phone_number; ?></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td>
                                                                  <?php if (empty($objSuper[0]->$super_notes)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                                                  <?php } else { ?>
                                                                    <?php echo $objSuper[0]->$super_notes; ?></td>
                                                              <?php } ?>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-plus-square" aria-hidden="true"></i> Building Features  </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>OUTDOOR SPACE</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo outdoorSpaceTableClass::getOutdoorSpaceName($objBuildingFeatures[0]->$building_feature_id_outdoor_space); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>DOORMAN</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo doormanTableClass::getDoormanName($objBuildingFeatures[0]->$building_features_id_doorman); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING TYPE</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo buildingTypeTableClass::getBuildingTypeName($objBuildingFeatures[0]->$building_features_id_building_type); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>AGE</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo ageTableClass::getAgeName($objBuildingFeatures[0]->$building_features_id_age); ?></button></td>
                                                          </tr>
                                                          <?php
                                                        endforeach;
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" class="table_title"> <i class="fa fa-building-o" aria-hidden="true"></i> Building Amenities  </td>
                                                        </tr>
                                                        <?php if (empty($objBuildingAmenities)) { ?>
                                                      </tbody>
                                                  </table>
                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Building Amenities found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("building", "edit", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true)))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Edit Building</b></a><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                } else {
                                                  ?>
                                                  <?php
                                                  $i = 0;
                                                  $group = 0;
                                                  foreach ($objAmenities as $amenity):
                                                    ?>
                                                    <?php if ($group == 0) { ?>
                                                      <tr class="hidden-xs">
                                                        <?php } ?>
                                                        <td>

                                                            <?php if ($objBuildingAmenities[$i]->$building_amenities_amenity_status === 1) { ?>
                                                              <button type="button" class="mdl-button mdl-js-button mdl-button--primary">
                                                                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo amenitiesTableClass::getAmenitiesName($amenity->$amenities_id); ?></b> 
                                                              </button>
                                                            <?php } else { ?>
                                                              <button type="button" class="mdl-button mdl-js-button">
                                                                  <i class="fa fa-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo amenitiesTableClass::getAmenitiesName($amenity->$amenities_id); ?></b> 
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
                                                  foreach ($objAmenities as $amenity):
                                                    ?>
                                                    <?php if ($group == 0) { ?>
                                                      <tr class="visible-xs">
                                                        <?php } ?>
                                                        <td  colspan="2">

                                                            <?php if ($objBuildingAmenities[$i]->$building_amenities_amenity_status === 1) { ?>
                                                              <button type="button" class="mdl-button mdl-js-button mdl-button--primary">
                                                                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo amenitiesTableClass::getAmenitiesName($amenity->$amenities_id); ?></b> 
                                                              </button>
                                                            <?php } else { ?>
                                                              <button type="button" class="mdl-button mdl-js-button">
                                                                  <i class="fa fa-square-o" aria-hidden="true"></i>
                                                                  <b><?php echo amenitiesTableClass::getAmenitiesName($amenity->$amenities_id); ?></b> 
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
                                                <?php } ?>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    <b>Apartments</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="btn-group  btn-group-sm pull-right">
                                                            <button data-hash="<?php echo landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_listing" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Listing</b></button>
                                                        </div>

                                                    </div>
                                                </div><br>

                                                <?php if (empty($objListings)) { ?>

                                                  <div class = "alert alert-info alert-dismissible" role = "alert">
                                                      <p class = "text-center">
                                                          <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Apartments found. </b><button data-hash = "<?php echo \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)); ?>" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark btnAdd_listing" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b>New Listing</b></button><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                }
                                                ?>
                                                <div class="alert alertbrg alert-dismissible" role="alert">
                                                    <p>
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Listings with Label color <span class="label label-info">N</span>   are syncing from Nestio.<br>
                                                    </p>
                                                    <p>
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Listings with Label color <span class="label" style="background-color: #ffd6d5;"> OLA </span>   are Open with Listing Agent.<br>
                                                    </p>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="form-row">
                                                            <div class="row ">
                                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                                    <label class=""for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>">Listing Status</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                                        <option value="">Select Option</option>
                                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $objBuilding[0]->$building_hash, listingTableClass::getNameField(listingTableClass::STATUS, true) => "Available")); ?>" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Available") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Available") ? 'SELECTED: ' : ''; ?> Available</option>
                                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $objBuilding[0]->$building_hash, listingTableClass::getNameField(listingTableClass::STATUS, true) => "Unavailable")); ?>" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Unavailable") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Unavailable") ? 'SELECTED: ' : ''; ?> Unavailable</option> 
                                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $objBuilding[0]->$building_hash, listingTableClass::getNameField(listingTableClass::STATUS, true) => "Pending")); ?>" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Pending") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "Pending") ? 'SELECTED: ' : ''; ?> Pending</option>  
                                                                    </select>

                                                                </div>

                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $objBuilding[0]->$building_hash)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                                                </div>

                                                            </div>
                                                        </div></br>
                                                    </div>
                                                </div>
                                                <div id="addApartment_panel"></div></br>

                                                <table id="apartments" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="filter"> ID</th>
                                                            <th class="filter">Neighborhood</th>
                                                            <th class="filter">Address</th>
                                                            <th class="filter">Unit #</th>
                                                            <th class="filter">Rent</th>
                                                            <th class="filter"># Beds</th>
                                                            <th class="filter"># Baths</th>
                                                            <th>Landlord</th>
                                                            <th class="filter">Status</th>
                                                            <th>Updated At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th> ID</th>
                                                            <th>Neighborhood</th>
                                                            <th>Address</th>
                                                            <th>Unit #</th>
                                                            <th>Rent</th>
                                                            <th># Beds</th>
                                                            <th># Baths</th>
                                                            <th>Landlord</th>
                                                            <th>Status</th>
                                                            <th> Updated At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                  $(document).ready(function () {
                                      //
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
                                      $.fn.dataTable.pipeline = function (opts) {
                                          // Configuration options
                                          var conf = $.extend({
                                              pages: 5, // number of pages to cache
                                              url: 'ajax?manage_listings=<?php echo $objBuilding[0]->$building_id; ?><?php
                                                if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {
                                                  echo '&' . listingTableClass::getNameField(listingTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
                                                }
                                                ?>', // script url
                                              data: null, // function or object with parameters to send to the server
                                              // matching how `ajax.data` works in DataTables
                                              method: 'GET' // Ajax HTTP method
                                          }, opts);

                                          // Private variables for storing the cache
                                          var cacheLower = -1;
                                          var cacheUpper = null;
                                          var cacheLastRequest = null;
                                          var cacheLastJson = null;

                                          return function (request, drawCallback, settings) {
                                              var ajax = false;
                                              var requestStart = request.start;
                                              var drawStart = request.start;
                                              var requestLength = request.length;
                                              var requestEnd = requestStart + requestLength;

                                              if (settings.clearCache) {
                                                  // API requested that the cache be cleared
                                                  ajax = true;
                                                  settings.clearCache = false;
                                              } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
                                                  // outside cached data - need to make a request
                                                  ajax = true;
                                              } else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
                                                      JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
                                                      JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
                                                      ) {
                                                  // properties changed (ordering, columns, searching)
                                                  ajax = true;
                                              }

                                              // Store the request for checking next time around
                                              cacheLastRequest = $.extend(true, {}, request);

                                              if (ajax) {
                                                  // Need data from the server
                                                  if (requestStart < cacheLower) {
                                                      requestStart = requestStart - (requestLength * (conf.pages - 1));

                                                      if (requestStart < 0) {
                                                          requestStart = 0;
                                                      }
                                                  }

                                                  cacheLower = requestStart;
                                                  cacheUpper = requestStart + (requestLength * conf.pages);

                                                  request.start = requestStart;
                                                  request.length = requestLength * conf.pages;

                                                  // Provide the same `data` options as DataTables.
                                                  if ($.isFunction(conf.data)) {
                                                      // As a function it is executed with the data object as an arg
                                                      // for manipulation. If an object is returned, it is used as the
                                                      // data object to submit
                                                      var d = conf.data(request);
                                                      if (d) {
                                                          $.extend(request, d);
                                                      }
                                                  } else if ($.isPlainObject(conf.data)) {
                                                      // As an object, the data given extends the default
                                                      $.extend(request, conf.data);
                                                  }

                                                  settings.jqXHR = $.ajax({
                                                      "type": conf.method,
                                                      "url": conf.url,
                                                      "data": request,
                                                      "dataType": "json",
                                                      "cache": false,
                                                      "success": function (json) {
                                                          cacheLastJson = $.extend(true, {}, json);

                                                          if (cacheLower != drawStart) {
                                                              json.data.splice(0, drawStart - cacheLower);
                                                          }
                                                          if (requestLength >= -1) {
                                                              json.data.splice(requestLength, json.data.length);
                                                          }

                                                          drawCallback(json);
                                                      }
                                                  });
                                              } else {
                                                  json = $.extend(true, {}, cacheLastJson);
                                                  json.draw = request.draw; // Update the echo for each response
                                                  json.data.splice(0, requestStart - cacheLower);
                                                  json.data.splice(requestLength, json.data.length);

                                                  drawCallback(json);
                                              }
                                          }
                                      };

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
                                      $.fn.dataTable.Api.register('clearPipeline()', function () {
                                          return this.iterator('table', function (settings) {
                                              settings.clearCache = true;
                                          });
                                      });
                                      //LISTINGS TABLE SETTINGS 
                                      $('#apartments').DataTable({
                                          responsive: true,
                                          "pageLength": 100,
                                          "order": [0, 'DESC'],
                                          "ajax": $.fn.dataTable.pipeline({
                                              url: "ajax?manage_listings=<?php echo $objBuilding[0]->$building_id; ?><?php
                                                if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {
                                                  echo '&' . listingTableClass::getNameField(listingTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
                                                }
                                                ?>",
                                              type: "GET",
                                              pages: 5 // number of pages to cache
                                          }),
                                          "deferRender": true,
                                          initComplete: function () {
                                              this.api().columns(".filter").every(function () {
                                                  var column = this;
                                                  var select = $('<select><option value=""> Filter Option </option></select>')
                                                          .appendTo($(column.header()).empty())
                                                          .on('change', function () {
                                                              var val = $.fn.dataTable.util.escapeRegex(
                                                                      $(this).val()
                                                                      );

                                                              column.search(val ? '^' + val + '$' : '', true, false)
                                                                      .draw();
                                                          });

                                                  column.data().unique().sort().each(function (d, j) {
                                                      var String = d.substring(d.indexOf('">') + 2, d.lastIndexOf('</'));
                                                      select.append('<option value="' + String + '"> ' + String + ' </option>');
                                                  });
                                              });
                                          }
                                      });

                                      $table = $('table#apartments').DataTable();

                                      $table.on('click', 'button.btnUpdate_user', function () {
                                          var idUser = $(this).data("id");
                                          var urlajax = url + 'users/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('userID=' + idUser),
                                              success: function (data) {

                                                  $('#addUser_panel').fadeOut(300);
                                                  $('#deleteUser_panel').fadeOut(300);
                                                  $("#user_update_panel").show();
                                                  $('html, body').animate({scrollTop: $('#user_update_panel').offset().top}, 'slow');
                                                  $("#user_update_panel").html(data);
                                              }
                                          });
                                      });

                                      $table.on('click', 'button.btnDelete_user', function () {
                                          var idUser = $(this).data("id");
                                          var urlajax = url + 'users/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('deleteUser=' + idUser),
                                              success: function (data) {

                                                  $('#addUser_panel').fadeOut(300);
                                                  $('#user_update_panel').fadeOut(300);
                                                  $("#deleteUser_panel").show();
                                                  $('html, body').animate({scrollTop: $('#deleteUser_panel').offset().top}, 'slow');
                                                  $("#deleteUser_panel").html(data);
                                              }
                                          });
                                      });

                                      var btnAdd_listing = $(".btnAdd_listing");
                                      $(btnAdd_listing).on('click', function () {
                                          var landlord_hash = $(this).data("hash");
                                          var urlajax = url + 'listing/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('addListing=' + landlord_hash),
                                              success: function (data) {
                                                  $('#deleteApartment_panel').fadeOut(300);
                                                  $("#addApartment_panel").show();
                                                  $('html, body').animate({scrollTop: $('#addApartment_panel').offset().top}, 'slow');
                                                  $("#addApartment_panel").html(data);
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