<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of deactivateActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class deactivateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {

          $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

          $landlord_id = landlordTableClass::VerifyLandlordHash($landlord_hash);

          if ($landlord_id != false) {

            if (landlordTableClass::isActivated($landlord_id->id_landlord) != 0) {


              $ids = array(
                  landlordTableClass::ID => $landlord_id->id_landlord
              );
              $data = array(
                  landlordTableClass::STATUS => 0
              );
              landlordTableClass::update($ids, $data);
              $landlord_name = landlordTableClass::getLandlordName($landlord_hash);
              session::getInstance()->setSuccess("<b> The Landlord $landlord_name </b> has been successfully Deactivated.");
              routing::getInstance()->redirect("landlord", "index");
            } else {
              session::getInstance()->setInformation("This Landlord has been Already Deactivated. No Update Required. ");
              routing::getInstance()->redirect('landlord', 'index');
            }
          } else {
            session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>Landlord Token ($landlord_hash)</b> is not valid. ");
            routing::getInstance()->redirect('landlord', 'index');
          }
        } else {
          session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.<br> Your <b>Landlord Token (hash)</b> is missing, please try again!. ");
          routing::getInstance()->redirect("landlord", "index");
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
