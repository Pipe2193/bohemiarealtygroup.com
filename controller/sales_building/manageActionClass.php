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
       * GET LANDLORD INFO
       */
      $sales_building_hash = request::getInstance()->getGet(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true));
      /**
       * Sales Building info
       */
      $sales_building_id = salesBuildingTableClass::getSalesBuildingId($sales_building_hash);

      $sales_building_fields = array(
          salesBuildingTableClass::ID,
          salesBuildingTableClass::ADDRESS,
          salesBuildingTableClass::NAME,
          salesBuildingTableClass::CROSS_STREET1,
          salesBuildingTableClass::CROSS_STREET2,
          salesBuildingTableClass::YEAR_BUILT,
          salesBuildingTableClass::FLOOR_COUNT,
          salesBuildingTableClass::APARTMENT_COUNT,
          salesBuildingTableClass::CITY,
          salesBuildingTableClass::STATE,
          salesBuildingTableClass::YEAR_BUILT,
          salesBuildingTableClass::ZIPCODE,
          salesBuildingTableClass::NEIGHBORHOOD_NAME,
          salesBuildingTableClass::BUILDING_POLICY,
          salesBuildingTableClass::PET_POLICY_DESC,
          salesBuildingTableClass::CREATED_AT,
          salesBuildingTableClass::UPDATED_AT,
          salesBuildingTableClass::SALES_BUILDING_HASH
      );
      $where_sales_buildings = array(
          salesBuildingTableClass::ID => $sales_building_id
      );

      $this->objSalesBuilding = salesBuildingTableClass::getAll($sales_building_fields, true, null, 'ASC', null, null, $where_sales_buildings);

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
          saleslistingTableClass::BUILDING_ID => $sales_building_id
      );
      $order_by_sales_listing = array(
          saleslistingTableClass::ID
      );

      $this->objSalesListings = saleslistingTableClass::getAll($sales_listing_fields, true, $order_by_sales_listing, 'ASC', null, null, $where_sales_listing);


      session::getInstance()->setFlash("sale_building_manage", "sale_building_manage");
      $this->defineView('manage', 'sales_building', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
