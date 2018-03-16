<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** SALES BUILDINGS INSTANCES* */
$sale_building_id = salesBuildingTableClass::ID;
$sale_building_address = salesBuildingTableClass::ADDRESS;
$sale_building_name = salesBuildingTableClass::NAME;
$sale_building_cross_street1 = salesBuildingTableClass::CROSS_STREET1;
$sale_building_cross_street2 = salesBuildingTableClass::CROSS_STREET2;
$sale_building_city = salesBuildingTableClass::CITY;
$sale_building_state = salesBuildingTableClass::STATE;
$sale_building_year_built = salesBuildingTableClass::YEAR_BUILT;
$sale_building_floor_count = salesBuildingTableClass::FLOOR_COUNT;
$sale_building_apartment_count = salesBuildingTableClass::APARTMENT_COUNT;
$sale_building_zipcode = salesBuildingTableClass::ZIPCODE;
$sale_building_negiborhood_name = salesBuildingTableClass::NEIGHBORHOOD_NAME;
$sale_building_policy = salesBuildingTableClass::BUILDING_POLICY;
$sale_building_pets_policy_desc = salesBuildingTableClass::PET_POLICY_DESC;
$sale_building_dated_modified = salesBuildingTableClass::DATE_MODIFIED;
$sale_building_created_at = salesBuildingTableClass::CREATED_AT;
$sale_building_updated_at = salesBuildingTableClass::UPDATED_AT;
$sale_building_hash = salesBuildingTableClass::SALES_BUILDING_HASH;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
$listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
$listing_status = listingTableClass::STATUS;
$listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
$listing_listing_hash = listingTableClass::LISTING_HASH;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Sale Building (<?php echo strtoupper(salesBuildingTableClass::getSalesBuildingAddressByHash(mvc\request\requestClass::getInstance()->getGet(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true)))); ?>)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage Sale Building </br>(<?php echo strtoupper(salesBuildingTableClass::getSalesBuildingAddressByHash(mvc\request\requestClass::getInstance()->getGet(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true)))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alertbrg alert-dismissible" role="alert">
                                    <p>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Click on each panel to display more information.<br>
                                    </p>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    <b> Basic Info</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                                foreach ($objSalesBuilding as $sales_building):
                                                  ?>
                                                  <br>
                                                  <table id="sales_building" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Building Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING NAME</b></td>
                                                              <td><?php
                                                                  if (empty($sales_building->$sale_building_name)) {
                                                                    ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  NO NAME SET</button>
                                                                    <?php
                                                                  } else {
                                                                    ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"> <?php echo strtoupper($sales_building->$sale_building_name); ?></button>
                                                                    <?php
                                                                  }
                                                                  ?></td>
                                                          </tr>

                                                          <tr>
                                                              <td><b>ADDRESS</b></td> 
                                                              <td><?php echo $sales_building->$sale_building_address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CROSS ADDRESS 1</b></td> 
                                                              <td><?php echo $sales_building->$sale_building_cross_street1; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CROSS ADDRESS 2</b></td> 
                                                              <td><?php echo $sales_building->$sale_building_cross_street2; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CITY</b></td>
                                                              <td><?php echo $sales_building->$sale_building_city; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>STATE</b></td>
                                                              <td><?php echo $sales_building->$sale_building_state; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ZIPCODE (5 digits)</b></td>
                                                              <td><?php echo $sales_building->$sale_building_zipcode; ?></td>
                                                          </tr>

                                                          <tr>
                                                              <td><b>NEIGHBORHHOOD</b></td>
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_building->$sale_building_negiborhood_name; ?></button>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILT IN</b></td>
                                                              <td>
                                                                  <?php
                                                                  echo $sales_building->$sale_building_year_built;
                                                                  ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># UNITS</b></td>
                                                              <td>
                                                                  <?php
                                                                  echo $sales_building->$sale_building_apartment_count;
                                                                  ?> UNITS
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># STORIES</b></td>
                                                              <td>
                                                                  <?php
                                                                  echo $sales_building->$sale_building_floor_count;
                                                                  ?> STORIES
                                                              </td>
                                                          </tr>

                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-file-text-o"></i> Building Policy </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PETS POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo $sales_building->$sale_building_pets_policy_desc ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo $sales_building->$sale_building_policy; ?></button></td>
                                                          </tr>

                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-plus-square" aria-hidden="true"></i> Building Features  </td>
                                                          </tr>
                                                          <?php
                                                        endforeach;
                                                        ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div id="collapse3" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <table id="map" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2" class="table_title"> <i class="fa fa-map-marker" aria-hidden="true"></i> Map  </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo mvc\config\myConfigClass::getGoogleMapsAPI(); ?>&q=<?php echo $objSalesBuilding[0]->$sale_building_address . ',' . $objSalesBuilding[0]->$sale_building_city . ',' . $objSalesBuilding[0]->$sale_building_zipcode ?>" allowfullscreen></iframe>

                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    <b>Apartments</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                               
                                                if (empty($objSalesListings)) {
                                                  ?>

                                                  <div class = "alert alert-info alert-dismissible" role = "alert">
                                                      <p class = "text-center">
                                                          <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Apartments found. </b>
                                                      </p>
                                                  </div>
                                                  <?php
                                                }
                                                ?>
                                                <div class="alert alertbrg alert-dismissible" role="alert">
                                                    <p>
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Apartments with Label color <span class="label label-bohemia"> OLR</span>   are syncing from ORL.<br>
                                                    </p>
                                                </div></br>
                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="form-row">
                                                            <div class="row ">


<!--                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true) => $objSalesBuilding[0]->$sale_building_hash)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                                                </div>-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></br>

                                                <table id="sales_apartments" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="filter">Listing ID</th>
                                                            <th class="filter">Address</th>
                                                            <th class="filter">Unit #</th>
                                                            <th class="filter">Neighborhood</th>
                                                            <th>Price</th>
                                                            <th class="filter"># Baths</th>
                                                            <th class="filter"># Beds</th>
                                                            <th class="filter">Status</th>
                                                            <th>Created At</th>
                                                            <th>Modified At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th class="filter">Listing ID</th>
                                                            <th class="filter">Address</th>
                                                            <th class="filter">Unit #</th>
                                                            <th class="filter">Neighborhood</th>
                                                            <th>Price</th>  
                                                            <th class="filter"># Baths</th>
                                                            <th class="filter"># Beds</th>
                                                            <th class="filter">Status</th>
                                                            <th>Created At</th>
                                                            <th>Modified At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {
//                              $('input', this.footer()).on('keyup change', function () {
//                                  if (that.search() !== this.value) {
//                                      that
//                                              .search(this.value)
//                                              .draw();
//                                  }
//                              });

                              //LISTINGS TABLE SETTINGS 
                              $('#sales_apartments').DataTable({
                                  responsive: true,
                                  "pageLength": 100,
                                  "order": [0, 'DESC'],
                                  "ajax": {
                                      url: "../listings/ajax?manage_sales_listings=<?php echo $objSalesBuilding[0]->$sale_building_hash; ?>",
                                      type: "GET"
                                  },
                                  "deferRender": true,
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

                              $table = $('table#sales_apartments').DataTable();

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

