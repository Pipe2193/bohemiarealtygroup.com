<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {


/////////////////////////////////////////////////////////////////////// SALES ////////////////////////////////////////////////////////////////////////////////     

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['manage_sales_listings'])) {
          $sales_building_hash = request::getInstance()->getGet('manage_sales_listings');
          $sales_building_id = salesBuildingTableClass::getSalesBuildingId($sales_building_hash);


          $sales_listing_fields = array(
              salesListingTableClass::ID,
              salesListingTableClass::BUILDING_ID,
              salesListingTableClass::APT_NUMBER,
              salesListingTableClass::PRICE,
              salesListingTableClass::BATHS,
              salesListingTableClass::BEDROOMS,
              salesListingTableClass::AVAILABILITY_STATUS,
              salesListingTableClass::DATE_LISTED,
              salesListingTableClass::DATE_MODIFIED,
              salesListingTableClass::SALES_LISTING_HASH
          );

          $where_sales_listing = array(
              salesListingTableClass::BUILDING_ID => $sales_building_id
          );

          $order_by_sales_listing = array(
              salesListingTableClass::ID
          );

          $objSalesListings = salesListingTableClass::getAll($sales_listing_fields, true, $order_by_sales_listing, 'ASC', null, null, $where_sales_listing);

          /** SALES LISTING INSTANCES* */
          $sales_listing_id = salesListingTableClass::ID;
          $sales_listing_apt_number = salesListingTableClass::APT_NUMBER;
          $sales_listing_building_id = salesListingTableClass::BUILDING_ID;
          $sales_listing_price = salesListingTableClass::PRICE;
          $sales_listing_baths = salesListingTableClass::BATHS;
          $sales_listing_bedrooms = salesListingTableClass::BEDROOMS;
          $sales_listing_availability_status = salesListingTableClass::AVAILABILITY_STATUS;
          $sales_listing_date_listed = salesListingTableClass::DATE_LISTED;
          $sales_listing_date_modified = salesListingTableClass::DATE_MODIFIED;
          $sales_listing_hash = salesListingTableClass::SALES_LISTING_HASH;


          foreach ($objSalesListings as $sale_listing) {

            $sale_listing_id_field = '<div class="label" style="background-color: #719038;"> OLR </div><button class="mdl-button mdl-js-button" type="button"> ' . $sale_listing->$sales_listing_id . ' </button>';
            $sale_listing_building_address_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . salesBuildingTableClass::getSalesBuildingAddressById($sale_listing->$sales_listing_building_id) . ' </button>';
            $sale_listing_apt_number_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_listing->$sales_listing_apt_number . ' </button>';
            $sale_listing_building_neighborhood_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . salesBuildingTableClass::getSalesBuildingNeighborhood($sale_listing->$sales_listing_building_id) . ' </button>';
            $sale_listing_price_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $sale_listing->$sales_listing_price . ' USD </button>';
            $sale_listing_baths_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_listing->$sales_listing_baths . ' </button>';
            $sale_listing_beds_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_listing->$sales_listing_bedrooms . ' </button>';
            $sale_listing_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $sale_listing->$sales_listing_availability_status . ' </button>';
            $sale_listing_date_listed_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_listing->$sales_listing_date_listed . ' </button>';
            $sale_listing_date_modified_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $sale_listing->$sales_listing_date_modified . ' </button>';
            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("sales_listing", "manage", array(salesListingTableClass::getNameField(salesListingTableClass::SALES_LISTING_HASH, true) => $sale_listing->$sales_listing_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
//            $actions .= '<button disabled data-id="' . $building->$building_id . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="Delete Building ' . $building->$building_address . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $sale_listing_id_field;
            $subdata[] = $sale_listing_building_address_field;
            $subdata[] = $sale_listing_apt_number_field;
            $subdata[] = $sale_listing_building_neighborhood_field;
            $subdata[] = $sale_listing_price_field;
            $subdata[] = $sale_listing_baths_field;
            $subdata[] = $sale_listing_beds_field;
            $subdata[] = $sale_listing_status_field;
            $subdata[] = $sale_listing_date_listed_field;
            $subdata[] = $sale_listing_date_modified_field;
            $subdata[] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          $json_data = array(
              "draw" => intval(request::getInstance()->getGet('draw')),
              "recordsTotal" => intval(count($objSalesListings)),
              "recordsFiltered" => intval(count($objSalesListings)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
