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

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['landlords'])) {

          $landlord_fields = array(
              landlordTableClass::ID,
              landlordTableClass::DESCRIPTION_LANDLORD,
              landlordTableClass::PHONE_NUMBER,
              landlordTableClass::ADDRESS,
              landlordTableClass::ZIPCODE,
              landlordTableClass::EMAIL_ADDRESS,
              landlordTableClass::STATUS,
              landlordTableClass::PETS_CASE_ID,
              landlordTableClass::LISTING_TYPE_ID,
              landlordTableClass::LISTING_MANAGER_ID,
              landlordTableClass::LANDLORD_HASH,
              landlordTableClass::SYNC_ID_SYNC,
              landlordTableClass::CREATED_AT,
              landlordTableClass::UPDATED_AT
          );

          if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true))) {

            if (request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Active") {
              $status = 1;
            } elseif (request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Inactive") {
              $status = 0;
            }

            $where_filter = array(
                landlordTableClass::STATUS => $status
            );
            $landlord_OrderBy = array(
                landlordTableClass::DESCRIPTION_LANDLORD
            );
            $objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC', null, null, $where_filter);
          } else if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true))) {

            $listing_manager_user_id = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true));
            $listing_manager_filter_id = listingManagerTableClass::getListingManagerIdByUser($listing_manager_user_id);

            $where_filter = array(
                landlordTableClass::LISTING_MANAGER_ID => $listing_manager_filter_id
            );
            $landlord_OrderBy = array(
                landlordTableClass::DESCRIPTION_LANDLORD
            );
            $objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC', null, null, $where_filter);
          } else if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true))) {

            $listing_type_id = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true));

            $where_filter = array(
                landlordTableClass::LISTING_TYPE_ID => $listing_type_id
            );
            $landlord_OrderBy = array(
                landlordTableClass::DESCRIPTION_LANDLORD
            );
            $objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC', null, null, $where_filter);
          } else if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {

            $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

            $where_filter = array(
                landlordTableClass::LANDLORD_HASH => $landlord_hash
            );
            $landlord_OrderBy = array(
                landlordTableClass::DESCRIPTION_LANDLORD
            );
            $objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC', null, null, $where_filter);
          } else {

            $landlord_OrderBy = array(
                landlordTableClass::DESCRIPTION_LANDLORD
            );
            $objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC');
          }



          $landlordID = landlordTableClass::ID;
          $landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
          $phone_number = landlordTableClass::PHONE_NUMBER;
          $address = landlordTableClass::ADDRESS;
          $email_address = landlordTableClass::EMAIL_ADDRESS;
          $listing_manager_id = landlordTableClass::LISTING_MANAGER_ID;
          $landlord_hash = landlordTableClass::LANDLORD_HASH;
          $status = landlordTableClass::STATUS;
          $sync_id = landlordTableClass::SYNC_ID_SYNC;



          foreach ($objLandlords as $landlords) {

            $landlord_sync_source_id = syncTableClass::getSyncSource($landlords->$sync_id);
            if ($landlord_sync_source_id == 2) {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($landlords->$landlordID);
              if ($landlord_listing_type_ll == 4) {
                $landlordID_field = '<div class="label label-info"> N </div><div class="label" style="background-color: #ffd6d5;"> OLA </div><button class="mdl-button mdl-js-button"  type="button"> ' . $landlords->$landlordID . ' </button>';
              } else {
                $landlordID_field = '<div class="label label-info"> N </div><button class="mdl-button mdl-js-button"  type="button"> ' . $landlords->$landlordID . ' </button>';
              }
            } else {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($landlords->$landlordID);

              if ($landlord_listing_type_ll == 4) {
                $landlordID_field = '<div class="label" style="background-color: #ffd6d5;"> OLA </div><button class="mdl-button mdl-js-button"  type="button"> ' . $landlords->$landlordID . ' </button>';
              } else {
                $landlordID_field = '<button class="mdl-button mdl-js-button"  type="button"> ' . $landlords->$landlordID . ' </button>';
              }
            }

            if (empty($landlords->$landlord_name)) {

              $landlord_name_field = '<button class="mdl-button mdl-js-button "> No Name</button>';
            } else {
              $landlord_name_field = '<a href="' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)) . '" > ' . strtoupper($landlords->$landlord_name) . ' </a>';
            }

            if (empty($landlords->$phone_number)) {
              $phone_number_field = '<button type="button" class="btn btn-danger btn-xs">Error!</button>';
            } else {
              $phone_number_field = '<a href="tel:' . $landlords->$phone_number . '" ><i class="fa fa-phone" aria-hidden="true"></i> ' . $landlords->$phone_number . ' </a>';
            }
            if (empty($landlords->$address)) {
              $address_field = '<button class="mdl-button mdl-js-button mdl-button--danger "> No Address </button>';
            } else {
              $address_field = '<b> ' . $landlords->$address . ' </b>';
            }

            if (empty($landlords->$email_address)) {
              $email_address_field = '<button class="mdl-button mdl-js-button mdl-button--danger "> No Email Address </button>';
            } else {
              $email_address_field = '<a href="mailto:' . $landlords->$email_address . '" > <i class="fa fa-envelope-o" aria-hidden="true"></i> ' . $landlords->$email_address . ' </a>';
            }


            if (empty($landlords->$listing_manager_id)) {

              $listing_manager_id_field = '<button type="button" class="btn btn-dark btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i> Not Assigned </button>';
            } else {
              $listing_manager_id_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable ">
              <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
               <span class="mdl-chip__text "> ' . profileTableClass::getProfileByUserId(listingManagerTableClass::getListingManagerUserId($landlords->$listing_manager_id)) . ' </span>
               </span>';
            }

            if ($landlords->$status == "1") {
              $status_field = '<button class="mdl-button mdl-js-button mdl-button--primary"> ACTIVE </button>';
            } elseif ($landlords->$status == "0") {
              $status_field = '<button type="button" class="mdl-button mdl-js-button mdl-button"> INACTIVE </button>';
            } else {
              $status_field = '<button type="button" class="mdl-button mdl-js-button mdl-button"> NO STATUS </button>';
            }

            $actions = '<a href="' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
            if ($landlords->$status == "1") {
              $actions .= '<button data-id="' . $landlords->$landlord_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDeactivateLandlord" type="button"><i class="fa fa-ban" aria-hidden="true"></i> <b>Deactivate</b></button>';
            } elseif ($landlords->$status == "0") {
              $actions .= '<button data-id="' . $landlords->$landlord_hash . '"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnActivateLandlord" type="button"> <b>Activate</b></button>';
            }
            $actions .= '<button data-id = "' . $landlords->$landlord_hash . '" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button btnDelete_landlord" type = "button" data-toggle = "tooltip" data-placement = "top" title = "Delete Landlord ' . strtoupper($landlords->$landlord_name) . '" disabled><i class = "fa fa-trash-o" aria-hidden = "true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $landlordID_field;
            $subdata[] = $landlord_name_field;
