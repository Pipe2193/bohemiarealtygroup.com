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

        $team_name = strtoupper(request::getInstance()->getPost(teamTableClass::getNameField(teamTableClass::TEAM_NAME, true)));
        $team_description = request::getInstance()->getPost(teamTableClass::getNameField(teamTableClass::TEAM_DESCRIPTION, true));
        $team_id_type = request::getInstance()->getPost(teamTableClass::getNameField(teamTableClass::TEAM_TYPE_ID_TEAM_TYPE, true));
        $team_id_usuario_leader = request::getInstance()->getPost(teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true));
        $team_id_usuario_co_leader = request::getInstance()->getPost(teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID . '_co', true));
        $status = 1;

        if (teamTableClass::getVerifyExistingTeam($team_name) == false) {

          $team_hash = md5(md5(date('U')));

          $data = array(
              teamTableClass::ID => null,
              teamTableClass::TEAM_NAME => $team_name,
              teamTableClass::TEAM_DESCRIPTION => $team_description,
              teamTableClass::TEAM_TYPE_ID_TEAM_TYPE => $team_id_type,
              teamTableClass::STATUS => $status,
              teamTableClass::TEAM_HASH => $team_hash
          );

          teamTableClass::insert($data);
          $team_id = teamTableClass::getIdNewTeam($team_hash);
          
          $data_team_leader = array(
              teamLeaderTableClass::ID => null,
              teamLeaderTableClass::MAIN_LEADER => 1,
              teamLeaderTableClass::TEAM_ID_TEAM => $team_id,
              teamLeaderTableClass::USUARIO_ID => $team_id_usuario_leader,
              teamLeaderTableClass::TEAM_LEADER_HASH => $team_hash
          );

          teamLeaderTableClass::insert($data_team_leader);

          if(!empty($team_id_usuario_co_leader)) {

            $data_team_co_leader = array(
                teamLeaderTableClass::ID => null,
                teamLeaderTableClass::MAIN_LEADER => 0,
                teamLeaderTableClass::TEAM_ID_TEAM => $team_id,
                teamLeaderTableClass::USUARIO_ID => $team_id_usuario_co_leader,
                teamLeaderTableClass::TEAM_LEADER_HASH => $team_hash
            );
            teamLeaderTableClass::insert($data_team_co_leader);
          }

          session::getInstance()->setSuccess("The Team <b>" . $team_name . "</b> has been Successfully Registered.");
          routing::getInstance()->redirect('team', 'index');
        } else {
          session::getInstance()->setError("The Team name <b>" . $team_name . " is already registered.");
          routing::getInstance()->redirect('team', 'index');
        }
      } else {
        routing::getInstance()->redirect('team', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
