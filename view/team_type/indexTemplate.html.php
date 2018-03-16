<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$team_type_id = teamTypeTableClass::ID;
$team_type_description = teamTypeTableClass::DESCRIPTION_TEAM_TYPE;
$team_type_hash = teamTypeTableClass::TEAM_TYPE_HASH;
$created_at = teamTypeTableClass::CREATED_AT;
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
                                <h2> Manage Team Types </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Manage Team Types</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">

                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_team_type" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Team Type</b></button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addTeam_panel"></div>
                                <div id="deleteTeam_panel"></div>
                                <table id="team_type" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($objTeamType as $team): ?>
                                          <tr>
                                              <td><?php if (empty($team->$team_type_id)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $team->$team_type_id; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($team->$team_type_description)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                     <button class="mdl-button mdl-js-button mdl-button--primary"> <?php echo $team->$team_type_description; ?></button>
                                                    
                                                  <?php } ?>
                                              </td>
                                              <td>
                                              </td>
                                              <td><?php if (empty($team->$created_at)) { ?>

                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $team->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              

                                              <td>
                                                  <button data-id="<?php echo $team->$team_type_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_user" type="button" data-toggle="tooltip" data-placement="top" title="delete landlord"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Description</th>
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