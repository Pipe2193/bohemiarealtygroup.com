<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of editActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

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
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      $listing_hash = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true));


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
          listingTableClass::LOCKBOX_LISTING,
          listingTableClass::FLOOR_NUMBER_LISTING,
          listingTableClass::NOTES_LISTING,
          listingTableClass::DESCRIPTION_LISTING,
          listingTableClass::CONTACT_FIRST_NAME,
          listingTableClass::CONTACT_MIDDLE_NAME,
          listingTableClass::CONTACT_LAST_NAME,
          listingTableClass::CONTACT_EMAIL_ADDRESS,
          listingTableClass::CONTACT_PHONE_NUMBER,
          listingTableClass::CONTACT_NOTES,
          listingTableClass::STATUS,
          listingTableClass::EMAIL_NOTIFICATION_STATUS,
          listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
          listingTableClass::BUILDING_ID_BUILDING,
          listingTableClass::LANDLORD_ID_LANDLORD,
          listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
          listingTableClass::LISTING_HASH,
          listingTableClass::CREATED_AT,
          listingTableClass::UPDATED_AT
      );
      $where_listing = array(
          listingTableClass::LISTING_HASH => $listing_hash,
      );

      $this->objListing = $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);


      /** LISTING FEATURES INFO* */
      $listing_features_fields = array(
          listingFeaturesTableClass::ID,
          listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE,
          listingFeaturesTableClass::LAYOUT_ID_LAYOUT,
          listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE,
          listingFeaturesTableClass::LISTING_FEATURES_HASH,
          listingFeaturesTableClass::CREATED_AT,
          listingFeaturesTableClass::UPDATED_AT
      );
      $where_listing_features = array(
          listingFeaturesTableClass::LISTING_FEATURES_HASH => $listing_hash
      );
      $this->objListingFeatures = listingFeaturesTableClass::getAll($listing_features_fields, true, null, null, null, null, $where_listing_features);

      /** LISTING AMENITIES INFO* */
      $listing_amenities_fields = array(
          listingAmenitiesTableClass::ID,
          listingAmenitiesTableClass::RENTAL_AMENITIES_ID_RENTAL_AMENITIES,
          listingAmenitiesTableClass::RENTAL_AMENITY_STATUS,
          listingAmenitiesTableClass::CREATED_AT,
          listingAmenitiesTableClass::UPDATED_AT
      );
      $where_listing_amenities = array(
          listingAmenitiesTableClass::LISTING_AMENITIES_HASH => $listing_hash
      );
      $this->objListingAmenities = listingAmenitiesTableClass::getAll($listing_amenities_fields, true, null, null, null, null, $where_listing_amenities);

      /**RENTAL AMENITIES INFO* */
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

      $this->objLandlords = $this->getLandlords();
      $listing_landlord_id_field = listingTableClass::LANDLORD_ID_LANDLORD;
      $listing_landlord_id = $objListing[0]->$listing_landlord_id_field;
      $this->objBuildings = $this->getBuildingsByLandlord($listing_landlord_id);

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

      session::getInstance()->setFlash("listing_edit", "listing_edit");
      $this->defineView('edit', 'listing', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getLandlords() {

    $fields_landlord = array(
        landlordTableClass::ID,
        landlordTableClass::DESCRIPTION_LANDLORD,
        landlordTableClass::LANDLORD_HASH
    );
    $OrderBy_landlords = array(
        landlordTableClass::ID
    );
    $objLandlord = landlordTableClass::getAll($fields_landlord, true, $OrderBy_landlords, 'ASC');
    return $objLandlord;
  }

  public function getBuildingsByLandlord($landlord_id) {

    $fields_buildings = array(
        buildingTableClass::ID,
        buildingTableClass::ADDRESS,
        buildingTableClass::BUILDING_HASH
    );
    $OrderBy_buildings = array(
        buildingTableClass::ADDRESS
    );
    $where_building = array(
        buildingTableClass::ID_LANDLORD => $landlord_id
    );
    $objBuilding = buildingTableClass::getAll($fields_buildings, true, $OrderBy_buildings, 'ASC', null, null, $where_building);
    return $objBuilding;
  }

}
