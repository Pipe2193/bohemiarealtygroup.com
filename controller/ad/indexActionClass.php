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
       * LANDLORD INFO
       */
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
       * Building info
       */
      $building_fields = array(
          buildingTableClass::ID,
          buildingTableClass::DESCRIPTION_BUILDING,
          buildingTableClass::ADDRESS,
          buildingTableClass::CITY,
          buildingTableClass::STATE_ID,
          buildingTableClass::ZIPCODE,
          buildingTableClass::ADDON_CODES_ZIPCODE,
          buildingTableClass::CROSS_ADDRESS,
          buildingTableClass::STATUS,
          buildingTableClass::ID_BUILDING_FEATURES,
          buildingTableClass::ID_LANDLORD,
          buildingTableClass::ID_NEIGHBORHOOD,
          buildingTableClass::NOTES_BUILDING,
          buildingTableClass::BUILDING_HASH,
          buildingTableClass::CREATED_AT,
          buildingTableClass::UPDATED_AT
      );
      $buildings_OrderBy = array(
          buildingTableClass::ID
      );
      $this->objBuildings = buildingTableClass::getAll($building_fields, true, $buildings_OrderBy, 'ASC');
      /** LISTING SIZE INFO * */
      $fields_listing_size = array(
          listingSizeTableClass::ID,
          listingSizeTableClass::DESCRIPTION_LISTING_SIZE,
      );
      $OrderBy_listing_size = array(
          listingSizeTableClass::ID
      );
      $this->objListingSize = listingSizeTableClass::getAll($fields_listing_size, true, $OrderBy_listing_size, 'ASC');
      /** ACCESS INFO * */
      $fields_access = array(
          accessTableClass::ID,
          accessTableClass::ACCESS_DESCRIPTION
      );
      $OrderBy_access = array(
          accessTableClass::ID
      );
      $this->objAccess = accessTableClass::getAll($fields_access, true, $OrderBy_access, 'ASC');
      /** FLOOR TYPE * */
      $fields_floor_type = array(
          floorTypeTableClass::ID,
          floorTypeTableClass::DESCRIPTION_FLOOR_TYPE
      );
      $OrderBy_floor_type = array(
          floorTypeTableClass::ID
      );
      $this->objFloorType = floorTypeTableClass::getAll($fields_floor_type, true, $OrderBy_floor_type, 'ASC');
      /** OUTDOOR SPACE * */
      $fields_outdoor_space = array(
          outdoorSpaceTableClass::ID,
          outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE
      );
      $OrderBy_outdoor_space = array(
          outdoorSpaceTableClass::ID
      );
      $this->objOutdoorSpace = outdoorSpaceTableClass::getAll($fields_outdoor_space, true, $OrderBy_outdoor_space, 'ASC');
      /** LAYOUT  * */
      $fields_layout = array(
          layoutTableClass::ID,
          layoutTableClass::DESCRIPTION_LAYOUT
      );
      $OrderBy_layout = array(
          layoutTableClass::ID
      );
      $this->objLayout = layoutTableClass::getAll($fields_layout, true, $OrderBy_layout, 'ASC');

      /** RENTAL AMENITIES * */
      $rental_amenities_fields = array(
          rentalAmenitiesTableClass::ID,
          rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES,
          rentalAmenitiesTableClass::CREATED_AT,
          rentalAmenitiesTableClass::UPDATED_AT
      );
      $OrderBy_rental_amenities = array(
          rentalAmenitiesTableClass::ID
      );
      $this->objRentalAmenities = rentalAmenitiesTableClass::getAll($rental_amenities_fields, true, $OrderBy_rental_amenities, 'ASC');


      session::getInstance()->setFlash("listing_index", "listing_index");
      $this->defineView('index', 'listing', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
