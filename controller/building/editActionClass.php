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
      if (request::getInstance()->isMethod("GET")) {

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

        if (request::getInstance()->hasGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true))) {
          /**
           * GET LANDLORD INFO
           */
          $building_hash = request::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true));

//         /** BUILDING INFO* */
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
              buildingTableClass::UPDATED_AT
          );
          $where_buildings = array(
              buildingTableClass::BUILDING_HASH => $building_hash
          );

          session::getInstance()->setFlash("building_edit", "building_edit");
          $objBuilding = $this->objBuilding = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);
          $building_id_building_field = buildingTableClass::ID;
          $building_id_building = $objBuilding[0]->$building_id_building_field;

          $this->objLandlords = $this->getLandlords();
          $this->objStates = $this->getStates();
          $this->objNeighborhoods = $this->getNeighborhoods();
          $this->objAccess = $this->getAccess();
          $this->objPetsPolicy = $this->getPetsPolicy();
          $this->objListingType = $this->getListingType();
          $this->objOutdoorSpace = $this->getOutdoorSpace();
          $this->objDoorman = $this->getDoorman();
          $this->objBuildingType = $this->getBuildingType();
          $this->objAge = $this->getAge();
          $this->objAmenities = $this->getAmenities();

          /** SUPER INFO* */
          $super_fields = array(
              superTableClass::ID,
              superTableClass::SUPER_FIRST_NAME,
              superTableClass::SUPER_MIDDLE_NAME,
              superTableClass::SUPER_LAST_NAME,
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

          $this->defineView('edit', 'building', session::getInstance()->getFormatOutput());
        } else {
          session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Landlord Token (hash)</b> is missing, please try again!.  ");
          routing::getInstance()->redirect("landlord", "index");
        }
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.It doesn't meet the established parameters, please try again!.  ");
        routing::getInstance()->redirect("shfSecurity", "noPermission");
      }
      $this->defineView('edit', 'building', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getCredencials() {
    $credencials = array(
        credencialTableClass::ID,
        credencialTableClass::NOMBRE,
        credencialTableClass::CREATED_AT,
        credencialTableClass::UPDATED_AT,
        credencialTableClass::DELETED_AT,
    );
    $credencialOrderBy = array(
        credencialTableClass::ID
    );
    $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
    return $objCredencials;
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

  public static function getUsersProfiles() {

    $fields_profile = array(
        profileTableClass::FIRST_NAME,
        profileTableClass::MIDDLE_NAME,
        profileTableClass::LAST_NAME,
        profileTableClass::USUARIO_ID
    );
    $OrderBy_profile = array(
        profileTableClass::USUARIO_ID
    );
    $objProfiles = profileTableClass::getAll($fields_profile, true, $OrderBy_profile, 'ASC');


    return $objProfiles;
  }

  public function getListingType() {

    $fields_listing_type = array(
        listingTypeTableClass::ID,
        listingTypeTableClass::DESCRIPTION_LISTING_TYPE,
    );
    $OrderBy_listing_type = array(
        listingTypeTableClass::ID
    );
    $objListingType = listingTypeTableClass::getAll($fields_listing_type, true, $OrderBy_listing_type, 'ASC');
    return $objListingType;
  }

  public function getStates() {

    $fields_states = array(
        statesTableClass::ID,
        statesTableClass::STATE_NAME,
        statesTableClass::ACCRON
    );
    $OrderBy_states = array(
        statesTableClass::ID
    );
    $objStates = statesTableClass::getAll($fields_states, true, $OrderBy_states, 'ASC');
    return $objStates;
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

  public function getAccess() {

    $fields_access = array(
        accessTableClass::ID,
        accessTableClass::ACCESS_DESCRIPTION
    );
    $OrderBy_access = array(
        accessTableClass::ID
    );
    $objAccesses = accessTableClass::getAll($fields_access, true, $OrderBy_access, 'ASC');
    return $objAccesses;
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

  public static function getNeighborhoods() {

    $fields_neighborhood = array(
        neighborhoodTableClass::ID,
        neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD,
        neighborhoodTableClass::BOROUGH_ID_BOROUGH
    );
    $OrderBy_neighborhood = array(
        neighborhoodTableClass::ID
    );
    $objNeighborhood = neighborhoodTableClass::getAll($fields_neighborhood, true, $OrderBy_neighborhood, 'ASC');
    return $objNeighborhood;
  }

}
