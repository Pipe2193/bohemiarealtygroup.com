<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of manageActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class manageActionClass extends controllerClass implements controllerActionInterface {

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
          profileBaseTableClass::PROFILE_HASH
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      /**
       * GET SALES LISTING INFO
       */
      $sales_listing_hash = request::getInstance()->getGet(salesListingTableClass::getNameField(salesListingTableClass::SALES_LISTING_HASH, true));

      $sales_listing_id = salesListingTableClass::getSalesListingId($sales_listing_hash);

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
          salesListingTableClass::SALES_LISTING_HASH,
          salesListingTableClass::DESCRIPTION
      );

      $where_sales_listing = array(
          salesListingTableClass::ID => $sales_listing_id
      );

      $order_by_sales_listing = array(
          salesListingTableClass::ID
      );

      $this->objSalesListings = salesListingTableClass::getAll($sales_listing_fields, true, $order_by_sales_listing, 'ASC', null, null, $where_sales_listing);


      session::getInstance()->setFlash("sale_listing_manage", "sale_listing_manage");
      $this->defineView('manage', 'sales_listing', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
