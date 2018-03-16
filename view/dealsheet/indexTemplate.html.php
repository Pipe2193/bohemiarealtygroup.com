<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
$listing_status = listingTableClass::STATUS;
$listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
$listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
$listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
$listing_listing_hash = listingTableClass::LISTING_HASH;
$listing_created_at = listingTableClass::CREATED_AT;
$listing_updated_at = listingTableClass::UPDATED_AT;
/** BUILDING INSTANCES * */
$building_id_super = buildingTableClass::ID_SUPER;
/** LANDLORD INSTANCES * */
$landlordID = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
$landlord_hash = landlordTableClass::LANDLORD_HASH;
/** LISTING SIZE INSTANCES* */
$listing_size_id = listingSizeTableClass::ID;
$listing_size_description = listingSizeTableClass::DESCRIPTION_LISTING_SIZE;
/** USUARIO INSTANCES * */
$user_id = usuarioTableClass::ID;
/** TEAM  INSTANCES * */
$team_id = teamTableClass::ID;
$team_name = teamTableClass::TEAM_NAME;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">

                            <div class=" hidden-xs x_title">
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Dealsheets </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Dealsheets</h4>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#rental_deals_panel"> <i class="fa fa-building-o" aria-hidden="true"></i> <b>RENTALS DEALS</b></a></li>
                                    <li><a data-toggle="tab" href="#sales_deals_panel"> <b>SALES DEALS</b></a></li>

                                </ul>

                                <div class="tab-content">
                                    <div id="rental_deals_panel" class="tab-pane fade in active">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class=" pull-right">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("deal", "add"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Rental Deal</b></a>
                                                </div></br>
                                            </div>
                                        </div>

                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <form action="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>" method="GET" >
                                                    <div class="form-row">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label class="control-label col-md-2 col-sm-2 col-xs-12"> Beds</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                                                    <option value="">Select Option </option>  
                                                                    <?php foreach ($objListingSize as $size): ?>
                                                                      <option value="<?php echo $size->$listing_size_id; ?>"><?php echo $size->$listing_size_description; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label class="control-label col-md-2 col-sm-2 col-xs-12"> To</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE, true) ?>" class="form-control" required>
                                                                    <option value="">Select Option </option>  
                                                                    <?php foreach ($objListingSize as $size): ?>
                                                                      <option value="<?php echo $size->$listing_size_id; ?>"><?php echo $size->$listing_size_description; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-md-4 col-sm-6 col-xs-12  form-group">
                                                                <label class=""for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>"> Status</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>"  class="form-control">
                                                                    <option value="">Select Option</option>
                                                                    <option value="All" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "All") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "All") ? 'SELECTED: ' : ''; ?> Select All</option>
                                                                    <option value="1" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 1) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 1) ? 'SELECTED: ' : ''; ?> Closed</option>
                                                                    <option value="2" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 2) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 2) ? 'SELECTED: ' : ''; ?> Pending</option>  
                                                                    <option value="3" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'SELECTED: ' : ''; ?> Archived</option>
                                                                    <option value="3" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'SELECTED: ' : ''; ?> Landlord Rented</option>
                                                                    <option value="4" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 4) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 4) ? 'SELECTED: ' : ''; ?> Not Specified</option> 
                                                                </select>

                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-xs-12  form-group">
                                                                <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>"> Landlord</label>
                                                                <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" class="form-control">
                                                                    <!--                                                                onchange="location = this.options[this.selectedIndex].value;" -->
                                                                    <option value="">Select Landlord</option>
                                                                    <option value="<?php echo routing::getInstance()->getUrlWeb("listing", "search"); ?>"> All</option>
                                                                    <?php foreach ($objLandlords as $landlords) : ?>
                                                                      <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) == $landlords->$landlord_hash) { ?>
                                                                        <option value="<?php echo \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)); ?>" selected>  SELECTED: <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                                      <?php } else { ?>
                                                                        <option value="<?php echo $landlords->$landlord_hash; ?>"> <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                                      <?php } ?>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="building_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                        <option value="">Select Landlord First</option>    
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="apartment_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Apartment</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                        <option value="">Select Building First</option>    
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Neighborhood</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control selectpicker">
                                                                    <option value="">Select Option </option>  
                                                                    <?php
                                                                    $flag = false;
                                                                    foreach ($objNeighborhood as $neighborhood):
                                                                      ?>
                                                                      <option value="<?php echo $neighborhood->id_neighborhood ?>" ><?php echo boroughTableClass::getBoroughName($neighborhood->borough_id_borough) . '-' . $neighborhood->description_neighborhood; ?></option>

                                                                      <?php
                                                                    endforeach;
                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Source</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                    <option value=""> Select Option</option>
                                                                    <option value="Bohemia Site">Bohemia Site</option>
                                                                    <option value="Repeat Client">Repeat Client</option>
                                                                    <option value="Streeteasy">Streeteasy</option>
                                                                    <option value="Naked Apartments">Naked Apartments</option>
                                                                    <option value="Craigslist">Craigslist</option>
                                                                    <option value="Facebook">Facebook</option>
                                                                    <option value="Hot Pads">Hot Pads</option>
                                                                    <option value="Trulia">Trulia</option>
                                                                    <option value="OCHA">OCHA</option>
                                                                    <option value="Sign">Sign</option>
                                                                    <option value="digital ad">Digital Ad</option>
                                                                    <option value="Co-Broke">Co-Broke</option>
                                                                    <option value="Rent Hop">Rent Hop</option>
                                                                    <option value="Referred by">Referred by</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> Teams</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control">
                                                                    <option value="">Select Option </option>  
                                                                    <?php
                                                                    foreach ($objTeams as $team):
                                                                      ?>
                                                                      <option value="<?php echo $team->$team_id ?>" ><?php echo $team->$team_name; ?></option>

                                                                      <?php
                                                                    endforeach;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> Member</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" class="form-control">
                                                                    <option value="">Select Option </option>  
                                                                    <?php
                                                                    foreach ($objUsers as $agents):
                                                                      ?>
                                                                      <option value="<?php echo $agents->$user_id ?>" ><?php echo profileTableClass::getProfileByUserId($agents->$user_id); ?></option>

                                                                      <?php
                                                                    endforeach;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> ID</label>
                                                                <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" <?php echo (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) ? 'value="' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true)) . '"' : ''; ?> placeholder="Listing ID" >
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> Period</label>
                                                                <input type="text" class="form-control has-feedback-right" id="period" name="period" >
                                                                <span class="fa fa-calendar-times-o form-control-feedback right" aria-hidden="true"></span>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="text-center">
                                                                <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                                                <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit"> SEARCH <i class="fab fa-searchengin"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <?php if (empty($objRentalDeals)) { ?>

                                          <div class = "alert alert-info alert-dismissible" role = "alert">
                                              <p class = "text-center">
                                                  <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Rental Deals found. </b><a href="<?php echo routing::getInstance()->getUrlWeb("deal", "index") ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark btnAdd_listing" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b>New Rental Deal</b></a><br>
                                              </p>
                                          </div>
                                          <?php
                                        }
                                        ?>
                                        <table id="rental_deals_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
    <!--                                                    <th class="filter">ID</th>
                                                    <th>Listing ID</th>-->
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th class="filter">Rent</th>
                                                    <th class="filter"># Beds</th>
                                                    <th class="filter"># Baths</th>
                                                    <th class="filter">Fee</th>
                                                    <th class="filter" > Landlord </th>
                                                    <th >Move-In Date</th>
                                                    <th >Agent</th>
                                                    <th >Date Rented</th>
                                                    <th >Date Closed</th>
                                                    <th class="filter">Status</th>
                                                    <th>Notes</th>
                                                    <th class="filter">Neighborhood</th>
    <!--                                                    <th>Listing Manager</th>-->
                                                    <th>Source</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <!--                                                    <th class="filter">ID</th>
                                                    <th>Listing ID</th>-->
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th class="filter">Rent</th>
                                                    <th class="filter"># Beds</th>
                                                    <th class="filter"># Baths</th>
                                                    <th class="filter">Fee</th>
                                                    <th class="filter" > Landlord </th>
                                                    <th >Move-In Date</th>
                                                    <th >Agent</th>
                                                    <th >Date Rented</th>
                                                    <th >Date Closed</th>
                                                    <th class="filter">Status</th>
                                                    <th>Notes</th>
                                                    <th class="filter">Neighborhood</th>
    <!--                                                    <th>Listing Manager</th>-->
                                                    <th>Source</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <div id="sales_deals_panel" class="tab-pane fade">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class=" pull-right">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Sales Deal</b></button>
                                                </div></br>
                                            </div>
                                        </div>

                                        <table id="sales_deals" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="filter">Listing ID</th>
                                                    <th class="filter">Availability</th>
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th class="filter">Neighborhood</th>
                                                    <th class="filter">Price</th>
                                                    <th class="filter"># Beds</th>
                                                    <th class="filter"># Baths</th>
                                                    <th class="filter">Status</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Listing ID</th>
                                                    <th>Availability</th>
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th>Neighborhood</th>
                                                    <th>Price</th>
                                                    <th># Beds</th>
                                                    <th># Baths</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>

                                <div id="listing_notes_info_panel"></div>
                            </div>
                        </div>
                        <script>
                          $('#period').daterangepicker({
                              "autoUpdateInput": false,
                              "alwaysShowCalendars": true,
                              "startDate": "02/03/2018",
                              "endDate": "02/03/2018",
                              "buttonClasses": "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect",
                              "applyClass": " mdl-button--primary"
                          }, function (start, end, label) {
                              $('#period').val(start.format('YYYY-MM-DD') + ' – ' + end.format('YYYY-MM-DD'));
                          });


                        </script>
                        <script>
                          $(document).ready(function () {


                              //    RENTAL DEALS SEARCH TABLE SETTINGS
                              $('#rental_deals_table').DataTable({

                                  responsive: {
                                      details: {
                                          renderer: function (api, rowIdx) {
                                              var data = api.cells(rowIdx, ':hidden').eq(0).map(function (cell) {
                                                  var header = $(api.column(cell.column).header());
                                                  return  '<p>' + header.text() + ' : ' + api.cell(cell).data() + '</p>'; // changing details mark up.
                                              }).toArray().join('');
                                              return data ? $('<table/>').append(data) : false;
                                          }
                                      }
                                  },
                                  "bProcessing": true,
                                  "bServerSide": true,
                                  "order": [0, 'desc'],
                                  "sAjaxSource": "ajax?rental_deals_data",
                                  "sAjaxDataProp": "data",
                                  "deferRender": true,
                                  "searching": false
                              });

                              $rental_table = $('table#rental_deals').DataTable();


                              $rental_table.on('click', 'button.btnListing_Notes_info', function () {
                                  var listing_hash = $(this).data("hash");
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('notes_listing_hash=' + listing_hash),
                                      success: function (data) {

                                          $("#listing_notes_info_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#listing_notes_info_panel").html(data);
                                      }
                                  });
                              });

                              var landlord_select = $("#<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>");
                              landlord_select.change(function () {
                                  var idLandlord = landlord_select.val();
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "json",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('landlord_id_selected_filter=' + idLandlord),
                                      success: function (data) {
                                          // the next thing you want to do 
                                          var $building = $('#<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true); ?>');
                                          $building.empty();
                                          $building.append('<option value=""> All </option>');
                                          for (var i = 0; i <= data.length; i++) {

                                              $building.append('<option value=' + data[i][0] + '>' + data[i][1] + '</option>');
                                          }
                                      }
                                  });
                              });
                              var building = $('#<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true); ?>');
                              $('#<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?> option').each(function () {
                                  if ($(this).is(':selected')) {
                                      var id = $(this).val();
                                      var building_hash = "<?php echo mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)) ?>";
                                      var urlajax = url + 'listing/ajax';
                                      var select;
                                      var active;
                                      $.ajax({
                                          async: true,
                                          type: "POST",
                                          dataType: "json",
                                          contentType: "application/x-www-form-urlencoded",
                                          url: urlajax,
                                          data: ('landlord_id_selected_filter=' + id),
                                          success: function (data) {
                                              // the next thing you want to do 
                                              if (data != null) {
                                                  building.empty();
                                                  building.append('<option value=""> All </option>');
                                                  for (var i = 0; i <= data.length; i++) {

                                                      if (building_hash == data[i][0]) {
                                                          select = 'selected';
                                                          active = 'SELECTED: ';
                                                      } else {
                                                          select = '';
                                                          active = '';
                                                      }
                                                      building.append('<option value=' + data[i][0] + ' ' + select + ' > ' + active + data[i][1] + '</option>');
                                                  }
                                              }
                                          }
                                      });
                                  }
                              });
                              $('#sales_deals').DataTable({
                                  responsive: true,
                                  "pageLength": 50

                              });
                              $sales_table = $('table#sales_deals').DataTable();

                          });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>