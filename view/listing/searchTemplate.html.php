<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
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

/* * SALES LISTING INSTANCES * */
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Listings </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage Listings</h4>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#rental_listings"> <i class="fa fa-building-o" aria-hidden="true"></i> <b>RENTALS</b></a></li>
                                    <li><a data-toggle="tab" href="#sales_listings"><b>SALES</b></a></li>
                                    <li><a target="_blank" href="https://broker.olr.com/Login.aspx"><i class="fa fa-external-link" aria-hidden="true"></i> <b>OLR</b></a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="rental_listings" class="tab-pane fade in active">
                                        </br>

                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <form action="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>" method="GET" >
                                                    <div class="form-row">
                                                        <div class="row ">
                                                            <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                                                                <label class=""for="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>"> Status</label>
                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::STATUS, true); ?>"  class="form-control">
                                                                    <option value="">Select Option</option>
                                                                    <option value="All" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "All") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == "All") ? 'SELECTED: ' : ''; ?> Select All</option>
                                                                    <option value="1" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 1) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 1) ? 'SELECTED: ' : ''; ?> Available</option>
                                                                    <option value="2" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 2) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 2) ? 'SELECTED: ' : ''; ?> Pending</option>  
                                                                    <option value="3" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 3) ? 'SELECTED: ' : ''; ?> Unavailable</option>
                                                                    <option value="4" <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 4) ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true)) == 4) ? 'SELECTED: ' : ''; ?> Not Specified</option> 
                                                                </select>

                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12  form-group">
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
                                                        </div>
                                                        <div class="row">
                                                            <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="building_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                        <option value="">Select Landlord First</option>    
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="building_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> ID</label>
                                                                    <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" <?php echo (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) ? 'value="' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true)) . '"' : ''; ?> placeholder="Listing ID" >
                                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                                </div>
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
                                        <div class="alert alertbrg alert-dismissible" role="alert">
                                            <p>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Listings with Label color <span class="label label-info">N</span>   are syncing from Nestio.<br>
                                            </p>
                                            <p>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Listings with Label color <span class="label" style="background-color: #ffd6d5;"> OLA </span>   are Open with Listing Agent.<br>
                                            </p>
                                        </div>
                                        <?php if (empty($objListings)) { ?>

                                          <div class = "alert alert-info alert-dismissible" role = "alert">
                                              <p class = "text-center">
                                                  <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Rental Listing found. </b><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "index") ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_listing" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b>New Listing</b></a><br>
                                              </p>
                                          </div>
                                          <?php
                                        }
                                        ?>
                                        <table id="search_listings" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="filter">ID</th>
                                                    <th class="filter">Neighborhood</th>
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th class="filter">Rent</th>
                                                    <th>Notes</th>
                                                    <th class="filter"># Beds</th>
                                                    <th class="filter"># Baths</th>
                                                    <th class="filter">Access</th>
                                                    <th>Super</th>
                                                    <th class="filter" >LL</th>
                                                    <th class="filter">Status</th>
                                                    <th class="filter">Availability</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Neighborhood</th>
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th>Rent</th>
                                                    <th>Notes</th>
                                                    <th># Beds</th>   
                                                    <th># Baths</th>
                                                    <th>Access</th>
                                                    <th>Super</th>
                                                    <th>LL</th>
                                                    <th>Status</th>
                                                    <th>Availability</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <div id="sales_listings" class="tab-pane fade">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">

                                                <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <div id="building_field">
                                                        <label for="<?php echo salesListingTableClass::getNameField(salesListingTableClass::ID, true) ?>"> ID</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo salesListingTableClass::getNameField(salesListingTableClass::ID, true) ?>" name="<?php echo salesListingTableClass::getNameField(salesListingTableClass::ID, true) ?>" placeholder="Sales Listing ID" >
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="alert alertbrg alert-dismissible" role="alert">
                                            <p>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Listings with Label color <span class="label label-bohemia">OLR</span>   are syncing from OLR.<br>
                                            </p>

                                        </div>
                                        <table id="search_sales_listings" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="filter">Listing ID</th>
                                                    <th class="filter">Address</th>
                                                    <th class="filter">Unit #</th>
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
                                            <tbody>
                                                <?php if (empty($objSalesListings)) { ?>

                                              <div class = "alert alert-info alert-dismissible" role = "alert">
                                                  <p class = "text-center">
                                                      <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Sales Listing found. </b><br>
                                                  </p>
                                              </div>
                                              <?php
                                            } else {
                                              ?>
                                              <?php
                                              foreach ($objSalesListings as $sales_listing):
                                                ?>
                                                <tr> 
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button" type="button"><?php echo $sales_listing->$sales_listing_id; ?></button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo salesBuildingTableClass::getSalesBuildingAddressById($sales_listing->$sales_listing_building_id); ?></button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo $sales_listing->$sales_listing_apt_number; ?></button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo salesBuildingTableClass::getSalesBuildingNeighborhood($sales_listing->$sales_listing_building_id); ?></button>
                                                    </td> 
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$ <?php echo $sales_listing->$sales_listing_price; ?> USD </button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_listing->$sales_listing_bedrooms ?></button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_listing->$sales_listing_baths; ?> </button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_listing->$sales_listing_availability_status; ?> </button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo $sales_listing->$sales_listing_date_listed; ?></button>
                                                    </td>
                                                    <td>
                                                        <button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo $sales_listing->$sales_listing_date_modified; ?></button>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo routing::getInstance()->getUrlWeb("sales_listing", "manage", array(salesListingTableClass::getNameField(salesListingTableClass::SALES_LISTING_HASH, true) => $sales_listing->$sales_listing_hash)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                    </td>


                                                </tr>
                                                <?php
                                              endforeach;
                                              ?>
                                            <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Listing ID</th>
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

                                <div id="super_info_panel"></div>
                                <div id="listing_notes_info_panel"></div>
                                <div id="assign_listing_panel"></div>
                                <div id="unassign_listing_panel"></div>
                                <div id="listing_unavailable_panel"></div>
                                <div id="view_listing_panel"></div>
                            </div>
                        </div>

                        <script>
                          $(document).ready(function () {
                              //$("#menu_toggle").trigger('click');
//    LISTING SEARCH TABLE SETTINGS
                              $('#search_listings').DataTable({
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
                                  "order": [12, 'desc'],
//                                  "sPaginationType": "full_numbers",
                                  "sAjaxSource": "ajax?listings_search<?php
                                            if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {
                                              echo '&' . listingTableClass::getNameField(listingTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
                                            }if (\mvc\request\requestClass::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {
                                              echo '&' . landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));
                                            } if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true))) {
                                              echo '&' . listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true));
                                            } if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) {
                                              echo '&' . listingTableClass::getNameField(listingTableClass::ID, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true));
                                            }
                                            ?>",
                                  "sAjaxDataProp": "data",
                                  "deferRender": true,
                                  "searching": false
                              });

                              $rental_table = $('table#search_listings').DataTable();
                             

                              $rental_table.on('click', 'button.btnSuper_info', function () {
                                  var super_hash = $(this).data("hash");
                                  var urlajax = url + 'super/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('super_hash=' + super_hash),
                                      success: function (data) {

                                          $("#super_info_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#super_info_panel").html(data);
                                      }
                                  });
                              });
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
                              $rental_table.on('click', 'button.btnAssign_listing', function () {
                                  var listing_hash = $(this).data("hash");
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('assign_listing_hash=' + listing_hash),
                                      success: function (data) {

                                          $("#assign_listing_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#assign_listing_panel").html(data);
                                      }
                                  });
                              });
                              $rental_table.on('click', 'button.btnUnassign_listing', function () {
                                  var listing_Assigned_hash = $(this).data("hash");
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('listing_assigned_hash=' + listing_Assigned_hash),
                                      success: function (data) {

                                          $("#unassign_listing_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#unassign_listing_panel").html(data);
                                      }
                                  });
                              });

                              $rental_table.on('click', 'button.btn_unavailable_listing', function () {
                                  var listing_hash = $(this).data("hash");
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('unavailable_listing_hash=' + listing_hash),
                                      success: function (data) {

                                          $("#listing_unavailable_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#listing_unavailable_panel").html(data);
                                      }
                                  });
                              });
                              
                              $rental_table.on('click', 'button.btnView_listing', function () {
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

                              $('#search_sales_listings').DataTable({
                                  responsive: true,
                                  "deferRender": true,
                                  "order": [0, 'desc'],
                                  initComplete: function () {
                                      this.api().columns(".filter").every(function () {
                                          var column = this;
                                          var select = $('<select><option value=""> Filter Option </option></select>')
                                                  .appendTo($(column.header()).empty())
                                                  .on('change', function () {
                                                      var val = $.fn.dataTable.util.escapeRegex(
                                                              $(this).val()
                                                              );

                                                      column
                                                              .search(val ? '^' + val + '$' : '', true, false)
                                                              .draw();
                                                  });

                                          column.data().unique().sort().each(function (d, j) {
                                              var String = d.substring(d.indexOf('">') + 2, d.lastIndexOf('</'));
                                              select.append('<option value="' + String + '"> ' + String + ' </option>');
                                          });
                                      });
                                  }

                              });

                              $sales_table = $('table#search_sales_listings').DataTable();

                              $('#<?php echo salesListingTableClass::getNameField(salesListingTableClass::ID, true) ?>').on('keyup change', function () {
                                  //if ($sales_table.column(1).search() !== this.value) {
                                  console.log(this.value);
                                      $sales_table.column(0).search(this.value).draw();
                                  //}
//                                  $sales_table.column(1).search($(this).text()).draw();

                              });


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