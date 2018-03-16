<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$neighborhood_id = neighborhoodTableClass::ID;
$neighborhood_name = neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD;
$borough = neighborhoodTableClass::BOROUGH_ID_BOROUGH;
$created_at = neighborhoodTableClass::CREATED_AT;
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
                                <h2> Neighborhoods </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Neighborhoods</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark " type="button"> Landlords & Buildings</a>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_neighborhood" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Neighborhood</button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addNeighborhood_panel"></div>
                                <div id="deleteRole_panel"></div>
                                <table id="neighborhood" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Neighborhood</th>
                                            <th>Borough</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($objNeighborhoods)) { ?>

                                      <div class="alert alert-info alert-dismissible" role="alert">
                                          <p class="text-center">
                                              <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no neighborhoods found. </b> <button data-hash="<?php echo \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Building</b></button><br>
                                          </p>
                                      </div>
                                      <?php
                                    } else {
                                      ?>
                                      <?php
                                      foreach ($objNeighborhoods as $neighborhood):
                                          ?>
                                          <tr>
                                              <td><?php if (empty($neighborhood->$neighborhood_id)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $neighborhood->$neighborhood_id; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($neighborhood->$neighborhood_name)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $neighborhood->$neighborhood_name; ?>

                                                  <?php } ?>
                                              </td>

                                              <td><?php if (empty($neighborhood->$borough)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo boroughTableClass::getBoroughName($neighborhood->$borough); ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($neighborhood->$created_at)) { ?>

                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $neighborhood->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td>

                                                  <button data-id="<?php echo $neighborhood->$neighborhood_id; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button " type="button" data-toggle="tooltip" data-placement="top" title="delete neighborhood" disabled><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Neighborhood</th>
                                            <th>Borough</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>

                                <div id="updateTeam_panel"></div>

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