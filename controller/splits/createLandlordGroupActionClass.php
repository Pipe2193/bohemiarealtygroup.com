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
class createLandlordGroupActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                $landlord_group_name = request::getInstance()->getPost(landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true));
                $landlord_group_hash = md5(md5(date('U')));
                $landlord_splits_fields = array(
                    landlordGroupTableClass::ID => NULL,
                    landlordGroupTableClass::LANDLORD_GROUP_NAME => $landlord_group_name,
                    landlordGroupTableClass::LANDLORD_GROUP_HASH => $landlord_group_hash
                );

                landlordGroupTableClass::insert($landlord_splits_fields);
                session::getInstance()->setSuccess(' The Landlord Group <b>' . $landlord_group_name . '  has been added successfully!. Please set Splits information</b>');
                routing::getInstance()->redirect('splits', 'editLandlordGroup', array(landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_HASH, true) => $landlord_group_hash));
            } else {
                session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request. The request is not allowed. ");
                routing::getInstance()->redirect('splits', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
