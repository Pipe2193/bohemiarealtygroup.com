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
            $rental_deals_landlord_field = '<button  class="mdl-button mdl-js-button" type="button"><a href="'. routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH ,true) => $landlord_hash )) .'"><u> ' . landlordTableClass::getLandlordNameById($rental_deals->$rental_deals_landlord_id) . ' </u></a></button>';
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
            
            if(!empty($rental_deals->$rental_deals_notes)){
              $rental_deals_notes_field = $rental_deals->$rental_deals_notes;
            }else{
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


      /**
       * ADD LISTING
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['addListing'])) {
          $landlord_hash = request::getInstance()->getPost("addListing");
          $landlord_id_landlord = landlordTableClass::getIdNewLandlord($landlord_hash);


          /** BUILDING INSTANCES * */
          $id_building = buildingTableClass::ID;
          $building_address = buildingTableClass::ADDRESS;
          /** LISTING SIZE INSTANCES* */
          $listing_size_id = listingSizeTableClass::ID;
          $listing_size_description = listingSizeTableClass::DESCRIPTION_LISTING_SIZE;
          /** ACCESS INSTANCES * */
          $access_id = accessTableClass::ID;
          $access_description = accessTableClass::ACCESS_DESCRIPTION;
          /** FLOOR TYPE INSTANCES * */
          $floor_type_id = floorTypeTableClass::ID;
          $floor_type_description = floorTypeTableClass::DESCRIPTION_FLOOR_TYPE;
          /** LAYOUT INSTANCES * */
          $layout_id = layoutTableClass::ID;
          $layout_description = layoutTableClass::DESCRIPTION_LAYOUT;
          /**  RENTAL AMENITIES INSTANCES* */
          $rental_amenities_id = rentalAmenitiesTableClass::ID;
          $rental_amenities_description = rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES;
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Add Listing<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addlisting" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "create"); ?>">


                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true); ?>"> Landlord</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>" class="form-control" required>
                                  <?php
                                  foreach ($this->getLandlordByHash($landlord_hash) as $landlord):
                                    ?>
                                    <option value="<?php echo $landlord->id_landlord ?>" selected><?php echo $landlord->description_landlord; ?></option>
                                    <?php
                                  endforeach;
                                  ?>
                              </select>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control" required>
                                  <option value="">Select Building</option>    
                                  <?php
                                  foreach ($this->getBuildingByLandlordId($landlord_id_landlord) as $building):
                                    ?>
                                    <option value="<?php echo $building->$id_building ?>" ><?php echo $building->$building_address; ?></option>
                                    <?php
                                  endforeach;
                                  ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true); ?>"> Apt#/Unit #</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>" placeholder="Enter Apt #/Unit #" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Rent</label>
                              <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" placeholder="Enter Rent" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                              <label class="control-label col-md-2 col-sm-2 col-xs-12"> Beds</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                  <option value="">Select Option </option>  
                                  <?php foreach ($this->getListingSize() as $size): ?>
                                    <option value="<?php echo $size->$listing_size_id; ?>"><?php echo $size->$listing_size_description; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>">Baths</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true) ?>" class="form-control" required>
                                  <option value="">Select Option </option>
                                  <option value="1"> 1 </option>
                                  <option value="1.5">1.5</option>
                                  <option value="2">2 </option>
                                  <option value="2.5">2.5 </option>
                                  <option value="3">3 </option>
                                  <option value="3.5">3.5 </option>
                                  <option value="4 Plus">4 Plus </option>
                              </select>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>">OP</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>" class="form-control" required>
                                  <option value="">Select Option</option>  
                                  <option value="None">None</option>
                                  <option value="1/2 Month">1/2 Month</option>  
                                  <option value="1 Month">1 Month</option>  
                                  <option value="75%">75%</option>  
                                  <option value="custom">Custom</option>  
                              </select>
                          </div>
                          <div id="custom_op" class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>">Custom OP</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CUSTOM_FEE_OP_LISTING, true) ?>" placeholder="Enter custom OP" >
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>">Status</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true) ?>" class="form-control" required>
                                  <option value="">Select Status </option>  
                                  <option value="1">Available </option>  
                                  <option value="2">Pending </option>  
                                  <option value="3">Unavailable </option>  
                                  <option value="4">Not Specified </option>  
                              </select>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                              <div class="col-md-5 col-sm-5 col-xs-6 ">
                                  <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>">Lease Term </label>
                                  <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_START, true) ?>" maxlength="4">
                              </div>
                              <div class="col-md-5 col-sm-5 col-xs-6 ">
                                  <label for="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>">(months)</label>
                                  <input type="number" class="form-control " id="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LEASE_TERM_END, true) ?>" maxlength="4">
                              </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>">Access</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>" class="form-control" required>
                                  <option value="">Select Access</option>  
                                  <?php foreach ($this->getAccess() as $access): ?>
                                    <option value="<?php echo $access->$access_id ?>"><?php echo $access->$access_description; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div id="lockbox_code" class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>">Lockbox Code</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>" placeholder="Enter lockbox code" >
                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>"> Floor</label>
                              <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true) ?>" placeholder="Enter Floor" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email To Agents?</label>
                              <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                  <option value="">Select Option</option>  
                                  <option value="1">Yes</option>  
                                  <option value="0">No</option>  
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                              <label for="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>"> Notes</label>
                              <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::NOTES_LISTING, true) ?>" rows="5" placeholder="Take a note ..." ></textarea>
                              <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> listing Description</h3>
                          </div>
                          <div class="panel-body">
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Description </label>
                                      <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required ></textarea>
                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">Listing Features</h3>
                          </div>
                          <div class="panel-body">

                              <div class="row form-group">
                                  <p><small>Fields marked with (*) are mandatory.</small></p>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>">Floor Type</label>
                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>" class="form-control" required>
                                          <option value="">Select Floor Type</option>  
                                          <?php foreach ($this->getFloorType() as $floorType): ?>
                                            <option value="<?php echo $floorType->$floor_type_id ?>"><?php echo $floorType->$floor_type_description; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>">Outdoor Space</label>
                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true); ?>" class="form-control" required>
                                          <option value="">Select Outdoor Space </option>  
                                          <?php foreach ($this->getOutdoorSpace() as $outdoor_space): ?>
                                            <option value="<?php echo $outdoor_space->id_outdoor_space ?>"><?php echo $outdoor_space->description_outdoor_space; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>">Layout</label>
                                      <select id="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>" name="<?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>  
                                          <?php foreach ($this->getLayout() as $layout): ?>
                                            <option value="<?php echo $layout->$layout_id ?>"><?php echo $layout->$layout_description; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> Contact Information (if applicable)</h3>
                          </div>
                          <div class="panel-body">
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>"> First Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>" placeholder="Enter First Name (if applicable)" >
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>"> Middle Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true) ?>" placeholder="Enter Middle Name (if applicable)">
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>">Last Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>" placeholder="Enter Last Name (if applicable)" >
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>"> Phone Number</label>
                                      <input type="text" class="phone form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_PHONE_NUMBER, true) ?>" placeholder="Enter Phone Number (if applicable)" >
                                      <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>"> Email Address</label>
                                      <input type="email" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address (if applicable)">
                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>"> Contact Notes</label>
                                      <textarea class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>" rows="5" placeholder="Take a note (if applicable) ..." ></textarea>
                                      <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                          </div>
                      </div><br>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title">Listing Amenities</h3>
                          </div>
                          <div class="panel-body">

                              <div class=" row form-group">
                                  <?php
                                  $rental_amenities = $this->getRentalAmenities();
                                  if (!empty($rental_amenities)) {
                                    $i = 1;
                                    foreach ($rental_amenities as $amenity):
                                      ?>
                                      <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
                                          <div class="switch-guest-item">
                                              <div class="material-switch">
                                                  <input id="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>"  name="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" value="<?php echo $amenity->$rental_amenities_id; ?>" type="checkbox"/>
                                                  <label for="<?php echo rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                  <span> <b><?php echo $amenity->$rental_amenities_description; ?></b> </span>
                                              </div>
                                          </div>
                                      </div>
                                      <?php
                                      $i++;
                                    endforeach;
                                  }else {
                                    ?>
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <p class="text-center">
                                            <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: there are not listing amenities found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("rentalAmenities", "index") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Listing Amenities</b></a><br>
                                        </p>
                                    </div>
                                    <?php
                                  }
                                  ?>
                              </div>

                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addListing"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Listing</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {

                CKEDITOR.replace('<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>', {
                    customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
                });
                $('#addlisting').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {

          <?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: ' Biuilding is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: ' Landlord is required'
                                }

                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Unit # is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Rent Price is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: ' Bed # is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'bath # is required'
                                }
                            }
                        },

          <?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: ' OP is required'
                                }

                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Status is required'
                                }

                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Access is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo listingTableClass::LOCKBOX_LISTING_LENGTH ?>,
                                    message: 'The lockbox code must be less than <?php echo listingTableClass::getNameField(listingTableClass::LOCKBOX_LISTING_LENGTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::FLOOR_NUMBER_LISTING, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Floor # is required'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'email notification status is required'
                                }
                            }
                        },

          <?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'listing description is required'
                                },
                                stringLength: {
                                    max: <?php echo listingTableClass::DESCRIPTION_LISTING_LENGTH ?>,
                                    message: 'listing description must be less than <?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING_LENGTH, true) ?> characters long'
                                }
                            }
                        },
          <?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::FLOOR_TYPE_ID_FLOOR_TYPE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Floor Type is required'
                                }
                            }
                        },
          <?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::OUTDOOR_SPACE_ID_OUTDOOR_SPACE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Outdoor Space is required'
                                }
                            }
                        },
          <?php echo listingFeaturesTableClass::getNameField(listingFeaturesTableClass::LAYOUT_ID_LAYOUT, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'Layout is required'
                                }
                            }
                        },

          <?php echo listingTableClass::getNameField(listingTableClass::CONTACT_FIRST_NAME, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo listingTableClass::CONTACT_FIRST_NAME_LENGTH; ?>,
                                    message: 'First name must be less than <?php echo listingTableClass::CONTACT_FIRST_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::CONTACT_MIDDLE_NAME, true); ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo listingTableClass::CONTACT_MIDDLE_NAME_LENGTH; ?>,
                                    message: ' Middle name must be less than <?php echo listingTableClass::CONTACT_MIDDLE_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::CONTACT_LAST_NAME, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo listingTableClass::CONTACT_LAST_NAME_LENGTH; ?>,
                                    message: 'Last name must be less than <?php echo listingTableClass::CONTACT_LAST_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },

          <?php echo listingTableClass::getNameField(listingTableClass::CONTACT_EMAIL_ADDRESS, true); ?>: {
                            validators: {
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                },
                                stringLength: {
                                    max: <?php echo listingTableClass::CONTACT_EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'Email address must be less than <?php echo listingTableClass::CONTACT_EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo listingTableClass::getNameField(listingTableClass::CONTACT_NOTES, true) ?>: {
                            validators: {
                                stringLength: {
                                    max: <?php echo listingTableClass::CONTACT_NOTES_LENGTH; ?>,
                                    message: 'Contact notes must be less than <?php echo listingTableClass::CONTACT_NOTES_LENGTH; ?> characters long'
                                }
                            }
                        }
                    }

                }).find('.phone').mask('(999)-999-9999').find('.zipcode_mask').mask('99999').find('.addon_zipcode_mask').mask('9999');

                $("#custom_op").hide();

                var op = $("#<?php echo listingTableClass::getNameField(listingTableClass::FEE_OP_LISTING, true) ?>");
                op.change(function () {
                    var id_op = op.val();
                    if (id_op == 'custom') {
                        $("#custom_op").show();
                    } else {
                        $("#custom_op").hide();
                    }
                });

                $("#lockbox_code").hide();

                var access = $("#<?php echo listingTableClass::getNameField(listingTableClass::ACCESS_ID_ACCESS, true) ?>");
                access.change(function () {
                    var id_access = access.val();
                    if (id_access == 1) {
                        $("#lockbox_code").show();
                    } else {
                        $("#lockbox_code").hide();
                    }
                });

                //button close adduser user function
                var btnClose_addListing = $(".btnClose_addListing");
                $(btnClose_addListing).on('click', function () {
                    $("#addApartment_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#addApartment_panel').offset().top}, 'slow');
                });
            });

          </script>

          <?php
        }
      }

      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['landlord_id_selected'])) {
          $building_id_landlord = request::getInstance()->getPost("landlord_id_selected");


          /** BUILDING INFO* */
          $building_fields = array(
              buildingTableClass::ID,
              buildingTableClass::ADDRESS,
              buildingTableClass::ID_LANDLORD,
          );
          $where_buildings = array(
              buildingTableClass::ID_LANDLORD => $building_id_landlord
          );
          $objBuildings = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

          $building_id = buildingTableClass::ID;
          $building_address = buildingTableClass::ADDRESS;
          ?>
          <?php if (!empty($objBuildings)) { ?>
            <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
            <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control" required>
                <option value="">Select Building</option>    
                <?php
                foreach ($objBuildings as $building):
                  ?>
                  <option value="<?php echo $building->$building_id ?>" ><?php echo $building->$building_address; ?></option>
                <?php endforeach; ?>
            </select>
          <?php }else { ?>
            <div class="alert alert-info alert-dismissible" role = "alert">
                <p class = "text-center">
                    <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Buildings found. </b><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($building_id_landlord))); ?>" class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> Add Building</b></a><br>
                </p>
            </div>
          <?php } ?>
          <?php
        }
      }

      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['landlord_id_selected_filter'])) {
          $landlord_hash = request::getInstance()->getPost("landlord_id_selected_filter");
          $landlord_id = landlordTableClass::getIdNewLandlord($landlord_hash);

          /** BUILDING INFO* */
          $building_fields = array(
              buildingTableClass::ID,
              buildingTableClass::ADDRESS,
              buildingTableClass::ID_LANDLORD,
              buildingTableClass::BUILDING_HASH
          );
          $where_buildings = array(
              buildingTableClass::ID_LANDLORD => $landlord_id
          );
          $objBuildings = buildingTableClass::getAll($building_fields, true, null, null, null, null, $where_buildings);

          $building_id = buildingTableClass::ID;
          $building_hash = buildingTableClass::BUILDING_HASH;
          $building_address = buildingTableClass::ADDRESS;
//   if (!empty($objBuildings)) {
          $i = 0;
          foreach ($objBuildings as $building):

            $subdata = array();
            $subdata[][] = $building->$building_hash;
            $subdata[][] = strtoupper($building->$building_address);
            $data[] = $subdata;

            $i++;
          endforeach;

          echo json_encode($data);
        }
      }

      /**
       * assign listing parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["assign_listing_hash"])) {
          $listing_hash = request::getInstance()->getPost("assign_listing_hash");

          $listing_id = listingTableClass::getIdNewListing($listing_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#assign_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="assign_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Assign Listing  <b>ID #<?php echo $listing_id; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #009933"><i class="fa fa-check-circle-o fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Assign to Listing</br> <h3><b>  ID #<?php echo $listing_id; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('listing', 'assign', array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Assign </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * unassign listing parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["listing_assigned_hash"])) {
          $listing_assigned_hash = request::getInstance()->getPost("listing_assigned_hash");

          $listing_id = listingAssignmentTableClass::getIdListingAssigned($listing_assigned_hash);
          $listing_hash = listingTableClass::getListingHashById($listing_id);
          ?>
          <script>
            $(document).ready(function () {
                $('#unassign_listing').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="unassign_listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Unassign Listing  <b>ID #<?php echo $listing_id; ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #ff0000"><i class="fa fa-times-circle-o fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Unassign  from Listing</br> <h3><b>  ID #<?php echo $listing_id; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('listing', 'unassign', array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Unassign </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
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
