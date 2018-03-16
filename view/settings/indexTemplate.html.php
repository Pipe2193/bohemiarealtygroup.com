<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
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
                                <h2> Manage Teams </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Manage Teams</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"> Manage Team Type</button>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_team" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Team</b></button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addTeam_panel"></div>
                                <div id="deleteTeam_panel"></div>
                                <table id="teams" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Team Name</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Team Leader</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                          <tr>
                                              <td>
                                              </td>
                                              <td>
                                              </td>
                                              <td>
                                              </td>
                                              <td>
                                              </td>
                                              <td>
                                              </td>
                                              <td>
                                                 
                                              </td>

                                              <td>
                                              </td>
                                              <td>
                                              </td>

                                              <td>
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("team", "manage", array('hash' => $team->$team_hash)) ?>" class="btn btn-default " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                  <button data-id="<?php echo $team->$teamID; ?>" class="btn btn-danger btnDelete_user" type="button" data-toggle="tooltip" data-placement="top" title="delete landlord"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                              </td>
                                          </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Team Name</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Team Leader</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated at</th>
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