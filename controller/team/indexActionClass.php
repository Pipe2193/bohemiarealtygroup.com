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
       * 
       */
      $fields_team = array(
          teamTableClass::ID,
          teamTableClass::TEAM_NAME,
          teamTableClass::TEAM_DESCRIPTION,
          teamTableClass::TEAM_TYPE_ID_TEAM_TYPE,
          teamTableClass::STATUS,
          teamTableClass::TEAM_HASH,
          teamTableClass::CREATED_AT,
          teamTableClass::UPDATED_AT
      );
      $OrderBy_team = array(
          teamTableClass::TEAM_NAME
      );
      session::getInstance()->setFlash("team_index", "team_index");
      $this->objTeams = teamTableClass::getAll($fields_team, true, $OrderBy_team, 'ASC');
      $this->defineView('index', 'team', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
