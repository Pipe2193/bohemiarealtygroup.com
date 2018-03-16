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
class syncActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      /** INSERT LISTING INFORMATION* */
      $data_listings = array(
          listingsTableClass::ID,
          listingsTableClass::ACCESS,
          listingsTableClass::APT,
          listingsTableClass::BATHS,
          listingsTableClass::BEDS,
          listingsTableClass::CONTACT,
          listingsTableClass::CREATED_AT,
          listingsTableClass::CUSTOM_OP,
          listingsTableClass::DESCRIPTION,
          listingsTableClass::FLOOR,
          listingsTableClass::FLOOR_TYPE,
          listingsTableClass::ID_BUILDING,
          listingsTableClass::ID_LANDLORD,
          listingsTableClass::LAYOUT,
          listingsTableClass::LEASE_TERM_MAX,
          listingsTableClass::LEASE_TERM_MIN,
          listingsTableClass::LISTING_TYPE,
          listingsTableClass::LOCKBOX_CODE,
          listingsTableClass::NOTE_FOR_ADMINS,
          listingsTableClass::OP,
          listingsTableClass::OUTDOOR_SPACE,
          listingsTableClass::RENT,
          listingsTableClass::SENDMAIL_TO_LANDLORD,
          listingsTableClass::SIZE,
          listingsTableClass::STATUS,
          listingsTableClass::UPDATED_AT,
          listingsTableClass::USER_ID,
          listingsTableClass::SOURCE,
          listingsTableClass::SOURCE_KEY
      );

      $order_by_listings = array(
          listingsTableClass::ID
      );
      $bld_listings = listingsTableClass::getAll($data_listings, false, $order_by_listings, 'DESC', null, null, null, true);


      $_id = listingsTableClass::ID;
      $_access = listingsTableClass::ACCESS;
      $_apt = listingsTableClass::APT;
      $_baths = listingsTableClass::BATHS;
      $_beds = listingsTableClass::BEDS;
      $_contact = listingsTableClass::CONTACT;
      $_created = listingsTableClass::CREATED_AT;
      $_custom_op = listingsTableClass::CUSTOM_OP;
      $_description = listingsTableClass::DESCRIPTION;
      $_floor = listingsTableClass::FLOOR;
      $_floor_type = listingsTableClass::FLOOR_TYPE;
      $_id_building = listingsTableClass::ID_BUILDING;
      $_id_landlord = listingsTableClass::ID_LANDLORD;
      $_layout = listingsTableClass::LAYOUT;
      $_lease_max = listingsTableClass::LEASE_TERM_MAX;
      $_lease_min = listingsTableClass::LEASE_TERM_MIN;
      $_listing_type = listingsTableClass::LISTING_TYPE;
      $_lockbox = listingsTableClass::LOCKBOX_CODE;
      $_note_admin = listingsTableClass::NOTE_FOR_ADMINS;
      $_op = listingsTableClass::OP;
      $_outdoor_space = listingsTableClass::OUTDOOR_SPACE;
      $_rent = listingsTableClass::RENT;
      $_send_to_landlord = listingsTableClass::SENDMAIL_TO_LANDLORD;
      $_size = listingsTableClass::SIZE;
      $_status = listingsTableClass::STATUS;
      $_updated = listingsTableClass::UPDATED_AT;
      $_user_id = listingsTableClass::USER_ID;
      $_source = listingsTableClass::SOURCE;
      $_source_key = listingsTableClass::SOURCE_KEY;

      foreach ($bld_listings as $ll_b):

        $verify_ll = landlordTableClass::getLandlordHash($ll_b->$_id_landlord);
        if ($verify_ll != false) {

          $verify_bld = buildingTableClass::getBuildingHash($ll_b->$_id_building);
          if ($verify_bld != false) {

            $verify_listing = listingTableClass::getListingHashById($ll_b->$_id);
            if ($verify_listing == false) {


              $id = $ll_b->$_id;

              $building_id = $ll_b->$_id_building;
              $landlord_id = $ll_b->$_id_landlord;
              $unit_number = $ll_b->$_apt;
              $rent_listing = $ll_b->$_rent;

              if ($ll_b->$_beds == 0) {
                $listing_size_id = 1;
              } elseif ($ll_b->$_beds == 0.8) {
                $listing_size_id = 2;
              } elseif ($ll_b->$_beds == 1) {
                $listing_size_id = 3;
              } elseif ($ll_b->$_beds == 1.5) {
                $listing_size_id = 4;
              } elseif ($ll_b->$_beds == 2) {
                $listing_size_id = 5;
              } elseif ($ll_b->$_beds == 2.5) {
                $listing_size_id = 6;
              } elseif ($ll_b->$_beds == 3) {
                $listing_size_id = 11;
              } elseif ($ll_b->$_beds == 3.5) {
                $listing_size_id = 7;
              } elseif ($ll_b->$_beds == 4) {
                $listing_size_id = 8;
              } elseif ($ll_b->$_beds == 5) {
                $listing_size_id = 9;
              } elseif ($ll_b->$_beds == 6) {
                $listing_size_id = 10;
              } else {
                $listing_size_id = 12;
              }

              $bath_size_listing = $ll_b->$_baths;
              if ($ll_b->$_op == "Custom") {
                $fee_op_listing = "custom";
              } else {
                $fee_op_listing = $ll_b->$_op;
              }

              if ($fee_op_listing == "custom") {
                $custom_fee_op_listing = $ll_b->$_custom_op;
              } else {
                $custom_fee_op_listing = null;
              }


              if ($ll_b->$_status == "Available") {
                $status = 1;
              } elseif ($ll_b->$_status == "Unavailable") {
                $status = 3;
              } elseif ($ll_b->$_status == "Pending") {
                $status = 2;
              } else {
                $status = 4;
              }
              $lease_term_start = $ll_b->$_lease_min;
              $lease_term_end =  $ll_b->$_lease_max;

              if ($ll_b->$_access == "None") {
                $id_access = 10;
              } elseif ($ll_b->$_access == "Lockbox") {
                $id_access = 1;
              } elseif ($ll_b->$_access == "Keys in office") {
                $id_access = 2;
              } elseif ($ll_b->$_access == "Keys in office - Soha") {
                $id_access = 3;
              } elseif ($ll_b->$_access == "Keys in office - WaHi") {
                $id_access = 4;
              } elseif ($ll_b->$_access == "By Appointment") {
                $id_access = 5;
              } elseif ($ll_b->$_access == "Door is open") {
                $id_access = 6;
              } elseif ($ll_b->$_access == "Through super") {
                $id_access = 7;
              } elseif ($ll_b->$_access == "Through tenant") {
                $id_access = 8;
              } elseif ($ll_b->$_access == "Through Doorman") {
                $id_access = 9;
              } else {
                $id_access = 10;
              }
              $access_id = $id_access;
              if ($access_id == 1) {
                $lockbox_code = $ll_b->$_lockbox;
              } else {
                $lockbox_code = null;
              }
              $listing_notes = $ll_b->$_note_admin;
              $listing_description = $ll_b->$_description;
              if (!empty($ll_b->$_send_to_landlord)) {
                $email_notification_status = $ll_b->$_send_to_landlord;
              } else {
                $email_notification_status = 0;
              }

              $floor_number_listing = $ll_b->$_floor;

              if ($ll_b->$_floor_type == "Hardwood") {
                $floor_type = 1;
              } elseif ($ll_b->$_floor_type == "Linoleum") {
                $floor_type = 2;
              } else {
                $floor_type = 3;
              }

              $floor_type_id = $floor_type;

              if ($ll_b->$_outdoor_space == "Roofdeck") {
                $id_outdoor_space = 7;
              } elseif ($ll_b->$_outdoor_space == "Backyard") {
                $id_outdoor_space = 9;
              } else {
                $id_outdoor_space = 8;
              }

              $outdoor_space_id = $id_outdoor_space;

              if ($ll_b->$_layout == "Simplex") {
                $layout = 1;
              } elseif ($ll_b->$_layout == "Duplex") {
                $layout = 2;
              } elseif ($ll_b->$_layout == "Triplex") {
                $layout = 3;
              } else {
                $layout = 4;
              }
              $layout_id = $layout;
              $contact_first_name = null;
              $contact_middle_name = null;
              $contact_last_name = null;
              $contact_email_address = null;
              $contact_phone_number = null;
              $contact_notes = $ll_b->$_contact;
              if ($ll_b->$_user_id != 0) {

                $verify_user = usuarioTableClass::isActivated($id);
                if ($verify_user != false) {
                  $user_id = $ll_b->$_user_id;
                } else {
                  $user_id = 1;
                }
              } else {
                $user_id = 1;
              }

              $updated = $ll_b->$_updated;
              $created = $_created;

              if ($ll_b->$_source_key == 0) {
                $source_id = 1;
                $feed_id = 2;
                $sync_key = null;
              } elseif (empty($ll_b->$_source_key)) {
                $source_id = 1;
                $feed_id = 2;
                $sync_key = null;
              } else {
                $source_id = 2;
                $feed_id = 1;
                $sync_key = $ll_b->$_source_key;
              }


              $listing_hash = md5(md5(date('U') . $id));

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

                $rental_amenity_status = 0;

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
                  syncTableClass::SYNC_ID_KEY => $sync_key,
                  syncTableClass::SYNC_HASH => $listing_hash,
                  syncTableClass::SOURCE_ID_SOURCE => $source_id,
                  syncTableClass::FEED_ID_FEED => $feed_id,
              );

              syncTableClass::insert($data_sync);
              $sync_id = syncTableClass::getIdNewSync($listing_hash);

              /** INSERT LISTING INFORMATION* */
              $data_listing = array(
                  listingTableClass::ID => $id,
                  listingTableClass::RENT_LISTING => $rent_listing,
                  listingTableClass::UNIT_NUMBER_LISTING => $unit_number,
                  listingTableClass::BATH_SIZE_LISTING => $bath_size_listing,
                  listingTableClass::FEE_OP_LISTING => $fee_op_listing,
                  listingTableClass::CUSTOM_FEE_OP_LISTING => $custom_fee_op_listing,
                  listingTableClass::LEASE_TERM_START => $lease_term_start,
                  listingTableClass::LEASE_TERM_END => $lease_term_end,
                  listingTableClass::ACCESS_ID_ACCESS => $access_id,
                  listingTableClass::LOCKBOX_LISTING => $lockbox_code,
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
                  listingTableClass::USUARIO_ID => $user_id,
                  listingTableClass::LISTING_HASH => $listing_hash,
                  listingTableClass::UPDATED_AT => $updated,
//                  listingTableClass::CREATED_AT => $created,
                  listingTableClass::SYNC_ID_SYNC => $sync_id,
              );

              listingTableClass::insert($data_listing);
            } else {

              $id = $ll_b->$_id;

              $building_id = $ll_b->$_id_building;
              $landlord_id = $ll_b->$_id_landlord;
              $unit_number = $ll_b->$_apt;
              $rent_listing = $ll_b->$_rent;

              if ($ll_b->$_beds == 0) {
                $listing_size_id = 1;
              } elseif ($ll_b->$_beds == 0.8) {
                $listing_size_id = 2;
              } elseif ($ll_b->$_beds == 1) {
                $listing_size_id = 3;
              } elseif ($ll_b->$_beds == 1.5) {
                $listing_size_id = 4;
              } elseif ($ll_b->$_beds == 2) {
                $listing_size_id = 5;
              } elseif ($ll_b->$_beds == 2.5) {
                $listing_size_id = 6;
              } elseif ($ll_b->$_beds == 3) {
                $listing_size_id = 11;
              } elseif ($ll_b->$_beds == 3.5) {
                $listing_size_id = 7;
              } elseif ($ll_b->$_beds == 4) {
                $listing_size_id = 8;
              } elseif ($ll_b->$_beds == 5) {
                $listing_size_id = 9;
              } elseif ($ll_b->$_beds == 6) {
                $listing_size_id = 10;
              } else {
                $listing_size_id = 12;
              }

              $bath_size_listing = $ll_b->$_baths;
              if ($ll_b->$_op == "Custom") {
                $fee_op_listing = "custom";
              } else {
                $fee_op_listing = $ll_b->$_op;
              }

              if ($fee_op_listing == "custom") {
                $custom_fee_op_listing = $ll_b->$_custom_op;
              } else {
                $custom_fee_op_listing = null;
              }


              if ($ll_b->$_status == "Available") {
                $status = 1;
              } elseif ($ll_b->$_status == "Unavailable") {
                $status = 3;
              } elseif ($ll_b->$_status == "Pending") {
                $status = 2;
              } else {
                $status = 4;
              }
              $lease_term_start = $ll_b->$_lease_max;
              $lease_term_end = $ll_b->$_lease_min;

              if ($ll_b->$_access == "None") {
                $id_access = 10;
              } elseif ($ll_b->$_access == "Lockbox") {
                $id_access = 1;
              } elseif ($ll_b->$_access == "Keys in office") {
                $id_access = 2;
              } elseif ($ll_b->$_access == "Keys in office - Soha") {
                $id_access = 3;
              } elseif ($ll_b->$_access == "Keys in office - WaHi") {
                $id_access = 4;
              } elseif ($ll_b->$_access == "By Appointment") {
                $id_access = 5;
              } elseif ($ll_b->$_access == "Door is open") {
                $id_access = 6;
              } elseif ($ll_b->$_access == "Through super") {
                $id_access = 7;
              } elseif ($ll_b->$_access == "Through tenant") {
                $id_access = 8;
              } elseif ($ll_b->$_access == "Through Doorman") {
                $id_access = 9;
              } else {
                $id_access = 10;
              }
              $access_id = $id_access;
              if ($access_id == 1) {
                $lockbox_code = $ll_b->$_lockbox;
              } else {
                $lockbox_code = null;
              }
              $listing_notes = $ll_b->$_note_admin;
              $listing_description = $ll_b->$_description;
              if (!empty($ll_b->$_send_to_landlord)) {
                $email_notification_status = $ll_b->$_send_to_landlord;
              } else {
                $email_notification_status = 0;
              }

              $floor_number_listing = $ll_b->$_floor;

              if ($ll_b->$_floor_type == "Hardwood") {
                $floor_type = 1;
              } elseif ($ll_b->$_floor_type == "Linoleum") {
                $floor_type = 2;
              } else {
                $floor_type = 3;
              }

              $floor_type_id = $floor_type;

              if ($ll_b->$_outdoor_space == "Roofdeck") {
                $id_outdoor_space = 7;
              } elseif ($ll_b->$_outdoor_space == "Backyard") {
                $id_outdoor_space = 9;
              } else {
                $id_outdoor_space = 8;
              }

              $outdoor_space_id = $id_outdoor_space;

              if ($ll_b->$_layout == "Simplex") {
                $layout = 1;
              } elseif ($ll_b->$_layout == "Duplex") {
                $layout = 2;
              } elseif ($ll_b->$_layout == "Triplex") {
                $layout = 3;
              } else {
                $layout = 4;
              }
              $layout_id = $layout;
              $contact_first_name = null;
              $contact_middle_name = null;
              $contact_last_name = null;
              $contact_email_address = null;
              $contact_phone_number = null;
              $contact_notes = $ll_b->$_contact;
              if ($ll_b->$_user_id != 0) {

                $verify_user = usuarioTableClass::isActivated($id);
                if ($verify_user != false) {
                  $user_id = $ll_b->$_user_id;
                } else {
                  $user_id = 1;
                }
              } else {
                $user_id = 1;
              }

              $updated = $ll_b->$_updated;
              $created = $_created;

              if ($ll_b->$_source_key == 0) {
                $source_id = 1;
                $feed_id = 2;
                $sync_key = null;
              } elseif (empty($ll_b->$_source_key)) {
                $source_id = 1;
                $feed_id = 2;
                $sync_key = null;
              } else {
                $source_id = 2;
                $feed_id = 1;
                $sync_key = $ll_b->$_source_key;
              }

              $listing_hash = listingTableClass::getListingHashById($id);

              /** UPDATE LISTRING FEATURES INFORMATION * */
              $listing_features_id = listingFeaturesTableClass::getIdNewListingFeatures($listing_hash);

              $data_listing_features = array(
                  listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE => $floor_type_id,
                  listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE => $outdoor_space_id,
                  listingFeaturesTableClass::LAYOUT_ID_LAYOUT => $layout_id,
              );

              $ids_listing_features = array(
                  listingFeaturesTableClass::ID => $listing_features_id
              );

              $listing_features = listingFeaturesTableClass::update($ids_listing_features, $data_listing_features);

              $sync_id = syncTableClass::getIdNewSync($listing_hash);

              if ($sync_id != false) {

                $fields_listing_info = array(
                    listingTableClass::UPDATED_AT
                );
                $where_listing_info = array(
                    listingTableClass::ID => $id
                );
                $listing_info = listingTableClass::getAll($fields_listing_info, true, null, null, null, null, $where_listing_info);
                $listing_info_updated_field = listingTableClass::UPDATED_AT;
                $listing_updated_info = $listing_info[0]->$listing_info_updated_field;
                
                if ($listing_updated_info != $updated) {

                  $data_sync = array(
                      syncTableClass::SYNC_ID_KEY => $sync_key,
                  );

                  $ids_sync = array(
                      syncTableClass::ID => $sync_id
                  );
                  syncTableClass::update($ids_sync, $data_sync);
//
//                /** UPDATE LISTING INFORMATION* */
                  $data_listing = array(
                      listingTableClass::RENT_LISTING => $rent_listing,
                      listingTableClass::UNIT_NUMBER_LISTING => $unit_number,
                      listingTableClass::BATH_SIZE_LISTING => $bath_size_listing,
                      listingTableClass::FEE_OP_LISTING => $fee_op_listing,
                      listingTableClass::CUSTOM_FEE_OP_LISTING => $custom_fee_op_listing,
                      listingTableClass::LEASE_TERM_START => $lease_term_start,
                      listingTableClass::LEASE_TERM_END => $lease_term_end,
                      listingTableClass::ACCESS_ID_ACCESS => $access_id,
                      listingTableClass::LOCKBOX_LISTING => $lockbox_code,
                      listingTableClass::NOTES_LISTING => $listing_notes,
                      listingTableClass::DESCRIPTION_LISTING => $listing_description,
                      listingTableClass::FLOOR_NUMBER_LISTING => $floor_number_listing,
                      listingTableClass::CONTACT_NOTES => $contact_notes,
                      listingTableClass::STATUS => $status,
                      listingTableClass::EMAIL_NOTIFICATION_STATUS => $email_notification_status,
                      listingTableClass::LISTING_SIZE_ID_LISTING_SIZE => $listing_size_id,
                      listingTableClass::UPDATED_AT => $updated,
                  );
                  $ids_listing = array(
                      listingTableClass::ID => $id
                  );

                  listingTableClass::update($ids_listing, $data_listing);
                }
              } else {
                //source 1 = local
                // feed 2 = bohemia
                $data_sync = array(
                    syncTableClass::ID => null,
                    syncTableClass::SYNC_ID_KEY => $sync_key,
                    syncTableClass::SYNC_HASH => $listing_hash,
                    syncTableClass::SOURCE_ID_SOURCE => $source_id,
                    syncTableClass::FEED_ID_FEED => $feed_id,
                );

                syncTableClass::insert($data_sync);
                $sync_id = syncTableClass::getIdNewSync($listing_hash);

                /** UPDATE LISTING INFORMATION* */
                $data_listing = array(
                    listingTableClass::RENT_LISTING => $rent_listing,
                    listingTableClass::UNIT_NUMBER_LISTING => $unit_number,
                    listingTableClass::BATH_SIZE_LISTING => $bath_size_listing,
                    listingTableClass::FEE_OP_LISTING => $fee_op_listing,
                    listingTableClass::CUSTOM_FEE_OP_LISTING => $custom_fee_op_listing,
                    listingTableClass::LEASE_TERM_START => $lease_term_start,
                    listingTableClass::LEASE_TERM_END => $lease_term_end,
                    listingTableClass::ACCESS_ID_ACCESS => $access_id,
                    listingTableClass::LOCKBOX_LISTING => $lockbox_code,
                    listingTableClass::NOTES_LISTING => $listing_notes,
                    listingTableClass::DESCRIPTION_LISTING => $listing_description,
                    listingTableClass::FLOOR_NUMBER_LISTING => $floor_number_listing,
                    listingTableClass::CONTACT_NOTES => $contact_notes,
                    listingTableClass::STATUS => $status,
                    listingTableClass::EMAIL_NOTIFICATION_STATUS => $email_notification_status,
                    listingTableClass::LISTING_SIZE_ID_LISTING_SIZE => $listing_size_id,
                    listingTableClass::UPDATED_AT => $updated,
                    listingTableClass::SYNC_ID_SYNC => $sync_id,
                );
                $ids_listing = array(
                    listingTableClass::ID => $id
                );

                listingTableClass::update($ids_listing, $data_listing);
              }
            }
          }
        }
      endforeach;
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
