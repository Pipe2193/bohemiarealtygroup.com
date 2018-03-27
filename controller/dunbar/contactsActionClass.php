<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of contactsActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class contactsActionClass extends controllerClass implements controllerActionInterface {

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
             * Get Dunbar Contacts
             */
            $dunbar_contacts = array(
                contactFormTableClass::ID,
                contactFormTableClass::APP_ID_APP,
                contactFormTableClass::FIRST_NAME,
                contactFormTableClass::LAST_NAME,
                contactFormTableClass::EMAIL_ADDRESS,
                contactFormTableClass::PHONE_NUMBER,
                contactFormTableClass::APT_SIZE,
                contactFormTableClass::MAX_RENT_PRICE,
                contactFormTableClass::OPEN_HOUSE,
                contactFormTableClass::PRIVATE_OPENHOUSE_DATE,
                contactFormTableClass::PRIVATE_OPENHOUSE_TIME,
                contactFormTableClass::CREATED_AT
            );

            $dunbar_contact_order_by = array(
                contactFormTableClass::ID
            );
            $dunbar_contacts_where = array(
                contactFormTableClass::APP_ID_APP => 1
            );
            $this->objDunbarContacts = contactFormTableClass::getAll($dunbar_contacts, true, $dunbar_contact_order_by, 'DESC', null, null, $dunbar_contacts_where);

            $this->defineView('contacts', 'dunbar', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
