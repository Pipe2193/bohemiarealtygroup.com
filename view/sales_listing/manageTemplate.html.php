<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/* * SALES LISTING INSTANCES * */
$sales_listing_id = salesListingTableClass::ID;
$sales_listing_apt_number = salesListingTableClass::APT_NUMBER;
$sales_listing_building_id = salesListingTableClass::BUILDING_ID;
$sales_listing_price = salesListingTableClass::PRICE;
$sales_listing_baths = salesListingTableClass::BATHS;
$sales_listing_bedrooms = salesListingTableClass::BEDROOMS;
$sales_listing_availability_status = salesListingTableClass::AVAILABILITY_STATUS;
$sales_listing_description = salesListingTableClass::DESCRIPTION;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Sale Listing (<?php echo strtoupper(salesBuildingTableClass::getSalesBuildingAddressById($objSalesListings[0]->$sales_listing_building_id)) . ', UNIT: ' . $objSalesListings[0]->$sales_listing_apt_number; ?>)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage Sale Listing </br>(<?php echo strtoupper(salesBuildingTableClass::getSalesBuildingAddressById($objSalesListings[0]->$sales_listing_building_id)) . ', UNIT: ' . $objSalesListings[0]->$sales_listing_apt_number; ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
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
                                                foreach ($objSalesListings as $sales_listing):
                                                  ?>
                                                  <br>
                                                  <table id="sales_listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Listing Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ID</b></td> 
                                                              <td><button  class="mdl-button mdl-js-button" type="button"><?php echo $sales_listing->$sales_listing_id; ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>BUILDING</b></td> 
                                                              <td><?php echo strtoupper(salesBuildingTableClass::getSalesBuildingAddressById($sales_listing->$sales_listing_building_id)); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("sales_building", "manage", array(salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH, true) => salesBuildingTableClass::getSalesBuildingHash($sales_listing->$sales_listing_building_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>APT# / UNIT#</b></td> 
                                                              <td><?php echo $sales_listing->$sales_listing_apt_number; ?> </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>RENT</b></td> 
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$ <?php echo $sales_listing->$sales_listing_price; ?> USD</button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># BEDS</b></td>
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_listing->$sales_listing_bedrooms ?> </button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b># BATHS</b></td>
                                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $sales_listing->$sales_listing_baths; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING STATUS</b></td>
                                                              <td>
                                                                  <button  class="mdl-button mdl-js-button mdl-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> <?php echo $sales_listing->$sales_listing_availability_status; ?></button>

                                                              </td>
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
                                                            <td colspan="2" class="table_title"> <i class="fa fa-plus-square" aria-hidden="true"></i> Listing Description  </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php if (!empty($sales_listing->$sales_listing_description)) { ?>
                                                                  <div class="text-justify"><?php echo $sales_listing->$sales_listing_description; ?></div>
                                                                <?php } else { ?>
                                                                  <div class="alert alert-info alert-dismissible" role = "alert">
                                                                      <p class = "text-center">
                                                                          <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There is no Listing Description. </b> <br>
                                                                      </p>
                                                                  </div>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>

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
                                                                <?php
                                                                $sales_building_fields = array(
                                                                    salesBuildingTableClass::ADDRESS,
                                                                    salesBuildingTableClass::CITY,
                                                                    salesBuildingTableClass::ZIPCODE
                                                                );
                                                                $sales_building_info = salesBuildingTableClass::getAll($sales_building_fields, true);

                                                                $sales_building_address = salesBuildingTableClass::ADDRESS;
                                                                $sales_building_city = salesBuildingTableClass::CITY;
                                                                $sales_building_zipcode = salesBuildingTableClass::ZIPCODE;
                                                                ?>
                                                                <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo mvc\config\myConfigClass::getGoogleMapsAPI(); ?>&q=<?php echo $sales_building_info[0]->$sales_building_address . ', ' . $sales_building_info[0]->$sales_building_city . ',' . $sales_building_info[0]->$sales_building_zipcode ?>" allowfullscreen></iframe>

                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>

