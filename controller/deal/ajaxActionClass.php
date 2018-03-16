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

      /**
       * show info super parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["notes_listing_hash"])) {
          $listing_hash = request::getInstance()->getPost("notes_listing_hash");

          $listing_fields = array(
              listingTableClass::ID,
              listingTableClass::NOTES_LISTING,
              listingTableClass::LISTING_HASH
          );
          $where = array(
              listingTableClass::LISTING_HASH => $listing_hash
          );
          $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where);
          /** LISTING INSTANCES * */
          $listing_id = listingTableClass::ID;
          $listing_notes = listingTableClass::NOTES_LISTING;
          ?>
          <script>
            $(document).ready(function () {
                $('#listing_notes_info').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="listing_notes_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> <b> Listing Details </b>  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Listing ID: <?php echo $objListing[0]->$listing_id; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <table id="listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                              <tbody>
                                  <tr>
                                      <td><b>NOTES</b></td>
                                      <td>
                                          <?php if (empty($objListing[0]->$listing_notes)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                          <?php } else { ?>
                                            <?php echo$objListing[0]->$listing_notes; ?></td>
                                      <?php } ?>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['rental_deals_data'])) {

          /**
           * rental Deals info
           */
          $rental_deals_fields = array(
              rentalDealsTableClass::ID,
              rentalDealsTableClass::ADDRESS,
              rentalDealsTableClass::RENT,
              rentalDealsTableClass::RENTAL_DEAL_FEE,
              rentalDealsTableClass::LANDLORD_ID_LANDLORD,
              rentalDealsTableClass::DEAL_MOVE_IN_DATE,
              rentalDealsTableClass::USUARIO_ID,
              rentalDealsTableClass::DEAL_DATE_RENTED,
              rentalDealsTableClass::DEAL_DATE_CLOSED,
              rentalDealsTableClass::STATUS,
              rentalDealsTableClass::RENTAL_DEAL_NOTES,
              rentalDealsTableClass::LISTING_MANAGER_ID_LISTING_MANAGER,
              rentalDealsTableClass::LISTING_ID_LISTING,
              rentalDealsTableClass::UNIT,
              rentalDealsTableClass::DEAL_TYPE,
              rentalDealsTableClass::RENTAL_DEALS_HASH,
              rentalDealsTableClass::CREATED_AT,
              rentalDealsTableClass::UPDATED_AT
          );

          /** RENTAL DEALS INSTANCES * */
          $rental_deals_id = rentalDealsTableClass::ID;
          $rental_deals_address = rentalDealsTableClass::ADDRESS;
          $rental_deals_rent = rentalDealsTableClass::RENT;
          $rental_deal_fee = rentalDealsTableClass::RENTAL_DEAL_FEE;
          $rental_deals_landlord_id = rentalDealsTableClass::LANDLORD_ID_LANDLORD;
          $rental_deals_deal_move_in_date = rentalDealsTableClass::DEAL_MOVE_IN_DATE;
          $rental_deals_user_id = rentalDealsTableClass::USUARIO_ID;
          $rental_deals_date_rented = rentalDealsTableClass::DEAL_DATE_RENTED;
          $rental_deals_deal_date_closed = rentalDealsTableClass::DEAL_DATE_CLOSED;
          $rental_deals_status = rentalDealsTableClass::STATUS;
          $rental_deals_notes = rentalDealsTableClass::RENTAL_DEAL_NOTES;
          $rental_deals_listing_manager_id = rentalDealsTableClass::LISTING_MANAGER_ID_LISTING_MANAGER;
          $rental_deals_listing_id = rentalDealsTableClass::LISTING_ID_LISTING;
          $rental_deals_unit_number = rentalDealsTableClass::UNIT;
          $rental_deals_deal_type = rentalDealsTableClass::DEAL_TYPE;
          $rental_deals_hash = rentalDealsTableClass::RENTAL_DEALS_HASH;
          $rental_deals_created_at = rentalDealsTableClass::CREATED_AT;
          $rental_deals_updated_at = rentalDealsTableClass::UPDATED_AT;

          /** LISTING INSTANCES * */
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;

          /*
           * Array of database columns which should be read and sent back to DataTables.
           */
          $aColumns = array(
              $rental_deals_id,
              $rental_deals_listing_id,
              $rental_deals_address,
              $rental_deals_unit_number,
              $rental_deals_rent,
              $rental_deal_fee,
              $rental_deals_landlord_id,
              $rental_deals_deal_move_in_date,
              $rental_deals_user_id,
              $rental_deals_date_rented,
              $rental_deals_deal_date_closed,
              $rental_deals_status,
              $rental_deals_notes,
              $rental_deals_listing_manager_id,
              $rental_deals_deal_type,
              $rental_deals_created_at,
              $rental_deals_updated_at,
          );

          /*
           * Paging
           */
          if (request::getInstance()->getGet('iDisplayStart') == 0) {
            $iDisplayStart = 0;
          } else {
            $iDisplayStart = request::getInstance()->getGet('iDisplayStart');
          }
          /*
           * Ordering
           */
          if (request::getInstance()->hasGet('iSortCol_0')) {

            for ($i = 0; $i < intval(request::getInstance()->getGet('iSortingCols')); $i++) {

              if (request::getInstance()->getGet('bSortable_' . intval(request::getInstance()->getGet('iSortCol_' . $i))) == "true") {
                $sOrder = array(
                    $aColumns[intval(request::getInstance()->getGet('iSortCol_' . $i))],
                );

                $sOrderBy = request::getInstance()->getGet('sSortDir_' . $i);
              }
            }
          }


          if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) {

            $landlord_hash_filter = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));
            $listing_status_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
            $listing_building_hash_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true));
            $listing_id_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true));

            $swhere_filter = array();

            if (!empty($landlord_hash_filter)) {
              $landlord_id_filter = landlordTableClass::getIdNewLandlord($landlord_hash_filter);
              $swhere_filter[listingTableClass::LANDLORD_ID_LANDLORD] = $landlord_id_filter;
            }

            if (!empty($listing_status_filter)) {
              if ($listing_status_filter != "All") {
                $swhere_filter[listingTableClass::STATUS] = $listing_status_filter;
              }
            }

            if (!empty($listing_building_hash_filter)) {
              $building_id_filter = buildingTableClass::getIdNewBuilding($listing_building_hash_filter);
              $swhere_filter[listingTableClass::BUILDING_ID_BUILDING] = $building_id_filter;
            }

            if (!empty($listing_id_filter)) {

              $swhere_filter[listingTableClass::ID] = $listing_id_filter;
            }



            $objListings = listingTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $swhere_filter);
            $objListings_pagination = listingTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, null, null, $swhere_filter);
          } else {
            /*
             * Filtering
             * NOTE this does not match the built-in DataTables filtering which does it
             * word by word on any field. It's possible to do here, but concerned about efficiency
             * on very large tables, and MySQL's regex functionality is very limited
             */

//            if (!empty(request::getInstance()->getGet('sSearch'))) {
//              $sSearch = request::getInstance()->getGet('sSearch');
//              $listing_where = array(
//                  listingTableClass::STATUS => 1
//              );
//              $like = array(
//                  listingTableClass::ID => $sSearch,
//                  listingTableClass::RENT_LISTING => $sSearch,
//                  listingTableClass::UNIT_NUMBER_LISTING => $sSearch,
//                  listingTableClass::BATH_SIZE_LISTING => $sSearch,
//                  listingTableClass::LOCKBOX_LISTING => $sSearch,
//                  listingTableClass::NOTES_LISTING => $sSearch,
//                  listingTableClass::CREATED_AT => $sSearch,
//                  listingTableClass::UPDATED_AT => $sSearch,
//              );
//
//              $objListings = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $listing_where, $like);
//              $objListings_pagination = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, null, null, $listing_where, $like);
//            } else {
            $rental_deals_where = array(
                rentalDealsTableClass::ID
            );
            $objRentalDeals = rentalDealsTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $rental_deals_where);
            $objRentalDeals_pagination = rentalDealsTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, null, null, $rental_deals_where);
