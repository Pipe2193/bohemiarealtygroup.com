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
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      /**
       * lockbox Building info
       */
      $fields_building = array(
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
          buildingTableClass::UPDATED_AT
      );
      $OrderBy_lockbox = array(
          buildingTableClass::ID
      );
      $where_lockbox = array(
          buildingTableClass::ID_ACCESS => 1,
          buildingTableClass::LOCKBOX_BUILDING != null
      );
      session::getInstance()->setFlash("building_lockbox", "building_lockbox");
      $this->objLockboxBuildings = buildingTableClass::getAll($fields_building, true, $OrderBy_lockbox, 'ASC', null, null, $where_lockbox);

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

      $this->defineView('index', 'lockbox', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
