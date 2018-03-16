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

      $data_buildings = array(
          buildingsTableClass::ID,
          buildingsTableClass::ACCESS,
          buildingsTableClass::ADDON_CODES_ZIPCODE,
          buildingsTableClass::ADDRESS,
          buildingsTableClass::AGE,
          buildingsTableClass::BUILDING_TYPE,
          buildingsTableClass::CITY,
          buildingsTableClass::CREATED_AT,
          buildingsTableClass::CROSS_ADDRESS,
          buildingsTableClass::DOORMAN,
          buildingsTableClass::ELEVATOR,
          buildingsTableClass::GYM,
          buildingsTableClass::ID_LANDLORD,
          buildingsTableClass::ID_NEIGHBORHOOD,
          buildingsTableClass::LATITUDE,
          buildingsTableClass::LAUNDRY,
          buildingsTableClass::LISTING_TYPE,
          buildingsTableClass::LIVE_IN_SUPER,
          buildingsTableClass::LOCKBOX_BUILDING,
          buildingsTableClass::LONGITUDE,
          buildingsTableClass::NOTES_BUILDING,
          buildingsTableClass::OURDOOR_SPACE,
          buildingsTableClass::PETS_POLICY,
          buildingsTableClass::POOL,
          buildingsTableClass::STATE,
          buildingsTableClass::STORAGE,
          buildingsTableClass::SUPER,
          buildingsTableClass::UPDATED_AT,
          buildingsTableClass::ZIPCODE,
          buildingsTableClass::NESTIO_ID
      );

      $order_by_bs = array(
          buildingsTableClass::ID
      );
      $ll_buildings = buildingsTableClass::getAll($data_buildings, false, $order_by_bs, 'ASC', null, null, null, true);


      $_id = buildingsTableClass::ID;
      $_access = buildingsTableClass::ACCESS;
      $_zip2 = buildingsTableClass::ADDON_CODES_ZIPCODE;
      $_address = buildingsTableClass::ADDRESS;
      $_age = buildingsTableClass::AGE;
      $_building_type = buildingsTableClass::BUILDING_TYPE;
      $_city = buildingsTableClass::CITY;
      $_created = buildingsTableClass::CREATED_AT;
      $_cross_add = buildingsTableClass::CROSS_ADDRESS;
      $_doorman = buildingsTableClass::DOORMAN;
      $_elevator = buildingsTableClass::ELEVATOR;
      $_gym = buildingsTableClass::GYM;
      $_id_landlord = buildingsTableClass::ID_LANDLORD;
      $_id_neigbor = buildingsTableClass::ID_NEIGHBORHOOD;
      $_lat = buildingsTableClass::LATITUDE;
      $_laudry = buildingsTableClass::LAUNDRY;
      $_listing_type = buildingsTableClass::LISTING_TYPE;
      $_live_super = buildingsTableClass::LIVE_IN_SUPER;
      $_lockbox = buildingsTableClass::LOCKBOX_BUILDING;
      $long = buildingsTableClass::LONGITUDE;
      $_notes = buildingsTableClass::NOTES_BUILDING;
      $_outdoor = buildingsTableClass::OURDOOR_SPACE;
      $_pets = buildingsTableClass::PETS_POLICY;
      $_pool = buildingsTableClass::POOL;
