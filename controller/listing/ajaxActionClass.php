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
        if (isset($_POST["view_listing"])) {
          $listing_hash = request::getInstance()->getPost("view_listing");

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
              listingTableClass::LOCKBOX_LISTING,
              listingTableClass::FLOOR_NUMBER_LISTING,
              listingTableClass::NOTES_LISTING,
              listingTableClass::DESCRIPTION_LISTING,
              listingTableClass::CONTACT_FIRST_NAME,
              listingTableClass::CONTACT_MIDDLE_NAME,
              listingTableClass::CONTACT_LAST_NAME,
              listingTableClass::CONTACT_EMAIL_ADDRESS,
              listingTableClass::CONTACT_PHONE_NUMBER,
              listingTableClass::CONTACT_NOTES,
              listingTableClass::STATUS,
              listingTableClass::EMAIL_NOTIFICATION_STATUS,
              listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
              listingTableClass::BUILDING_ID_BUILDING,
              listingTableClass::LANDLORD_ID_LANDLORD,
              listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
              listingTableClass::LISTING_HASH,
              listingTableClass::CREATED_AT,
              listingTableClass::UPDATED_AT,
              listingTableClass::SYNC_ID_SYNC
          );
          $where_listing = array(
              listingTableClass::LISTING_HASH => $listing_hash,
          );

          $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);


          /** LISTING FEATURES INFO* */
          $listing_features_fields = array(
              listingFeaturesTableClass::ID,
              listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE,
              listingFeaturesTableClass::LAYOUT_ID_LAYOUT,
              listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE,
              listingFeaturesTableClass::LISTING_FEATURES_HASH,
              listingFeaturesTableClass::CREATED_AT,
              listingFeaturesTableClass::UPDATED_AT
          );
          $where_listing_features = array(
              listingFeaturesTableClass::LISTING_FEATURES_HASH => $listing_hash
          );
          $objListingFeatures = listingFeaturesTableClass::getAll($listing_features_fields, true, null, null, null, null, $where_listing_features);

          /** BUILDING AMENITIES INFO* */
          $listing_amenities_fields = array(
              listingAmenitiesTableClass::ID,
              listingAmenitiesTableClass::RENTAL_AMENITIES_ID_RENTAL_AMENITIES,
              listingAmenitiesTableClass::RENTAL_AMENITY_STATUS,
              listingAmenitiesTableClass::CREATED_AT,
              listingAmenitiesTableClass::UPDATED_AT
          );
          $where_listing_amenities = array(
              listingAmenitiesTableClass::LISTING_AMENITIES_HASH => $listing_hash
          );
          $objListingAmenities = listingAmenitiesTableClass::getAll($listing_amenities_fields, true, null, null, null, null, $where_listing_amenities);

          /** AMENITIES INFO* */
          $rental_amenities_fields = array(
              rentalAmenitiesTableClass::ID,
              rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES,
              rentalAmenitiesTableClass::CREATED_AT,
              rentalAmenitiesTableClass::UPDATED_AT
          );
          $OrderBy_rental_amenities = array(
              rentalAmenitiesTableClass::ID
          );
          $objRentalAmenities = rentalAmenitiesTableClass::getAll($rental_amenities_fields, true, $OrderBy_rental_amenities, 'ASC');

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
          $listing_sync_id = listingTableClass::SYNC_ID_SYNC;
          $listing_hash = listingTableClass::LISTING_HASH;
          $listing_contact_notes = listingTableClass::CONTACT_NOTES;
          $listing_created_at = listingTableClass::CREATED_AT;
          $listing_updated_at = listingTableClass::UPDATED_AT;

          /** LANDLORD INSTANCES * */
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

          $building_hash = buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id);

          /** BUILDING INFO* */
          $building_fields = array(
              buildingTableClass::ID,
              buildingTableClass::DESCRIPTION_BUILDING,
              buildingTableClass::ADDRESS,
              buildingTableClass::CITY,
              buildingTableClass::STATE_ID,
              buildingTableClass::ZIPCODE,
              buildingTableClass::ADDON_CODES_ZIPCODE,
              buildingTableClass::CROSS_ADDRESS,
              buildingTableClass::STATUS,
              buildingTableClass::ID_BUILDING_FEATURES,
              buildingTableClass::ID_LANDLORD,
              buildingTableClass::ID_NEIGHBORHOOD,
              buildingTableClass::NOTES_BUILDING,
              buildingTableClass::BUILDING_HASH,
              buildingTableClass::ID_ACCESS,
              buildingTableClass::LOCKBOX_BUILDING,
              buildingTableClass::ID_LISTING_TYPE,
              buildingTableClass::ID_PETS_POLICY,
              buildingTableClass::ID_SUPER,
              buildingTableClass::CREATED_AT,
              buildingTableClass::UPDATED_AT,
              buildingTableClass::SYNC_ID_SYNC
          );
          $where_buildings = array(
              buildingTableClass::BUILDING_HASH => $building_hash
          );
          $objBuilding = $this->objBuilding = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

          $building_field_id = buildingTableClass::ID;

          $building_id = $objBuilding[0]->$building_field_id;

          /** SUPER INFO* */
          $super_fields = array(
              superTableClass::ID,
              superTableClass::SUPER_EMAIL_ADDRESS,
              superTableClass::SUPER_PHONE_NUMBER,
              superTableClass::SUPER_NOTES,
              superTableClass::SUPER_HASH,
              superTableClass::CREATED_AT,
              superTableClass::UPDATED_AT
          );
          $where_super = array(
              superTableClass::SUPER_HASH => $building_hash
          );
          $objSuper = superTableClass::getAll($super_fields, true, null, null, null, null, $where_super);

          /** BUILDING FEATURES INFO* */
          $building_features_fields = array(
              buildingFeaturesTableClass::ID,
              buildingFeaturesTableClass::ID_DORMAN,
              buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE,
              buildingFeaturesTableClass::AGE_ID_AGE,
              buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE,
              buildingFeaturesTableClass::BUILDING_FEATURES_HASH,
              buildingFeaturesTableClass::CREATED_AT,
              buildingFeaturesTableClass::UPDATED_AT
          );
          $where_building_features = array(
              buildingFeaturesTableClass::BUILDING_FEATURES_HASH => $building_hash
          );
          $objBuildingFeatures = buildingFeaturesTableClass::getAll($building_features_fields, true, null, null, null, null, $where_building_features);

          /** BUILDING AMENITIES INFO* */
          $building_amenities_fields = array(
              buildingAmenitiesTableClass::ID,
              buildingAmenitiesTableClass::AMENITIES_ID_AMENITIES,
              buildingAmenitiesTableClass::AMENITY_STATUS,
              buildingAmenitiesTableClass::CREATED_AT,
              buildingAmenitiesTableClass::UPDATED_AT
          );
          $where_building_amenities = array(
              buildingAmenitiesTableClass::BUILDING_AMENITIES_HASH => $building_hash
          );
          $objBuildingAmenities = buildingAmenitiesTableClass::getAll($building_amenities_fields, true, null, null, null, null, $where_building_amenities);

          /** AMENITIES INFO* */
          $amenities_fields = array(
              amenitiesTableClass::ID,
              amenitiesTableClass::DESCRIPTION_AMENITIES,
              amenitiesTableClass::CREATED_AT,
              amenitiesTableClass::UPDATED_AT
          );
          $OrderBy_amenities = array(
              amenitiesTableClass::ID
          );
          $objAmenities = amenitiesTableClass::getAll($amenities_fields, true, $OrderBy_amenities, 'ASC');

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

          /**
           * Procedures info
           */
          $procedures_fields = array(
              proceduresTableClass::ID,
              proceduresTableClass::CONTENT,
              proceduresTableClass::LANDLORD_ID_LANDLORD,
              proceduresTableClass::CREATED_AT,
              proceduresTableClass::UPDATED_AT
          );
          $where_procedures = array(
              proceduresTableClass::LANDLORD_ID_LANDLORD => $objListing[0]->$listing_landlord_id
          );
          $objProcedures = proceduresTableClass::getAll($procedures_fields, true, null, null, null, null, $where_procedures);

          /**
           * file info
           */
          $files_fields = array(
              fileTableClass::ID,
              fileTableClass::FILE_NAME,
              fileTableClass::FILE_PATH_FILE,
              fileTableClass::FILE_TYPE,
              fileTableClass::META_DESCRIPTION_FILE,
              fileTableClass::LANDLORD_ID_LANDLORD,
              fileTableClass::FILE_HASH,
              fileTableClass::CREATED_AT,
              fileTableClass::UPDATED_AT
          );
          $where_files = array(
              fileTableClass::LANDLORD_ID_LANDLORD => $objListing[0]->$listing_landlord_id
          );
          $objFiles = fileTableClass::getAll($files_fields, true, null, null, null, null, $where_files);

          /** PROCEDURES INSTANCES * */
          $procedures_id = proceduresTableClass::ID;
          $procedures_landlord_id_landlord = proceduresBaseTableClass::LANDLORD_ID_LANDLORD;
          $procedures_content = proceduresTableClass::CONTENT;
          $procedures_updated_at = proceduresTableClass::UPDATED_AT;
          ?>
          <script>
            $(document).ready(function () {
                $('#view_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="view_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> <i class="fa fa-eye" aria-hidden="true"></i> View Listing  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b>ID #<?php echo $objListing[0]->$listing_id; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#overview"><b> Overview</b></a></li>
                              <li><a data-toggle="tab" href="#apt_features"><b>Apt Listings</b></a></li>
                              <li><a data-toggle="tab" href="#building_features"><b>Building Listings</b></a></li>
                              <li><a data-toggle="tab" href="#map_listing"><b>Map</b></a></li>
                              <li><a data-toggle="tab" href="#procedures_listing"><b>Procedures</b></a></li>
                              <li><a data-toggle="tab" href="#documents_listing"><b>Documents (Applications, Leases, Others)</b></a></li>
                          </ul>

                          <div class="tab-content">
                              <div id="overview" class="tab-pane fade in active">
                                  </br>
                                  <?php
                                  foreach ($objListing as $listing):
                                    ?>
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="btn-group  btn-group-sm pull-right">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                                        <?php if ($listing->$listing_status == "1") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                                        <?php } elseif ($listing->$listing_status == "2") { ?>
                                                          <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                                        <?php } elseif ($listing->$listing_status == "3") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                                        <?php } elseif ($listing->$listing_status == "4") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--info" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NOT SPECIFIED</button>
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
                                                <td><b>ID</b></td> 
                                                <td><button  class="mdl-button mdl-js-button" type="button"><?php echo $listing->$listing_id; ?></button></td>
                                            </tr>
                                            <tr>
                                                <td><b>LANDLORD</b></td>
                                                <td><?php echo strtoupper(landlordTableClass::getLandlordNameById($listing->$listing_landlord_id)); ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b>BUILDING</b></td> 
                                                <td><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?> </td>
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
                                                <td><b>CREATED AT</b></td>
                                                <td><?php echo $listing->$listing_created_at; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>UPDATED AT</b></td>
                                                <td><?php echo $listing->$listing_updated_at; ?></td>
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

                                            <?php
                                          endforeach;
                                          ?>
                                      </tbody>
                                  </table>

                                  <div class="page-title-bohemia">
                                      <h4>  <i class="fa fa-bullhorn" aria-hidden="true"></i><b> Listing Description</b></h4>
                                  </div>
                                  <div class="panel panel-success">
                                      <div class="panel-body">
                                          <?php if (!empty($objListing[0]->$listing_description)) { ?>
                                            <?php echo $objListing[0]->$listing_description; ?>
                                          <?php } else { ?>
                                            <div class="alert alert-info alert-dismissible" role = "alert">
                                                <p class = "text-center">
                                                    <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There is no Listing description found. </b><br>
                                                </p>
                                            </div>
                                          <?php } ?>
                                      </div>
                                  </div>
                              </div>
                              <div id="apt_features" class="tab-pane fade">
                                  </br>
                                  <?php foreach ($objListing as $listing): ?>
                                    <table id="apts_listing_features" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                        <tbody>
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
                                  <?php endforeach; ?>
                              </div>
                              <div id="building_features" class="tab-pane fade">
                                  </br>
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

                                                        <?php if ($building->$building_status == "1") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>BUILDING STATUS:</b> ACTIVE</button>
                                                        <?php } elseif ($building->$building_status == "0") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>BUILDING STATUS:</b> INACTIVE</button>
                                                        <?php } else { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>BUILDING STATUS:</b> NO STATUS</button>
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
                                                      <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  NO NAME SET</button>
                                                      <?php
                                                    } else {
                                                      echo strtoupper($building->$building_name);
                                                    }
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>LANDLORD</b></td>
                                                <td><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objBuilding[0]->$id_landlord))); ?>"  ><?php echo strtoupper(landlordTableClass::getLandlordNameById($building->$id_landlord)); ?></a> </td>
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
                                                <td><?php echo neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood); ?> </td>
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
                              <div id="map_listing" class="tab-pane fade">
                                  <table id="map" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                      <tbody>
                                          <tr>
                                              <td colspan="2" class="table_title"> <i class="fa fa-map-marker" aria-hidden="true"></i> Map  </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo mvc\config\myConfigClass::getGoogleMapsAPI(); ?>&q=<?php echo $objBuilding[0]->$building_address . ',' . $objBuilding[0]->$building_city . ',' . $objBuilding[0]->$building_zipcode ?>" allowfullscreen></iframe>

                                              </td>
                                          </tr>

                                      </tbody>
                                  </table>
                              </div>
                              <div id="procedures_listing" class="tab-pane fade">
                                  </br>
                                  <?php if (empty($objProcedures)) { ?>

                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <p class="text-center">
                                            <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Procedures found. </b> <br>
                                        </p>
                                    </div>
                                    <?php
                                  } else {
                                    ?>

                                    <?php foreach ($objProcedures as $procedures): ?>
                                      <div class="panel panel-success">
                                          <div class="panel-body">
                                              <div class="row">
                                                  <div class="btn-group  btn-group-sm pull-right">
                                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                                          <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>LAST UPDATE AT:</b> <?php echo $procedures->$procedures_updated_at; ?></button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>
                                      <div class="container">
                                          <?php echo $procedures->$procedures_content; ?>
                                      </div>
                                      <div class="ln_solid"></div>

                                    <?php endforeach; ?>
                                  <?php } ?>
                              </div>
                              <div id="documents_listing" class="tab-pane fade">
                                  </br>
                                  <?php if (empty($objFiles)) { ?>

                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <p class="text-center">
                                            <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Documents found. </b><br>
                                        </p>
                                    </div>
                                    <?php
                                  }
                                  ?>
                                  <table id="documents" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                          <tr>
                                              <th class="filter"> ID</th>
                                              <th>File Name</th>
                                              <th> Description</th>
                                              <th class="filter"> File Type</th>
                                              <th>Created At</th>
                                              <th>Updated At</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>

                                      <tfoot>
                                          <tr>
                                              <th class="filter"> ID</th>
                                              <th>File Name</th>
                                              <th> Description</th>
                                              <th class="filter"> File Type</th>
                                              <th>Created At</th>
                                              <th>Updated At</th>
                                              <th>Actions</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                          <script>
                            $(document).ready(function () {
                                //DOCUMENTS TABLE SETTINGS 
                                $('#documents').DataTable({
                                    responsive: true,
                                    "pageLength": 25,
                                    "order": [0, 'DESC'],
                                    "ajax": {
                                        url: "../documents/ajax?manage_files=<?php echo $objListing[0]->$listing_landlord_id; ?>",
                                        type: "GET"
                                    },
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

                                                        column
                                                                .search(val ? '^' + val + '$' : '', true, false)
                                                                .draw();
                                                    });

                                            column.data().unique().sort().each(function (d, j) {
                                                var String = d.substring(d.indexOf('">') + 2, d.lastIndexOf('</'));
                                                select.append('<option value="' + String + '"> ' + String + ' </option>');
                                            });
                                        });
                                    }
                                });

                                $documents = $('table#documents').DataTable();



                                $documents.on('click', 'button.btnEdit_document', function () {
                                    var document_hash = $(this).data("hash");
                                    var urlajax = url + 'documents/ajax';
                                    $.ajax({
                                        async: true,
                                        type: "POST",
                                        dataType: "html",
                                        contentType: "application/x-www-form-urlencoded",
                                        url: urlajax,
                                        data: ('edit_document_hash=' + document_hash),
                                        success: function (data) {

                                            $("#edit_document_panel").show();
                                            //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                            $("#edit_document_panel").html(data);
                                        }
                                    });
                                });
                            });
                          </script>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * my listings info
       */
      if (request::getInstance()->isMethod('GET')) {
        if (request::getInstance()->hasGet('account')) {
          /**
           * Listing Assignment info
           */
          $listing_assignment_fields = array(
              listingAssignmentTableClass::ID,
              listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH,
              listingAssignmentTableClass::LISTING_ID_LISTING,
              listingAssignmentTableClass::USUARIO_ID,
              listingAssignmentTableClass::STATUS,
              listingAssignmentTableClass::CREATED_AT,
              listingAssignmentTableClass::UPDATED_AT
          );
          $where_listing_assignment = array(
              listingAssignmentTableClass::USUARIO_ID => session::getInstance()->getUserId(),
              listingAssignmentTableClass::STATUS => 1
          );

          $objListingAssignments = listingAssignmentTableClass::getAll($listing_assignment_fields, true, null, 'DESC', null, null, $where_listing_assignment);

          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_rent = listingTableClass::RENT_LISTING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_status = listingTableClass::STATUS;
          $listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
          $listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
          $listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
          $listing_listing_hash = listingTableClass::LISTING_HASH;
          $listing_sync_id = listingTableClass::SYNC_ID_SYNC;
          /** BUILDING INSTANCES * */
          $building_id_super = buildingTableClass::ID_SUPER;
          /** LISTING ASSIGNMENT INSTANCES * */
          $listing_id_listing = listingAssignmentTableClass::LISTING_ID_LISTING;
          $listing_usuario_id = listingAssignmentTableClass::USUARIO_ID;
          $listing_assignment_hash = listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH;

          foreach ($objListingAssignments as $listing) {

            $objListing = listingTableClass::getListingById($listing->$listing_id_listing);

            if (!$objListing[0]->$listing_id == null) {

              $listing_sync_source_id = syncTableClass::getSyncSource($objListing[0]->$listing_sync_id);
              if ($listing_sync_source_id == 2) {
                $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($objListing[0]->$listing_landlord_id);
                if ($landlord_listing_type_ll == 4) {
                  $assigned_listing_id = ' <div class="label label-info"> N </div><div class="label" style="background-color: #ffd6d5;"> OLA </div> <button class="mdl-button mdl-js-button"  type="button">' . $objListing[0]->$listing_id . ' </button>';
                } else {
                  $assigned_listing_id = '<div class="label label-info"> N </div><button class="mdl-button mdl-js-button"  type="button">' . $objListing[0]->$listing_id . ' </button>';
                }
              } else {
                $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($objListing[0]->$listing_landlord_id);

                if ($landlord_listing_type_ll == 4) {
                  $assigned_listing_id = '<div class="label" style="background-color: #ffd6d5;"> OLA </div>  <button class="mdl-button mdl-js-button"  type="button"> ' . $objListing[0]->$listing_id . ' </button>';
                } else {
                  $assigned_listing_id = '<button class="mdl-button mdl-js-button"  type="button">' . $objListing[0]->$listing_id . ' </button>';
                }
              }

              $neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button">' . neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($objListing[0]->$listing_building_id)) . ' </button></td>';
              $address_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id)) . ' </button>';
              $listing_unit_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button">' . $objListing[0]->$listing_unit_number . ' </button>';
              $listing_rent_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$ ' . $objListing[0]->$listing_rent . ' USD </button>';
              $listing_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . listingSizeTableClass::getListingSizeByID($objListing[0]->$listing_size_id) . ' </button>';
              $listing_bath_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $objListing[0]->$listing_bath_size . ' </button>';
              $listing_landlord_field = '<a href = "' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objListing[0]->$listing_landlord_id))) . '"> ' . landlordTableClass::getLandlordNameById($objListing[0]->$listing_landlord_id) . ' </a>';
              $listing_user_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                      <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
                      <span class="mdl-chip__text"> ' . profileTableClass::getProfileByUserId(listingManagerTableClass::getListingManagerUserId(landlordTableClass::getLandlordListingManager($objListing[0]->$listing_landlord_id))) . '</span>
                  </span> ';
              if ($objListing[0]->$listing_status == "1") {
                $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
              } elseif ($objListing[0]->$listing_status == "2") {
                $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
              } elseif ($objListing[0]->$listing_status == "3") {
                $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
              } elseif ($objListing[0]->$listing_status == "4") {
                $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NOT SPECIFIED </button>';
              } else {
                $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS </button>';
              }
              $actions = '';
              $actions .= '<button data-hash = "' . $listing->$listing_assignment_hash . '" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnUnassign_listing" type = "button"> Unassign</button>';
              $actions .= '<button data-hash="' . $objListing[0]->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnView_listing" type="button"><i class="fa fa-eye" aria-hidden="true"></i> View </button>';
              $actions .= '<a href="' . routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $objListing[0]->$listing_listing_hash)) . '" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type = "button"><i class = "fa fa-server" aria-hidden = "true"></i> Manage </a>';
              $actions .= '<a href = "' . routing::getInstance()->getUrlWeb("ad", "add", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $objListing[0]->$listing_listing_hash)) . '" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary " type = "button"> Create Ad</a>';

              $subdata = array();
              $subdata[] = $assigned_listing_id;
              $subdata[] = $neighborhood_field;
              $subdata[] = $address_field;
              $subdata[] = $listing_unit_field;
              $subdata[] = $listing_rent_field;
              $subdata[] = $listing_size_field;
              $subdata[] = $listing_bath_field;
              $subdata[] = $listing_landlord_field;
              $subdata[] = $listing_user_field;
              $subdata[] = $listing_status_field;
              $subdata[] = $actions;
              $data[] = $subdata;
            }
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }


          $json_data = array(
              "draw" => intval(request::getInstance()->getGet('draw')),
              "recordsTotal" => intval(count($objListingAssignments)),
              "recordsFiltered" => intval(count($objListingAssignments)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      /**
       * show info super parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["notes_listing_hash"])) {
          $listing_hash = request::getInstance()->getPost("notes_listing_hash");

          $listing_fields = array(
              listingTableClass::ID,
              listingTableClass::NOTES_LISTING,
              listingTableClass::LISTING_HASH
          );
          $where = array(
              listingTableClass::LISTING_HASH => $listing_hash
          );
          $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where);
          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_notes = listingTableClass::NOTES_LISTING;
          ?>
          <script>
            $(document).ready(function () {
                $('#listing_notes_info').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="listing_notes_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> <b> Listing Details </b>  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Listing ID: <?php echo $objListing[0]->$listing_id; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <table id="listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                              <tbody>
                                  <tr>
                                      <td><b>NOTES</b></td>
                                      <td>
                                          <?php if (empty($objListing[0]->$listing_notes)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                          <?php } else { ?>
                                            <?php echo$objListing[0]->$listing_notes; ?></td>
                                      <?php } ?>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['listings_search'])) {

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
              listingTableClass::LOCKBOX_LISTING,
              listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
              listingTableClass::BUILDING_ID_BUILDING,
              listingTableClass::LANDLORD_ID_LANDLORD,
              listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
              listingTableClass::LISTING_HASH,
              listingTableClass::CREATED_AT,
              listingTableClass::UPDATED_AT,
              listingTableClass::SYNC_ID_SYNC
          );

          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_rent = listingTableClass::RENT_LISTING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_status = listingTableClass::STATUS;
          $listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
          $listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
          $listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
          $listing_listing_hash = listingTableClass::LISTING_HASH;
          $listing_notes = listingTableClass::NOTES_LISTING;
          $listing_created_at = listingTableClass::CREATED_AT;
          $listing_updated_at = listingTableClass::UPDATED_AT;
          $listing_sync_id = listingTableClass::SYNC_ID_SYNC;


          /*
           * Array of database columns which should be read and sent back to DataTables.
           */
          $aColumns = array(
              $listing_id,
              $listing_building_id,
              $listing_created_at,
              $listing_building_id,
              $listing_unit_number,
              $listing_rent,
              $listing_size_id,
              $listing_bath_size,
              $listing_id_access,
              $listing_notes,
              $listing_landlord_id,
              $listing_status,
              $listing_created_at,
              $listing_updated_at
          );

          /*
           * Paging
           */
          if (request::getInstance()->getGet('iDisplayStart') == 0) {
            $iDisplayStart = 0;
          } else {
            $iDisplayStart = request::getInstance()->getGet('iDisplayStart');
          }
          /*
           * Ordering
           */
          if (request::getInstance()->hasGet('iSortCol_0')) {

            for ($i = 0; $i < intval(request::getInstance()->getGet('iSortingCols')); $i++) {

              if (request::getInstance()->getGet('bSortable_' . intval(request::getInstance()->getGet('iSortCol_' . $i))) == "true") {
                $sOrder = array(
                    $aColumns[intval(request::getInstance()->getGet('iSortCol_' . $i))],
                );

                $sOrderBy = request::getInstance()->getGet('sSortDir_' . $i);
              }
            }
          }


          if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) {

            $landlord_hash_filter = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));
            $listing_status_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
            $listing_building_hash_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true));
            $listing_id_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true));

            $swhere_filter = array();

            if (!empty($landlord_hash_filter)) {
              $landlord_id_filter = landlordTableClass::getIdNewLandlord($landlord_hash_filter);
              $swhere_filter[listingTableClass::LANDLORD_ID_LANDLORD] = $landlord_id_filter;
            }

            if (!empty($listing_status_filter)) {
              if ($listing_status_filter != "All") {
                $swhere_filter[listingTableClass::STATUS] = $listing_status_filter;
              }
            }

            if (!empty($listing_building_hash_filter)) {
              $building_id_filter = buildingTableClass::getIdNewBuilding($listing_building_hash_filter);
              $swhere_filter[listingTableClass::BUILDING_ID_BUILDING] = $building_id_filter;
            }

            if (!empty($listing_id_filter)) {

              $swhere_filter[listingTableClass::ID] = $listing_id_filter;
            }



            $objListings = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $swhere_filter);
            $objListings_pagination = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, null, null, $swhere_filter);
          } else {
            /*
             * Filtering
             * NOTE this does not match the built-in DataTables filtering which does it
             * word by word on any field. It's possible to do here, but concerned about efficiency
             * on very large tables, and MySQL's regex functionality is very limited
             */

//            if (!empty(request::getInstance()->getGet('sSearch'))) {
//              $sSearch = request::getInstance()->getGet('sSearch');
//              $listing_where = array(
//                  listingTableClass::STATUS => 1
//              );
//              $like = array(
//                  listingTableClass::ID => $sSearch,
//                  listingTableClass::RENT_LISTING => $sSearch,
//                  listingTableClass::UNIT_NUMBER_LISTING => $sSearch,
//                  listingTableClass::BATH_SIZE_LISTING => $sSearch,
//                  listingTableClass::LOCKBOX_LISTING => $sSearch,
//                  listingTableClass::NOTES_LISTING => $sSearch,
//                  listingTableClass::CREATED_AT => $sSearch,
//                  listingTableClass::UPDATED_AT => $sSearch,
//              );
//
//              $objListings = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $listing_where, $like);
//              $objListings_pagination = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, null, null, $listing_where, $like);
//            } else {
            $listing_where = array(
                listingTableClass::STATUS => 1
            );
            $objListings = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $listing_where);
            $objListings_pagination = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, null, null, $listing_where);
