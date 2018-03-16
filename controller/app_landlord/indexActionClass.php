<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {

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

      /**
       * 
       */
      $landlord_fields = array(
          landlordTableClass::ID,
          landlordTableClass::DESCRIPTION_LANDLORD,
          landlordTableClass::PHONE_NUMBER,
          landlordTableClass::FAX_NUMBER,
          landlordTableClass::ADDRESS,
          landlordTableClass::ZIPCODE,
          landlordTableClass::EMAIL_ADDRESS,
          landlordTableClass::STATUS,
          landlordTableClass::NOTES_LANDLORD,
          landlordTableClass::PETS_CASE_ID,
          landlordTableClass::LISTING_TYPE_ID,
          landlordTableClass::LISTING_MANAGER_ID,
          landlordTableClass::LANDLORD_HASH,
          landlordTableClass::CREATED_AT,
          landlordTableClass::UPDATED_AT
      );
      $landlord_OrderBy = array(
          landlordTableClass::ID
      );
      $this->objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC');

      $fields_users = array(
          usuarioTableClass::ID
      );

      $order_by_fields_users = array(
          usuarioTableClass::ID
      );

      $where_fields_users = array(
          usuarioTableClass::ACTIVED => 1
      );

      $this->objUsers = usuarioTableClass::getAll($fields_users, true, $order_by_fields_users, 'ASC', null, null, $where_fields_users);

      $fields_listing_Type = array(
          listingTypeTableClass::ID,
          listingTypeTableClass::DESCRIPTION_LISTING_TYPE
      );

      $order_by_listing_type = array(
          listingTypeTableClass::ID
      );
      $this->objListingType = listingTypeTableClass::getAll($fields_listing_Type, true, $order_by_listing_type, 'ASC');

      $this->defineView('index', 'app_landlord', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
