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
          profileTableClass::PROFILE_HASH
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      $building_hash = request::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true));


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
          buildingTableClass::ID_SUPER,
          buildingTableClass::CREATED_AT,
          buildingTableClass::UPDATED_AT,
          buildingTableClass::SYNC_ID_SYNC
      );
      $where_buildings = array(
          buildingTableClass::BUILDING_HASH => $building_hash
      );
      $objBuilding = $this->objBuilding = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

      $building_field_id = buildingTableClass::ID;

      $building_id = $objBuilding[0]->$building_field_id;

      /** SUPER INFO* */
      $super_fields = array(
          superTableClass::ID,
          superTableClass::SUPER_EMAIL_ADDRESS,
          superTableClass::SUPER_PHONE_NUMBER,
          superTableClass::SUPER_NOTES,
          superTableClass::SUPER_HASH,
          superTableClass::CREATED_AT,
          superTableClass::UPDATED_AT
      );
      $where_super = array(
          superTableClass::SUPER_HASH => $building_hash
      );
      $this->objSuper = superTableClass::getAll($super_fields, true, null, null, null, null, $where_super);

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

      /** AMENITIES INFO* */
      $amenities_fields = array(
          amenitiesTableClass::ID,
          amenitiesTableClass::DESCRIPTION_AMENITIES,
          amenitiesTableClass::CREATED_AT,
          amenitiesTableClass::UPDATED_AT
      );
      $OrderBy_amenities = array(
          amenitiesTableClass::ID
      );
      $this->objAmenities = amenitiesTableClass::getAll($amenities_fields, true, $OrderBy_amenities, 'ASC');
      
      /** listing Info **/
      
      $building_field_id_landlord = buildingTableClass::ID_LANDLORD;

      $building_id_landlord = $objBuilding[0]->$building_field_id_landlord;
      
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
          listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
          listingTableClass::BUILDING_ID_BUILDING,
          listingTableClass::LANDLORD_ID_LANDLORD,
          listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
          listingTableClass::LISTING_HASH,
          listingTableClass::CREATED_AT,
          listingTableClass::UPDATED_AT
      );
      $where_listing = array(
          listingTableClass::LANDLORD_ID_LANDLORD => $building_id_landlord,
          listingTableClass::BUILDING_ID_BUILDING => $building_id
      );
      
      $this->objListings = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);
      session::getInstance()->setFlash("building_manage", "building_manage");
      $this->defineView('manage', 'building', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
