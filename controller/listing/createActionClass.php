<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of createActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $building_id = strtoupper(request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)));
        $landlord_id = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true));
        $unit_number = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true));
        $rent_listing = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::RENT_LISTING, true));
        $listing_size_id = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true));
        $bath_size_listing = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true));
        $fee_op_listing = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true));
        $custom_fee_op_listing = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true));
        $status = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::STATUS, true));
        $lease_term_start = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true));
        $lease_term_end = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true));
        $access_id = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true));
        $listing_notes = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true));
        $listing_description = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true));
        $email_notification_status = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true));
        $floor_number_listing = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true));
        $floor_type_id = request::getInstance()->getPost(listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true));
        $outdoor_space_id = request::getInstance()->getPost(listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true));
        $layout_id = request::getInstance()->getPost(listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true));
        $contact_first_name = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true));
        $contact_middle_name = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true));
        $contact_last_name = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true));
        $contact_email_address = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true));
        $contact_phone_number = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true));
        $contact_notes = request::getInstance()->getPost(listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true));



        $listing_hash = md5(md5(date('U')));

        /** INSERT LISTRING FEATURES INFORMATION * */
        $data_listing_features = array(
            listingFeaturesTableClass::ID => null,
            listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE => $floor_type_id,
            listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE => $outdoor_space_id,
            listingFeaturesTableClass::LAYOUT_ID_LAYOUT => $layout_id,
            listingFeaturesTableClass::LISTING_FEATURES_HASH => $listing_hash,
        );
        $listing_features = listingFeaturesTableClass::insert($data_listing_features);
        $listing_features_id = listingFeaturesTableClass::getIdNewListingFeatures($listing_hash);

        /** INSERT LISTING AMENITIES INFORMATION * */
        $ObjRentalAmenities = $this->getRentalAmenities();
        $rental_amenities_id_rental_amenities_field = rentalAmenitiesTableClass::ID;

        $a = 0;
        for ($index = 1; $index <= count($ObjRentalAmenities); $index++) {
          $rental_amenities_id_rental_amenities = $ObjRentalAmenities[$a]->$rental_amenities_id_rental_amenities_field;

          $listing_amenities_id = request::getInstance()->getPost(rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID . '_' . $index, true));
          if (isset($listing_amenities_id)) {
            $rental_amenity_status = 1;
          } else {
            $rental_amenity_status = 0;
          }
          $data_listing_amenities = array(
              listingAmenitiesTableClass::ID => null,
              listingAmenitiesTableClass::RENTAL_AMENITIES_ID_RENTAL_AMENITIES => $rental_amenities_id_rental_amenities,
              listingAmenitiesTableClass::LISTING_AMENITIES_HASH => $listing_hash,
              listingAmenitiesTableClass::LISTING_FEATURES_ID_LISTING_FEATURES => $listing_features_id,
              listingAmenitiesTableClass::RENTAL_AMENITY_STATUS => $rental_amenity_status
          );

          $listing_amenities = listingAmenitiesTableClass::insert($data_listing_amenities);
          $a++;
        }

        //source 1 = local
        // feed 2 = bohemia
        $data_sync = array(
            syncTableClass::ID => null,
            syncTableClass::SYNC_ID_KEY => null,
            syncTableClass::SYNC_HASH => $listing_hash,
            syncTableClass::SOURCE_ID_SOURCE => 1,
            syncTableClass::FEED_ID_FEED => 2,
        );

        syncTableClass::insert($data_sync);
        $sync_id = syncTableClass::getIdNewSync($listing_hash);

        /** INSERT LISTING INFORMATION* */
        $data_listing = array(
            listingTableClass::ID => null,
            listingTableClass::RENT_LISTING => $rent_listing,
            listingTableClass::UNIT_NUMBER_LISTING => $unit_number,
            listingTableClass::BATH_SIZE_LISTING => $bath_size_listing,
            listingTableClass::FEE_OP_LISTING => $fee_op_listing,
            listingTableClass::CUSTOM_FEE_OP_LISTING => $custom_fee_op_listing,
            listingTableClass::LEASE_TERM_START => $lease_term_start,
            listingTableClass::LEASE_TERM_END => $lease_term_end,
            listingTableClass::ACCESS_ID_ACCESS => $access_id,
            listingTableClass::NOTES_LISTING => $listing_notes,
            listingTableClass::DESCRIPTION_LISTING => $listing_description,
            listingTableClass::FLOOR_NUMBER_LISTING => $floor_number_listing,
            listingTableClass::CONTACT_FIRST_NAME => $contact_first_name,
            listingTableClass::CONTACT_MIDDLE_NAME => $contact_middle_name,
            listingTableClass::CONTACT_LAST_NAME => $contact_last_name,
            listingTableClass::CONTACT_EMAIL_ADDRESS => $contact_email_address,
            listingTableClass::CONTACT_PHONE_NUMBER => $contact_phone_number,
            listingTableClass::CONTACT_NOTES => $contact_notes,
            listingTableClass::STATUS => $status,
            listingTableClass::EMAIL_NOTIFICATION_STATUS => $email_notification_status,
            listingTableClass::LISTING_SIZE_ID_LISTING_SIZE => $listing_size_id,
            listingTableClass::BUILDING_ID_BUILDING => $building_id,
            listingTableClass::LANDLORD_ID_LANDLORD => $landlord_id,
            listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES => $listing_features_id,
            listingTableClass::LISTING_HASH => $listing_hash,
            listingTableClass::SYNC_ID_SYNC => $sync_id
        );

        listingTableClass::insert($data_listing);

        $building_address = buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($building_id));
        $landlord_name = landlordTableClass::getLandlordNameById($landlord_id);

        session::getInstance()->setSuccess("The Listing located at <b> $building_address </b> Apartment # <b> $unit_number </b> under <b>$landlord_name</b> has been Successfully Registered.");
        routing::getInstance()->redirect('landlord', 'index');
      } else {
        session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.This type of request is not allowed.");
        routing::getInstance()->redirect('landlord', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public static function getRentalAmenities() {

    $fields_rental_amenities = array(
        rentalAmenitiesTableClass::ID,
        rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES
    );
    $OrderBy_rental_amenities = array(
        rentalAmenitiesTableClass::ID
    );
    $objRentalAmenities = rentalAmenitiesTableClass::getAll($fields_rental_amenities, true, $OrderBy_rental_amenities, 'ASC');
    return $objRentalAmenities;
  }

}
