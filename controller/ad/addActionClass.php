<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of addActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class addActionClass extends controllerClass implements controllerActionInterface {

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

      $objListing = $this->objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);
      $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
      $building_id = $objListing[0]->$listing_building_id;
      /** BUILDING INFO* */
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
          buildingTableClass::ID_ACCESS,
          buildingTableClass::LOCKBOX_BUILDING,
          buildingTableClass::ID_LISTING_TYPE,
          buildingTableClass::ID_PETS_POLICY,
          buildingTableClass::ID_SUPER
      );
      $where_buildings = array(
          buildingTableClass::ID => $building_id
      );

      $objBuilding = $this->objBuilding = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

      $this->objPetsPolicy = $this->getPetsPolicy();
      $this->objOutdoorSpace = $this->getOutdoorSpace();
      $this->objDoorman = $this->getDoorman();
      $this->objBuildingType = $this->getBuildingType();
      $this->objAge = $this->getAge();
      $this->objAmenities = $this->getAmenities();

      $building_building_hash = buildingTableClass::BUILDING_HASH;
      $building_hash = $objBuilding[0]->$building_building_hash;

      /** BUILDING FEATURES INFO* */
      $building_features_fields = array(
          buildingFeaturesTableClass::ID,
          buildingFeaturesTableClass::ID_DORMAN,
          buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE,
          buildingFeaturesTableClass::AGE_ID_AGE,
          buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE,
          buildingFeaturesTableClass::BUILDING_FEATURES_HASH,
          buildingFeaturesTableClass::CREATED_AT,
          buildingFeaturesTableClass::UPDATED_AT
      );
      $where_building_features = array(
          buildingFeaturesTableClass::BUILDING_FEATURES_HASH => $building_hash
      );
      $this->objBuildingFeatures = buildingFeaturesTableClass::getAll($building_features_fields, true, null, null, null, null, $where_building_features);

      /** BUILDING AMENITIES INFO* */
      $building_amenities_fields = array(
          buildingAmenitiesTableClass::ID,
          buildingAmenitiesTableClass::AMENITIES_ID_AMENITIES,
          buildingAmenitiesTableClass::AMENITY_STATUS,
          buildingAmenitiesTableClass::CREATED_AT,
          buildingAmenitiesTableClass::UPDATED_AT
      );
      $where_building_amenities = array(
          buildingAmenitiesTableClass::BUILDING_AMENITIES_HASH => $building_hash
      );
      $this->objBuildingAmenities = buildingAmenitiesTableClass::getAll($building_amenities_fields, true, null, null, null, null, $where_building_amenities);

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
      
      /** FLOOR TYPE * */
      $fields_floor_type = array(
          floorTypeTableClass::ID,
          floorTypeTableClass::DESCRIPTION_FLOOR_TYPE
      );
      $OrderBy_floor_type = array(
          floorTypeTableClass::ID
      );
      $this->objFloorType = floorTypeTableClass::getAll($fields_floor_type, true, $OrderBy_floor_type, 'ASC');
      
      /** LAYOUT  * */
      $fields_layout = array(
          layoutTableClass::ID,
          layoutTableClass::DESCRIPTION_LAYOUT
      );
      $OrderBy_layout = array(
          layoutTableClass::ID
      );
      $this->objLayout = layoutTableClass::getAll($fields_layout, true, $OrderBy_layout, 'ASC');
      
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

      /** AMENITIES INFO* */
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

      session::getInstance()->setFlash("add_ad", "add_ad");
      $this->defineView('add', 'ad', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getPetsPolicy() {
    $fields_pets_policy = array(
        petsPolicyTableClass::ID,
        petsPolicyTableClass::DESCRIPTION_PETS_CASE,
        petsPolicyTableClass::CREATED_AT,
        petsPolicyTableClass::UPDATED_AT,
        petsPolicyTableClass::DELETED_AT,
    );
    $OrderBy_pets_policy = array(
        petsPolicyTableClass::ID
    );
    $objPetsPolicy = petsPolicyTableClass::getAll($fields_pets_policy, true, $OrderBy_pets_policy, 'ASC');
    return $objPetsPolicy;
  }

  public function getOutdoorSpace() {

    $fields_outdoor_space = array(
        outdoorSpaceTableClass::ID,
        outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE
    );
    $OrderBy_outdoor_space = array(
        outdoorSpaceTableClass::ID
    );
    $objOutdoorSpace = outdoorSpaceTableClass::getAll($fields_outdoor_space, true, $OrderBy_outdoor_space, 'ASC');
    return $objOutdoorSpace;
  }

  public function getDoorman() {

    $fields_doorman = array(
        doormanTableClass::ID,
        doormanTableClass::DESCRIPTION_DOORMAN
    );
    $OrderBy_doorman = array(
        doormanTableClass::ID
    );
    $objDoorman = doormanTableClass::getAll($fields_doorman, true, $OrderBy_doorman, 'ASC');
    return $objDoorman;
  }

  public function getBuildingType() {

    $fields_building_type = array(
        buildingTypeTableClass::ID,
        buildingTypeTableClass::DESCRIPTION_BUILDING_TYPE
    );
    $OrderBy_building_type = array(
        buildingTypeTableClass::ID
    );
    $objBuildingType = buildingTypeTableClass::getAll($fields_building_type, true, $OrderBy_building_type, 'ASC');
    return $objBuildingType;
  }

  public function getAge() {

    $fields_age = array(
        ageTableClass::ID,
        ageTableClass::DESCRIPTION_AGE
    );
    $OrderBy_age = array(
        ageTableClass::ID
    );
    $objAge = ageTableClass::getAll($fields_age, true, $OrderBy_age, 'ASC');
    return $objAge;
  }
  
  public static function getAmenities() {

    $fields_amenities = array(
        amenitiesTableClass::ID,
        amenitiesTableClass::DESCRIPTION_AMENITIES
    );
    $OrderBy_amenities = array(
        amenitiesTableClass::ID
    );
    $objAmenities = amenitiesTableClass::getAll($fields_amenities, true, $OrderBy_amenities, 'ASC');
    return $objAmenities;
  }

}
