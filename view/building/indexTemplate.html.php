<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/**
 * BUILDINGS
 */
$building_id = buildingTableClass::ID;
$building_name = buildingTableClass::DESCRIPTION_BUILDING;
$building_address = buildingTableClass::ADDRESS;
$building_city = buildingTableClass::CITY;
$building_state_id = buildingTableClass::STATE_ID;
$building_zipcode = buildingTableClass::ZIPCODE;
$building_addon_codes_zipcode = buildingTableClass::ADDON_CODES_ZIPCODE;
$building_cross_address = buildingTableClass::CROSS_ADDRESS;
$building_status = buildingTableClass::STATUS;
$id_building_features = buildingTableClass::ID_BUILDING_FEATURES;
$id_landlord = buildingTableClass::ID_LANDLORD;
$id_neighborhood = buildingTableClass::ID_NEIGHBORHOOD;
$notes_building = buildingTableClass::NOTES_BUILDING;
$building_hash = buildingTableClass::BUILDING_HASH;
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
                            <div class="hidden-xs x_title">
                                <h2><i class="fa fa-building-o" aria-hidden="true"></i> Buildings </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4><i class="fa fa-server" aria-hidden="true"></i> Buildings </h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("neighborhood", "index") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> <b>Manage Neighborhoods</b></a>
                                            <button data-hash="<?php echo \mvc\request\requestClass::getInstance()->getGet("hash"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Building</b></button>
                                        </div>

                                    </div>
                                </div><br>
                                <div id="addBuilding_panel"></div>
                                <table id="buildingTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Zip Code</th>
                                            <th>Neighborhood</th>
                                            <th>Landlord</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($objBuildings)) { ?>

                                      <div class="alert alert-info alert-dismissible" role="alert">
                                          <p class="text-center">
                                              <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no buildings found. </b> <button data-hash="<?php echo \mvc\request\requestClass::getInstance()->getGet("hash"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Building</b></button><br>
                                          </p>
                                      </div>
                                      <?php
                                    } else {
                                      ?>
                                      <div class="alert alertbrg alert-dismissible" role="alert">
                                          <p>
                                              <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Buildings with background color <span class="label label-info">Blue</span>   are syncing from Nestio.<br>
                                          </p>
                                      </div>
                                      <?php
                                      foreach ($objBuildings as $building):
                                        ?>
                                        <tr> 
                                            <td><?php echo $building->$building_address; ?></td>
                                            <td><?php echo $building->$building_city; ?></td>
                                            <td><?php echo statesTableClass::getStateName($building->$building_state_id); ?></td>
                                            <td><?php echo $building->$building_zipcode; ?></td>
                                            <td><?php echo neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood); ?></td>
                                            <td><?php echo landlordTableClass::getLandlordNameById($building->$id_landlord); ?></td>
                                            <td>

                                                <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $building->$building_hash )) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                <button data-id="<?php echo $building->$building_id; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="Delete Building <?php echo $building->$building_address; ?> "><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                            </td>
                                        </tr>
                                        <?php
                                      endforeach;
                                      ?>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Zip Code</th>
                                            <th>Neighborhood</th>
                                             <th>Landlord</th>
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
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>