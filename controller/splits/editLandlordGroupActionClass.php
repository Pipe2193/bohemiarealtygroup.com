<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of editLandlordGroupActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class editLandlordGroupActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {


        try {

            if (request::getInstance()->hasGet(landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_HASH, true))) {
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

                $landlord_group_hash = request::getInstance()->getGet(landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_HASH, true));
                $landlord_group_id = landlordGroupTableClass::getLandlordGroupIdByHash($landlord_group_hash);

                $landord_agent_splits = array(
                    landlordAgentSplitsTableClass::AGENT_GROUP_ID,
                    landlordAgentSplitsTableClass::AGENT_GROUP_PERCENT,
                    landlordAgentSplitsTableClass::LANDLORD_GROUP_ID,
                    landlordAgentSplitsTableClass::ID,
                    landlordAgentSplitsTableClass::CREATED_AT,
                    landlordAgentSplitsBaseTableClass::UPDATED_AT
                );

                $landlord_agent_splits_order_by = array(
                    landlordAgentSplitsTableClass::ID
                );

                $landlord_group_where = array(
                    landlordAgentSplitsTableClass::LANDLORD_GROUP_ID => $landlord_group_id
                );
                $this->objLandlordAgentSplits = landlordAgentSplitsTableClass::getAll($landord_agent_splits, true, $landlord_agent_splits_order_by, 'ASC', null, null, $landlord_group_where);
                $this->defineView('editLandlordGroup', 'splits', session::getInstance()->getFormatOutput());
            } else {
                session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request. ");
                routing::getInstance()->redirect('splits', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
