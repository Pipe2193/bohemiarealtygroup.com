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
class indexActionClass extends controllerClass implements controllerActionInterface {

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
      
      /**
       * Get Neighborhoods
       */
      $neighborhoods = array(
          neighborhoodTableClass::ID,
          neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD,
          neighborhoodTableClass::BOROUGH_ID_BOROUGH,
          neighborhoodTableClass::CREATED_AT,
          neighborhoodTableClass::UPDATED_AT,
          neighborhoodTableClass::DELETED_AT,
      );
      $orderBy_neigborhoods = array(
          neighborhoodTableClass::ID
      );
      session::getInstance()->setFlash("neighborhood_index", "neighborhood_index");
      $this->objNeighborhoods = neighborhoodTableClass::getAll($neighborhoods, true, $orderBy_neigborhoods, 'ASC');
      $this->defineView('index', 'neighborhood', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