//            $subdata[] = $phone_number_field;
            $subdata[] = $address_field;
            $subdata[] = $email_address_field;
            $subdata[] = $listing_manager_id_field;
            $subdata[] = $status_field;
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
              "recordsTotal" => intval(count($objLandlords)),
              "recordsFiltered" => intval(count($objLandlords)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['manage_listings'])) {
          $id_landlord = $_GET['manage_listings'];

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
                listingTableClass::LANDLORD_ID_LANDLORD => $id_landlord,
                listingTableClass::STATUS => $status
            );
            $order_by_listing_filter = array(
                listingTableClass::ID
            );

            $objListings = listingTableClass::getAll($listing_fields, true, $order_by_listing_filter, 'DESC', null, null, $where_listing_filter);
          } else {

            $where_listing = array(
                listingTableClass::LANDLORD_ID_LANDLORD => $id_landlord
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

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['manage_buildings'])) {
          $id_landlord = $_GET['manage_buildings'];
          /**
           * Building info
           */
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
              buildingTableClass::CREATED_AT,
              buildingTableClass::UPDATED_AT,
              buildingTableClass::SYNC_ID_SYNC
          );
          $where_buildings = array(
              buildingTableClass::ID_LANDLORD => $id_landlord
          );
          $objBuildings = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

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
          $notes_building = buildingTableClass::NOTES_BUILDING;
          $building_hash = buildingTableClass::BUILDING_HASH;
          $building_sync_id = buildingTableClass::SYNC_ID_SYNC;

          foreach ($objBuildings as $building) {

            $building_sync_source_id = syncTableClass::getSyncSource($building->$building_sync_id);
            if ($building_sync_source_id == 2) {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($building->$id_landlord);
              if ($landlord_listing_type_ll == 4) {
                $building_id_field = '<div class="label label-info"> N </div><div class="label" style="background-color: #ffd6d5;"> OLA </div><button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_id . ' </button>';
              } else {
                $building_id_field = '<div class="label label-info"> N </div><button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_id . ' </button>';
              }
            } else {
              $landlord_listing_type_ll = landlordTableClass::getLandlordListingType($building->$id_landlord);

              if ($landlord_listing_type_ll == 4) {
                $building_id_field = '<div class="label" style="background-color: #ffd6d5;"> OLA </div><button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_id . ' </button>';
              } else {
                $building_id_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_id . ' </button>';
              }
            }

            $building_address_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_address . ' </button>';
            $building_city_field = '<button  class="mdl-button mdl-js-button" type="button">' . $building->$building_city . ' </button>';
            $building_state_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . statesTableClass::getStateName($building->$building_state_id) . ' </button>';
            $building_zipcode_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $building->$building_zipcode . ' </button>';
            $building_neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood) . ' </button>';
            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $building->$building_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
            $actions .= '<button disabled data-id="' . $building->$building_id . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="Delete Building ' . $building->$building_address . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $building_id_field;
            $subdata[] = $building_address_field;
            $subdata[] = $building_city_field;
            $subdata[] = $building_state_field;
            $subdata[] = $building_zipcode_field;
            $subdata[] = $building_neighborhood_field;
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
              "recordsTotal" => intval(count($objBuildings)),
              "recordsFiltered" => intval(count($objBuildings)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      /**
       * deactivate Landlord parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["deactivateLandlord"])) {
          $landlord_hash = request::getInstance()->getPost("deactivateLandlord");

          $fields = array(
              landlordTableClass::DESCRIPTION_LANDLORD
          );
          $where = array(
              landlordTableClass::LANDLORD_HASH => $landlord_hash
          );
          $objLandlord = landlordTableClass::getAll($fields, true, null, null, null, null, $where);
          $landlord_name_field = landlordTableClass::DESCRIPTION_LANDLORD;
          $landlord_name = $objLandlord[0]->$landlord_name_field;
          ?>
          <script>
            $(document).ready(function () {
                $('#deactivateLandlord').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="deactivateLandlord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Deactivate Landlord  <b><?php echo $landlord_name; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to deactivate the Landlord </br> <h3><b><?php echo $landlord_name; ?></b> ?</h3></br>
                              <div class="alert alert-warning alert-dismissible" role="alert">
                                  <p class="text-center">
                                      <b><i class="fa fa-warning " aria-hidden="true"></i> Warning: </b> After being deactivated you won't be able to see any <b>listings or ads</b> assigned to this landlord. <br>
                                  </p>
                              </div>

                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('landlord', 'deactivate', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlord_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Deactivate </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }


      /**
       * activate Landlord parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["activateLandlord"])) {
          $landlord_hash = request::getInstance()->getPost("activateLandlord");

          $fields = array(
              landlordTableClass::DESCRIPTION_LANDLORD
          );
          $where = array(
              landlordTableClass::LANDLORD_HASH => $landlord_hash
          );
          $objLandlord = landlordTableClass::getAll($fields, true, null, null, null, null, $where);
          $landlord_name_field = landlordTableClass::DESCRIPTION_LANDLORD;
          $landlord_name = $objLandlord[0]->$landlord_name_field;
          ?>
          <script>
            $(document).ready(function () {
                $('#activateLandlord').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="activateLandlord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Activate Landlord  <b><?php echo $landlord_name; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to activate the Landlord </br> <h3><b><?php echo $landlord_name; ?></b> ?</h3></br>
                              <div class="alert alert-warning alert-dismissible" role="alert">
                                  <p class="text-center">
                                      <b><i class="fa fa-warning " aria-hidden="true"></i> Warning: </b> After you activate the landlord, the system will display <b>listings, and publish all ads</b> assigned to this landlord. <br>
                                  </p>
                              </div>

                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('landlord', 'activate', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlord_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Activate </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * delete User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['deleteUser'])) {
          $deleteUser = request::getInstance()->getPost("deleteUser");
          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where = array(
              profileTableClass::USUARIO_ID => $deleteUser
          );
          $objProfileUser = profileTableClass::getAll($fields, true, null, null, null, null, $where);
          if (empty($objProfileUser)) {
            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER,
            );
            $where = array(
                usuarioTableClass::ID => $deleteUser
            );
            $objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
            $user = usuarioTableClass::USER;
            $username = $objUser[0]->$user;
          } else {
            $firstName = profileTableClass::FIRST_NAME;
            $middleName = profileTableClass::MIDDLE_NAME;
            $lastName = profileTableClass::LAST_NAME;

            $username = $objProfileUser[0]->$firstName . " " . $objProfileUser[0]->$middleName . " " . $objProfileUser[0]->$lastName;
          }
          ?>
          <div class="panel panel-danger">
              <div class="panel-body">
                  <div class="btn-group  btn-group-sm pull-right">
                      <a class="btn btn-default btnClose_delete" type="button"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel </a>
                      <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "delete", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $deleteUser)); ?>" class="btn btn-danger" type="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Confirm Delete User <?php echo $username ?> </a>
                  </div>
              </div>
          </div>
          <script>
            $(document).ready(function () {

                //button close delete user function
                var btnClose_delete = $(".btnClose_delete");
                $(btnClose_delete).on('click', function () {
                    $("#deleteUser_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * add Landlord parcial
       */
      if (request::getInstance()->isMethod('POST')) {
        if (request::getInstance()->hasPost("addLandlord")) {
          $addLandlord = request::getInstance()->getPost("addLandlord");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title text-center">Add Landlord<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addLandlord" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("landlord", "create"); ?>">

                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" > Landlord Name </label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" placeholder="Enter landlord name" required>
                              <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" > Address </label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" placeholder="Enter Address (street # or P.O BOX)" required>
                              <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" > City </label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" placeholder="Enter City" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>"> State</label>
                              <div class=" selectContainer">
                                  <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>" class="form-control" required>
                                      <option value="">Select State</option>  
                                      <?php foreach ($this->getStates() as $state): ?>
                                        <?php if ($state->state_id == 33) { ?>
                                          <option value="33" selected> DEFAULT: <?php echo $state->accron . ' - ' . $state->state_name; ?></option>
                                        <?php } else { ?>
                                          <option value="<?php echo $state->state_id ?>"><?php echo $state->accron . ' - ' . $state->state_name; ?></option>
                                        <?php } ?>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" > Zip Code </label>
                              <input type="text" class="zipcode form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" placeholder="Enter zip code" required>
                              <span class="form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" > Email Address </label>
                              <input type="email" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" placeholder="Enter email address (open to the team)" required>
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" > Private Email Address (Add E-mails separated by (,)) </label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" placeholder="Enter (private) email address">
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" > Phone Number </label>
                              <input type="text" class="phone form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" placeholder="Enter phone number" required>
                              <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" > Fax Number (if applicable)</label>
                              <input type="text" class="phone form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" placeholder="Enter fax number (if applicable)">
                              <span class="fa fa-fax form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" >Listing Manager</label>
                              <div class="selectContainer">
                                  <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" class="form-control" required>
                                      <option value="">Select Manager</option>  
                                      <?php foreach ($this->getUsersProfiles() as $profiles): ?>
                                        <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                          <div id="managerSelector" class=" form-group has-feedback">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" >Co-listing Manager</label>
                                  <div  class="selectContainer">
                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" class="form-control">
                                          <option value="">Select Co-Manager</option>  
                                          <?php foreach ($this->getUsersProfiles() as $profiles): ?>
                                            <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div id="btnremove" class="form-group has-feedback" style="margin-top: 20px;">
                                      <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger removelistingManager"><i class="fa fa-minus" aria-hidden="true"></i> Remove</button>
                                  </div>
                              </div>
                          </div>

                          <div id="btnadd" class="col-md-6 col-sm-6 col-xs-12 text-center form-group has-feedback">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary addlistingManager"><i class="fa fa-plus" aria-hidden="true"></i> Add Co-Manager</button>
                          </div>



                      </div>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">Landlord Policy</h3>
                          </div>
                          <div class="panel-body">

                              <div class="form-group">
                                  <p><small>Fields marked with (*) are mandatory.</small></p>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>"> Pets Policy</label>

                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>  
                                          <?php
                                          foreach ($this->getPetsPolicy() as $petspolicy):
                                            ?>
                                            <option value="<?php echo $petspolicy->id_pets_case ?>"><?php echo $petspolicy->description_pets_case; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>"> Listing Policy</label>

                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>  
                                          <?php foreach ($this->getListingType() as $listingType): ?>
                                            <option value="<?php echo $listingType->id_listing_type ?>"><?php echo $listingType->description_listing_type; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                  </div>

                              </div>
                          </div>
                      </div>
                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>"> Email Notification</label>

                              <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>" class="form-control" required>
                                  <option value="">Select Option</option>  
                                  <option value="1">Allow</option>
                                  <option value="0">Disallow</option>  
                              </select>

                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>">Notes</label>
                              <textarea class="form-control" id="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>" rows="5" placeholder="Take a note ..." ></textarea>

                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addlandlord"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Landlord</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addLandlord').formValidation({
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
          <?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The landlord name  is required'
                                },
                                stringLength: {
                                    max: <?php echo landlordBaseTableClass::DESCRIPTION_LANDLORD_LENTH ?>,
                                    message: 'The landlord name must be less than <?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The address is required'
                                },
                                stringLength: {
                                    max: <?php echo landlordBaseTableClass::ADDRESS_LENTH ?>,
                                    message: 'The  name must be less than <?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS_LENTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                },
                                stringLength: {
                                    max: <?php echo landlordTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo landlordTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },

          <?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        },
          <?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The phone number is required'
                                }
                            }
                        }
                    }
                }).find('.phone').mask('(999)-999-9999').find('.zipcode').mask('99999');

                $("#managerSelector").hide();
                $("#btnremove").hide();


                var addlistingManager = $(".addlistingManager");
                $(addlistingManager).on('click', function () {
                    $("#btnadd").hide();
                    $("#managerSelector").show();
                    $("#btnremove").show();
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });



                var removelistingManager = $(".removelistingManager");
                $(removelistingManager).on('click', function () {
                    $("#managerSelector").hide();
                    $("#btnremove").hide();
                    $("#btnadd").show();
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

                //button close adduser user function
                var btnClose_adduser = $(".btnClose_addlandlord");
                $(btnClose_adduser).on('click', function () {
                    $("#addLandlord_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
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

}