//            }
          }


//
//          /* Individual column filtering */
//          for ($i = 0; $i < count($listing_fields); $i++) {
//            if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
//              if ($sWhere == "") {
//                $sWhere = "WHERE ";
//              } else {
//                $sWhere .= " AND ";
//              }
//              $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
//            }
//          }

          /** BUILDING INSTANCES * */
//          $building_id_super = buildingTableClass::ID_SUPER;
          foreach ($objRentalDeals as $rental_deals) {


            $listing_info = listingTableClass::getListingById($rental_deals->$rental_deals_listing_id);
            $landlord_hash = landlordTableClass::getLandlordHash($rental_deals->$rental_deals_landlord_id);
            $building_hash_listing = buildingTableClass::getBuildingHash($rental_deals->$rental_deals_listing_id);


//            $rental_deals_id_field = '<button class="mdl-button mdl-js-button"  type="button"> ' . $rental_deals->$rental_deals_id . ' </button>';
//            $rental_deals_id_listing_field = '<button class="mdl-button mdl-js-button"  type="button"> ' . $rental_deals->$rental_deals_listing_id . ' </button>';
            $rental_deals_building_address_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $rental_deals->$rental_deals_address . '</button>';
            $rental_deals_listing_unit_number_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $rental_deals->$rental_deals_unit_number . '</button>';
            $listing_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button">  ' . listingSizeTableClass::getListingSizeByID($listing_info[0]->$listing_size_id) . ' </button>';
            $listing_bath_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $listing_info[0]->$listing_bath_size . ' </button>';

            $rental_deals_rent_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $rental_deals->$rental_deals_rent . ' USD </button>';
            $rental_deals_fee_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $rental_deals->$rental_deal_fee . ' USD </button>';
            $rental_deals_landlord_field = '<button  class="mdl-button mdl-js-button" type="button"><a href="' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlord_hash)) . '"><u> ' . landlordTableClass::getLandlordNameById($rental_deals->$rental_deals_landlord_id) . ' </u></a></button>';
            $rental_deals_move_in_date_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $rental_deals->$rental_deals_deal_move_in_date . ' </button>';
            $rental_deals_user_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
                <span class="mdl-chip__text">' . profileTableClass::getProfileByUserId($rental_deals->$rental_deals_user_id) . '</span>
            </span>';

            $rental_deals_date_rented_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $rental_deals->$rental_deals_date_rented . ' </button>';
            if (!empty($rental_deals->$rental_deals_deal_date_closed)) {
              $rental_deals_date_closed_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $rental_deals->$rental_deals_deal_date_closed . ' </button>';
            } else {
              $rental_deals_date_closed_field = '<button  class="mdl-button mdl-js-button" type="button"> Pending </button>';
            }

            if ($rental_deals->$rental_deals_status == "1") {
              $rental_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
            } elseif ($rental_deals->$rental_deals_status == "2") {
              $rental_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
            } elseif ($rental_deals->$rental_deals_status == "3") {
              $rental_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
            } elseif ($rental_deals->$rental_deals_status == "4") {
              $rental_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NOT SPECIFIED </button>';
            } else {
              $rental_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button">' . $rental_deals->$rental_deals_status . ' </button>';
            }

            if (!empty($rental_deals->$rental_deals_notes)) {
              $rental_deals_notes_field = $rental_deals->$rental_deals_notes;
            } else {
              $rental_deals_notes_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> No Notes </button>';
            }

            $listing_neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($listing_info[0]->$listing_building_id)) . ' </button>';

