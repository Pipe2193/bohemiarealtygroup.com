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
$listing_sync_id = listingTableClass::SYNC_ID_SYNC;
/** BUILDING INSTANCES * */
$building_id_super = buildingTableClass::ID_SUPER;
/** LISTING ASSIGNMENT INSTANCES * */
$listing_id_listing = listingAssignmentTableClass::LISTING_ID_LISTING;
$listing_usuario_id = listingAssignmentTableClass::USUARIO_ID;
$listing_assignment_hash = listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> My Listings </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> My Listings</h4>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#rentals_listings"> <i class="fa fa-building-o" aria-hidden="true"></i> <b>Rentals Listings</b></a></li>
                                    <li><a data-toggle="tab" href="#sales_listings"><b>Sales Listings</b></a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="rentals_listings" class="tab-pane fade in active">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="btn-group  btn-group-sm pull-left">

                                                </div>
                                            </div>
                                        </div>
                                        <?php if (empty($objListingAssignments)) { ?>

                                              <div class = "alert alert-info alert-dismissible" role = "alert">
                                                  <p class = "text-center">
                                                      <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Rental Listings assigned to your account. </b><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>"  class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> Assign</b></a><br>
                                                  </p>
                                              </div>
                                              <?php
                                            } 
                                            ?>
                                        <table id="my_listings" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th class="filter">Neighborhood</th>
                                                    <th class="filter">Address</th>
                                                    <th class="filter">Unit #</th>
                                                    <th class="filter">Rent</th>
                                                    <th class="filter"># Beds</th>
                                                    <th class="filter"># Baths</th>
                                                    <th class="">LL</th>
                                                    <th>Listing Manager</th>
                                                    <th class="filter">Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Neighborhood</th>
                                                    <th>Address</th>
                                                    <th>Unit #</th>
                                                    <th>Rent</th>
                                                    <th># Beds</th>
                                                    <th># Baths</th>
                                                    <th>LL</th>
                                                    <th>Listing Manager</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div id="sales_listings" class="tab-pane fade">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="btn-group  btn-group-sm pull-left">

                                                </div>
                                            </div>
                                        </div>

                                        <table id="my_sales_listings" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Listing ID</th>
                                                    <th >Address</th>
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
                                            </thead>
                                            <tbody>
                                                <?php if (empty($objListingsSales)) { ?>

                                              <div class = "alert alert-info alert-dismissible" role = "alert">
                                                  <p class = "text-center">
                                                      <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Sales Listings assigned to your account. </b><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>"  class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> Assign</b></a><br>
                                                  </p>
                                              </div>
                                              <?php
                                            } else {
                                              ?>
                                              <?php
                                              foreach ($objListingsSales as $listing):
                                                ?>
                                                <tr> 
                                                    <td><button  class="mdl-button mdl-js-button" type="button"><?php echo $listing->$listing_id; ?></button></td>
                                                    <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($listing->$listing_building_id)); ?></button></td>
                                                    <td> <?php ?></td>
                                                    <td><button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)); ?></button></td>
                                                    <td><button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo $listing->$listing_unit_number; ?></button></td> 
                                                    <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $listing->$listing_rent; ?> USD </button></td>
                                                    <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($listing->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                                                    <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $listing->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <?php if ($listing->$listing_id_access === 1) { ?>
                                                          <?php echo accessTableClass::getAccessName($listing->$listing_id_access); ?>-<b>Lockbox Code: </b>  <?php echo $listing->$listing_lockbox_code; ?>
                                                          <?php
                                                        } else {
                                                          echo accessTableClass::getAccessName($listing->$listing_id_access);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td> <?php echo superTableClass::getSuperName(buildingTableClass::getBuildingIdSuper($listing->$listing_building_id)); ?> <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnSuper_info" type="button"> Show Info</button></td>
                                                    <td><?php echo landlordTableClass::getLandlordNameById($listing->$listing_landlord_id); ?></td>
                                                    <td>

                                                        <?php if ($listing->$listing_status == "1") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--primary" type="button">ACTIVE</button>
                                                        <?php } elseif ($listing->$listing_status == "2") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING</button>
                                                        <?php } elseif ($listing->$listing_status == "3") { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE</button>
                                                        <?php } else { ?>
                                                          <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td> <button  class="mdl-button mdl-js-button" type="button"><?php echo $listing->$listing_created_at; ?></button></td>
                                                    <td> 
                                                        <?php if (!empty($listing->$listing_updated_at)) { ?>
                                                          <button  class="mdl-button mdl-js-button" type="button"><?php echo $listing->$listing_updated_at; ?></button>
                                                        <?php } else { ?>
                                                          <button  class="mdl-button mdl-js-button" type="button">No Updates</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>

                                                        <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $listing->$listing_listing_hash)) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                        <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button" data-toggle="tooltip" data-placement="top" title="delete Listing <?php echo buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id)); ?> , <?php echo $listing->$listing_unit_number; ?>"><i class="fa fa" aria-hidden="true"></i> ASSIGN</button>

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
                                <div id="unassign_listing_panel"></div>
                                <div id="view_listing_panel"></div>
                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {
//    MY LISTING  TABLE SETTINGS
                              $('#my_listings').DataTable({
                                  responsive: true,
                                  "pageLength": 50,
                                  "deferRender": true,
                                  "ajax": {
                                      url: "ajax?account",
                                      type: "GET"

                                  },
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

                              $rental_table = $('table#my_listings').DataTable();



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

                              $('#my_sales_listings').DataTable({
                                  responsive: true,
                                  "pageLength": 25

                              });

                              $sales_table = $('table#my_sales_listings').DataTable();

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