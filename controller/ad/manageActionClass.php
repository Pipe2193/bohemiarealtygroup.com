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
      
      $this->objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);

      
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

      /** BUILDING AMENITIES INFO* */
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
      
      
      session::getInstance()->setFlash("listing_manage", "listing_manage");
      $this->defineView('manage', 'listing', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}