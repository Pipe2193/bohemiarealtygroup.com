<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of syncActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class syncActionClass extends controllerClass implements controllerActionInterface {

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
       * rental deals info
       */
      $rental_deals_fields = array(
          rentalDealsTableClass::ID,
          rentalDealsTableClass::ADDRESS,
          rentalDealsTableClass::RENT,
          rentalDealsTableClass::RENTAL_DEAL_FEE,
          rentalDealsTableClass::LANDLORD_ID_LANDLORD,
          rentalDealsTableClass::DEAL_MOVE_IN_DATE,
          rentalDealsTableClass::USUARIO_ID,
          rentalDealsTableClass::DEAL_DATE_RENTED,
          rentalDealsTableClass::DEAL_DATE_CLOSED,
          rentalDealsTableClass::STATUS,
          rentalDealsTableClass::RENTAL_DEAL_NOTES,
          rentalDealsTableClass::LISTING_ID_LISTING,
          rentalDealsTableClass::UNIT,
          rentalDealsTableClass::DEAL_TYPE,
          rentalDealsTableClass::RENTAL_DEALS_HASH,
          rentalDealsTableClass::CREATED_AT,
          rentalDealsTableClass::UPDATED_AT
      );

      $rental_deals_OrderBy = array(
          rentalDealsTableClass::ID
      );

      $this->objRentalDeals = rentalDealsTableClass::getAll($rental_deals_fields, true, $rental_deals_OrderBy, 'ASC');


      session::getInstance()->setFlash("deals_add", "deals_add");
      $this->defineView('add', 'deal', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
