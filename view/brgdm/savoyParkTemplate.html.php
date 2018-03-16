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
                                <h2> Savoy Park Apartments </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Savoy Park Apartments</h4>
                                </div>
                                
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_listing" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b> New Listing</b></button>
                                        </div>

                                    </div>
                                </div>

                                <div id="addListing_panel"></div>
                                <div id="deleteListing_panel"></div>
                                <table id="savoyPark" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TYPE</th>
                                            <th>UNIT</th>
                                            <th>ADDRESS</th>
                                            <th>PRICING</th>
                                            <th>STYLE</th>
                                            <th>AVAILAVILITY</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($objTeams)) { ?>

                                      <div class="alert alert-info alert-dismissible" role="alert">
                                          <p class="text-center">
                                              <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Listings found. </b><br>
                                          </p>
                                      </div>
                                      <?php
                                    } else {
                                      ?>
                                      <?php foreach ($objTeams as $team): ?>
                                        <tr>
                                            <td><?php if (empty($team->$teamID)) { ?>
                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <?php echo $team->$teamID; ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php if (empty($team->$team_name)) { ?>
                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <?php echo $team->$team_name; ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php if (empty($team->$team_id_type)) { ?>
                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <button class="mdl-button mdl-js-button mdl-button--primary">       <?php ?></button>
                                                <?php } ?>
                                            </td>
                                            <td><?php if (empty($team->$team_description)) { ?>
                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <?php echo $team->$team_description ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php
                                                $team_leader_id = teamLeaderTableClass::getIdTeamLeader($team->$team_hash, 1);
                                                if (empty($team_leader_id)) {
                                                  ?>
                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                                                      <img class="mdl-chip__contact" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>"></img>
                                                      <span class="mdl-chip__text"><?php echo profileTableClass::getProfileByUserId($team_leader_id); ?></span>

                                                  </span>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($team->$status == "1") { ?>
                                                  <button class="mdl-button mdl-js-button mdl-button--primary"> ACTIVE</button>
                                                <?php } elseif ($team->$status == "0") { ?>
                                                  <button class="mdl-button mdl-js-button mdl-button-"> INACTIVE</button>
                                                <?php } else { ?>
                                                  <button type="button" class="btn btn-dark btn-xs">NO STATUS</button>
                                                <?php } ?>
                                            </td>

                                            <td><?php if (empty($team->$created_at)) { ?>

                                                  <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                <?php } else { ?>
                                                  <?php echo $team->$created_at; ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php if (empty($team->$updated_at)) { ?>

                                                  <button type="button" class="btn btn-info btn-xs">NO UPDATES</button>
                                                <?php } else { ?>
                                                  <?php echo $team->$updated_at; ?>
                                                <?php } ?>
                                            </td>

                                            <td>

                                                <a href="<?php echo routing::getInstance()->getUrlWeb("brgdm", "manage", array('hash' => $team->$team_hash)) ?>" class="btn btn-default " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                <button data-id="<?php echo $team->$teamID; ?>" class="btn btn-danger btnDelete_user" type="button" data-toggle="tooltip" data-placement="top" title="delete landlord"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                            </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>TYPE</th>
                                            <th>UNIT</th>
                                            <th>ADDRESS</th>
                                            <th>PRICING</th>
                                            <th>STYLE</th>
                                            <th>AVAILAVILITY</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
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