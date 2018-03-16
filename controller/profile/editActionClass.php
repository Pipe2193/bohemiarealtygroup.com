<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of profileClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {


      if (request::getInstance()->hasGet(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true))) {

        $profile_hash = request::getInstance()->getGet(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true));


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
            profileTableClass::FACEBOOK_LINK,
            profileTableClass::TWITTER_LINK,
            profileTableClass::INSTAGRAM_LINK,
            profileTableClass::POSITION,
            profileTableClass::FAX_NUMBER,
            profileTableClass::USUARIO_ID
        );
        $where_profile_info = array(
            profileTableClass::PROFILE_HASH => $profile_hash
        );

        $fields_usuario = array(
            usuarioTableClass::ID,
            usuarioTableClass::USER,
            usuarioTableClass::EMAIL_ADDRESS,
        );
        $where_usuario = array(
            usuarioTableClass::USER_HASH => $profile_hash
        );

        session::getInstance()->setFlash("profile_edit", "profile_edit");
        $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->objProfileInfo = profileTableClass::getAll($fields_profile_info, true, null, null, null, null, $where_profile_info);
        $this->objProfile_user = usuarioTableClass::getAll($fields_usuario, true, null, null, null, null, $where_usuario);
        $this->defineView('edit', 'profile', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('shfSecurity', 'exception');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
