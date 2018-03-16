<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of updateActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true))) {

        $building_name = strtoupper(request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::DESCRIPTION_BUILDING, true)));
        $landlord_id = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ID_LANDLORD, true));
        $address_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ADDRESS, true));
        $cross_address = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::CROSS_ADDRESS, true));
        $city_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::CITY, true));
        $state_id = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::STATE_ID, true));
        $zipcode_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ZIPCODE, true));
        $zipcode_addon_codes = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ADDON_CODES_ZIPCODE, true));
        $id_neighborhood = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD, true));
        $id_access = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ID_ACCESS, true));
        $lockbox_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true));
        $notes_building = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true));
        $id_pets_policy = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ID_PETS_POLICY, true));
        $id_listing_type = request::getInstance()->getPost(buildingTableClass::getNameField(buildingTableClass::ID_LISTING_TYPE, true));
        $super_first_name = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME, true));
        $super_middle_name = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME, true));
        $super_last_name = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_LAST_NAME, true));
        $super_email_address = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_EMAIL_ADDRESS, true));
        $super_phone_number = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_PHONE_NUMBER, true));
        $super_notes = request::getInstance()->getPost(superTableClass::getNameField(superTableClass::SUPER_NOTES, true));
        $id_outdoor_space = request::getInstance()->getPost(buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true));
        $id_doorman = request::getInstance()->getPost(buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::ID_DORMAN, true));
        $id_building_type = request::getInstance()->getPost(buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE, true));
        $id_age = request::getInstance()->getPost(buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::AGE_ID_AGE, true));
        $building_hash = request::getInstance()->getGet(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true));

        /** HIDDEN INPUT TEXTS TO GET BUILDING LOCATION FROM GOOGLE MAPS * */
        $street_number = request::getInstance()->getPost('street_number');
        $route = request::getInstance()->getPost('route');
        $country = request::getInstance()->getPost('country');
        $county = request::getInstance()->getPost('administrative_area_level_2');
        $latitude = request::getInstance()->getPost('lat');
        $longitude = request::getInstance()->getPost('long');
        $status = 1;

        if (buildingTableClass::VerifyBuildingHash($building_hash) != false) {

          $fields_landlord = array(
              landlordTableClass::ID,
              landlordTableClass::LANDLORD_HASH
          );
          $where_landlord = array(
              landlordTableClass::ID => $landlord_id
          );
          $landlord_hash = landlordTableClass::LANDLORD_HASH;
          $landlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $where_landlord);

          /** INSERT SUPER INFORMATION * */
          $super_id = superTableClass::getIdNewSuper($building_hash);

          $data_super = array(
              superTableClass::SUPER_FIRST_NAME => $super_first_name,
              superTableClass::SUPER_MIDDLE_NAME => $super_middle_name,
              superTableClass::SUPER_LAST_NAME => $super_last_name,
              superTableClass::SUPER_PHONE_NUMBER => $super_phone_number,
              superTableClass::SUPER_EMAIL_ADDRESS => $super_email_address,
              superTableClass::SUPER_NOTES => $super_notes
          );
          $ids_super = array(
              superTableClass::ID => $super_id
          );

          $super = superTableClass::update($ids_super, $data_super);

          /** INSERT BUILDING FEATURES INFORMATION * */
          $building_features_id = buildingFeaturesTableClass::getIdNewBuildingFeatures($building_hash);

          $data_building_features = array(
              buildingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE => $id_outdoor_space,
              buildingFeaturesTableClass::ID_DORMAN => $id_doorman,
              buildingFeaturesTableClass::BUILDING_TYPE_ID_BUILDING_TYPE => $id_building_type,
              buildingFeaturesTableClass::AGE_ID_AGE => $id_age
          );
          $ids_building_features = array(
              buildingFeaturesTableClass::ID => $building_features_id
          );
          $building_features = buildingFeaturesTableClass::update($ids_building_features, $data_building_features);


          /** INSERT BUILDING AMENITIES INFORMATION * */
          $ObjAmenities = $this->getAmenities();
          $amenities_id_amenities_field = amenitiesTableClass::ID;

          $building_amenities_id_amenities = buildingAmenitiesTableClass::getIdNewBuildingAmenities($building_hash);
          $building_amenities_id_amenities_field = buildingAmenitiesTableClass::ID;
          $a = 0;
          for ($index = 1; $index <= count($ObjAmenities); $index++) {

            $amenities_id_amenities = $ObjAmenities[$a]->$amenities_id_amenities_field;
            $id_building_amenity = $building_amenities_id_amenities[$a]->$building_amenities_id_amenities_field;

            $building_amenities_id = request::getInstance()->getPost(amenitiesTableClass::getNameField(amenitiesTableClass::ID . '_' . $index, true));
            if (isset($building_amenities_id)) {
              $amenity_status = 1;
            } else {
              $amenity_status = 0;
            }

            $data_building_amenities = array(
                buildingAmenitiesTableClass::AMENITY_STATUS => $amenity_status
            );
            $ids = array(
                buildingAmenitiesTableClass::ID => $id_building_amenity
            );

            $building_amenities = buildingAmenitiesTableClass::update($ids, $data_building_amenities);
            $a++;
          }

          /*           * INSERT BUILDING INFORMATION* */
          $building_id = buildingTableClass::getIdNewBuilding($building_hash);

          $data_building = array(
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
              buildingTableClass::STATUS => $status,
          );
          $ids = array(
              buildingTableClass::ID => $building_id
          );

          buildingTableClass::update($ids, $data_building);

          session::getInstance()->setSuccess("The Building <b>" . $building_name . "</b> located at <b> " . $address_building . " </b> under the Landord <b>" . landlordTableClass::getLandlordNameById($landlord_id) . "</b> has been Successfully Registered.");
          routing::getInstance()->redirect('building', 'manage', array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $building_hash));
        } else {
          session::getInstance()->setError("The Application encountered an error and it couldn't complete your request.<br> The <b>Building Token ($building_hash)</b> is not valid.  ");
          routing::getInstance()->redirect('landlord', 'index');
        }
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Building Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('landlord', 'index');
      }
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
