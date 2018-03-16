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
       * Listing info
       */
      $listing_fields = array(
          listingTableClass::ID,
          listingTableClass::RENT_LISTING,
          listingTableClass::UNIT_NUMBER_LISTING,
          listingTableClass::BATH_SIZE_LISTING,
          listingTableClass::FEE_OP_LISTING,
          listingTableClass::CUSTOM_FEE_OP_LISTING,
          listingTableClass::LEASE_TERM_START,
          listingTableClass::LEASE_TERM_END,
          listingTableClass::ACCESS_ID_ACCESS,
          listingTableClass::NOTES_LISTING,
          listingTableClass::DESCRIPTION_LISTING,
          listingTableClass::CONTACT_FIRST_NAME,
          listingTableClass::CONTACT_MIDDLE_NAME,
          listingTableClass::CONTACT_LAST_NAME,
          listingTableClass::CONTACT_EMAIL_ADDRESS,
          listingTableClass::CONTACT_PHONE_NUMBER,
          listingTableClass::CONTACT_NOTES,
          listingTableClass::STATUS,
          listingTableClass::LOCKBOX_LISTING,
          listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
          listingTableClass::BUILDING_ID_BUILDING,
          listingTableClass::LANDLORD_ID_LANDLORD,
          listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
          listingTableClass::LISTING_HASH,
          listingTableClass::CREATED_AT,
          listingTableClass::UPDATED_AT
      );
      $listing_OrderBy = array(
          listingTableClass::ID
      );

      $this->objListings = listingTableClass::getAll($listing_fields, true, $listing_OrderBy, 'ASC');


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
       * Sales Listing info
       */
      $sales_listing_fields = array(
          salesListingTableClass::ID,
          salesListingTableClass::BUILDING_ID,
          salesListingTableClass::APT_NUMBER,
          salesListingTableClass::PRICE,
          salesListingTableClass::BATHS,
          salesListingTableClass::BEDROOMS,
          salesListingTableClass::AVAILABILITY_STATUS,
          salesListingTableClass::DATE_LISTED,
          salesListingTableClass::DATE_MODIFIED,
          salesListingTableClass::SALES_LISTING_HASH
      );
      $where_sales_listing = array(
          salesListingTableClass::AVAILABILITY_STATUS => 'AVAILABLE'
      );

      $order_by_sales_listing = array(
          salesListingTableClass::ID
      );

      $this->objSalesListings = salesListingTableClass::getAll($sales_listing_fields, true, $order_by_sales_listing, 'ASC', null, null, $where_sales_listing);

      $this->defineView('index', 'syndication_log', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
