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
class accountActionClass extends controllerClass implements controllerActionInterface {

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
          profileTableClass::PROFILE_HASH
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      /**
       * Listing Assignment info
       */
      $listing_assignment_fields = array(
          listingAssignmentTableClass::ID,
          listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH,
          listingAssignmentTableClass::LISTING_ID_LISTING,
          listingAssignmentTableClass::USUARIO_ID,
          listingAssignmentTableClass::STATUS,
          listingAssignmentTableClass::CREATED_AT,
          listingAssignmentTableClass::UPDATED_AT
      );
      $where_listing_assignment = array(
          
      listingAssignmentTableClass::USUARIO_ID => session::getInstance()->getUserId(),
      listingAssignmentTableClass::STATUS => 1
      );

      $this->objListingAssignments = listingAssignmentTableClass::getAll($listing_assignment_fields, true, null, 'DESC', null, null, $where_listing_assignment);

      $this->defineView('account', 'listing', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
