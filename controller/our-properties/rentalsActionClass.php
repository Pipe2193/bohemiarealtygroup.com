<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of rentalsActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class rentalsActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {
      /**
       * building type
       */
      $fields_building_type = array(
          buildingTypeTableClass::ID,
          buildingTypeTableClass::DESCRIPTION_BUILDING_TYPE
      );
      $OrderBy_building_type = array(
          buildingTypeTableClass::ID
      );
      $this->objBuildingType = buildingTypeTableClass::getAll($fields_building_type, true, $OrderBy_building_type, 'ASC');
      /**
       * neighborhood
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
       * pets policy
       */
      $fields_pets_policy = array(
          petsPolicyTableClass::ID,
          petsPolicyTableClass::DESCRIPTION_PETS_CASE,
      );
      $OrderBy_pets_policy = array(
          petsPolicyTableClass::ID
      );
      $this->objPetsPolicy = petsPolicyTableClass::getAll($fields_pets_policy, true, $OrderBy_pets_policy, 'ASC');
      /**
       * listing size
       */
      $fields_listing_size = array(
          listingSizeTableClass::ID,
          listingSizeTableClass::DESCRIPTION_LISTING_SIZE,
      );
      $OrderBy_listing_size = array(
          listingSizeTableClass::ID
      );
      $this->objListingSize = listingSizeTableClass::getAll($fields_listing_size, true, $OrderBy_listing_size, 'ASC');

      $this->defineView('rentals', 'our-properties', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
