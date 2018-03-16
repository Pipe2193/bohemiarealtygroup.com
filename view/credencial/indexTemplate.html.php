<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$role_id  = credencialTableClass::ID;
$role_name = credencialTableClass::NOMBRE;
$role_description = credencialTableClass::DESCRIPTION;
$credencial_credencial_hash = credencialTableClass::CREDENCIAL_HASH;
$created_at = credencialTableClass::CREATED_AT;
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
                                <h2> User Roles Permissions </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"> User Roles Permissions</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark " type="button"> Users Manager</a>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_role" type="button"><i class="fa fa-address-card-o" aria-hidden="true"></i> Add Role</button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addRole_panel"></div>
                                <div id="deleteRole_panel"></div>
                                <table id="roles" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Role</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($objCredencials as $role): ?>
                                          <tr>
                                              <td><?php if (empty($role->$role_id)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $role->$role_id; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($role->$role_name)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <span class="mdl-chip">
                                                        <span class="mdl-chip__text"><?php echo $role->$role_name; ?></span>
                                                    </span>
                                                  <?php } ?>
                                              </td>
                                              
                                              <td><?php if (empty($role->$role_description)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $role->$role_description ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($role->$created_at)) { ?>

                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $role->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td>
                                                  
<!--                                                  <button data-id="<?php echo $role->$credencial_credencial_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_user" type="button" data-toggle="tooltip" data-placement="top" title="delete role <?php echo $role->$role_name; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>-->
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "manage", array(credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH, true) => $role->$credencial_credencial_hash )); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"> MANAGE</a>

                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Role</th>
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