//            $rental_deals_listing_manager_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
//                <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
//                <span class="mdl-chip__text">' . profileTableClass::getProfileByUserId($rental_deals->$rental_deals_listing_manager_id) . '</span>
//            </span>';
            $rental_deals_source = '';
            $rental_deals_created_at_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $rental_deals->$rental_deals_created_at . ' </button>';

            if (!empty($rental_deals->$rental_deals_updated_at)) {
              $rental_deals_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $rental_deals->$rental_deals_updated_at . ' </button>';
            } else {
              $rental_deals_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> No Updates </button>';
            }

            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("deal", "index", array(listingTableClass::getNameField(rentalDealsTableClass::RENTAL_DEALS_HASH, true) => $rental_deals->$rental_deals_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage </a>';
            $actions .= '<button  disabled class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Rental Deal ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing_info[0]->$listing_building_id)) . ', ' . $listing_info[0]->$listing_unit_number . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
//            $subdata[][] = $rental_deals_id_field;
//            $subdata[][] = $rental_deals_id_listing_field;
            $subdata[][] = $rental_deals_building_address_field;
            $subdata[][] = $rental_deals_listing_unit_number_field;
            $subdata[][] = $rental_deals_rent_field;
            $subdata[][] = $listing_size_field;
            $subdata[][] = $listing_bath_size_field;
            $subdata[][] = $rental_deals_fee_field;
            $subdata[][] = $rental_deals_landlord_field;
            $subdata[][] = $rental_deals_move_in_date_field;
            $subdata[][] = $rental_deals_user_field;
            $subdata[][] = $rental_deals_date_rented_field;
            $subdata[][] = $rental_deals_date_closed_field;
            $subdata[][] = $rental_deals_status_field;
            $subdata[][] = $rental_deals_notes_field;
            $subdata[][] = $listing_neighborhood_field;
//            $subdata[][] = $rental_deals_listing_manager_field;
            $subdata[][] = $rental_deals_source;
            $subdata[][] = $rental_deals_created_at_field;
            $subdata[][] = $rental_deals_updated_at_field;
            $subdata[][] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          /*
           * Output
           */
          $output = array(
              "sEcho" => intval(request::getInstance()->getGet('sEcho')),
              "iTotalRecords" => intval(count($objRentalDeals_pagination)),
              "iTotalDisplayRecords" => intval(count($objRentalDeals_pagination)),
              "data" => $data
          );

          echo json_encode($output);
        }
      }





      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['sales_deals_data'])) {

          /**
           * sales Deals info
           */
          $sales_deals_fields = array(
              salesDealsTableClass::ID,
              salesDealsTableClass::ADDRESS,
              salesDealsTableClass::RENT,
              salesDealsTableClass::DEAL_CLOSED_PRICE,
              salesDealsTableClass::FEE,
              salesDealsTableClass::LANDLORD_ID_LANDLORD,
              salesDealsTableClass::DEAL_MOVE_IN_DATE,
              salesDealsTableClass::USUARIO_ID,
              salesDealsTableClass::SALES_DEAL_DATE_SOLD,
              salesDealsTableClass::SALES_DEAL_DATE_CLOSED,
              salesDealsTableClass::STATUS,
              salesDealsTableClass::DEAL_NOTES,
              salesDealsTableClass::LISTING_MANAGER_ID_LISTING_MANAGER,
              salesDealsTableClass::LISTING_ID_LISTING,
              salesDealsTableClass::UNIT,
              salesDealsTableClass::DEAL_TYPE,
              salesDealsTableClass::SALES_DEALS_HASH,
              salesDealsTableClass::CREATED_AT,
              salesDealsTableClass::UPDATED_AT
          );

          /** RENTAL DEALS INSTANCES * */
          $sales_deals_id = salesDealsTableClass::ID;
          $sales_deals_address = salesDealsTableClass::ADDRESS;
          $sales_deals_rent = salesDealsTableClass::RENT;
          $sales_deal_closed_price = salesDealsTableClass::DEAL_CLOSED_PRICE;
          $sales_deal_fee = salesDealsTableClass::FEE;
          $sales_deals_landlord_id = salesDealsTableClass::LANDLORD_ID_LANDLORD;
          $sales_deals_deal_move_in_date = salesDealsTableClass::DEAL_MOVE_IN_DATE;
          $sales_deals_user_id = salesDealsTableClass::USUARIO_ID;
          $sales_deals_date_sold = salesDealsTableClass::SALES_DEAL_DATE_SOLD;
          $sales_deals_deal_date_closed = salesDealsTableClass::SALES_DEAL_DATE_CLOSED;
          $sales_deals_status = salesDealsTableClass::STATUS;
          $sales_deals_notes = salesDealsTableClass::DEAL_NOTES;
          $sales_deals_listing_manager_id = salesDealsTableClass::LISTING_MANAGER_ID_LISTING_MANAGER;
          $sales_deals_listing_id = salesDealsTableClass::LISTING_ID_LISTING;
          $sales_deals_unit_number = salesDealsTableClass::UNIT;
          $sales_deals_deal_type = salesDealsTableClass::DEAL_TYPE;
          $sales_deals_hash = salesDealsTableClass::SALES_DEALS_HASH;
          $sales_deals_created_at = salesDealsTableClass::CREATED_AT;
          $sales_deals_updated_at = salesDealsTableClass::UPDATED_AT;

          /** LISTING INSTANCES * */
          $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
          $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
          $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
          $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;

          /*
           * Array of database columns which should be read and sent back to DataTables.
           */
          $aColumns = array(
              $sales_deals_id,
              $sales_deals_listing_id,
              $sales_deals_address,
              $sales_deals_unit_number,
              $sales_deals_rent,
              $sales_deal_fee,
              $sales_deals_landlord_id,
              $sales_deals_deal_move_in_date,
              $sales_deals_user_id,
              $sales_deals_date_sold,
              $sales_deals_deal_date_closed,
              $sales_deals_status,
              $sales_deals_notes,
              $sales_deals_listing_manager_id,
              $sales_deals_deal_type,
              $sales_deals_created_at,
              $sales_deals_updated_at,
          );

          /*
           * Paging
           */
          if (request::getInstance()->getGet('iDisplayStart') == 0) {
            $iDisplayStart = 0;
          } else {
            $iDisplayStart = request::getInstance()->getGet('iDisplayStart');
          }
          /*
           * Ordering
           */
          if (request::getInstance()->hasGet('iSortCol_0')) {

            for ($i = 0; $i < intval(request::getInstance()->getGet('iSortingCols')); $i++) {

              if (request::getInstance()->getGet('bSortable_' . intval(request::getInstance()->getGet('iSortCol_' . $i))) == "true") {
                $sOrder = array(
                    $aColumns[intval(request::getInstance()->getGet('iSortCol_' . $i))],
                );

                $sOrderBy = request::getInstance()->getGet('sSortDir_' . $i);
              }
            }
          }


          if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)) && request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) {

            $landlord_hash_filter = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));
            $listing_status_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
            $listing_building_hash_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true));
            $listing_id_filter = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true));

            $swhere_filter = array();

            if (!empty($landlord_hash_filter)) {
              $landlord_id_filter = landlordTableClass::getIdNewLandlord($landlord_hash_filter);
              $swhere_filter[listingTableClass::LANDLORD_ID_LANDLORD] = $landlord_id_filter;
            }

            if (!empty($listing_status_filter)) {
              if ($listing_status_filter != "All") {
                $swhere_filter[listingTableClass::STATUS] = $listing_status_filter;
              }
            }

            if (!empty($listing_building_hash_filter)) {
              $building_id_filter = buildingTableClass::getIdNewBuilding($listing_building_hash_filter);
              $swhere_filter[listingTableClass::BUILDING_ID_BUILDING] = $building_id_filter;
            }

            if (!empty($listing_id_filter)) {

              $swhere_filter[listingTableClass::ID] = $listing_id_filter;
            }



            $objListings = listingTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $swhere_filter);
            $objListings_pagination = listingTableClass::getAll($rental_deals_fields, true, $sOrder, $sOrderBy, null, null, $swhere_filter);
          } else {
            /*
             * Filtering
             * NOTE this does not match the built-in DataTables filtering which does it
             * word by word on any field. It's possible to do here, but concerned about efficiency
             * on very large tables, and MySQL's regex functionality is very limited
             */

//            if (!empty(request::getInstance()->getGet('sSearch'))) {
//              $sSearch = request::getInstance()->getGet('sSearch');
//              $listing_where = array(
//                  listingTableClass::STATUS => 1
//              );
//              $like = array(
//                  listingTableClass::ID => $sSearch,
//                  listingTableClass::RENT_LISTING => $sSearch,
//                  listingTableClass::UNIT_NUMBER_LISTING => $sSearch,
//                  listingTableClass::BATH_SIZE_LISTING => $sSearch,
//                  listingTableClass::LOCKBOX_LISTING => $sSearch,
//                  listingTableClass::NOTES_LISTING => $sSearch,
//                  listingTableClass::CREATED_AT => $sSearch,
//                  listingTableClass::UPDATED_AT => $sSearch,
//              );
//
//              $objListings = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $listing_where, $like);
//              $objListings_pagination = listingTableClass::getAll($listing_fields, true, $sOrder, $sOrderBy, null, null, $listing_where, $like);
//            } else {
            $sales_deals_where = array(
                salesDealsTableClass::ID
            );
            $objSalesDeals = salesDealsTableClass::getAll($sales_deals_fields, true, $sOrder, $sOrderBy, request::getInstance()->getGet('iDisplayLength'), $iDisplayStart, $sales_deals_where);
            $objSalesDeals_pagination = salesDealsTableClass::getAll($sales_deals_fields, true, $sOrder, $sOrderBy, null, null, $sales_deals_where);
//            }
          }


