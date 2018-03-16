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
          profileBaseTableClass::PROFILE_HASH
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

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
      session::getInstance()->setFlash("app_info_landlord_manage", "manage");
      $objLandlord = $this->objLandlord = landlordTableClass::getAll($landlord_fields, true, null, null, null, null, $where_landlord);


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
          proceduresTableClass::LANDLORD_ID_LANDLORD => $objLandlord[0]->id_landlord
      );
      $this->objProcedures = proceduresTableClass::getAll($procedures_fields, true, null, null, null, null, $where_procedures);

      /**
       * file info
       */
      $files_fields = array(
          fileTableClass::ID,
          fileTableClass::FILE_NAME,
          fileTableClass::FILE_PATH_FILE,
          fileTableClass::FILE_TYPE,
          fileTableClass::META_DESCRIPTION_FILE,
          fileTableClass::LANDLORD_ID_LANDLORD,
          fileTableClass::FILE_HASH,
          fileTableClass::CREATED_AT,
          fileTableClass::UPDATED_AT
      );
      $where_files = array(
          fileTableClass::LANDLORD_ID_LANDLORD => $objLandlord[0]->id_landlord
      );
      $this->objFiles = fileTableClass::getAll($files_fields, true, null, null, null, null, $where_files);
      $this->defineView('manage', 'app_landlord', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
