<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {

        $procedure_content = request::getInstance()->getPost(proceduresTableClass::getNameField(proceduresTableClass::CONTENT, true));

        $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

        $landlord_id_landlord = landlordTableClass::getIdNewLandlord($landlord_hash);
        /**
         * Procedures info
         */
        $procedures_fields = array(
            proceduresTableClass::CONTENT => $procedure_content
        );
        $ids = array(
            proceduresTableClass::LANDLORD_ID_LANDLORD => $landlord_id_landlord
        );
        proceduresTableClass::update($ids, $procedures_fields);
        session::getInstance()->setSuccess("The Procedures for ". landlordTableClass::getLandlordName($landlord_hash). "</b> has been Successfully Updated.");
         routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlord_hash));
      }else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Landlord Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('landlord', 'index');
      }
     
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