//            }
          }


//
//          /* Individual column filtering */
//          for ($i = 0; $i < count($listing_fields); $i++) {
//            if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
//              if ($sWhere == "") {
//                $sWhere = "WHERE ";
//              } else {
//                $sWhere .= " AND ";
//              }
//              $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
//            }
//          }
          /** BUILDING INSTANCES * */
//          $building_id_super = buildingTableClass::ID_SUPER;
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
            $listing_building_address_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)) . ' </button>';
            $listing_unit_number_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $listing->$listing_unit_number . ' </button>';
            $listing_rent_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $listing->$listing_rent . ' USD </button>';
            $listing_notes_field = htmlentities($listing->$listing_notes, ENT_QUOTES) . '<button data-hash="' . $listing->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnListing_Notes_info" type="button"> Show Info</button>';
            $listing_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button">  ' . listingSizeTableClass::getListingSizeByID($listing->$listing_size_id) . ' </button>';
            $listing_bath_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $listing->$listing_bath_size . ' </button>';
            if ($listing->$listing_id_access === 1) {

              $listing_access_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . accessTableClass::getAccessName($listing->$listing_id_access) . '-<b>Lockbox Code: </b> ' . $listing->$listing_lockbox_code . ' </button>';
            } else {
              $listing_access_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . accessTableClass::getAccessName($listing->$listing_id_access) . ' </button>';
            }

            $listing_super_field = '';
            $super_notes_info = superTableClass::getSuperNotes(buildingTableClass::getBuildingIdSuper($listing->$listing_building_id));
            if ($super_notes_info != false) {
              $listing_super_field .= (string) htmlentities($super_notes_info, ENT_QUOTES);
            } else {
              $listing_super_field .= '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> No Info </button> ';
            }
            $listing_super_field .= '<button data-hash="' . superTableClass::getSuperHash(buildingTableClass::getBuildingIdSuper($listing->$listing_building_id)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnSuper_info" type="button"> Show Info</button>';
            $listing_landlord_field = '<a  href="' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($listing->$listing_landlord_id))) . '" class="mdl-button mdl-js-button" type="button"><i class="fa fa-building-o" aria-hidden="true"></i> ' . landlordTableClass::getLandlordNameById($listing->$listing_landlord_id) . ' </a>';

            if ($listing->$listing_status == "1") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
            } elseif ($listing->$listing_status == "2") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
            } elseif ($listing->$listing_status == "3") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
            } elseif ($listing->$listing_status == "4") {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NOT SPECIFIED </button>';
            } else {
              $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS </button>';
            }
            $listing_availability_field = '<button  class="mdl-button mdl-js-button mdl-button--raised" data-toggle="tooltip" data-placement="top" title="StreetEasy Unavailable" type="button"> SE </button><button  class="mdl-button mdl-js-button mdl-button--raised" data-toggle="tooltip" data-placement="top" title="Bohemia Available" style="background-color: #00697E !important; color: #ffffff !important;" type="button"> BRG </button>';
            $listing_created_at_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $listing->$listing_created_at . ' </button>';

            if (!empty($listing->$listing_updated_at)) {
              $listing_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $listing->$listing_updated_at . ' </button>';
            } else {
              $listing_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> No Updates </button>';
            }
            $actions = '';
            if (listingAssignmentTableClass::isListingAssigned($listing->$listing_id, session::getInstance()->getUserId()) == 0 ) {
              $actions .= '<button data-hash="' . $listing->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAssign_listing" type="button"> Assign</button>';
            } else {
              $listing_assignment_hash = listingAssignmentTableClass::getHashListingAssignedByListingId($listing->$listing_id);

              $actions .= '<button data-hash="' . $listing_assignment_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnUnassign_listing" type="button"> Unassign</button>';
            }
            $actions .= '<button data-hash="' . $listing->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnView_listing" type="button"><i class="fa fa-eye" aria-hidden="true"></i> View </button>';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing->$listing_listing_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage </a>';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("listing", "edit", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing->$listing_listing_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button">E</a>';
            $actions .= '<button data-hash="' . $listing->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_unavailable_listing" type="button">U</button>';
            $actions .= '<button data-hash="' . $listing->$listing_listing_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_block_listing" type="button">L</button>';
            $actions .= '<button  disabled class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Listing ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)) . ', ' . $listing->$listing_unit_number . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[][] = $listing_id_field;
            $subdata[][] = $listing_neighborhood_field;
            $subdata[][] = $listing_building_address_field;
            $subdata[][] = $listing_unit_number_field;
            $subdata[][] = $listing_rent_field;
            $subdata[][] = $listing_notes_field;
            $subdata[][] = $listing_size_field;
            $subdata[][] = $listing_bath_size_field;
            $subdata[][] = $listing_access_field;
            $subdata[][] = $listing_super_field;
            $subdata[][] = $listing_landlord_field;
            $subdata[][] = $listing_status_field;
            $subdata[][] = $listing_availability_field;
            $subdata[][] = $listing_created_at_field;
            $subdata[][] = $listing_updated_at_field;
            $subdata[][] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          /*
           * Output
           */
          $output = array(
              "sEcho" => intval(request::getInstance()->getGet('sEcho')),
              "iTotalRecords" => intval(count($objListings_pagination)),
              "iTotalDisplayRecords" => intval(count($objListings_pagination)),
              "data" => $data
          );

          echo json_encode($output);
        }
      }


      /**
       * ADD LISTING
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['addListing'])) {
          $landlord_hash = request::getInstance()->getPost("addListing");
          $landlord_id_landlord = landlordTableClass::getIdNewLandlord($landlord_hash);


          /** BUILDING INSTANCES * */
          $id_building = buildingTableClass::ID;
          $building_address = buildingTableClass::ADDRESS;
          /** LISTING SIZE INSTANCES* */
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
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Add Listing<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addlisting" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "create"); ?>">


                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true); ?>"> Landlord</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" class="form-control" required>
                                  <?php
                                  foreach ($this->getLandlordByHash($landlord_hash) as $landlord):
                                    ?>
                                    <option value="<?php echo $landlord->id_landlord ?>" selected><?php echo $landlord->description_landlord; ?></option>
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
                                  foreach ($this->getBuildingByLandlordId($landlord_id_landlord) as $building):
                                    ?>
                                    <option value="<?php echo $building->$id_building ?>" ><?php echo $building->$building_address; ?></option>
                                    <?php
                                  endforeach;
                                  ?>
                              </select>
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
                              <label class="control-label col-md-2 col-sm-2 col-xs-12"> Beds</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                  <option value="">Select Option </option>  
                                  <?php foreach ($this->getListingSize() as $size): ?>
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
                                  <?php foreach ($this->getAccess() as $access): ?>
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
                                          <?php foreach ($this->getFloorType() as $floorType): ?>
                                            <option value="<?php echo $floorType->$floor_type_id ?>"><?php echo $floorType->$floor_type_description; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>">Outdoor Space</label>
                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" class="form-control" required>
                                          <option value="">Select Outdoor Space </option>  
                                          <?php foreach ($this->getOutdoorSpace() as $outdoor_space): ?>
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
                                          <?php foreach ($this->getLayout() as $layout): ?>
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
                                  $rental_amenities = $this->getRentalAmenities();
                                  if (!empty($rental_amenities)) {
                                    $i = 1;
                                    foreach ($rental_amenities as $amenity):
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
                                            <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: there are not listing amenities found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("rentalAmenities", "index") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Listing Amenities</b></a><br>
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
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addListing"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Listing</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
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

                //button close adduser user function
                var btnClose_addListing = $(".btnClose_addListing");
                $(btnClose_addListing).on('click', function () {
                    $("#addApartment_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#addApartment_panel').offset().top}, 'slow');
                });
            });

          </script>

          <?php
        }
      }

      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['landlord_id_selected'])) {
          $building_id_landlord = request::getInstance()->getPost("landlord_id_selected");


          /** BUILDING INFO* */
          $building_fields = array(
              buildingTableClass::ID,
              buildingTableClass::ADDRESS,
              buildingTableClass::ID_LANDLORD,
          );
          $where_buildings = array(
              buildingTableClass::ID_LANDLORD => $building_id_landlord
          );
          $objBuildings = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

          $building_id = buildingTableClass::ID;
          $building_address = buildingTableClass::ADDRESS;
          ?>
          <?php if (!empty($objBuildings)) { ?>
            <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
            <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control" required>
                <option value="">Select Building</option>    
                <?php
                foreach ($objBuildings as $building):
                  ?>
                  <option value="<?php echo $building->$building_id ?>" ><?php echo $building->$building_address; ?></option>
                <?php endforeach; ?>
            </select>
          <?php }else { ?>
            <div class="alert alert-info alert-dismissible" role = "alert">
                <p class = "text-center">
                    <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Buildings found. </b><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($building_id_landlord))); ?>" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> Add Building</b></a><br>
                </p>
            </div>
          <?php } ?>
          <?php
        }
      }

      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['landlord_id_selected_filter'])) {
          $landlord_hash = request::getInstance()->getPost("landlord_id_selected_filter");
          $landlord_id = landlordTableClass::getIdNewLandlord($landlord_hash);

          /** BUILDING INFO* */
          $building_fields = array(
              buildingTableClass::ID,
              buildingTableClass::ADDRESS,
              buildingTableClass::ID_LANDLORD,
              buildingTableClass::BUILDING_HASH
          );
          $where_buildings = array(
              buildingTableClass::ID_LANDLORD => $landlord_id,
              buildingTableClass::STATUS => 1
          );
          $objBuildings = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

          $building_id = buildingTableClass::ID;
          $building_hash = buildingTableClass::BUILDING_HASH;
          $building_address = buildingTableClass::ADDRESS;
//   if (!empty($objBuildings)) {
          $i = 0;
          foreach ($objBuildings as $building):

            $subdata = array();
            $subdata[][] = $building->$building_hash;
            $subdata[][] = strtoupper($building->$building_address);
            $data[] = $subdata;

            $i++;
          endforeach;

          echo json_encode($data);
        }
      }

      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['building_id_selected_filter'])) {
          $building_hash = request::getInstance()->getPost("building_id_selected_filter");
          $building_id = buildingTableClass::getIdNewBuilding($building_hash);

          /** LISTING INFO* */
          $listing_fields = array(
              listingTableClass::ID,
              listingTableClass::UNIT_NUMBER_LISTING,
              listingTableClass::BUILDING_ID_BUILDING,
              listingTableClass::LISTING_HASH
          );
          $where_listing = array(
              listingTableClass::BUILDING_ID_BUILDING => $building_id,
              listingTableClass::STATUS => 1
          );
          $objListings = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);

          $listing_id = listingTableClass::ID;
          $listing_hash = listingTableClass::LISTING_HASH;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;

          foreach ($objListings as $listing):

            $subdata = array();
            $subdata[][] = $listing->$listing_hash;
            $subdata[][] = strtoupper($listing->$listing_unit_number);
            $data[] = $subdata;

          endforeach;

          echo json_encode($data);
        }
      }

     

      /**
       * assign listing parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["assign_listing_hash"])) {
          $listing_hash = request::getInstance()->getPost("assign_listing_hash");

          $listing_id = listingTableClass::getIdNewListing($listing_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#assign_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="assign_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Assign Listing  <b>ID #<?php echo $listing_id; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #009933"><i class="fa fa-check-circle-o fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Assign to Listing</br> <h3><b>  ID #<?php echo $listing_id; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('listing', 'assign', array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Assign </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * unassign listing parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["listing_assigned_hash"])) {
          $listing_assigned_hash = request::getInstance()->getPost("listing_assigned_hash");

          $listing_id = listingAssignmentTableClass::getIdListingAssigned($listing_assigned_hash);
          $listing_hash = listingTableClass::getListingHashById($listing_id);
          ?>
          <script>
            $(document).ready(function () {
                $('#unassign_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="unassign_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Unassign Listing  <b>ID #<?php echo $listing_id; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #ff0000"><i class="fa fa-times-circle-o fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Unassign  from Listing</br> <h3><b>  ID #<?php echo $listing_id; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('listing', 'unassign', array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Unassign </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["unavailable_listing_hash"])) {
          $listing_unavailable_hash = request::getInstance()->getPost("unavailable_listing_hash");
          $listing_status = listingTableClass::getListingStatusByHash($listing_hash);

          $listing_id = listingTableClass::getIdNewListing($listing_unavailable_hash);
          if ($listing_status == "1") {
            $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
          } elseif ($listing_status == "2") {
            $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
          } elseif ($listing_status == "3") {
            $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
          } elseif ($listing_status == "4") {
            $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NOT SPECIFIED </button>';
          } else {
            $listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS </button>';
          }
          ?>
          <script>
            $(document).ready(function () {
                $('#unassign_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="unassign_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"><b> Listing Details </b>  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Listing ID: <?php echo $listing_id; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #ff0000"><i class="fa fa-lock fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Change the listing status from <?php echo $listing_status_field ?> to <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button></br> <h3><b>  ID #<?php echo $listing_id; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('listing', 'unavailable', array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing_unavailable_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Change </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
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

  public function getLayout() {

    $fields_layout = array(
        layoutTableClass::ID,
        layoutTableClass::DESCRIPTION_LAYOUT
    );
    $OrderBy_layout = array(
        layoutTableClass::ID
    );
    $objLayout = layoutTableClass::getAll($fields_layout, true, $OrderBy_layout, 'ASC');
    return $objLayout;
  }

  public function getFloorType() {

    $fields_floor_type = array(
        floorTypeTableClass::ID,
        floorTypeTableClass::DESCRIPTION_FLOOR_TYPE
    );
    $OrderBy_floor_type = array(
        floorTypeTableClass::ID
    );
    $objFloorType = floorTypeTableClass::getAll($fields_floor_type, true, $OrderBy_floor_type, 'ASC');
    return $objFloorType;
  }

  public static function getRentalAmenities() {

    $fields_rental_amenities = array(
        rentalAmenitiesTableClass::ID,
        rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES
    );
    $OrderBy_rental_amenities = array(
        rentalAmenitiesTableClass::ID
    );
    $objRentalAmenities = rentalAmenitiesTableClass::getAll($fields_rental_amenities, true, $OrderBy_rental_amenities, 'ASC');
    return $objRentalAmenities;
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

  public static function getBuildingByLandlordId($landlord_id) {

    $fields_building = array(
        buildingTableClass::ID,
        buildingTableClass::ADDRESS,
        buildingTableClass::BUILDING_HASH
    );
    $where_building = array(
        buildingTableClass::ID_LANDLORD => $landlord_id
    );
    $objBuilding = buildingTableClass::getAll($fields_building, true, null, null, null, null, $where_building);
    return $objBuilding;
  }

  public static function getListingSize() {

    $fields_listing_size = array(
        listingSizeTableClass::ID,
        listingSizeTableClass::DESCRIPTION_LISTING_SIZE,
    );
    $OrderBy_listing_size = array(
        listingSizeTableClass::ID
    );
    $objListingSize = listingSizeTableClass::getAll($fields_listing_size, true, $OrderBy_listing_size, 'ASC');
    return $objListingSize;
  }

}
