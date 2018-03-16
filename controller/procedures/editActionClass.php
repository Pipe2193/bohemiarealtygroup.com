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

      $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

      $landlord_id_landlord = landlordTableClass::getIdNewLandlord($landlord_hash);

      /**
       * Procedures info
       */
      $procedures_fields = array(
          proceduresTableClass::ID,
          proceduresTableClass::CONTENT,
          proceduresTableClass::LANDLORD_ID_LANDLORD,
          proceduresTableClass::CREATED_AT,
          proceduresTableClass::UPDATED_AT
      );
      $where_procedures = array(
          proceduresTableClass::LANDLORD_ID_LANDLORD => $landlord_id_landlord
      );
      session::getInstance()->setFlash("procedures_edit", "procedures_edit");
      $this->objProcedures = proceduresTableClass::getAll($procedures_fields, true, null, null, null, null, $where_procedures);
      $this->defineView('edit', 'procedures', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
