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
        if (isset($_GET['sales_buildings'])) {

          $sales_building_fields = array(
              salesBuildingTableClass::ID,
              salesBuildingTableClass::ADDRESS,
              salesBuildingTableClass::CITY,
              salesBuildingTableClass::STATE,
              salesBuildingTableClass::YEAR_BUILT,
              salesBuildingTableClass::ZIPCODE,
              salesBuildingTableClass::NEIGHBORHOOD_NAME,
              salesBuildingTableClass::DATE_ADDED,
              salesBuildingTableClass::DATE_MODIFIED,
              salesBuildingTableClass::CREATED_AT,
              salesBuildingTableClass::UPDATED_AT,
              salesBuildingTableClass::SALES_BUILDING_HASH
          );
          $order_by_sales_buildings = array(
              salesBuildingTableClass::ID
          );


          $objSalesBuildings = salesBuildingTableClass::getAll($sales_building_fields, true, $order_by_sales_buildings, 'ASC');

          /** SALES BUILDINGS INSTANCES* */
          $sale_building_id = salesBuildingTableClass::ID;
          $sale_building_address = salesBuildingTableClass::ADDRESS;
          $sale_building_city = salesBuildingTableClass::CITY;
          $sale_building_state = salesBuildingTableClass::STATE;
          $sale_building_year_built = salesBuildingTableClass::YEAR_BUILT;
          $sale_building_zipcode = salesBuildingTableClass::ZIPCODE;
          $sale_building_negiborhood_name = salesBuildingTableClass::NEIGHBORHOOD_NAME;
          $sale_building_dated_added = salesBuildingTableClass::DATE_ADDED;
          $sale_building_dated_modified = salesBuildingTableClass::DATE_MODIFIED;
          $sale_building_created_at = salesBuildingTableClass::CREATED_AT;
          $sale_building_updated_at = salesBuildingTableClass::UPDATED_AT;
          $sale_building_hash = salesBuildingTableClass::SALES_BUILDING_HASH;
          

          foreach ($objSalesBuildings as $sale_building) {

            $sale_building_id_field = '<div class="label" style="background-color: #719038;"> OLR </div><button class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_id . ' </button>';
            $sale_building_address_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_address . ' </button>';
            $sale_building_city_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_city . ' </button>';
            $sale_building_state_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_state . ' </button>';
            $sale_building_year_built_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_year_built . ' </button>';
            $sale_building_zipcode_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_zipcode . ' </button>';
            $sale_building_neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $sale_building->$sale_building_negiborhood_name . ' </button>';
            $sale_building_date_added_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sale_building->$sale_building_dated_added . ' </button>';
            $sale_building_date_modified_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $sale_building->$sale_building_dated_modified . ' </button>';
            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("sales_building", "manage", array(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true) => $sale_building->$sale_building_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>';
//            $actions .= '<button disabled data-id="' . $building->$building_id . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="Delete Building ' . $building->$building_address . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $sale_building_id_field;
            $subdata[] = $sale_building_address_field;
            $subdata[] = $sale_building_city_field;
            $subdata[] = $sale_building_state_field;
            $subdata[] = $sale_building_year_built_field;
            $subdata[] = $sale_building_zipcode_field;
            $subdata[] = $sale_building_neighborhood_field;
            $subdata[] = $sale_building_date_added_field;
            $subdata[] = $sale_building_date_modified_field;
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
              "recordsTotal" => intval(count($objSalesBuildings)),
              "recordsFiltered" => intval(count($objSalesBuildings)),
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
