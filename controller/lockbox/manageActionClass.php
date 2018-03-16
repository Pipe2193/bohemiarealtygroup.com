<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of manageActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class manageActionClass extends controllerClass implements controllerActionInterface {

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

      $building_hash = request::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true));


      /** BUILDING INFO* */
      $building_fields = array(
          buildingTableClass::ID,
          buildingTableClass::ADDRESS,
          buildingTableClass::LOCKBOX_BUILDING,
          buildingTableClass::ID_ACCESS,
          buildingTableClass::STATUS,
          buildingTableClass::ID_LANDLORD,
          buildingTableClass::BUILDING_HASH,
          buildingTableClass::NOTES_BUILDING,
          buildingTableClass::CREATED_AT,
          buildingTableClass::UPDATED_AT
      );
      $where_buildings = array(
          buildingTableClass::BUILDING_HASH => $building_hash
      );
      $objBuilding = $this->objBuilding = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);


      session::getInstance()->setFlash("lockbox_manage", "lockbox_manage");
      $this->defineView('manage', 'lockbox', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