//
//          /* Individual column filtering */
//          for ($i = 0; $i < count($listing_fields); $i++) {
//            if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
//              if ($sWhere == "") {
//                $sWhere = "WHERE ";
//              } else {
//                $sWhere .= " AND ";
//              }
//              $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
//            }
//          }

          /** BUILDING INSTANCES * */
//          $building_id_super = buildingTableClass::ID_SUPER;
          foreach ($objSalesDeals as $sales_deals) {


            $listing_info = listingTableClass::getListingById($sales_deals->$sales_deals_listing_id);
            $building_hash_listing = buildingTableClass::getBuildingHash($sales_deals->$sales_deals_listing_id);

            $sales_deals_building_address_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $sales_deals->$sales_deals_address . '</button>';
            $sales_deals_listing_unit_number_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> ' . $sales_deals->$sales_deals_unit_number . '</button>';
            $listing_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button">  ' . listingSizeTableClass::getListingSizeByID($listing_info[0]->$listing_size_id) . ' </button>';
            $listing_bath_size_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $listing_info[0]->$listing_bath_size . ' </button>';

            $sales_deals_listed_price_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $sales_deals->$sales_deals_rent . ' USD </button>';
            $sales_deals_closed_price_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $sales_deals->$sales_deal_closed_price . ' USD </button>';
            $sales_deals_fee_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> $ ' . $sales_deals->$sales_deal_fee . ' USD </button>';
            $sales_deals_user_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
                <span class="mdl-chip__text">' . profileTableClass::getProfileByUserId($sales_deals->$sales_deals_user_id) . '</span>
            </span>';

            $sales_deals_date_sold_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $sales_deals->$sales_deals_date_sold . ' </button>';
            if (!empty($sales_deals->$sales_deals_deal_date_closed)) {
              $sales_deals_date_closed_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $sales_deals->$sales_deals_deal_date_closed . ' </button>';
            } else {
              $sales_deals_date_closed_field = '<button  class="mdl-button mdl-js-button" type="button"> Pending </button>';
            }

            if ($sales_deals->$sales_deals_status == "1") {
              $sales_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> AVAILABLE </button>';
            } elseif ($sales_deals->$sales_deals_status == "2") {
              $sales_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING </button>';
            } elseif ($sales_deals->$sales_deals_status == "3") {
              $sales_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE </button>';
            } elseif ($sales_deals->$sales_deals_status == "4") {
              $sales_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NOT SPECIFIED </button>';
            } else {
              $sales_deals_status_field = '<button  class="mdl-button mdl-js-button mdl-button--dark" type="button">' . $sales_deals->$sales_deals_status . ' </button>';
            }

            if (!empty($sales_deals->$sales_deals_notes)) {
              $sales_deals_notes_field = $sales_deals->$sales_deals_notes;
            } else {
              $sales_deals_notes_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> No Notes </button>';
            }

            $listing_neighborhood_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($listing_info[0]->$listing_building_id)) . ' </button>';

            $sales_deals_source = '';
            $sales_deals_created_at_field = '<button class = "mdl-button mdl-js-button" type = "button"> ' . $sales_deals->$sales_deals_created_at . ' </button>';

            if (!empty($sales_deals->$sales_deals_updated_at)) {
              $sales_deals_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $sales_deals->$sales_deals_updated_at . ' </button>';
            } else {
              $sales_deals_updated_at_field = '<button  class="mdl-button mdl-js-button" type="button"> No Updates </button>';
            }

            $actions = '';
            $actions .= '<a href="' . routing::getInstance()->getUrlWeb("deal", "index", array(listingTableClass::getNameField(rentalDealsTableClass::RENTAL_DEALS_HASH, true) => $sales_deals->$sales_deals_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage </a>';
            $actions .= '<button  disabled class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Rental Deal ' . buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing_info[0]->$listing_building_id)) . ', ' . $listing_info[0]->$listing_unit_number . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[][] = $sales_deals_building_address_field;
            $subdata[][] = $sales_deals_listing_unit_number_field;
            $subdata[][] = $listing_size_field;
            $subdata[][] = $listing_bath_size_field;
            $subdata[][] = $sales_deals_listed_price_field;
            $subdata[][] = $sales_deals_closed_price_field;
            $subdata[][] = $sales_deals_fee_field;
            $subdata[][] = $sales_deals_user_field;
            $subdata[][] = $sales_deals_date_sold_field;
            $subdata[][] = $sales_deals_date_closed_field;
            $subdata[][] = $sales_deals_status_field;
            $subdata[][] = $sales_deals_notes_field;
            $subdata[][] = $listing_neighborhood_field;
            $subdata[][] = $sales_deals_source;
            $subdata[][] = $sales_deals_created_at_field;
            $subdata[][] = $sales_deals_updated_at_field;
            $subdata[][] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          /*
           * Output
           */
          $output = array(
              "sEcho" => intval(request::getInstance()->getGet('sEcho')),
              "iTotalRecords" => intval(count($objSalesDeals_pagination)),
              "iTotalDisplayRecords" => intval(count($objSalesDeals_pagination)),
              "data" => $data
          );

          echo json_encode($output);
        }
      }


      if (request::getInstance()->isMethod("POST")) {
        if (request::getInstance()->hasPost("new_deal")) {
          $listing_hash = request::getInstance()->getPost("new_deal");

          if (!empty($listing_hash)) {

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
                listingTableClass::UPDATED_AT,
                listingTableClass::SYNC_ID_SYNC
            );

            $where_listing = array(
                listingTableClass::LISTING_HASH => $listing_hash,
            );

            $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);


            /** LISTING INSTANCES * */
            $listing_id = listingTableClass::ID;
            $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
            $listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
            $listing_rent = listingTableClass::RENT_LISTING;
            $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
            $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
            $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
            $listing_fee_op = listingTableClass::FEE_OP_LISTING;
            $listing_custom_fee_op = listingTableClass::CUSTOM_FEE_OP_LISTING;
            $listing_lease_start = listingTableClass::LEASE_TERM_START;
            $listing_lease_end = listingTableClass::LEASE_TERM_END;
            $listing_floor_number = listingTableClass::FLOOR_NUMBER_LISTING;
            $listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
            $listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
            $listing_email_notification_status = listingTableClass::EMAIL_NOTIFICATION_STATUS;
            $listing_notes = listingTableClass::NOTES_LISTING;
            $listing_status = listingTableClass::STATUS;
            $listing_listing_hash = listingTableClass::LISTING_HASH;

            foreach ($objListing as $listing):
              ?>
              <div id= "deal_listing_info">
                  <div class="panel panel-success">
                      <div class="panel-body">
                          <div class=" pull-right">

                              <button data-hash="<?php echo $listing->$listing_listing_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnView_listing" type="button"><i class="fa fa-eye" aria-hidden="true"></i> View Apartment Details </button>
                          </div>
                      </div>
                  </div>
                  <table id = "deal_listing" class = "table dt-responsive nowrap" cellspacing = "0" width = "100%">

                      <tbody>
                          <tr>
                              <td colspan = "2" class = "table_title"> <i class = "fa fa-server" aria-hidden = "true"></i> Listing Information </td>
                          </tr>
                          <tr>
                              <td><b>ID</b></td>
                              <td><button class = "mdl-button mdl-js-button" type = "button"><?php echo $listing->$listing_id; ?></button></td>
                          </tr>
                          <tr>
                              <td><b>LANDLORD</b></td>
                              <td><?php echo strtoupper(landlordTableClass::getLandlordNameById($listing->$listing_landlord_id)); ?> </td>
                          </tr>
                          <tr>
                              <td><b>BUILDING</b></td> 
                              <td><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?> </td>
                          </tr>
                          <tr>
                              <td><b>APT# / UNIT#</b></td> 
                              <td><?php echo $listing->$listing_unit_number; ?> </td>
                          </tr>
                          <tr>
                              <td><b>RENT</b></td> 
                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $listing->$listing_rent; ?> USD</button></td>
                          </tr>
                          <tr>
                              <td><b># BEDS</b></td>
                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($listing->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                              <td><b># BATHS</b></td>
                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $listing->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                              <td><b>OP 
                                      <div id="tt3" class="icon material-icons">error</div>
                                      <div class="mdl-tooltip" data-mdl-for="tt3">
                                          <strong>Owner Pays</strong>
                                      </div>
                                  </b>
                              </td>
                              <td>
                                  <?php if ($listing->$listing_fee_op == "custom") { ?>
                                    <b><?php echo $listing->$listing_fee_op ?>: </b> <?php echo $listing->$listing_custom_fee_op; ?>
                                    <?php
                                  } else {
                                    echo $listing->$listing_fee_op;
                                  }
                                  ?>
                              </td>
                          </tr>
                          <tr>
                              <td><b>LISTING STATUS</b></td>
                              <td>
                                  <?php if ($listing->$listing_status == "1") { ?>
                                    <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                  <?php } elseif ($listing->$listing_status == "2") { ?>
                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                  <?php } elseif ($listing->$listing_status == "3") { ?>
                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                  <?php } else { ?>
                                    <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                  <?php } ?>
                              </td>
                          </tr>
                          <tr>
                              <td><b>LEASE TERMS (Months)</b></td>
                              <td>
                                  <?php if (!empty($listing->$listing_lease_start) && !empty($listing->$listing_lease_end)) { ?>
                                    <?php echo $listing->$listing_lease_start; ?> - <?php echo $listing->$listing_lease_end; ?> (Months)
                                  <?php } else { ?>
                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> NO LEASE TERMS ASSIGNED</button>
                                  <?php } ?>
                              </td>
                          </tr>
                          <tr>
                              <td><b>ACCESS</b></td>
                              <td>
                                  <?php if ($listing->$listing_id_access === 1) { ?>
                                    <?php echo accessTableClass::getAccessName($listing->$listing_id_access); ?>-<b>Lockbox Code: </b>  <?php echo $listing->$listing_lockbox_code; ?>
                                    <?php
                                  } else {
                                    echo accessTableClass::getAccessName($listing->$listing_id_access);
                                  }
                                  ?>
                              </td>
                          </tr>
                          <tr>
                              <td><b>FLOOR</b></td>
                              <td><?php echo $listing->$listing_floor_number; ?></td>
                          </tr>
                          <tr>
                              <td><b>NOTES</b></td>
                              <td>
                                  <?php if (empty($listing->$listing_notes)) { ?>
                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                  <?php } else { ?>
                                    <?php echo $listing->$listing_notes; ?></td>
                              <?php } ?>
                          </tr>
                          <tr>
                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Rental Deal Information </td>
                          </tr> 
                      </tbody>
                  </table>

                  <form id="listing_new_deal" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "update", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))); ?>">
                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Move In Date</label>
                              <input type="date" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" <?php echo (!empty($listing->$listing_unit_number)) ? 'value="' . $listing->$listing_unit_number . '"' : ''; ?> placeholder="Enter Apt #/Unit #" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Fee</label>
                              <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" <?php echo (!empty($listing->$listing_rent)) ? 'value="' . $listing->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Notes </label>
                              <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required class="form-control" rows="5" ></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email to the company (all the agents on the team)?</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                  <option value="">Select Option</option>  
                                  <option value="1" <?php echo ($listing->$listing_email_notification_status === 1) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> Yes</option>  
                                  <option value="0" <?php echo ($listing->$listing_email_notification_status === 0) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> No</option>  
                              </select>
                              
                          </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> New Rental Deal</button>
                          </div>
                      </div>
                  </form>
                  <div id="view_listing_panel"></div>
                  <script>
                    $(document).ready(function () {

                        $(".btnView_listing").on('click', function () {
                            var listing_hash = $(this).data("hash");
                            var urlajax = url + 'listing/ajax';
                            $.ajax({
                                async: true,
                                type: "POST",
                                dataType: "html",
                                contentType: "application/x-www-form-urlencoded",
                                url: urlajax,
                                data: ('view_listing=' + listing_hash),
                                success: function (data) {

                                    $("#view_listing_panel").show();
                                    //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                    $("#view_listing_panel").html(data);
                                }
                            });
                        });
                    });
                  </script>
              </div>
              <?php
            endforeach;
          } else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="glyphicon glyphicon-remove-sign"></i> <strong>Error!</strong> Please Select a Unit
            </div>
            <?php
          }
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (request::getInstance()->hasPost("new_deal_listing_id")) {
          $listing_listing_id = request::getInstance()->getPost("new_deal_listing_id");

          if (!empty($listing_listing_id)) {

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
                listingTableClass::UPDATED_AT,
                listingTableClass::SYNC_ID_SYNC
            );

            $where_listing = array(
                listingTableClass::ID => $listing_listing_id,
            );

            $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);


            /** LISTING INSTANCES * */
            $listing_id = listingTableClass::ID;
            $listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
            $listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
            $listing_rent = listingTableClass::RENT_LISTING;
            $listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
            $listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
            $listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
            $listing_fee_op = listingTableClass::FEE_OP_LISTING;
            $listing_custom_fee_op = listingTableClass::CUSTOM_FEE_OP_LISTING;
            $listing_lease_start = listingTableClass::LEASE_TERM_START;
            $listing_lease_end = listingTableClass::LEASE_TERM_END;
            $listing_floor_number = listingTableClass::FLOOR_NUMBER_LISTING;
            $listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
            $listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
            $listing_email_notification_status = listingTableClass::EMAIL_NOTIFICATION_STATUS;
            $listing_notes = listingTableClass::NOTES_LISTING;
            $listing_status = listingTableClass::STATUS;
            $listing_listing_hash = listingTableClass::LISTING_HASH;

            foreach ($objListing as $listing):

              if($listing->$listing_status == 1) {
                ?>
                <div id= "deal_listing_info">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class=" pull-right">

                                <button data-hash="<?php echo $listing->$listing_listing_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnView_listing" type="button"><i class="fa fa-eye" aria-hidden="true"></i> View Apartment Details </button>
                            </div>
                        </div>
                    </div>
                    <table id = "deal_listing" class = "table dt-responsive nowrap" cellspacing = "0" width = "100%">

                        <tbody>
                            <tr>
                                <td colspan = "2" class = "table_title"> <i class = "fa fa-server" aria-hidden = "true"></i> Listing Information </td>
                            </tr>
                            <tr>
                                <td><b>ID</b></td>
                                <td><button class = "mdl-button mdl-js-button" type = "button"><?php echo $listing->$listing_id; ?></button></td>
                            </tr>
                            <tr>
                                <td><b>LANDLORD</b></td>
                                <td><?php echo strtoupper(landlordTableClass::getLandlordNameById($listing->$listing_landlord_id)); ?> </td>
                            </tr>
                            <tr>
                                <td><b>BUILDING</b></td> 
                                <td><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?> </td>
                            </tr>
                            <tr>
                                <td><b>APT# / UNIT#</b></td> 
                                <td><?php echo $listing->$listing_unit_number; ?> </td>
                            </tr>
                            <tr>
                                <td><b>RENT</b></td> 
                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $listing->$listing_rent; ?> USD</button></td>
                            </tr>
                            <tr>
                                <td><b># BEDS</b></td>
                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($listing->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                            </tr>
                            <tr>
                                <td><b># BATHS</b></td>
                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $listing->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                            </tr>
                            <tr>
                                <td><b>OP 
                                        <div id="tt3" class="icon material-icons">error</div>
                                        <div class="mdl-tooltip" data-mdl-for="tt3">
                                            <strong>Owner Pays</strong>
                                        </div>
                                    </b>
                                </td>
                                <td>
                                    <?php if ($listing->$listing_fee_op == "custom") { ?>
                                      <b><?php echo $listing->$listing_fee_op ?>: </b> <?php echo $listing->$listing_custom_fee_op; ?>
                                      <?php
                                    } else {
                                      echo $listing->$listing_fee_op;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>LISTING STATUS</b></td>
                                <td>
                                    <?php if ($listing->$listing_status == "1") { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                    <?php } elseif ($listing->$listing_status == "2") { ?>
                                      <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                    <?php } elseif ($listing->$listing_status == "3") { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                    <?php } else { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>LEASE TERMS (Months)</b></td>
                                <td>
                                    <?php if (!empty($listing->$listing_lease_start) && !empty($listing->$listing_lease_end)) { ?>
                                      <?php echo $listing->$listing_lease_start; ?> - <?php echo $listing->$listing_lease_end; ?> (Months)
                                    <?php } else { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> NO LEASE TERMS ASSIGNED</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>ACCESS</b></td>
                                <td>
                                    <?php if ($listing->$listing_id_access === 1) { ?>
                                      <?php echo accessTableClass::getAccessName($listing->$listing_id_access); ?>-<b>Lockbox Code: </b>  <?php echo $listing->$listing_lockbox_code; ?>
                                      <?php
                                    } else {
                                      echo accessTableClass::getAccessName($listing->$listing_id_access);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>FLOOR</b></td>
                                <td><?php echo $listing->$listing_floor_number; ?></td>
                            </tr>
                            <tr>
                                <td><b>NOTES</b></td>
                                <td>
                                    <?php if (empty($listing->$listing_notes)) { ?>
                                      <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                    <?php } else { ?>
                                      <?php echo $listing->$listing_notes; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Rental Deal Information </td>
                            </tr> 
                        </tbody>
                    </table>

                    <form id="editlisting" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "update", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))); ?>">
                        <p><small>Fields marked with (*) are mandatory.</small></p>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Move In Date</label>
                                <input type="date" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" <?php echo (!empty($listing->$listing_unit_number)) ? 'value="' . $listing->$listing_unit_number . '"' : ''; ?> placeholder="Enter Apt #/Unit #" required>
                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Fee</label>
                                <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" <?php echo (!empty($listing->$listing_rent)) ? 'value="' . $listing->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Notes </label>
                                <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required class="form-control" rows="5" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email To Agents?</label>
                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                    <option value="">Select Option</option>  
                                    <option value="1" <?php echo ($listing->$listing_email_notification_status === 1) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> Yes</option>  
                                    <option value="0" <?php echo ($listing->$listing_email_notification_status === 0) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> No</option>  
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="text-center">

                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> New Rental Deal</button>
                            </div>
                        </div>
                    </form>
                    <div id="view_listing_panel"></div>
                    <script>
                      $(document).ready(function () {

                          $(".btnView_listing").on('click', function () {
                              var listing_hash = $(this).data("hash");
                              var urlajax = url + 'listing/ajax';
                              $.ajax({
                                  async: true,
                                  type: "POST",
                                  dataType: "html",
                                  contentType: "application/x-www-form-urlencoded",
                                  url: urlajax,
                                  data: ('view_listing=' + listing_hash),
                                  success: function (data) {

                                      $("#view_listing_panel").show();
                                      //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                      $("#view_listing_panel").html(data);
                                  }
                              });
                          });
                      });
                    </script>
                </div>
                <?php
              } else {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="glyphicon glyphicon-remove-sign"></i> <strong>Error!</strong> Listing ID # <b><?php echo $listing_listing_id ; ?></b> is <?php if ($listing->$listing_status == "1") { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                    <?php } elseif ($listing->$listing_status == "2") { ?>
                                      <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                    <?php } elseif ($listing->$listing_status == "3") { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                    <?php } else { ?>
                                      <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                    <?php } ?>
                </div>
                <?php
              }
            endforeach;
          } else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="glyphicon glyphicon-remove-sign"></i> <strong>Error!</strong> Please Select a Unit
            </div>
            <?php
          }
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getLandlordByHash($hash) {

    $fields_landlord = array(
        landlordTableClass::ID,
        landlordTableClass::DESCRIPTION_LANDLORD,
        landlordTableClass::LANDLORD_HASH
    );
    $landlord_where = array(
        landlordTableClass::LANDLORD_HASH => $hash
    );
    $objLandlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $landlord_where);
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

  public function getLayout() {

    $fields_layout = array(
        layoutTableClass::ID,
        layoutTableClass::DESCRIPTION_LAYOUT
    );
    $OrderBy_layout = array(
        layoutTableClass::ID
    );
    $objLayout = layoutTableClass::getAll($fields_layout, true, $OrderBy_layout, 'ASC');
    return $objLayout;
  }

  public function getFloorType() {

    $fields_floor_type = array(
        floorTypeTableClass::ID,
        floorTypeTableClass::DESCRIPTION_FLOOR_TYPE
    );
    $OrderBy_floor_type = array(
        floorTypeTableClass::ID
    );
    $objFloorType = floorTypeTableClass::getAll($fields_floor_type, true, $OrderBy_floor_type, 'ASC');
    return $objFloorType;
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

  public static function getBuildingByLandlordId($landlord_id) {

    $fields_building = array(
        buildingTableClass::ID,
        buildingTableClass::ADDRESS,
        buildingTableClass::BUILDING_HASH
    );
    $where_building = array(
        buildingTableClass::ID_LANDLORD => $landlord_id
    );
    $objBuilding = buildingTableClass::getAll($fields_building, true, null, null, null, null, $where_building);
    return $objBuilding;
  }

  public static function getListingSize() {

    $fields_listing_size = array(
        listingSizeTableClass::ID,
        listingSizeTableClass::DESCRIPTION_LISTING_SIZE,
    );
    $OrderBy_listing_size = array(
        listingSizeTableClass::ID
    );
    $objListingSize = listingSizeTableClass::getAll($fields_listing_size, true, $OrderBy_listing_size, 'ASC');
    return $objListingSize;
  }

}
