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

      /**
       * listing size info
       */
      $fields_listing_size = array(
          listingSizeTableClass::ID,
          listingSizeTableClass::DESCRIPTION_LISTING_SIZE,
      );
      $OrderBy_listing_size = array(
          listingSizeTableClass::ID
      );
      $this->objListingSize = listingSizeTableClass::getAll($fields_listing_size, true, $OrderBy_listing_size, 'ASC');

      /**
       * user info
       */
      $fieldsUser = array(
          usuarioTableClass::ID,
          usuarioTableClass::USER,
          usuarioTableClass::PASSWORD,
          usuarioTableClass::EMAIL_ADDRESS,
          usuarioTableClass::ACTIVED,
          usuarioTableClass::USER_HASH,
          usuarioTableClass::LAST_LOGIN_AT,
          usuarioTableClass::CREATED_AT,
          usuarioTableClass::UPDATED_AT
      );

      $where_filter = array(
          usuarioTableClass::ACTIVED => 1
      );
      $OrderBy_filter = array(
          usuarioTableClass::ID
      );
      $this->objUsers = usuarioTableClass::getAll($fieldsUser, true, $OrderBy_filter, 'ASC', null, null, $where_filter);

      /**
       * neighborhood info
       */
      $fields_neighborhood = array(
          neighborhoodTableClass::ID,
          neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD,
          neighborhoodTableClass::BOROUGH_ID_BOROUGH
      );
      $OrderBy_neighborhood = array(
          neighborhoodTableClass::ID
      );
      $this->objNeighborhood = neighborhoodTableClass::getAll($fields_neighborhood, true, $OrderBy_neighborhood, 'ASC');

      /**
       * teams info
       */
      $fields_team = array(
          teamTableClass::ID,
          teamTableClass::TEAM_NAME
      );
      $OrderBy_team = array(
          teamTableClass::TEAM_NAME
      );
      $this->objTeams = teamTableClass::getAll($fields_team, true, $OrderBy_team, 'ASC', null, 1);


      $landlord_fields = array(
          landlordTableClass::ID,
          landlordTableClass::DESCRIPTION_LANDLORD,
          landlordTableClass::PHONE_NUMBER,
          landlordTableClass::FAX_NUMBER,
          landlordTableClass::ADDRESS,
          landlordTableClass::ZIPCODE,
          landlordTableClass::EMAIL_ADDRESS,
          landlordTableClass::STATUS,
          landlordTableClass::NOTES_LANDLORD,
          landlordTableClass::PETS_CASE_ID,
          landlordTableClass::LISTING_TYPE_ID,
          landlordTableClass::LISTING_MANAGER_ID,
          landlordTableClass::LANDLORD_HASH,
          landlordTableClass::CREATED_AT,
          landlordTableClass::UPDATED_AT
      );
      $landlord_OrderBy = array(
          landlordTableClass::ID
      );
      $this->objLandlords = landlordTableClass::getAll($landlord_fields, true, $landlord_OrderBy, 'ASC');

      /**
       * sales deals info
       */
      $sales_deals_fields = array(
          salesDealsTableClass::ID,
          salesDealsTableClass::ADDRESS,
          salesDealsTableClass::RENT,
          salesDealsTableClass::FEE,
          salesDealsTableClass::LANDLORD_ID_LANDLORD,
          salesDealsTableClass::DEAL_MOVE_IN_DATE,
          salesDealsTableClass::USUARIO_ID,
          salesDealsTableClass::SALES_DEAL_DATE_SOLD,
          salesDealsTableClass::SALES_DEAL_DATE_CLOSED,
          salesDealsTableClass::STATUS,
          salesDealsTableClass::DEAL_NOTES,
          salesDealsTableClass::LISTING_ID_LISTING,
          salesDealsTableClass::UNIT,
          salesDealsTableClass::DEAL_TYPE,
          salesDealsTableClass::SALES_DEALS_HASH,
          salesDealsTableClass::CREATED_AT,
          salesDealsTableClass::UPDATED_AT
      );

      $sales_deals_OrderBy = array(
          salesDealsTableClass::ID
      );

      $this->objSalesDeals = salesDealsTableClass::getAll($sales_deals_fields, true, $sales_deals_OrderBy, 'ASC');

      session::getInstance()->setFlash("deals_index", "deals_index");
      $this->defineView('index', 'deal', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
