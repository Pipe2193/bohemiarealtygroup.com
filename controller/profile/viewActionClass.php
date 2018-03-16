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
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {

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
      
      if (request::getInstance()->hasGet(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true))) {
        
        $profile_hash = request::getInstance()->getGet(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true));
        
        $fields_profile_info = array(
            profileTableClass::FIRST_NAME,
            profileTableClass::MIDDLE_NAME,
            profileTableClass::LAST_NAME,
            profileTableClass::EMAIL_ADDRESS,
            profileTableClass::PHONE_NUMBER,
            profileTableClass::EXT_PHONE_NUMBER,
            profileTableClass::PROFILE_BIO_SUMMARY,
            profileTableClass::PROFILE_BIO,
            profileTableClass::ACTIVED,
            profileTableClass::PROFILE_HASH,
            profileTableClass::OFFICE_PHONE_NUMBER,
            profileTableClass::OFFICE_EXT_NUMBER,
            profileTableClass::WEBSITE_URL,
            profileTableClass::FACEBOOK_LINK,
            profileTableClass::TWITTER_LINK,
            profileTableClass::INSTAGRAM_LINK,
            profileTableClass::POSITION,
            profileTableClass::THUMBNAIL_PICTURE,
            profileTableClass::BIG_PICTURE,
            profileTableClass::USUARIO_ID
        );
        $where_profile_info = array(
            profileTableClass::PROFILE_HASH => $profile_hash
        );
        session::getInstance()->setFlash("view_profile", "view_profile");
        $this->objProfileInfo = profileTableClass::getAll($fields_profile_info, true, null, null, null, null, $where_profile_info);
        
        $fields_usuario = array(
            usuarioTableClass::ID,
            usuarioTableClass::USER,
            usuarioTableClass::EMAIL_ADDRESS,
        );
        $where_usuario = array(
            usuarioTableClass::USER_HASH => $profile_hash
        );
        $this->objProfile_user = usuarioTableClass::getAll($fields_usuario, true, null, null, null, null, $where_usuario);
        $this->defineView('view', 'profile', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('shfSecurity', 'exception');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
