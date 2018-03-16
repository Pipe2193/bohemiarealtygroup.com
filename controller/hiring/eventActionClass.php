<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class eventActionClass extends controllerClass implements controllerActionInterface {

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

      $fields_events = array(
          eventTableClass::ID,
          eventTableClass::CREATED_AT,
          eventTableClass::DATE_END,
          eventTableClass::DATE_INI,
          eventTableClass::EVENT_ADDRESS,
          eventTableClass::EVENT_CATEGORY_ID_EVENT_CATEGORY_ID,
          eventTableClass::EVENT_DESCRIPTION,
          eventTableClass::EVENT_FEE,
          eventTableClass::EVENT_HASH,
          eventTableClass::EVENT_NAME,
          eventTableClass::EVENT_TIME_END,
          eventTableClass::EVENT_TIME_INI,
          eventTableClass::FACEBOOK_LINK,
          eventTableClass::INSTAGRAM_LINK,
          eventTableClass::LATITUDE,
          eventTableClass::LONGITUDE,
          eventTableClass::PUBLISH_DATE_END,
          eventTableClass::PUBLISH_DATE_INI,
          eventTableClass::STATUS,
          eventTableClass::TWITTER_LINK,
          eventTableClass::UPDATED_AT,
          eventTableClass::USUARIO_ID,
      );
      $order_by_events = array(
          eventTableClass::DATE_INI
      );
      
      $this->objEvents = eventTableClass::getAll($fields_events, true, $order_by_events, 'ASC');

      $this->defineView('event', 'hiring', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
