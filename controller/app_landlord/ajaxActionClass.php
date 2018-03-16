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
              $landlord_name_field = '<a href="' . routing::getInstance()->getUrlWeb("app_landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)) . '" > ' . strtoupper($landlords->$landlord_name) . ' </a>';
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

            $actions = '<a href="' . routing::getInstance()->getUrlWeb("app_landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
           
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
