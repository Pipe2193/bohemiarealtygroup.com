<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of theLeoActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class theLeoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {
      
     $this->defineView('theLeo', 'our-developments', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
