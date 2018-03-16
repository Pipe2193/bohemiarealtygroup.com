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
 * Description of authActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class authActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {
      if (request::getInstance()->hasGet(appTableClass::getNameField(appTableClass::APP_TOKEN, true))) {

        $token = request::getInstance()->getGet(appTableClass::getNameField(appTableClass::APP_TOKEN, true));
        if (appTableClass::verifyAppToken($token) === true) {

          $landlord_id = 3066;
          $listing_status_filter = 1;
          $objListings = listingTableClass::getDunbarListings($landlord_id, $listing_status_filter);
          
          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_rent = listingTableClass::RENT_LISTING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_status = listingTableClass::STATUS;
          $listing_created_at = listingTableClass::CREATED_AT;
          $listing_updated_at = listingTableClass::UPDATED_AT;

          foreach ($objListings as $listing):

            $listing_id_field = $listing->$listing_id;
            $listing_building_address_field = buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id));
            $listing_unit_number_field = $listing->$listing_unit_number;
            $listing_rent_field = $listing->$listing_rent;
            $listing_size_field = listingSizeTableClass::getListingSizeByID($listing->$listing_size_id);
            $listing_bath_size_field = $listing->$listing_bath_size;
            $listing_status_field = $listing->$listing_status;

            $subdata = array();
            $subdata[$listing_id] = $listing_id_field;
            $subdata[$listing_building_id] = $listing_building_address_field;
            $subdata[$listing_unit_number] = $listing_unit_number_field;
            $subdata[$listing_rent] = $listing_rent_field;
            $subdata[$listing_size_id] = $listing_size_field;
            $subdata[$listing_bath_size] = $listing_bath_size_field;
            $subdata[$listing_status] = $listing_status_field;
            $data[] = $subdata;
          endforeach;


          if (!empty($data)) {
            $data = $data;
            /*
             *
             * Output
             */
            $output = array(
                "iTotalRecords" => intval(count($objListings)),
                "iTotalDisplayRecords" => intval(count($objListings)),
                "data" => $data
            );
            $this->json = json_encode($output);
          } else {
            $this->json = json_encode(
                    array("message" => "No Available Listings have been Found.")
            );
          }
        } else {

          $this->json = json_encode(
                  array("error" => "invalid Access. The application Token: $token is not valid.")
          );
        }
      } else {
        $this->json = json_encode(
                array("message" => "Restricted accesss.The application Token is missing.")
        );
      }
      $this->defineView('auth', 'api', 'json');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
