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
      
      /**
       * get Team Types
       */
      $fields_team = array(
          teamTypeTableClass::ID,
          teamTypeTableClass::DESCRIPTION_TEAM_TYPE,
          teamTypeTableClass::TEAM_TYPE_HASH,
          teamTypeTableClass::CREATED_AT,
          teamTypeTableClass::UPDATED_AT
      );
      $OrderBy_team = array(
          teamTypeTableClass::ID
      );
      session::getInstance()->setFlash("team_type", "team_type");
      $this->objTeamType = teamTypeTableClass::getAll($fields_team, true, $OrderBy_team, 'ASC');
      $this->defineView('index', 'team_type', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
