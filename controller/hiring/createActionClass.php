<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of createActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {
      if (request::getInstance()->isMethod('POST')) {
        
        
        
        
        

            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_NAME, true)); 
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::DATE_END, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::DATE_INI, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_ADDRESS, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::DATE_INI, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_DESCRIPTION, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_FEE, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_TIME_END, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::EVENT_TIME_INI, true));
           $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::FACEBOOK_LINK, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::INSTAGRAM_LINK, true));
           $event_name = request::getInstance()->getPost("lat");
           $event_name = request::getInstance()->getPost("long");
           $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_END, true));
            $event_name = request::getInstance()->getPost(eventTableClass::getNameField(eventTableClass::PUBLISH_DATE_INI, true));
            eventTableClass::STATUS,
            eventTableClass::TWITTER_LINK,
            eventTableClass::USUARIO_ID,



        $event_hash = md5(md5(date('U')));
 
        /** INSERT LISTING INFORMATION* */
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

        eventTableClass::insert($fields_events);

        session::getInstance()->setSuccess("The Event <b> $building_address </b> located at <b> </b> have been successfully Created!.");
        routing::getInstance()->redirect('hiring', 'event');
      } else {
        session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.This type of request is not allowed.");
        routing::getInstance()->redirect('hiring', 'event');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
