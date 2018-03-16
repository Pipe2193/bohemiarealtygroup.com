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
      if (request::getInstance()->isMethod('POST')) {
        
        $firstName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::FIRST_NAME, true));
        $MiddleName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true));
        $LastName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::LAST_NAME, true));
        $emailAddress = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true));
        $phoneNumber = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::PHONE_ADDRESS, true));
        $extNumber = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true));
        $userID = session::getInstance()->getUserId();
       

        $ids = array(
            usuarioTableClass::ID => $userID
        );

        $data = array(
            profileTableClass::FIRST_NAME => $firstName,
             profileTableClass::MIDDLE_NAME => $MiddleName,
             profileTableClass::LAST_NAME => $LastName,
             profileTableClass::EMAIL_ADDRESS => $emailAddress,
             profileTableClass::PHONE_ADDRESS => $phoneNumber,
             profileTableClass::EXT_PHONE_NUMBER => $extNumber,         
        );

        profileTableClass::update($ids, $data);
      }
      routing::getInstance()->redirect('profile', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
