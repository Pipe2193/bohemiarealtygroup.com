<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of removeActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class removeActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet(lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH, true))) {

          $lockbox_hash = request::getInstance()->getGet(lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH, true));
          $lockbox_id = lockboxTableClass::getLockboxIdByHash($lockbox_hash);

          if ($lockbox_id != false) {

            if (lockboxTableClass::isRemoved($lockbox_id) == false) {


              $ids = array(
                  lockboxTableClass::ID => $lockbox_id
              );
              $data = array(
                  lockboxTableClass::LOCKBOX_STATUS => 3
              );
              lockboxTableClass::update($ids, $data);
              $building_address = buildingTableClass::getBuildingAddress($lockbox_hash);
              
              session::getInstance()->setSuccess("<b> The Lockbox from  $building_address </b> has been successfully Removed.");
              routing::getInstance()->redirect("lockbox", "index");
            } else {
              session::getInstance()->setInformation("This Lockbox has been Already Removed . No Update Required. ");
              routing::getInstance()->redirect('lockbox', 'index');
            }
          } else {
            session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>Lockbox Token ($lockbox_hash)</b> is not valid. ");
            routing::getInstance()->redirect('lockbox', 'index');
          }
        } else {
          session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.<br> Your <b>Lockbox Token (hash)</b> is missing, please try again!. ");
          routing::getInstance()->redirect("lockbox", "index");
        }
      } else {
        session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.This type of request is not allowed. ");
        routing::getInstance()->redirect("shfSecurity", "noPermission");
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