//      $_state = buildingsTableClass::STATE;
      $storage = buildingsTableClass::STORAGE;
      $_super = buildingsTableClass::SUPER;
      $_updated = buildingsTableClass::UPDATED_AT;
      $_zipcode = buildingsTableClass::ZIPCODE;
      $_nestio_id = buildingsTableClass::NESTIO_ID;


      foreach ($ll_buildings as $ll_b):


        $verify_ll = landlordTableClass::getLandlordHash($ll_b->$_id_landlord);
        if ($verify_ll != false) {

          $verify_bld = buildingTableClass::getBuildingHash($ll_b->$_id);
          if ($verify_bld == false) {

            $landlord_id = $ll_b->$_id_landlord;
            $building_name = null;
            $address_building = $ll_b->$_address;
            $cross_address = $ll_b->$_cross_add;
            $city_building = $ll_b->$_city;
            $state_id = 33;
            $zipcode_building = $ll_b->$_zipcode;
            $zipcode_addon_codes = $ll_b->$_zip2;

            $verify_neigbor = neighborhoodTableClass::getVerifyNeighborhoodById($ll_b->$_id_neigbor);

            if ($verify_neigbor != false) {
              if ($ll_b->$_id_neigbor == 1) { //Manhattan
                $id_neighborhood = 98;
              } elseif ($ll_b->$_id_neigbor == 2) { //
                $id_neighborhood = 99;
              } elseif ($ll_b->$_id_neigbor == 3) { //
                $id_neighborhood = 100;
              } elseif ($ll_b->$_id_neigbor == 4) { //
                $id_neighborhood = 101;
              } elseif ($ll_b->$_id_neigbor == 5) { //
                $id_neighborhood = 102;
              } elseif ($ll_b->$_id_neigbor == 7) { //
                $id_neighborhood = 103;
              } elseif ($ll_b->$_id_neigbor == 8) { //
                $id_neighborhood = 104;
              } elseif ($ll_b->$_id_neigbor == 9) { //
                $id_neighborhood = 105;
              } elseif ($ll_b->$_id_neigbor == 10) { //
                $id_neighborhood = 121;
              } elseif ($ll_b->$_id_neigbor == 11) { //
                $id_neighborhood = 107;
              } elseif ($ll_b->$_id_neigbor == 12) { //
                $id_neighborhood = 108;
              } elseif ($ll_b->$_id_neigbor == 13) { //
                $id_neighborhood = 109;
              } elseif ($ll_b->$_id_neigbor == 14) { //
                $id_neighborhood = 110;
              } elseif ($ll_b->$_id_neigbor == 15) { //
                $id_neighborhood = 111;
              } elseif ($ll_b->$_id_neigbor == 16) { //
                $id_neighborhood = 112;
              } elseif ($ll_b->$_id_neigbor == 17) { //
                $id_neighborhood = 113;
              } elseif ($ll_b->$_id_neigbor == 18) { //
                $id_neighborhood = 114;
              } elseif ($ll_b->$_id_neigbor == 33) { //
                $id_neighborhood = 115;
              } elseif ($ll_b->$_id_neigbor == 34) { //
                $id_neighborhood = 116;
              } elseif ($ll_b->$_id_neigbor == 110) { //
                $id_neighborhood = 117;
              } elseif ($ll_b->$_id_neigbor == 111) { //
                $id_neighborhood = 118;
              } elseif ($ll_b->$_id_neigbor == 112) { //
                $id_neighborhood = 119;
              } elseif ($ll_b->$_id_neigbor == 19) { //brooklyn
                $id_neighborhood = 106;
              } elseif ($ll_b->$_id_neigbor == 20) { //
                $id_neighborhood = 53;
              } elseif ($ll_b->$_id_neigbor == 21) { //
                $id_neighborhood = 54;
              } elseif ($ll_b->$_id_neigbor == 22) { //
                $id_neighborhood = 55;
              } elseif ($ll_b->$_id_neigbor == 23) { //
                $id_neighborhood = 56;
              } elseif ($ll_b->$_id_neigbor == 24) { //
                $id_neighborhood = 57;
              } elseif ($ll_b->$_id_neigbor == 25) { //
                $id_neighborhood = 58;
              } elseif ($ll_b->$_id_neigbor == 26) { //
                $id_neighborhood = 59;
              } elseif ($ll_b->$_id_neigbor == 27) { //
                $id_neighborhood = 60;
              } elseif ($ll_b->$_id_neigbor == 28) { //
                $id_neighborhood = 61;
              } elseif ($ll_b->$_id_neigbor == 29) { //
                $id_neighborhood = 62;
              } elseif ($ll_b->$_id_neigbor == 113) { //
                $id_neighborhood = 63;
              } elseif ($ll_b->$_id_neigbor == 114) { //
                $id_neighborhood = 64;
              }
            } else {
              $id_neighborhood = 120;
            }

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

            $lockbox_building = $ll_b->$_lockbox;
            $notes_building = $ll_b->$_notes;

            if ($ll_b->$_pets == "Pets ok case-by-case") {
              $id_pets_policy = 2;
            } elseif ($ll_b->$_pets == "No dogs") {
              $id_pets_policy = 4;
            } elseif ($ll_b->$_pets == "No pets") {
              $id_pets_policy = 3;
            } elseif ($ll_b->$_pets == "Pets OK") {
              $id_pets_policy = 1;
            } else {
              $id_pets_policy = 6;
            }

            if ($ll_b->$_listing_type == "Open") {
              $id_listing_type = 2;
            } elseif ($ll_b->$_listing_type == "Exclusive") {
              $id_listing_type = 1;
            } elseif ($ll_b->$_listing_type == "Co-exclusive") {
              $id_listing_type = 3;
            } elseif ($ll_b->$_listing_type == "Open with listing agent") {
              $id_listing_type = 4;
            } else {
              $id_listing_type = 5;
            }

            $super_first_name = null;
            $super_middle_name = null;
            $super_last_name = null;
            $super_email_address = null;
            $super_phone_number = null;
            $super_notes = $ll_b->$_super;

            if ($ll_b->$_outdoor == "Roofdeck") {
              $id_outdoor_space = 7;
            } elseif ($ll_b->$_outdoor == "Backyard") {
              $id_outdoor_space = 9;
            } else {
              $id_outdoor_space = 8;
            }

            if ($ll_b->$_doorman == "Full Time Doorman") {
              $id_doorman = 1;
            } elseif ($ll_b->$_doorman == "Part Time Doorman") {
              $id_doorman = 2;
            } elseif ($ll_b->$_doorman == "Virtual Doorman") {
              $id_doorman = 3;
            } elseif ($ll_b->$_doorman == "No") {
              $id_doorman = 4;
            } else {
              $id_doorman = 4;
            }

            if ($ll_b->$_building_type == "Highrise") {
              $id_building_type = 1;
            } elseif ($ll_b->$_building_type == "Midrise") {
              $id_building_type = 2;
            } elseif ($ll_b->$_building_type == "Lowrise") {
              $id_building_type = 3;
            } elseif ($ll_b->$_building_type == "Brownstone") {
              $id_building_type = 4;
            } elseif ($ll_b->$_building_type == "Loft") {
              $id_building_type = 5;
            } else {
              $id_building_type = 6;
            }

            if ($ll_b->$_age == "Prewar") {
              $id_age = 1;
            } elseif ($ll_b->$_age == "Postwar") {
              $id_age = 2;
             } elseif ($ll_b->$_age == "Post-War") {
              $id_age = 2;  
            } elseif ($ll_b->$_age == "New Construction") {
              $id_age = 3;
            } else {
              $id_age = 4;
            }

            $building_id = $ll_b->$_id;
            $created_at = $ll_b->$_created;
            $updated_at = $ll_b->$_updated;

            if ($ll_b->$_nestio_id == 0) {
              $source_id = 1;
              $feed_id = 2;
              $sync_key = null;
            } elseif (empty($ll_b->$_nestio_id)) {
              $source_id = 1;
              $feed_id = 2;
              $sync_key = null;
            } else {
              $source_id = 2;
              $feed_id = 1;
              $sync_key = $ll_b->$_nestio_id;
            }

            /*             * HIDDEN INPUT TEXTS TO GET BUILDING LOCATION FROM GOOGLE MAPS* */
            $street_number = null;
            $route = null;
            $country = "United States";
            $county = null;
            $latitude = $ll_b->$_lat;
            $longitude = $ll_b->$long;
            $status = 1;



            $fields_landlord = array(
                landlordTableClass::ID,
                landlordTableClass::LANDLORD_HASH
            );
            $where_landlord = array(
                landlordTableClass::ID => $landlord_id
            );
            $landlord_hash = landlordTableClass::LANDLORD_HASH;
            $landlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $where_landlord);

            $building_hash = md5(md5(date('U') . $ll_b->$_id));

            /** INSERT SUPER INFORMATION * */
            $data_super = array(
                superTableClass::ID => null,
                superTableClass::SUPER_FIRST_NAME => $super_first_name,
                superTableClass::SUPER_MIDDLE_NAME => $super_middle_name,
                superTableClass::SUPER_LAST_NAME => $super_last_name,
                superTableClass::SUPER_PHONE_NUMBER => $super_phone_number,
                superTableClass::SUPER_EMAIL_ADDRESS => $super_email_address,
                superTableClass::SUPER_NOTES => $super_notes,
                superTableClass::SUPER_HASH => $building_hash
            );
            $super = superTableClass::insert($data_super);
            $super_id = superTableClass::getIdNewSuper($building_hash);

            /** INSERT BUILDING FEATURES INFORMATION * */
            $data_building_features = array(
                buildingFeaturesTableClass::ID => null,
                buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE => $id_outdoor_space,
                buildingFeaturesTableClass::ID_DORMAN => $id_doorman,
                buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE => $id_building_type,
                buildingFeaturesTableClass::AGE_ID_AGE => $id_age,
                buildingFeaturesTableClass::BUILDING_FEATURES_HASH => $building_hash,
            );
            $building_features = buildingFeaturesTableClass::insert($data_building_features);
            $building_features_id = buildingFeaturesTableClass::getIdNewBuildingFeatures($building_hash);

            /*             * INSERT BUILDING AMENITIES INFORMATION * */
            $ObjAmenities = $this->getAmenities();
            $amenities_id_amenities_field = amenitiesTableClass::ID;


            $a = 0;
            for ($index = 1; $index <= count($ObjAmenities); $index++) {

              $amenities_id_amenities = $ObjAmenities[$a]->$amenities_id_amenities_field;

              $amenity_status = 0;

              $data_building_amenities = array(
                  buildingAmenitiesTableClass::ID => null,
                  buildingAmenitiesTableClass::AMENITIES_ID_AMENITIES => $amenities_id_amenities,
                  buildingAmenitiesTableClass::BUILDING_AMENITIES_HASH => $building_hash,
                  buildingAmenitiesTableClass::BUILDING_FEATURES_ID_BUILDING_FEATURES => $building_features_id,
                  buildingAmenitiesTableClass::AMENITY_STATUS => $amenity_status
              );

              $building_amenities = buildingAmenitiesTableClass::insert($data_building_amenities);
              $a++;
            }

            //source 1 = local
            // feed 2 = bohemia
            $data_sync = array(
                syncTableClass::ID => null,
                syncTableClass::SYNC_ID_KEY => $sync_key,
                syncTableClass::SYNC_HASH => $landlord_hash,
                syncTableClass::SOURCE_ID_SOURCE => $source_id,
                syncTableClass::FEED_ID_FEED => $feed_id,
            );

            syncTableClass::insert($data_sync);
            $sync_id = syncTableClass::getIdNewSync($landlord_hash);

            /*             * INSERT BUILDING INFORMATION* */
            $data_building = array(
                buildingTableClass::ID => $building_id,
                buildingTableClass::DESCRIPTION_BUILDING => $building_name,
                buildingTableClass::ID_LANDLORD => $landlord_id,
                buildingTableClass::ADDRESS => $address_building,
                buildingTableClass::STREET_NUMBER_BUILDING => $street_number,
                buildingTableClass::ROUTE_BUILDING => $route,
                buildingTableClass::COUNTY_BUILDING => $county,
                buildingTableClass::COUNTRY_BUILDING => $country,
                buildingTableClass::LATITUDE => $latitude,
                buildingTableClass::LONGITUDE => $longitude,
                buildingTableClass::CROSS_ADDRESS => $cross_address,
                buildingTableClass::CITY => $city_building,
                buildingTableClass::STATE_ID => $state_id,
                buildingTableClass::ZIPCODE => $zipcode_building,
                buildingTableClass::ADDON_CODES_ZIPCODE => $zipcode_addon_codes,
                buildingTableClass::ID_NEIGHBORHOOD => $id_neighborhood,
                buildingTableClass::ID_ACCESS => $id_access,
                buildingTableClass::LOCKBOX_BUILDING => $lockbox_building,
                buildingTableClass::NOTES_BUILDING => $notes_building,
                buildingTableClass::ID_PETS_POLICY => $id_pets_policy,
                buildingTableClass::ID_LISTING_TYPE => $id_listing_type,
                buildingTableClass::ID_BUILDING_FEATURES => $building_features_id,
                buildingTableClass::ID_SUPER => $super_id,
                buildingTableClass::BUILDING_HASH => $building_hash,
                buildingTableClass::UPDATED_AT => $updated_at,
                buildingTableClass::STATUS => $status,
//                buildingTableClass::CREATED_AT => $created_at,
                buildingTableClass::SYNC_ID_SYNC => $sync_id
            );

            buildingTableClass::insert($data_building);
          } else {
            $landlord_id = $ll_b->$_id_landlord;
            $building_name = null;
            $address_building = $ll_b->$_address;
            $cross_address = $ll_b->$_cross_add;
            $city_building = $ll_b->$_city;
            $state_id = 33;
            $zipcode_building = $ll_b->$_zipcode;
            $zipcode_addon_codes = $ll_b->$_zip2;

            $verify_neigbor = neighborhoodTableClass::getVerifyNeighborhoodById($ll_b->$_id_neigbor);

            if ($verify_neigbor != false) {
              if ($ll_b->$_id_neigbor == 1) { //Manhattan
                $id_neighborhood = 98;
              } elseif ($ll_b->$_id_neigbor == 2) { //
                $id_neighborhood = 99;
              } elseif ($ll_b->$_id_neigbor == 3) { //
                $id_neighborhood = 100;
              } elseif ($ll_b->$_id_neigbor == 4) { //
                $id_neighborhood = 101;
              } elseif ($ll_b->$_id_neigbor == 5) { //
                $id_neighborhood = 102;
              } elseif ($ll_b->$_id_neigbor == 7) { //
                $id_neighborhood = 103;
              } elseif ($ll_b->$_id_neigbor == 8) { //
                $id_neighborhood = 104;
              } elseif ($ll_b->$_id_neigbor == 9) { //
                $id_neighborhood = 105;
              } elseif ($ll_b->$_id_neigbor == 10) { //
                $id_neighborhood = 121;
              } elseif ($ll_b->$_id_neigbor == 11) { //
                $id_neighborhood = 107;
              } elseif ($ll_b->$_id_neigbor == 12) { //
                $id_neighborhood = 108;
              } elseif ($ll_b->$_id_neigbor == 13) { //
                $id_neighborhood = 109;
              } elseif ($ll_b->$_id_neigbor == 14) { //
                $id_neighborhood = 110;
              } elseif ($ll_b->$_id_neigbor == 15) { //
                $id_neighborhood = 111;
              } elseif ($ll_b->$_id_neigbor == 16) { //
                $id_neighborhood = 112;
              } elseif ($ll_b->$_id_neigbor == 17) { //
                $id_neighborhood = 113;
              } elseif ($ll_b->$_id_neigbor == 18) { //
                $id_neighborhood = 114;
              } elseif ($ll_b->$_id_neigbor == 33) { //
                $id_neighborhood = 115;
              } elseif ($ll_b->$_id_neigbor == 34) { //
                $id_neighborhood = 116;
              } elseif ($ll_b->$_id_neigbor == 110) { //
                $id_neighborhood = 117;
              } elseif ($ll_b->$_id_neigbor == 111) { //
                $id_neighborhood = 118;
              } elseif ($ll_b->$_id_neigbor == 112) { //
                $id_neighborhood = 119;
              } elseif ($ll_b->$_id_neigbor == 19) { //brooklyn
                $id_neighborhood = 106;
              } elseif ($ll_b->$_id_neigbor == 20) { //
                $id_neighborhood = 53;
              } elseif ($ll_b->$_id_neigbor == 21) { //
                $id_neighborhood = 54;
              } elseif ($ll_b->$_id_neigbor == 22) { //
                $id_neighborhood = 55;
              } elseif ($ll_b->$_id_neigbor == 23) { //
                $id_neighborhood = 56;
              } elseif ($ll_b->$_id_neigbor == 24) { //
                $id_neighborhood = 57;
              } elseif ($ll_b->$_id_neigbor == 25) { //
                $id_neighborhood = 58;
              } elseif ($ll_b->$_id_neigbor == 26) { //
                $id_neighborhood = 59;
              } elseif ($ll_b->$_id_neigbor == 27) { //
                $id_neighborhood = 60;
              } elseif ($ll_b->$_id_neigbor == 28) { //
                $id_neighborhood = 61;
              } elseif ($ll_b->$_id_neigbor == 29) { //
                $id_neighborhood = 62;
              } elseif ($ll_b->$_id_neigbor == 113) { //
                $id_neighborhood = 63;
              } elseif ($ll_b->$_id_neigbor == 114) { //
                $id_neighborhood = 64;
              }
            } else {
              $id_neighborhood = 120;
            }

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

            $lockbox_building = $ll_b->$_lockbox;
            $notes_building = $ll_b->$_notes;

            if ($ll_b->$_pets == "Pets ok case-by-case") {
              $id_pets_policy = 2;
            } elseif ($ll_b->$_pets == "No dogs") {
              $id_pets_policy = 4;
            } elseif ($ll_b->$_pets == "No pets") {
              $id_pets_policy = 3;
            } else {
              $id_pets_policy = 6;
            }

            if ($ll_b->$_listing_type == "Open") {
              $id_listing_type = 2;
            } elseif ($ll_b->$_listing_type == "Exclusive") {
              $id_listing_type = 1;
            } elseif ($ll_b->$_listing_type == "Co-exclusive") {
              $id_listing_type = 3;
            } elseif ($ll_b->$_listing_type == "Open with listing agent") {
              $id_listing_type = 4;
            } else {
              $id_listing_type = 5;
            }

            $super_first_name = null;
            $super_middle_name = null;
            $super_last_name = null;
            $super_email_address = null;
            $super_phone_number = null;
            $super_notes = $ll_b->$_super;

            if ($ll_b->$_outdoor == "Roofdeck") {
              $id_outdoor_space = 7;
            } elseif ($ll_b->$_outdoor == "Backyard") {
              $id_outdoor_space = 9;
            } else {
              $id_outdoor_space = 8;
            }

            if ($ll_b->$_doorman == "Full Time Doorman") {
              $id_doorman = 1;
            } elseif ($ll_b->$_doorman == "Part Time Doorman") {
              $id_doorman = 2;
            } elseif ($ll_b->$_doorman == "Virtual Doorman") {
              $id_doorman = 3;
            } elseif ($ll_b->$_doorman == "No") {
              $id_doorman = 4;
            } else {
              $id_doorman = 4;
            }

            if ($ll_b->$_building_type == "Highrise") {
              $id_building_type = 1;
            } elseif ($ll_b->$_building_type == "Midrise") {
              $id_building_type = 2;
            } elseif ($ll_b->$_building_type == "Lowrise") {
              $id_building_type = 3;
            } elseif ($ll_b->$_building_type == "Brownstone") {
              $id_building_type = 4;
            } elseif ($ll_b->$_building_type == "Loft") {
              $id_building_type = 5;
            } else {
              $id_building_type = 6;
            }

            if ($ll_b->$_age == "Prewar") {
              $id_age = 1;
            } elseif ($ll_b->$_age == "Postwar") {
              $id_age = 2;
            } elseif ($ll_b->$_age == "New Construction") {
              $id_age = 3;
            } else {
              $id_age = 4;
            }

            $building_id = $ll_b->$_id;
            $created_at = $ll_b->$_created;
            $updated_at = $ll_b->$_updated;

            if ($ll_b->$_nestio_id == 0) {
              $source_id = 1;
              $feed_id = 2;
              $sync_key = null;
            } elseif (empty($ll_b->$_nestio_id)) {
              $source_id = 1;
              $feed_id = 2;
              $sync_key = null;
            } else {
              $source_id = 2;
              $feed_id = 1;
              $sync_key = $ll_b->$_nestio_id;
            }

            /*             * HIDDEN INPUT TEXTS TO GET BUILDING LOCATION FROM GOOGLE MAPS* */
            $street_number = null;
            $route = null;
            $country = "United States";
            $county = null;
            $latitude = $ll_b->$_lat;
            $longitude = $ll_b->$long;
            $status = 1;

            $fields_landlord = array(
                landlordTableClass::ID,
                landlordTableClass::LANDLORD_HASH
            );
            $where_landlord = array(
                landlordTableClass::ID => $landlord_id
            );
            $landlord_hash = landlordTableClass::LANDLORD_HASH;
            $landlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $where_landlord);

            $building_hash = buildingTableClass::getBuildingHash($ll_b->$_id);

            /** UPDATE SUPER INFORMATION * */
            $super_id = superTableClass::getIdNewSuper($building_hash);

            $data_super = array(
                superTableClass::SUPER_NOTES => $super_notes,
            );

            $ids_super = array(
                superTableClass::ID => $super_id,
            );
            $super = superTableClass::update($ids_super, $data_super);

            /** UPDATE BUILDING FEATURES INFORMATION * */
            $building_features_id = buildingFeaturesTableClass::getIdNewBuildingFeatures($building_hash);
            $data_building_features = array(
                buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE => $id_outdoor_space,
                buildingFeaturesTableClass::ID_DORMAN => $id_doorman,
                buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE => $id_building_type,
                buildingFeaturesTableClass::AGE_ID_AGE => $id_age,
                buildingFeaturesTableClass::BUILDING_FEATURES_HASH => $building_hash,
            );

            $ids_building_features = array(
                buildingFeaturesTableClass::ID => $building_features_id,
            );
            $building_features = buildingFeaturesTableClass::update($ids_building_features, $data_building_features);

            $sync_id = syncTableClass::getIdNewSync($building_hash);

            if ($sync_id != false) {

              $data_sync = array(
                  syncTableClass::SYNC_ID_KEY => $sync_key,
              );

              $ids_sync = array(
                  syncTableClass::ID => $sync_id
              );
              syncTableClass::update($ids_sync, $data_sync);

              /*               * UPDATE BUILDING INFORMATION* */
              $data_building = array(
                  buildingTableClass::DESCRIPTION_BUILDING => $building_name,
                  buildingTableClass::LATITUDE => $latitude,
                  buildingTableClass::LONGITUDE => $longitude,
                  buildingTableClass::CROSS_ADDRESS => $cross_address,
                  buildingTableClass::ZIPCODE => $zipcode_building,
                  buildingTableClass::ADDON_CODES_ZIPCODE => $zipcode_addon_codes,
                  buildingTableClass::ID_NEIGHBORHOOD => $id_neighborhood,
                  buildingTableClass::ID_ACCESS => $id_access,
                  buildingTableClass::LOCKBOX_BUILDING => $lockbox_building,
                  buildingTableClass::NOTES_BUILDING => $notes_building,
                  buildingTableClass::ID_PETS_POLICY => $id_pets_policy,
                  buildingTableClass::ID_LISTING_TYPE => $id_listing_type,
                  buildingTableClass::ID_SUPER => $super_id,
                  buildingTableClass::UPDATED_AT => $updated_at
              );
            } else {

              $data_sync = array(
                  syncTableClass::ID => null,
                  syncTableClass::SYNC_ID_KEY => $sync_key,
                  syncTableClass::SYNC_HASH => $building_hash,
                  syncTableClass::SOURCE_ID_SOURCE => $source_id,
                  syncTableClass::FEED_ID_FEED => $feed_id,
              );

              syncTableClass::insert($data_sync);
              $sync_id_up = syncTableClass::getIdNewSync($building_hash);

              /*               * UPDATE BUILDING INFORMATION* */
              $data_building = array(
                  buildingTableClass::DESCRIPTION_BUILDING => $building_name,
                  buildingTableClass::LATITUDE => $latitude,
                  buildingTableClass::LONGITUDE => $longitude,
                  buildingTableClass::CROSS_ADDRESS => $cross_address,
                  buildingTableClass::ZIPCODE => $zipcode_building,
                  buildingTableClass::ADDON_CODES_ZIPCODE => $zipcode_addon_codes,
                  buildingTableClass::ID_NEIGHBORHOOD => $id_neighborhood,
                  buildingTableClass::ID_ACCESS => $id_access,
                  buildingTableClass::LOCKBOX_BUILDING => $lockbox_building,
                  buildingTableClass::NOTES_BUILDING => $notes_building,
                  buildingTableClass::ID_PETS_POLICY => $id_pets_policy,
                  buildingTableClass::ID_LISTING_TYPE => $id_listing_type,
                  buildingTableClass::ID_SUPER => $super_id,
                  buildingTableClass::UPDATED_AT => $updated_at,
                  buildingTableClass::SYNC_ID_SYNC => $sync_id_up
              );
            }


            $ids_building = array(
                buildingTableClass::ID => $building_id,
            );

            buildingTableClass::update($ids_building, $data_building);
          }
        }
      endforeach;
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
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
