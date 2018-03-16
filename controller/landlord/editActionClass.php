<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of editActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {

      if (request::getInstance()->isMethod("GET")) {

        /**
         * get user data
         */
        $fields = array(
            profileTableClass::FIRST_NAME,
            profileTableClass::MIDDLE_NAME,
            profileTableClass::LAST_NAME,
            profileTableClass::EMAIL_ADDRESS,
            profileTableClass::PHONE_NUMBER,
            profileTableClass::EXT_PHONE_NUMBER,
            profileTableClass::PROFILE_HASH
        );
        $where = array(
            profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
        );
        $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);


        if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {
          /**
           * GET LANDLORD INFO
           */
          $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

          $landlord_fields = array(
              landlordTableClass::ID,
              landlordTableClass::DESCRIPTION_LANDLORD,
              landlordTableClass::PHONE_NUMBER,
              landlordTableClass::FAX_NUMBER,
              landlordTableClass::ADDRESS,
              landlordTableClass::CITY,
              landlordTableClass::STATE_ID,
              landlordTableClass::ZIPCODE,
              landlordTableClass::EMAIL_ADDRESS,
              landlordTableClass::PRIVATE_EMAIL_ADDRESS,
              landlordTableClass::STATUS,
              landlordTableClass::NOTES_LANDLORD,
              landlordTableClass::LANDLORD_HASH,
              landlordTableClass::PETS_CASE_ID,
              landlordTableClass::LISTING_TYPE_ID,
              landlordTableClass::LISTING_MANAGER_ID,
              landlordTableClass::EMAIL_NOTIFICATION_STATUS,
              landlordTableClass::CREATED_AT,
              landlordTableClass::UPDATED_AT
          );
          $where_landlord = array(
              landlordTableClass::LANDLORD_HASH => $landlord_hash
          );
          session::getInstance()->setFlash("landlord_edit", "landlord_edit");
          $this->objStates = $this->getStates();
          $this->objProfiles = $this->getUsersProfiles();
          $this->objPetsPolicy = $this->getPetsPolicy();
          $this->objListingType = $this->getListingType();
          $this->objLandlord = landlordTableClass::getAll($landlord_fields, true, null, null, null, null, $where_landlord);
          $this->defineView('edit', 'landlord', session::getInstance()->getFormatOutput());
        } else {
          session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Landlord Token (hash)</b> is missing, please try again!.  ");
          routing::getInstance()->redirect("landlord", "index");
        }
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.It doesn't meet the established parameters, please try again!.  ");
        routing::getInstance()->redirect("shfSecurity", "noPermission");
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
