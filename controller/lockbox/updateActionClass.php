<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of updateActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true))) {

        $lockbox_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true));
        $notes_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true));

        $building_hash = request::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true));

        if (buildingTableClass::VerifyBuildingHash($building_hash) != false) {


          /** INSERT BUILDING INFORMATION* */
          $building_id = buildingTableClass::getIdNewBuilding($building_hash);

          $data_building = array(
              buildingTableClass::LOCKBOX_BUILDING => $lockbox_building,
              buildingTableClass::NOTES_BUILDING => $notes_building,
          );
          $ids = array(
              buildingTableClass::ID => $building_id
          );

          buildingTableClass::update($ids, $data_building);

          $lockbox_id = lockboxTableClass::getLockboxIdByHash($building_hash);

          $fields_lockbox = array(
              lockboxTableClass::LOCKBOX_HASH => $building_hash
          );
          $ids_lockbox = array(
              lockboxTableClass::ID => $lockbox_id
          );
          lockboxTableClass::update($ids_lockbox, $fields_lockbox);
          
          $address_building = buildingTableClass::getBuildingAddress($building_hash);
          session::getInstance()->setSuccess("The Lockbox from  <b> " . $address_building . " </b>  has been Successfully Updated.");
          routing::getInstance()->redirect('lockbox', 'index');
        } else {
          session::getInstance()->setError("The Application encountered an error and it couldn't complete your request.<br> The <b>Building Token ($building_hash)</b> is not valid.  ");
          routing::getInstance()->redirect('lockbox', 'index');
        }
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Building Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('lockbox', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
