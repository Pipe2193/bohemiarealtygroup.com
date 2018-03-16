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

      $landlord_group_fields = array(
          landlordGroupTableClass::ID,
          landlordGroupTableClass::LANDLORD_GROUP_NAME,
          landlordGroupTableClass::BOHEMIA_PERCENT,
          landlordGroupTableClass::UPDATED_AT,
      );

      $landlord_group_order_by = array(
          landlordGroupTableClass::ID
      );
      $this->ObjLandlordGroups = landlordGroupTableClass::getAll($landlord_group_fields, true, $landlord_group_order_by, 'ASC');

      $splits_fields = array(
          splitsTableClass::ID,
          splitsTableClass::LANDLORD_ID_LANDLORD,
          splitsTableClass::USUARIO_ID,
          splitsTableClass::SPLIT_PERCENTAGE,
          splitsTableClass::PROFILE,
          splitsTableClass::FULLTEXT_INDEX,
          splitsTableClass::UPDATED_AT,
      );

      $splits_order_by = array(
          splitsTableClass::ID
      );
      $this->ObjSplits = splitsTableClass::getAll($splits_fields, true, $splits_order_by, 'ASC', null, null, $where);

      $agent_Group_fields = array(
          agentGroupTableClass::ID,
          agentGroupTableClass::DEFAULT_GROUP,
          agentGroupTableClass::AGENT_GROUP_NAME
      );
      $agent_group_order_by = array(
          agentGroupTableClass::ID
      );

      $this->ObjAgentGroup = agentGroupTableClass::getAll($agent_Group_fields, true, $agent_group_order_by, 'ASC');

      session::getInstance()->setFlash("splits_index", "splits_index");
      $this->defineView('index', 'splits', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
